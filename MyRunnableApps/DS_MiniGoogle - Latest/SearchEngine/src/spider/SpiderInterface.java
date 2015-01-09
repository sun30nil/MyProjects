package spider;

import java.io.IOException;

import indexer.Indexer;

/** An interface for web-crawling objects.
 *
 */

public interface SpiderInterface
{
  /** Crawl the web, up to a certain number of web pages.
   *
   *  @param limit The maximum number of pages to crawl.
   * @return The web index resulting from this crawl (and any previous ones).
 * @throws IOException 
   */
  public indexer.Indexer crawl (int limit) throws IOException;

  /** Crawl the web, up to the default number of web pages.
  @return The web index resulting from this crawl.
 * @throws IOException 
   */
  public indexer.Indexer crawl () throws IOException;

}
