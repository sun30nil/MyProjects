package spider;

import java.io.IOException;
import java.io.Reader;
import java.io.StreamTokenizer;
import java.net.*;
import java.util.ArrayList;
import java.util.Iterator;
import java.util.LinkedList;
import java.util.Queue;
import java.util.Vector;

import dictionary.ObjectIterator;
import parser.HttpTokenizer;
import parser.PageLexer;
import url.URLTextReader;
import element.PageElementInterface;
import element.PageHref;
import element.PageImg;
import element.PageNum;
import element.PageWord;
import indexer.Indexer;

/** Web-crawling objects.  Instances of this class will crawl a given
 *  web site in breadth-first order.
 * @param <E>
 */

public class BreadthFirstSpider implements SpiderInterface
{

	/** Create a new web spider.
	@param u The URL of the web site to crawl.
	@param i The initial web index object to extend.
	 */
	
	//CrawlerDriverInterface cc=new CrawlerDriverInterface();
	private Indexer i = null;
	private URL u; 
	public String aa[];
	public Vector vec12=new Vector();

	public BreadthFirstSpider (URL u, Indexer i)
	{
		this.u = u;
		this.i = i;
	}

	/** Crawl the web, up to a certain number of web pages.
	@param limit The maximum number of pages to crawl.
	 */
	public Indexer crawl (int limit)
	{
		int count=0,a=1;
		
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

		URLTextReader in = new URLTextReader(u);
		Queue<Object> qe2=new LinkedList<Object>();
		Queue<Object> qe3=new LinkedList<Object>();
		try
		{
		Queue<Object> qe1=new LinkedList<Object>();
		
		PageLexer<PageElementInterface> elts = new PageLexer<PageElementInterface>(in, u);
		PageLexer<PageElementInterface> elts1;
		
		
		while (elts.hasNext()) 
		{			
			PageElementInterface elt = (PageElementInterface)elts.next();			
			 if (elt instanceof PageHref)
			 {				 
				 qe1.add(elt);         //if reference move to queue
				 qe2.add(elt);
				 qe3.add(elt);
				 count++;              //inc count,1 count will be 3. 
				 if(count==crawlLimitDefault)    //if max limit
				 {
					  break;
				 }
			 }			
		}//while	

		while(a==1)
		{
			String p=qe1.remove().toString();    //pop the link
			
			/* final String authUser = "iiit-63";
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
				System.setProperty("http.proxyPassword", authPassword);  */

			
			URL u1=new URL(p);
			URLTextReader in1 = new URLTextReader(u1);
		    elts1=new PageLexer<PageElementInterface>(in1,u1); //passing pop link to page lexer
		     while (elts1.hasNext())                           
				{			
					PageElementInterface elt1 = (PageElementInterface)elts1.next();			
					 if (elt1 instanceof PageHref)
					 {											 
						 qe1.add(elt1);                     //adding elements in that link to queue
						 qe2.add(elt1);
						 qe3.add(elt1);
						 count++;
						 if(count==crawlLimitDefault && a==1)
						 {			 
							 a=0;
						       break;
						 }
					 }			
				}//while
		   
		}
		int s=0;
	    aa=new String[limit];
		for(int i=0;i<crawlLimitDefault;i++)
		{
			aa[i]=i+")"+qe2.remove();
		}
		for(int i=0;i<crawlLimitDefault;i++)
		{
			System.out.println(aa[i]);
			vec12.add(aa[i]);
			
		}
	
	}//try
	catch(Exception e)
	{
		System.out.println(e);
	}
	 System.out.println("count="+count);
	 int number=0;
	 try
	 {
		while(limit !=0)
		{
			

			Object elt=qe3.remove();
			//System.out.println(elt.toString());
			URL u1=new URL(elt.toString());
			URLTextReader in1= new URLTextReader(u1);

		// Parse the page into its elements
		PageLexer elt1 = new PageLexer(in1, u1);
		Vector v=new Vector();
		while (elt1.hasNext()) 
		{
			PageElementInterface elts2= (PageElementInterface)elt1.next();
			if (elts2 instanceof PageWord)
			{
				v.add(elts2);
			}
			
		}
				ObjectIterator oi=new ObjectIterator(v);
				i.addPage(u1,oi);
			
		limit--;
		}
	 }
	 catch(Exception e)
	 {}
		return i;
	}

	/** Crawl the web, up to the default number of web pages.
	 */
	public Indexer  crawl()
	{
		// This redirection may effect performance, but its OK !!
		System.out.println("Crawling using BFS: "+u.toString());
		return  crawl(crawlLimitDefault);
	}

	/** The maximum number of pages to crawl. */
	public int crawlLimitDefault = 10;
	public Vector Display()
	{
		return vec12;
	}
	
	}
