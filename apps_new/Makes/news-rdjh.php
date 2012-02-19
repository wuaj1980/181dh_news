<?php 
require_once 'basenews.php';
class NewsRdjh extends BaseNews
{
  public function getNewsList()
  {
  	$url = 'http://tech.sina.com.cn/blog/internet/roll.html';
  	return $this->execute($url);
  }

  public function analytic($html)
  {
  	  $newslist = $html->find(".f14",0)->find("li a");
  	  return $newslist;
  }
}
$instance_rdjh = new NewsRdjh();
?>