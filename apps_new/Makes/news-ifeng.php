<?php 
require_once 'basenews.php';
class NewsIfeng extends BaseNews
{
  public function getNewsList()
  {
  	$url = 'http://news.ifeng.com/toprank/hour/';
  	return $this->execute($url);
  }

  public function analytic($html)
  {
  	  $newslist = $html->find(".sys_url");
  	  return $newslist;
  }
}
$instance_ifeng = new NewsIfeng();
?>