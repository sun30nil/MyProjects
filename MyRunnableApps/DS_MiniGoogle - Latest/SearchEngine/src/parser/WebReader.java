package parser;
import java.io.*;
import java.net.Authenticator;
import java.net.PasswordAuthentication;
import java.net.URL;

import element.*;
import url.URLTextReader;
/**
 * A simple test program for Webreader assignment
 *
 * This class provides a main program for testing Part 1.  It opens a
 * web page and creates a PageLexer object for it.  It then retrieves
 * and prints out all of the PageElements returned by the PageLexer.
 *
 * To run this program from the command line, type the following:
 *
 *     % java WebReader <url>
 *
 * where <url> is the URL of a web page to read.
 *
 */
public class WebReader 
{

  public static void main (String[] args) 
  {
    try 
    {
      URL u;
      //FileOutputStream saveFile;
      final String authUser = "iiit-63";
		final String authPassword = "MSIT123";

		System.setProperty("http.proxyHost", "proxy.iiit.ac.in");
		System.setProperty("http.proxyPort", "8080");
		System.setProperty("http.proxyUser", authUser);
		System.setProperty("http.proxyPassword", authPassword);

		Authenticator.setDefault(
		  new Authenticator() 
		  {
		    public PasswordAuthentication getPasswordAuthentication()
		    {
		      return new PasswordAuthentication(authUser, authPassword.toCharArray());
		    }
		  }
		);

		System.setProperty("http.proxyUser", authUser);
		System.setProperty("http.proxyPassword", authPassword);

      if (args.length >= 1) 
      {
      //if(true){
        
        u = new URL(args[0]);

        URLTextReader in = new URLTextReader(u);
        

        // Parse the page into its elements
        PageLexer<PageElementInterface> elts = new PageLexer<PageElementInterface>(in, u);
        // Print out the tokens
        int count = 0;
        while (elts.hasNext()) 
        {
          count++;
          PageElementInterface elt = (PageElementInterface)elts.next();
          if (elt instanceof PageWord)
            System.out.println("word: "+elt);
          else if (elt instanceof PageHref)
            System.out.println("link: "+elt);
          else if (elt instanceof PageNum)
            System.out.println("num: "+elt);
          else if (elt instanceof PageImg)
            System.out.println("img: "+elt);
        }
        System.out.println();
        System.out.println(count + " total page elements retrieved.");
      } 
      else 
      {
        System.out.println("Usage: WebReader url");
        return;
      }
    }
    catch (IOException e)
    {
      System.out.println("Bad file or URL specification");
    }
  }

}

