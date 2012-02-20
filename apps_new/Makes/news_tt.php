<?php 
require_once 'lib/simple_html_dom.php';
class NewsTt
{
  private $result = array();

  public function getNewsList()
  {
  	//$url = 'http://news.sina.com.cn/world/'; // 新浪国际头条
  		
  	$sitesToCheck = array(
       array("url" => "http://news.sina.com.cn/world/", "selector" => ".blkTop h1 a","index" => 0,"hrefpre" => "",),
       array("url" => "http://news.ifeng.com/mainland/", "selector" => ".sys_url","index" => 0,"hrefpre" => ""),
       array("url" => "http://news.ifeng.com/society/", "selector" => ".sys_url","index" => 0,"hrefpre" => ""),
       array("url" => "http://news.sina.com.cn/world/", "selector" => ".blkTop h1 a","index" => 1,"hrefpre" => "",),
       array("url" => "http://ent.sina.com.cn/", "selector" => ".S_Blk02 h3 a","index" => 0,"hrefpre" => "",),
       array("url" => "http://news.ifeng.com/world/", "selector" => ".sys_url","index" => 0,"hrefpre" => "",),
       array("url" => "http://news.163.com/", "selector" => "title","index" => 0,"hrefpre" => "",)

    );

    ini_set("max_execution_time", 2400);
    ini_set("memory_limit", 1048576000);

	$context = stream_context_create
	(array( 
		'http' => array
	     (
	        'proxy' => '172.28.138.13:8080',
            'request_fulluri' => true,
         ))
	);

    foreach($sitesToCheck as $site) 
    {
      $url = $site["url"];
      $html = file_get_html($url,false, $context);
      $e = $html->find($site["selector"],$site["index"]);

      $src = $e->src;
	  $text = $e->innertext;
	  $href = $site["hrefpre"] . $e->href;
	  echo $e->href . "<br>";
	  $news = array("href" =>$href, "text" => $text,"src" => $src);
	  unset($html);
    }

  	//var_dump($this->execute($url," "));
  	
  	//return $this->execute($url);
  }
}
$instance_Tt = new NewsTt();
$instance_Tt->getNewsList();
?>