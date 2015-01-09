package element;

public class PageNum implements PageElementInterface 
{

	  public PageNum (double n)
	  {
	    num = n;
	  }

	  public String toString () 
	  {
	    return Double.toString(num);
	  }

	  private double num;
	}
