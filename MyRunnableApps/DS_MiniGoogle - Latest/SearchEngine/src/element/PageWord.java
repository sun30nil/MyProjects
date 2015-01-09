package element;

/** A text word in a web page.
 */
public class PageWord implements PageElementInterface
{

  public PageWord (String w) 
  {
    word = w;
  }

  public String toString () 
  {
    return word;
  }

  private String word;
}
