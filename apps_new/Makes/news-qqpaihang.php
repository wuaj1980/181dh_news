<?php 
require_once 'basenews.php';
class NewsQQPaihang extends BaseNews
{
  public function getNewsList()
  {
  	$url = 'http://news.qq.com/paihang.htm';
  	return $this->execute($url);
  }

  public function analytic($html)
  {
  	  $newslist = $html->find(".lcu333");
  	  return $newslist;
  }
}
$instance_qqpaihang = new NewsQQPaihang();
?>