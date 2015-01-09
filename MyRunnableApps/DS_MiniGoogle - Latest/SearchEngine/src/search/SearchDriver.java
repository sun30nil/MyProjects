package search;

import java.util.*;
import java.io.*;
import dictionary.ObjectIterator;
import element.PageElementInterface;
import indexer.Indexer;
import element.PageWord;

/**
 * The user interface for the index structure.
 *
 * This class provides a main program that allows users to search a web
 * site for keywords.  It essentially uses the index structure generated
 * by WebIndex or ListWebIndex, depending on parameters, to do this.
 *
 * To run this, type the following:
 *
 *    % java SearchDriver indexfile list|custom keyword1 [keyword2] [keyword3] ...
 *
 * where indexfile is a file containing a saved index and list or custom indicates index structure.
 *
 */

public class SearchDriver
{
	ObjectIterator<String> i;  //from dictionary class
	Object[] result;
	StringTokenizer  token;
	Vector<String> temp = new Vector<String>();
	ObjectIterator<String> data = new ObjectIterator<String>(temp);
	int limit=40;	//limiting the search words
	
	public static void main(String [] args)
    {
        Vector<String> v=new Vector<String>();
        SearchDriver sd = new SearchDriver();
	if(args.length<3)
	    System.out.println("Usage: java SearchDriver indexfile list|hash keyword1 [keyword2] [keyword3] [...]");
	else
	    {
		Indexer w = null;
		
		if(args[1].equalsIgnoreCase("list") || args[1].equals("hash") || args[1].equals("myhash") || args[1].equals("bst") 
				|| args[1].equals("avl"))
		{
		    w = new Indexer(args[1]);
		}
		else
		{
			System.out.println("Invalid Indexer mode \n");
		}
		
		try
		{
		    FileInputStream indexSource=new FileInputStream(args[0]);
		    w.restore(indexSource);
		}
		catch(IOException e)
		{
		    System.out.println(e.toString());
		}
		
		String str = sd.Search(args[2],args[3],args[4],args[1]);
		System.out.println(str);	
		
		int c=1;
	    }
		
    }
	/* public static String mainclient(String arg)
	    {
	    	String[] args=new String[arg.length()];
	    	StringTokenizer at=new StringTokenizer(arg," ");
	    	int in=0;
	    	while(at.hasMoreTokens())
	    	{
	    		args[in]=(String)at.nextToken();
	    		in++;
	    	}
	    	
	    	String arr=null;
	        Vector<String> v=new Vector<String>();
	        SearchDriver sd = new SearchDriver();
		if(args.length<3)
		    System.out.println("Usage: java SearchDriver indexfile list|hash keyword1 [keyword2] [keyword3] [...]");
		else
		    {
			Indexer w = null;
			
			if(args[1].equalsIgnoreCase("list") || args[1].equals("hash") || args[1].equals("myhash") || args[1].equals("bst") 
					|| args[1].equals("avl"))
			{
			    w = new Indexer(args[1]);
			}
			else
			{
				System.out.println("Invalid Indexer mode \n");
			}
			
			try{
			    FileInputStream indexSource=new FileInputStream(args[0]);
			    w.restore(indexSource);
			}
			catch(IOException e)
			{
			    System.out.println(e.toString());
			}
			
			String str = sd.Search(args[2],args[3],args[4],args[1]);
//			System.out.println(str);
			arr=str;
		    }
		return arr;
			
	    }  */
	public static String key(String [] args)
    {
        Vector<String> v=new Vector<String>();
        SearchDriver sd = new SearchDriver();
        String arr = null;
	if(args.length<3)
	    System.out.println("Usage: java SearchDriver indexfile list|hash keyword1 [keyword2] [keyword3] [...]");
	else
	    {
		Indexer w = null;
		
		
		if(args[1].equalsIgnoreCase("list") || args[1].equals("hash") || args[1].equals("myhash") || args[1].equals("bst") 
				|| args[1].equals("avl"))
		{
		    w = new Indexer(args[1]);
		}
		else
		{
			System.out.println("Invalid Indexer mode \n");
		}
		
		try{
		    FileInputStream indexSource=new FileInputStream(args[0]);
		    w.restore(indexSource);
		}
		catch(IOException e)
		{
		    System.out.println(e.toString());
		}
		
		String str = sd.Search(args[2],args[3],args[4],args[1]);
		System.out.println(str);	
		arr=str;
		int c=1;
	    }
		return arr;
    }   
    
    public static int getRank(String str,String str1)   // calculating word frequency based on rank.
    {
    	int count=0;
    	for(int i=0;i<str.length();i++)
    	{
    		if(str.charAt(i)=='/')
    		{
    			count++;
    		}
    	}
    	int wfreq=Integer.parseInt(str1);    	
    	int rank= ((wfreq * 100)/ count);
		return rank;    	
    }
	public static Vector<String> Insertionsort(Vector<String> vecURL, Vector<String> vecRANK)
	{
		String temp1="";
	    String temp2="";
	    int k,j;	    
	    for(j=1;j<vecRANK.size();j++)
		{
	    	k=j;
	    	temp1=vecURL.get(k).toString();
	    	temp2=vecRANK.get(k).toString();
	    	while(k>0 && Integer.parseInt(vecRANK.get(k-1).toString())<Integer.parseInt(temp2))
			{
				vecRANK.set(k,vecRANK.get(k-1));
				vecURL.set(k,vecURL.get(k-1));
				k--;				
			}			
			vecRANK.set(k,temp2);
			vecURL.set(k,temp1);			
		}	 
		
		return vecURL;
	}
	public Vector<String> Url()
	{
		Vector<String> v = new Vector<String>();
		Vector<String> vecURL=new Vector<String>();
		Vector<String> vecRANK=new Vector<String>();
		if(i!=null)
		{
			int m=0;
			
			while(i.hasNext())
			{
				String s=i.next().toString();
				StringTokenizer st = new StringTokenizer(s, ", "); 				
				
				while(st.hasMoreTokens())
				{			
					
				   	String str=st.nextToken();
				   	StringTokenizer st1 = new StringTokenizer(str, ">");
				  
				  	while(st1.hasMoreTokens())
				  	{
				       	String url=st1.nextToken();
				       	String count=st1.nextToken();
				       	
				       	StringTokenizer st2 = new StringTokenizer(url, "%");
				       	String url1=st2.nextToken();
				       	int rank=getRank(url1,count);	
				       	count=Integer.toString(rank);
				       	vecURL.add(url1);
				       	vecRANK.add(count);
				    }				     
				}	
				String temp1="";
			    String temp2="";
			    int k,j;	    
			    for(j=1;j<vecRANK.size();j++)
				{
			    	k=j;
			    	temp1=vecURL.get(k).toString();
			    	temp2=vecRANK.get(k).toString();
			    	while(k>0 && Integer.parseInt(vecRANK.get(k-1).toString())<Integer.parseInt(temp2))
					{
						vecRANK.set(k,vecRANK.get(k-1));
						vecURL.set(k,vecURL.get(k-1));
						k--;				
					}			
					vecRANK.set(k,temp2);
					vecURL.set(k,temp1);			
				}	 
				//v = Insertionsort(vecURL,vecRANK);	
			//   System.out.println("*******************************************");
			  
			  //  System.out.println("*******************************************");
			
			}
			////////////////////////////////////////////////////////////////////
		    //  Write your Code here as part of Sorting based on Rank Assignment
		    //  
		    ///////////////////////////////////////////////////////////////////
			System.out.println("Search complete.\n\n");
	}
		  for(int i=0;i<vecURL.size();i++)
		    {
		    	System.out.println("Rank is:\t"+vecRANK.get(i)+"     URL is:\t"+vecURL.get(i));
		    }
		return vecURL;
	}
		@SuppressWarnings("unchecked")
		public String Search(String str1,String str2,String str3,String str4)
		{
			Vector<String> v=new Vector<String>();
			int count=0;
			if(str2==null)
				count=1;
			else
				count=2;
			String[] str = new String[2];
			str[0]=str1;		
			str[1]=str3;
			Indexer w = null;			
				
		    w = new Indexer(str4);
			
			try
			{
			    FileInputStream indexSource=new FileInputStream("myengine");
			    w.restore(indexSource);
			}
			catch(IOException e)
			{
			    System.out.println(e.toString());
			}
			
			for(int i=0;i<count;i++)
			{		    
				v.addElement(str[i]);
			}
			result=new Object[v.size()];
			for(int i=0;i<v.size();i++)
				result[i] = new Vector<String>();		
			for(int l=0;l<v.size();l++)
			{
				PageWord dat = new PageWord((String) v.elementAt(l));			
				i = (ObjectIterator<String>) w.retrievePages(dat.toString());
				result[l] = Url();
				
			}	
			
			Sets d = new Sets();/////////////////////////////////////////////////////////////////////////////////////
			d.vec = (Vector<String>) result[0];		
			if(str2 == null)
			{
				String s="";
				for(int i=0;i<d.vec.size();i++)
					s += d.iterator(i)+"\n";
				return s;
			}
			else if(str2.equals("or"))
			{
				d.vec = d.union((Vector<String>)result[1]);
				String s="";
				for(int i=0;i<d.vec.size();i++)
					s += d.iterator(i)+"\n";
				return s;
			}
			else if(str2.equals("and"))
			{			
				d.vec = d.intersection((Vector<String>)result[1]);
				String s="";
				for(int i=0;i<d.vec.size();i++)			
					s += d.iterator(i)+"\n";				
						
				return s;
			}
			else 
			{
				d.vec=d.difference((Vector<String>)result[1]);
				String s="";
				for(int i=0;i<d.vec.size();i++)
					s+=d.iterator(i)+"\n";
				return s;
			}  
			
		}
	
};


