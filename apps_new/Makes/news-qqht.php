<?php 
require_once 'basenews.php';
class NewsQQht extends BaseNews
{
  public function getNewsList()
  {
  	$url = 'http://view.news.qq.com/';
  	return $this->execute($url);
  }

  public function analytic($html)
  {
  	  $newslist = $html->find("#NewList a");
  	    /*	   foreach($newslist as $e) 
	   {
	      echo $e.href;
	   }*/
  	  return $newslist;
  }
}
$instance_qqht = new NewsQQht();
?>