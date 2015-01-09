package spider;
import java.lang.reflect.Array;
import java.util.Iterator;
import java.util.Comparator;
import java.util.NoSuchElementException;

public class MaxPQ<E extends Comparable<E>> implements PQueueADT<E> , Iterable<E>

{
	public void enqueue(E value)
	{
		insert(value) ;
	}

	public E dequeue()
	{
		return delMax();
	}

	public int sizePQ()
	{
		return size();
		
	} 

	public boolean is_empty()
	{
		return isEmpty();
	}

	public E front()
	{
		return pq[1];
		
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 private E[] pq;                    // store items at indices 1 to N
	    private int N;                       // number of items on priority queue
	    private Comparator<E> comparator;  // optional comparator
	   
	    
	   public MaxPQ(int initCapacity)
	    {
		  
	        //pq = (E[]) new Object[initCapacity + 1];
	      pq=  (E[])Array.newInstance(Comparable.class, initCapacity + 1);
	        N = 0;
	    }  

	    
	    public MaxPQ() 
	    {
	        this(1);
	    }

	    public MaxPQ(int initCapacity, Comparator<E> comparator)
	    {
	        this.comparator = comparator;
	        pq = (E[]) new Object[initCapacity + 1];
	        N = 0;
	    } 

	  
	    public MaxPQ(Comparator<E> comparator) 
	    {
	    	this(1, comparator); 
	    	}

	   
	    public MaxPQ(E[] keys) 
	    {
	        N = keys.length;
	        pq = (E[]) new Object[keys.length + 1];
	        for (int i = 0; i < N; i++)
	            { 
	        	pq[i+1] = keys[i];
	            }
	        for (int k = N/2; k >= 1; k--)
	            {
	        	sink(k);
	            }
	        assert isMaxHeap();
	    }

	    public boolean isEmpty()
	    {
	        return N == 0;
	    }

	  
	    public int size()
	    {
	        return N;
	    }

	  
	    public E max() 
	    {
	        if (isEmpty()) throw new NoSuchElementException("Priority queue underflow");
	        return pq[1];
	    }

	   
	    private void resize(int capacity) 
	    {
	        assert capacity > N;
	        E[] temp = (E[]) new Object[capacity];
	        for (int i = 1; i <= N; i++) 
	        	{
	        	temp[i] = pq[i];
	        	}
	        pq = temp;
	    }

	    public void insert(E x) 
	    {
	        pq[++N] = x;
	        swim(N);
	        assert isMaxHeap();   //If boolean_expression evaluates to false, the statement will fail with an "AssertionError" exception.
	    }

	    
	    public E delMax()
	    {
	        if (isEmpty()) throw new NoSuchElementException("Priority queue underflow");
	        E max = pq[1];
	        exch(1, N--);
	        sink(1);
	        pq[N+1] = null;        
	        if ((N > 0) && (N == (pq.length - 1) / 4)) 
	        	{
	        	resize(pq.length  / 2);
	        	}
	        assert isMaxHeap();
	        return max;
	    }

//to restore the heap properties

	    private void swim(int k) 
	    {
	        while (k > 1 && less(k/2, k)) 
	        {
	            exch(k, k/2);
	            k = k/2;
	        }
	    }

	    private void sink(int k) 
	    {
	        while (2*k <= N)
	        {
	            int j = 2*k;
	            if (j < N && less(j, j+1)) 
	            	{
	            	j++;
	            	}
	            if (!less(k, j)) 
	            	break;
	            exch(k, j);
	            k = j;
	        }
	    }

	  
	    private boolean less(int i, int j) 
	    {
	        if (comparator == null) 
	        {
	            return ((Comparable<E>) pq[i]).compareTo(pq[j]) < 0;
	        }
	        else 
	        {
	            return comparator.compare(pq[i], pq[j]) < 0;
	        }
	    }

	    private void exch(int i, int j)  //swaping to satisfy the heap condition
	    {
	        E swap = pq[i];
	        pq[i] = pq[j];
	        pq[j] = swap;
	    }

	   
	    private boolean isMaxHeap() 
	    {
	    	return isMaxHeap(1);
	    	
	    }

	    
	    private boolean isMaxHeap(int k) 
	    {
	    	if (k > N) 
	    		{
	    		return true;
	    		}
	        int left = 2*k, right = 2*k + 1;
	        if (left  <= N && less(k, left))  
	        	{
	        	return false;
	        	}
	        if (right <= N && less(k, right))
	        	{
	        	return false;
	        	}
	        return isMaxHeap(left) && isMaxHeap(right);  //using recurrsion
	    }


	    public Iterator<E> iterator() 
	    { return new HeapIterator(); }

	    private class HeapIterator implements Iterator<E> 
	    {
	       
	        private MaxPQ<E> copy;

	      
	        public HeapIterator() 
	        {
	            if (comparator == null)
	            	{
	            	copy = new MaxPQ<E>(size());
	            	}
	         else                 
	        	 {copy = new MaxPQ<E>(size(), comparator);}
	            for (int i = 1; i <= N; i++)
	            {      copy.insert(pq[i]);
	            System.out.println(pq[i]);
	            }
	        }

	        public boolean hasNext()  
	        { 
	        	return !copy.isEmpty();        
	        	}
	        public void remove()      
	        { throw new UnsupportedOperationException();  }

	        public E next() 
	        {
	            if (!hasNext()) throw new NoSuchElementException();
	            return copy.delMax();
	        }
	    }

}