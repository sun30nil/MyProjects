package dictionary;

public class ListDictionary <K extends Comparable<K>, V> implements DictionaryInterface <K,V>

{
	private K key;
	private V value;
	ListDictionary <K , V> next,first,current,last;
	protected int size=0;
	
	public ListDictionary()
	{
		key=null;
		value=null;
		next=null;
	}
	public ListDictionary(K k, V v, ListDictionary <K , V> n)
	{
		key=k;
		value=v;
		next=n;
	}
	
	public K[] getKeys() 
	{
		current=first;
		String arr[]=new String [size];
		for (int i=0;i<size;i++)
		{
			if(first!=null)
			{
				ListDictionary<K , V> temp;
				temp=current;
				arr[i]=(String) temp.key;
				current=current.next;
			}
		}
		return (K[]) arr;
	}
	public V getValue(K str) 
	{
		current=first;
		for (int i=0;i<size;i++)
		{
			if(first!=null)
			{
				ListDictionary<K , V> temp;
				temp=current;
				if((temp.key).equals(str))
				{
					return temp.value;
				}
				else
				current=current.next;
			}
		}
		System.out.println("test 5");
		return null;
	}

	public void insert(K key, V value) 
	{
		if(first==null)
		{
			ListDictionary <K , V> newnode=new ListDictionary <K , V>(key, value, null);
			first=newnode;
			current=first;
		}
		
		else 
		{
			if(search(key, value)==-1)
			{
			ListDictionary <K , V> newnode1=new ListDictionary <K , V>(key, value, null);
			/*	ListDictionary <K , V> temp;
			temp=current;
			current=newnode1;
			temp.next=current;
			*/
			newnode1.next= first;
			first = newnode1;
			}
			else
				size--;
		}
		size++;
	}

	public void remove(K key) 
	{
		current=first;
		for (int i=0;i<size;i++)
		{
				if((current.next.key).equals(key))
				{
					current.next=current.next.next;
					size--;
					break;
				}	
				current=current.next;
		}	
	}
	
	@SuppressWarnings("unchecked")
	public int search(K key, V value)
	{
		current=first;
		for (int i=0;i<size;i++)
		{
				if((current.key).equals(key))
				{
					V tempvalue=current.value;
					current.value=((V) (tempvalue+" | "+value));
					return 1;
				}	
				current=current.next;
		}
		return -1;
	}                            

}
