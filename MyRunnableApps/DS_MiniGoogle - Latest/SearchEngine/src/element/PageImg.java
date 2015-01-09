package element;

/** A img src in a web page.
*
*/
public class PageImg implements PageElementInterface 
{

 public PageImg (String h) /* perhaps throw an invalid filename error? */
 {
   img = h;
 }

 public String toString () 
 {
   return img;
 }

 private String img;
}

