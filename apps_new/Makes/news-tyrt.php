<?php 
require_once 'basenews.php';
class NewsTyrt extends BaseNews
{
  public function getNewsList()
  {
  	$url = 'http://www.tianya.cn/bbs/index.shtml';
  	return $this->execute($url);
  }

  public function analytic($html)
  {
  	  $newslist = $html->find(".bbstime-list",0)->find(".bbstitle");
  	  return $newslist;
  }
}
$instance_tyrt = new NewsTyrt();
?>