package dictionary;
class ListNode<K extends Comparable<K>, V>

{
K key;
V value;
ListNode<K, V> next;
}
public class MyHashDictionary <K extends Comparable<K>, V> implements DictionaryInterface <K,V>{

	int n;
	ListNode a[];
	public int size;
	public K[] arr;
	ListNode first,temp,temp1,temp2;
	public MyHashDictionary()
	{
		n=10;
		a=new ListNode[n];
		for(int i=0;i<n;i++)
		{
			a[i]=null;
			
		}
	}
	
	public K[] getKeys() 
	{
		arr=(K[]) new String[size];
		int j=0;
		for(int i=0;i<n;i++)
		{
			if(a[i]!=null)
			{
				 ListNode temp = a[i];
				 while(temp!=null)
				 {
						arr[j]=(K) temp.key;
						temp = temp.next;
						j++;
				 }
			}
		}
		
		// TODO Auto-generated method stub
		return arr;
	}

	public V getValue(K str) 
	{
		V val=null;
		temp = new ListNode();
		for(int i=0;i<n;i++)
		{
			if(a[i]!=null)
			{
				 temp = a[i];
				 while(temp!=null)
				 {
					 if(str.equals(temp.key))
					 {
						 val=(V)temp.value;
					 }
					 temp=temp.next;
				 }
			}
		}
				 
		
		// TODO Auto-generated method stub
		return val;
	}

	public void insert(K key, V value) 
	{
		// TODO Auto-generated method
		
		int index=hash(key);
	
		int flag=0;
		temp = new ListNode();
		if(a[index]==null)
		{
			a[index]=temp;
			first = temp;
			first.value=value;
			first.key=key;
			first.next=null;
			size++;
		}
		else
		{
			temp1 = a[index];
			while(temp1.next!=null)
			{
				if(temp1.key.equals(key))
				{
					flag=1;
					break;
				}
				temp1 = temp1.next;
			}
			if(flag==1)
			{
				temp1.value=value;
			}
			else if(key.equals(temp1.key))
			{
				temp1.value=value;
	
			}
			else
			{
			temp1.next = temp;
			temp.value=value;
			temp.key=key;
			temp1 = temp;
			size++;
			}
			
		}
		
	}
	public int hash(K key)
	{
		/* Start with a base, just so that it's not 0 for empty strings */
	    int result = 42;
	    String inputString = key.toString().toLowerCase();

	    char [] characters = inputString.toCharArray();
	    for (int i = 0; i < characters.length; i++) 
	    {
	      char currentChar = characters[i];
	      int j = (int)currentChar;
	      result += j;
	    }
       System.out.println(result%n+"--------------------");
	    return (result % n);
	  }
	
	public void remove(K key) 
	{
		/*for(int i=0;i<n;i++)
		{
			if(a[i]!=null)
			{
				 ListNode temp1 = a[i];
					temp = temp1;
				 while(temp1!=null)
				 {
					 if(key.equals(temp1.key))
					 {
						 if(temp==null)
						 {
							 a[i]=null;
						 }
						 else
						 {
						 	temp.next = temp1.next;
						 	System.out.println(temp1.key+" has been deleted");
						 }
							size--;
							break;
					 }
					 temp = temp1;
					 temp1 = temp1.next;
				 }
			}
		}
		if(temp1 == null)
			System.out.println("Key is not found");*/
		String s=(String)key;
		int k=(int)s.charAt(0);
		int index=k%n;
		ListNode temp=null;
		ListNode temp1=a[index];
		while(temp1.next!=null&&temp1.key!=key)
		{
			temp=temp1;
			temp1=temp1.next;
		}
		if(temp1.key.equals(key))
		{
			if(temp==null)
				a[index]=null;
			else
				temp.next=temp1.next;
		}
		size--;
		// TODO Auto-generated method stub
		
	}

	public void display() {
		// TODO Auto-generated method stub
		
	}
	public boolean isempty() {
		// TODO Auto-generated method stub
		return false;
	}
	public boolean search(K str) {
		// TODO Auto-generated method stub
		return false;
	}
}
