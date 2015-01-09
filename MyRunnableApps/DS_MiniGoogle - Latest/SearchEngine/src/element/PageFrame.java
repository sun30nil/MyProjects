package element;

import java.net.MalformedURLException;
import java.net.URL;

import url.URLFixer;

public class PageFrame implements PageElementInterface
{

    public PageFrame (String h) throws MalformedURLException 
    {
  frame = new URL(h);
    }

    public PageFrame (URL context, String h) throws MalformedURLException 
    {
  frame = URLFixer.fix(context, h);
    }

    public String toString () 
    {
    if(frame == null )
      return null;
  return frame.toString();
    }

    private URL frame;
}
