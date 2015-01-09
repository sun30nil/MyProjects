package search;

import java.util.Vector;

public interface SetADT<T>
{
	  /** Adds the element to this set, ignoring duplicates. */
	  public void add(T element);  
	 
	  /** Removes and returns the specified element from this set. */
	  public T remove(T element);
	 
	  /**  Returns the union of this set with the set passed */
	  public Vector<T> union(Vector<T> set);
	 
	  /**  Returns the Intersection of this set with the set passed */
	  public Vector<T> intersection(Vector<T> set);
	 
	  /**  Returns the Difference of this set with the set passed */
	  public Vector<T> difference(Vector<T> set);
	 
	  /**  Returns true if this set contains the parameter */
	  public boolean contains(T target);
	 
	  /**  Returns true if this set and the parameter contain exactly
	       the same elements */
	  public boolean equals(Vector<T> set);
	 
	  /**  Returns true if this set contains no elements */
	  public boolean isEmpty();
	 
	  /**  Returns the number of elements in this set */
	  public int size();
	 
	  /**  Returns an iterator for the elements in this set */
	  public T iterator(int ind);
	 
	  /**  Returns a string representation of this set */
	  public String toString();
	}

