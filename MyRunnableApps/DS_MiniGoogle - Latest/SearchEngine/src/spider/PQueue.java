package spider;

	import java.io.*;
	import java.util.*;
	class link5
	{
		public String key;
		public double value;
		public link5 next;
		public link5(String a,double b)
		{
			key=a;
			value=b;
		}
		public void displaylink5()
		{
			System.out.println("->"+key+","+value);
		}
	}
	public class PQueue
	{
		private link5 first,last;
		public PQueue()
		{
			first=null;last=null;
		}
		public boolean isempty()
		{
			if(first==null)
			{
				return true;
			}
			else 
			{
				return false;
			}
		}
		public void enqueue(String a,double b)
		{
			link5 current = first; 
			link5 newlink5 = new link5(a,b);
			if(first==null)
			{
				newlink5.next = first; 
				first = newlink5; 
			
			}
			else
			{
				while(current.next!=null)
				{
					current=current.next;
				}
				current.next=newlink5;
			}
		}

			public void sort(String a,double b)
			{
			link5 current,previous,first1;
			double temp;
			String temp1=null;
			
			for(current=first;current!=null;current=current.next)
			{
			
				for(first1=current.next;first1!=null;first1=first1.next)
				{
				
					if(first1.value < current.value)
					{
						temp=current.value;
						temp1=current.key;
	                    current.value=first1.value;
						current.key=first1.key;
	                    first1.value=temp;
						first1.key=temp1;
					}
				}
				//add(a,b);
			}

		}
		public void display()
		{
			  
				link5 current=first;
				System.out.println(current.key);
				if(current==null)
				{
					System.out.println("list is empty");
				}
				else
				{
					while(current!=null)
					{
						current.displaylink5();
					    current=current.next;
					}
					System.out.println(" ");
				}
		}
		public void addatbeg(String a,double b)
		{
			
			link5 newlink5 = new link5(a,b);
		    newlink5.next = first; 
			first = newlink5; 
		}
		
		public boolean search(String id,double p) 
		{
			String b=null;
			link5 first1=first,temp;
			int flag=0,count=0;
			enqueue(id,p);
			sort(id,p);
			return true;
		}
		 public String dequeue()
		{
			String u=first.key;
			if(first.next==null)
			{
				first=null;
			}
			else
			{
				first=first.next;
			}
			return u;
		}
		
	};


