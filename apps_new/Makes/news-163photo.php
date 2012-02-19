<?php 
require_once 'basenews.php';
class News163photo extends BaseNews
{
  public function getNewsList()
  {
  	$url = 'http://news.163.com/photo/';
  	return $this->execute($url);
  }

  public function analytic($html)
  {
  	  $newslist = $html->find(".scrlBody",2)->find("li ul li");
  	  return $newslist;
  }

  public function getSrc($e)
  {
     return $e->find("a img",0)->src;
  }

  public function getHref($e)
  {
     return $e->find("a",1)->href;
  }

  public function getText($e)
  {
     return $e->find("a",1)->innertext;
  }
}

$instance_163photo = new News163photo();

?>
