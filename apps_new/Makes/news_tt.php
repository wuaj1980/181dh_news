<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 
require_once 'lib/simple_html_dom.php';
require_once 'lib/request.php';

class NewsTt
{
  private $result = array();

  public function getNewsList()
  {
  	//$url = 'http://news.sina.com.cn/world/'; // 新浪国际头条

  	$sitesToCheck = array(
       array("url" => "http://news.sina.com.cn/world/","selector" => "a",                   // 头条1
             "pattern" => "/<div\sclass=\"blkTop\"[^>]*>.*?<\/h1>/is"),
       array("url" => "http://news.ifeng.com/mainland/", "selector" => "a",                   // 国内
             "pattern" => "/<div\sclass=\"sysNews sysNW hotNews\"[^>]*>.*?<\/h1>/is"),
       array("url" => "http://news.ifeng.com/society/", "selector" => "a",                    // 社会
       	       "pattern" => "/<h1\sclass=\"sysNW fz20\"[^>]*>.*?<\/h1>/is"),
       array("url" => "http://news.sina.com.cn/world/","selector" => "a","index" => 1,        // 国际
             "pattern" => "/<div\sclass=\"blkTop\"[^>]*>.*<\/h1>/is"),
       array("url" => "http://ent.sina.com.cn/", "selector" => "a",                           // 娱乐
       	       "pattern" => "/<div\sclass=\"S_Blk02\"[^>]*>.*?<\/h3>/is"),
      array("url" => "http://news.ifeng.com/world/", "selector" => "a",                       // 国际
             "pattern" => "/<div\sclass=\"sysNews sysNW hotNews\"[^>]*>.*?<\/h1>/is"),

       array("url" => "http://news.163.com/", "selector" => "a",                              // 头条2
       	   "pattern" => "/<h2\sclass=\"bigsize\"[^>]*>.*?<\/h2>/is"),
       array("url" => "http://sports.people.com.cn/", "selector" => "a","index" => 2,         // 体育
       	   "pattern" => "/<div class=\"p1_center\"[^>]*>.*?<\/h3>/is"), 
       array("url" => "http://news.jinghua.cn/guonei/", "selector" => "a",                    // 国内
       	   "pattern" => "/<div\sclass=\"left txt22 w_510\"[^>]*>.*?<\/h2>/is"), 
       array("url" => "http://www.chinanews.com/society.shtml", "selector" => "a",            // 社会
           "pattern" => "/<div\sclass=\"dd_bt\"[^>]*>.*?<\/div>/is"), 
       array("url" => "http://ent.163.com/", "selector" => "a",                               // 娱乐
           "pattern" => "/<h3\sclass=\"bigsize\"[^>]*>.*?<\/h3>/is"),
       array("url" => "http://www.zaobao.com/gj/gj.shtml", "selector" => "a",                 // 国际
           "pattern" => "/<div\salign=\"left\"\sclass=\"title\"[^>]*>.*?<\/a>/is"), 
    );

    ini_set("max_execution_time", 2400);
    ini_set("memory_limit", 1048576000);

//	$context = stream_context_create
//	(array( 
//		'http' => array
//	     (
//	        'proxy' => '172.28.138.13:8080',
//            'request_fulluri' => true,
///         ))
//	);
//$proxy = '172.28.138.13:8080';

    foreach($sitesToCheck as $site) 
    {
        $url = $site["url"];
        $pattern = $site["pattern"];
        $index = $site["index"];
        if($index == ""){
            $index = 0;
        }

//$pattern = "/<div\sclass=\"sysNews sysNW hotNews\"[^>]*>.*?<\/h1>/is";

        $html = getWebContent($url,$proxy,"utf-8");
        preg_match($pattern,$html,$matches);
        //var_dump($html);

        if(sizeof($matches) > 0)
        {
            //echo $matches[0];

            $selector = $site["selector"];
            $dom = str_get_html($matches[0]);
            $e = $dom->find($selector,$index);

            $href = $e->href;
            $text = $e->plaintext;
            echo $text . "                          " . $href . "<br>";

            $news = array("href" =>$href, "text" => $text,"src" => $src);
            array_push($result,$news);
        }
    }

  	//var_dump($this->execute($url," "));
  	
  	//return $this->execute($url);
  }
}
$instance_Tt = new NewsTt();
$instance_Tt->getNewsList();
?>