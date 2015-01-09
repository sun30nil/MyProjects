package search;

import java.util.Vector;

public class Sets implements SetADT<String>  
{
	public Vector<String> vec = new Vector<String>();
	Vector<String> temp;
	
	public void add(String element)
	{
		vec.add(element);
	}

	
	public boolean contains(String target) 
	{
		if(vec.contains(target)) 
			return true;
		return false;
	}
	
	public Vector<String> difference(Vector<String> set) 
	{
		temp = new Vector<String>();
		for(int i=0;i<vec.size();i++)
		{
			if(set.contains(vec.elementAt(i)))
			{}   //do nothing
			else
				temp.add(vec.elementAt(i));
		}
		return temp;
	}

	public boolean equals(Vector<String> set) 
	{
		if(vec.size() == set.size())
		{
			for(int i=0;i<vec.size();i++)
				if(set.contains(vec.elementAt(i))){}
				else
					return false;
			return true;
		}
		else
			return false;
	}

	public Vector<String> intersection(Vector<String> set) 
	{
		temp = new Vector<String>();
		for(int i=0;i<vec.size();i++)
			if(set.contains(vec.elementAt(i)))
				temp.add(vec.elementAt(i));
		return temp;
	}
	
	public boolean isEmpty() 
	{
		if(vec.size()==0)
			return true;
		else
			return false;
	}
	
	public String iterator(int ind) 
	{
		return vec.elementAt(ind);
	}
	
	public String remove(String element) 
	{
		vec.removeElement(element);
		return element;
	}
	
	public int size() 
	{
		return vec.size();
	}

	
	public Vector<String> union(Vector<String> set) 
	{
		temp = new Vector<String>();
		
		for(int i=0;i<vec.size();i++)
		{
			temp.add(vec.elementAt(i));
		}
		for(int k=0;k<set.size();k++)
		{			
			if( vec.contains(set.elementAt(k)))
			{}//do nothing 
			else
				temp.add(set.elementAt(k));			
		}
		return temp;
	}

}
