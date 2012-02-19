<?php 
require_once 'basenews.php';
class NewsHlwyw extends BaseNews
{
  public function getNewsList()
  {
  	$url = 'http://tech.sina.com.cn/topnews/index.html';
  	return $this->execute($url);
  }

  public function analytic($html)
  {
  	  $newslist = $html->find(".b2",2)->find("span a");
  	  return $newslist;
  }
}
$instance_hlwyw = new NewsHlwyw();
?>