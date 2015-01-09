package dictionary;

import java.util.Enumeration;
import java.util.Hashtable;

public class HashDictionary <K extends Comparable<K>, V> implements DictionaryInterface <K,V>

{
	 Hashtable<K, V> ht = new Hashtable<K,V>();
	 
	public K[] getKeys()
	{
		int i=0;
		String arr[]=new String[ht.size()];
		Enumeration<K> e = ht.keys();
		while(e.hasMoreElements())
		{
		 arr[i]= (String) e.nextElement();
		i++;
		}
		return (K[]) arr;
	}
	
	public V getValue(K str) 
	{
		
		return ht.get(str);
	}


	public void insert(K key, V value)
	{
		if(ht.put(key, value)==null)
		{
			ht.put(key, value);
		}
		
	}


	public void remove(K key) 
	{
		
		ht.remove(key);
	}

}
