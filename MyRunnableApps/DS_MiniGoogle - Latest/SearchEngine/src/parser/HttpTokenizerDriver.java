package parser;

import java.io.IOException;
import java.io.StreamTokenizer;
import java.net.Authenticator;
import java.net.MalformedURLException;
import java.net.PasswordAuthentication;
import java.net.URL;

import url.URLTextReader;

public class HttpTokenizerDriver 
{
  public static void main(String args[]) throws IOException
  {
    
    if(args.length < 1)
    {
      System.out.println("Usage java searchengine.parser.HttpTokenizerDriver <URL>");
    }
    else
    {
      return;
    }
    StreamTokenizer st=null;
    try 
    {
    	 final String authUser = "iiit-63";
 		final String authPassword = "MSIT123";

 		System.setProperty("http.proxyHost", "10.10.10.3");
 		System.setProperty("http.proxyPort", "3128");
 		System.setProperty("http.proxyUser", authUser);
 		System.setProperty("http.proxyPassword", authPassword);

 		Authenticator.setDefault(
 		  new Authenticator() {
 		    public PasswordAuthentication getPasswordAuthentication() 
 		    {
 		      return new PasswordAuthentication(authUser, authPassword.toCharArray());
 		    }
 		  }
 		);

 		System.setProperty("http.proxyUser", authUser);
 		System.setProperty("http.proxyPassword", authPassword);
 		
      st = new StreamTokenizer(new URLTextReader(new URL("http://www.easylinks.eu/")));
    }
    catch (MalformedURLException e) 
    {
      e.printStackTrace();
    }
    
    // Set up the appropriate defaults
    st.eolIsSignificant(false);
    st.lowerCaseMode(true);
    st.wordChars('<','<');
    st.wordChars('>','>');
    st.wordChars('/','/');
    st.wordChars('=','=');
    st.wordChars('@','@');
    st.wordChars('!','!');
    st.wordChars('-','-');
    st.ordinaryChar('.');
    st.ordinaryChar('?');
    
    HttpTokenizer ht = new HttpTokenizer(st);
    int i=0;
    while((i=ht.nextToken())!=HttpTokenizer.HT_EOF)
    {
   
      if(i==HttpTokenizer.HT_WORD)
      {
        System.out.println("Word: "+st);
      }
      else if(i==StreamTokenizer.TT_NUMBER)
      {
        System.out.println("Line no:"+st.lineno()+"\tI :"+i+"\t"+st.nval);
      }
      else
      {
        System.out.println("Line no:"+st.lineno()+"\tWS :"+i);
      }
      System.out.println(ht+", Token "+i);
    }
  }
}
