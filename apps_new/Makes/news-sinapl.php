<?php 
require_once 'basenews.php';
class NewsSinapl extends BaseNews
{
  public function getNewsList()
  {
  	$url = 'http://news.sina.com.cn/opinion/shelun/index.html';
  	return $this->execute($url);
  }

  public function analytic($html)
  {
  	  $newslist = $html->find(".list_11 a");
  	    /*	   foreach($newslist as $e) 
	   {
	      echo $e.href;
	   }*/
  	  return $newslist;
  }

  public function getHrefpre()
  {
     return "http://news.sina.com.cn";
  }
}
$instance_sinapl = new NewsSinapl();
?>