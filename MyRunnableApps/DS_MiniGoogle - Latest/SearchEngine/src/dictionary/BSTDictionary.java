package dictionary;

import java.util.Stack;
import java.util.Vector;


class TNode<K extends Comparable<K>, V>{
	K key;
	V value; 
	TNode<K,V> left; 
	TNode<K,V> right; 
	TNode()
	{
		left = null;
		right = null;
	}
}
public class BSTDictionary <K extends Comparable<K>, V> implements DictionaryInterface <K,V>{

	public TNode root; 
	public int size;
	public K[] arr;
	public K[] arr1;
	public int m;
	public Vector v=new Vector();
	public BSTDictionary()
	{
		//int m=0;
		int size=0;
		root=null;
	}
	public K[] getKeys() 
	{
		arr=(K[]) new String[size];
		arr1=(K[]) new String[size];
		
		TNode current = root;
		TNode parent = root;
		int j=0;
		//String[] keys = new String[size()];
		/*TNode temp = root;
		int i = 0;
		Stack s = new Stack();
		s.push(temp);
		/*while (!s.empty()){

			 temp = (TNode) s.pop();
			 arr[i++] = (K) temp.key;
			 if(temp.right !=null)
		    		s.push(temp.right);
			 //temp = (TNode) s.pop();
			 if(temp.left != null)
		    		s.push(temp.left);
		} */
		/*while (!s.empty())
		{			
			 //temp = (TNode) s.pop();			 
			 while(temp!=null)
			 {
		    		s.push(temp.left);
		    		temp=temp.left;
			 }
			 temp = (TNode) s.pop();
			 arr[i++] = (K) temp.key;
			 temp=temp.right;
	} */
		m=0;
		inorder(root);
		for(int i=0;i<size;i++)
		{
			arr1[i]=arr[i];
		}
		return arr;	
	}

	public V getValue(K str)
	{
		TNode current = root;
		TNode parent = root;
		V val=null;
		// TODO Auto-generated method stub
		if(root.key.equals(str))
			val=(V) root.value;
		while(!((current.key).equals(str))) 
		{
			
			//parent = current;
			if((current.key).compareTo(str)>0)
			{
				current = current.left;
				val=(V) current.value;
			}
			else 
			{
				current = current.right;
				val=(V) current.value;
				
			}
			
		}
		
		//return (V) current.value;
		return val;

	}
	public void insert(K key, V value) 
	{
		// TODO Auto-generated method stub
		 TNode newNode = new TNode(); 
		 newNode.key = key; 
		 newNode.value = value; 
		 if(root==null)
		 {
			root = newNode;
			size++;
		 }
		 else 
		 {
				TNode current = root; 
				TNode parent;
				while(true) 
				{
					parent = current;
					System.out.println("id:"+(current.key).compareTo(key));
					if((current.key).compareTo(key)>0) 
					{
						
						current = current.left;
						if(current == null) 
						{ 
							size++;
							parent.left = newNode;
							System.out.println("inserted left");
							return;
						}
					} 
					else 
					{
						current = current.right;
						if(current == null) 
						{ 
							size++;
							parent.right = newNode;
							System.out.println("inserted right");
							return;
						}
					}
				}
			}
		 //TNode localroot=new TNode();
		 //display(root);
	}

	public void remove(K key) 
	{
		TNode current = root;
		TNode parent = root;
		boolean isleft = true;
		while(!((current.key).equals(key))) 
		{
			parent = current;
			if((key.compareTo((K) current.key))<0)
			{
				isleft = true;
				current = current.left;
			}
			else 
			{
				isleft = false;
				current = current.right;
			}
			
		}
		if(current.left==null && current.right==null)
		{
				if(current == root) 
				{
				    root = null; 
				    size--;
				}
				else 
				{
					if(isleft)
				      parent.left = null; 
				   else 
				      parent.right = null;
				}
				size--;
		}
		else 
		{
				if(current.right==null) 
				{
					if(current == root)
					{
					  root = current.left;
					  size--;
					}
				    else 
					{
						if(isleft)
						     parent.left = current.left;
				    	else 
					    	parent.right = current.left;
					}
					size--;
				}
				else 
				{
					if(current.left==null)
					{
							if(current == root)
						    {
								root = current.right;
								size--;
							}
							else 
						    { 
								if(isleft) 
								{
							     	parent.left = current.right;
								}
								else 
							    {
									parent.right = current.right;
								}
							}
							size--;
					}
					 else 
					 {
	              			TNode successor = getSuccessor(current);
							if(current == root)
							{
									
									successor.left=root.left;
									successor.right=root.right;
									root = successor;
									size--;
							}
							else 
							{
								if(isleft)
									parent.left = successor;
								else
									parent.right = successor;
									successor.left = current.left;
									size--;
							} 
							
						}
					
				}
		}
		
		// TODO Auto-generated method stub
		
	}

	public void inorder(TNode localroot)
	{
		if(localroot!=null)
		{
			inorder(localroot.left);
			arr[m++]=(K) localroot.key;
			//System.out.println(localroot.key+"   "+localroot.value);
			inorder(localroot.right);
		}
		
		// TODO Auto-generated method stub
		
	}
	private TNode getSuccessor(TNode delNode)
	{
		TNode successorParent = delNode;
		TNode successor = delNode;
		TNode current = delNode.right; 
		while(current != null) 
		{ 
			successorParent = successor;
			successor = current;
			current = current.left; 
		}
		if(successor != delNode.right) 
		{ 
			successorParent.left = successor.right;
			successor.right = delNode.right;
		}
		else
		{
			
			successorParent.left=null;
			//successorParent.right=null;
		}
		return successor;
	}
	public void display() {
		// TODO Auto-generated method stub
		
	}
	public boolean search(K s)
	{
		v.clear();
		inorder(root);
		return v.contains(s);
	}
	public boolean isempty()
	{
		if(root==null)
		{
			return true;
		}
		else 
		{
			return false;
		}
	}

}
