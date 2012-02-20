<?php 
require 'basenews.php';
class News163 extends BaseNews
{
  public function getNewsList()
  {
  	$url = 'http://news.163.com/domestic/';
  	return $this->execute($url);
  }

  public function analytic($html)
  {
  	 $newslist = $html->find(".cList1",0)->find('a[!target]');
  	 return $newslist;
  }
}
$instance_163 = new News163();
?>