package dictionary;

import java.util.Vector;

class ATNode<K extends Comparable<K>, V>{
	K key;
	V value; 
	ATNode<K,V> left; 
	ATNode<K,V> right; 
	ATNode<K,V> next;
	int height; 
	
	public ATNode(K ke,V val)
	{
		key=ke;
		value=val;
		left = null;
		right = null;
	}
	public ATNode(){}
	public boolean remove(K key, ATNode parent)//remove function
	{
        if (key.compareTo(this.key)<0)//checks the key less tahn 0
        {
              if (left != null)
              return left.remove(key, this);
              else
              return false;
        }//if not else
        else if (key.compareTo(this.key)>0)
        {
        	if (right!= null)
            return right.remove(key, this);
            else
            return false;
        }//not neted else if
        else 
        {
        	if (left!= null && right!= null) //left and right ==null
             {
                    this.key = right.minkey();
                    this.value=right.minvalue();
                    right.remove(this.key, this);

              } 
        	  else if (parent.left==this)
              {
                    parent.left=(left!=null) ? left : right;

              } 
        	  else if (parent.right==this)
              {
                    parent.right=(left!=null) ? left : right;
              }
              return true;
        }
	}
	public K minkey()//min key called
	{
		if (left==null)
        return key;
        else
        return left.minkey();

	}
	public V minvalue() //min value called
	{
		if (left==null)
		return value;
		else
		return left.minvalue();
	}
}
public  class AVLDictionary <K extends Comparable<K>, V> implements DictionaryInterface <K,V>{

	public ATNode current,first,parent;
	public ATNode root; 
	public int size;
	public K[] arr;
	public K[] arr1;
	int m;
	public Vector v=new Vector();
	public AVLDictionary()
	{
		root=null;
		size=0;
	}
	public K[] getKeys() 
	{
		arr=(K[]) new String[size];
		arr1=(K[]) new String[size];
		current=root;
	    m=0;
		inorder(root);
		for(int i=0;i<size;i++)
		{
			arr1[i]=arr[i];
		}
		return arr;	
		
		// TODO Auto-generated method stub
		//return null;
	}

	public V getValue(K str) 
	{
		ATNode current = root;
		ATNode parent = root;
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

		// TODO Auto-generated method stub
	}

	public void insert(K key, V value) 
	{
		ATNode newnode=new ATNode(key,value);		
		if(root==null)
		{
			root=newnode;                            //first node
			size++;				
		}
		else
		{
			current=root;
			while(true)
			{
				parent=current;
				int k=key.compareTo((K) current.key);
				if(k<=0)
				{
					System.out.println("in left");//left
					current=current.left;
					if(current==null)
					{
						parent.left=newnode;
						size++;
						break;
					}						
				}
				else
				{
					System.out.println("in right");//right
					current=current.right;
					if(current==null)
					{
						parent.right=newnode;
						size++;
						break;
					}					
					
				}//else
			}//while
		}//main else
		root= balance(root);
		updateHeight(root);
		// TODO Auto-generated method stub
		
	}

	public void remove(K key)
	{
		 if (root == null) 
         {
         	System.out.println("root is no there"+key);
         }
         else 
         {
         	if (root.key.equals(key))
         	{
                     ATNode auxRoot=new ATNode();
                     auxRoot.left=root;
                     boolean result=root.remove(key, auxRoot);
                     root = auxRoot.left;
             } 
         	else 
         	{
                     root.remove(key, null);
                     size--;
             }

         }
		root= balance(root);
		updateHeight(root);
		//return key;
		// TODO Auto-generated method stub
		
	}

	public void display() {
		// TODO Auto-generated method stub
		
	}
	
	int size()	
	{
		ATNode temp =current;
		int len = 0;
		while(temp!=null)	
		{
			len++;
			temp = temp.next;
		}
		return len;
	}
	public int getHeight(ATNode a)
	{	
		if(a==null)
		{
			return -1;
		}
	
		else
		{
			return a.height;
		}
		
	}
	public void rotateRight(ATNode n)
	{
		System.out.println("Rotating " + n.value);
		ATNode temp = n.left;
		n.left = temp.right;
		temp.right = n;
		updateHeight(n);
		updateHeight(temp);
	}
	public void inorder(ATNode localroot)//inorder
	{
		if(localroot!=null)
		{
			inorder(localroot.left);
			arr[m]=(K) localroot.key;
			m++;
			inorder(localroot.right);
		}
	}
	//rotate left called
	
	public void rotateLeft(ATNode n)
	{		
		System.out.println("Rotating " + n.value);
		//AVLNode tempNode = n.rightChild;		
		ATNode temp=n.right;
		n.right=temp.left;
		temp.left=n;
		updateHeight(n);
		updateHeight(temp);
	}
	private void updateHeight(ATNode n)
	{
		if(n.left==null&&n.right==null)
		{
			n.height=0;			
		}			
		else if(getHeight(n.left)>=getHeight(n.right))
		{
			n.height=getHeight(n.left)+1;			
		}
		else
		{
			n.height=getHeight(n.right)+1;
		}
			
	}	
	public ATNode balance(ATNode a)
	{
		int leftHeight=getHeight(a.left);
		System.out.println("left hight"+leftHeight);
		int rightHeight=getHeight(a.right);
		System.out.println("right hight"+rightHeight);
		int difference=Math.abs(leftHeight-rightHeight);
		if(difference>1)//diff >1
		{
			if(leftHeight>rightHeight)//lh>rh
			{  
				if(getHeight(a.left.left) < getHeight(a.left.right))
				{
					ATNode temp = a.left.right;
					System.out.println("Double rotate left right");
					rotateLeft(a.left);
					rotateRight(a);
					return temp;
				}
				else
				{
					ATNode temp = a.left;
					System.out.println("Single rotate right");
					rotateRight(a);
					return temp;
				}
			}			
			else if(leftHeight<rightHeight)
			{
				if(getHeight(a.right.right) < getHeight(a.right.left))
				{
					ATNode temp = a.right.left;
					System.out.println("Double rotate right left");
					rotateRight(a.right);
					rotateLeft(a);
					return temp;
				}
				else
				{
					ATNode temp = a.right;
					System.out.println("Single rotate left");
					rotateLeft(a);
					return temp;
				}
			}
		}
		return a;
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
