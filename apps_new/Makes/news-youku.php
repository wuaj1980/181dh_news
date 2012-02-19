<?php 
require_once 'basenews.php';
class NewsYouku extends BaseNews
{
  public function getNewsList()
  {
  	$url = 'http://news.youku.com/focus/index';
  	return $this->execute($url);
  }

  public function analytic($html)
  {
  	  $newslist = $html->find(".v");
  	  return $newslist;
  }

  public function getSrc($e)
  {
  	  return $e->find(".v_thumb img",0)->src;
  }

  public function getHref($e)
  {
      return $e->find(".v_title a",0)->href;
  }

  public function getText($e)
  {
      return $e->find(".v_title a",0)->innertext;
  }
}
$instance_youku = new NewsYouku();

?>
