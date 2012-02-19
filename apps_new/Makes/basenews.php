<?php
require_once 'lib/simple_html_dom.php';
abstract class BaseNews
{
  public function execute($url)
  {
    ini_set("max_execution_time", 2400);
    ini_set("memory_limit", 1048576000);

    $html = file_get_html($url);
    $news_list = $this->analytic($html);
    $hrefpre = $this->getHrefpre();

    $result = array();
    foreach($news_list as $e)
	{
	  $href = $hrefpre . $this->getHref($e);
	  $src = $this->getSrc($e);
	  $text = $this->getText($e);
	  $news = array("href" => $href, "text" => $text,"src" => $src);
	  array_push($result,$news);
	}
	return $result;
  }

  public function getHrefpre()
  {
     return " ";
  }

  public function getSrc($e)
  {
  	 if ($e->tag == "img")
  	 {
  	 	  return $e->src;
     }
     return " ";
  }
  
  public function getHref($e)
  {
     return $e->href;
  }

  public function getText($e)
  {
     return $e->innertext;
  }
 
  public abstract function analytic($html);
 
}
?>