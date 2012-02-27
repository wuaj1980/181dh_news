<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 
  require_once 'config.php';
  require_once 'news-info.php';
  require_once 'lib/request.php';
  require_once 'lib/simple_html_dom.php';
  require_once 'lib/runtime.php';

  ini_set("max_execution_time", 2400);
  ini_set("memory_limit", 1048576000);
  //$proxy = '172.28.138.13:8080';


  $newslist_tt = array(); // 各大网站头条新闻
  
  $news_info_list = array(); // 各大网站头条新闻
  $runtime->start();

  // 头条1-
  $url = "http://news.sina.com.cn/world/";
  $pattern = "/<div\sclass=\"blkTop\"[^>]*>.*?<\/h1>/is";
  setNewsInfoList($url, $pattern);
  
  // 国内--
  $url = "http://news.ifeng.com/mainland/";
  $pattern = "/<div\sclass=\"sysNews sysNW hotNews\"[^>]*>.*?<\/h1>/is";
  setNewsInfoList($url, $pattern);
  
   //$selector = "a", $index = 0, $urlpre = null
  
  // 社会
  $url = "http://news.ifeng.com/society/";
  $pattern = "/<h1\sclass=\"sysNW fz20\"[^>]*>.*?<\/h1>/is";
  setNewsInfoList($url, $pattern);
  
  
  
  // 国际
  $url = "http://news.sina.com.cn/world/";
  $pattern = "/<div\sclass=\"blkTop\"[^>]*>.*<\/h1>/is";
  setNewsInfoList($url, $pattern, 1);

  // 娱乐 -
  $url = "http://ent.sina.com.cn/";
  $pattern = "/<div\sclass=\"S_Blk02\"[^>]*>.*?<\/h3>/is";
  setNewsInfoList($url, $pattern);
  // 国际-
  $url = "http://news.ifeng.com/world/";
  $pattern = "/<div\sclass=\"sysNews sysNW hotNews\"[^>]*>.*?<\/h1>/is";
  setNewsInfoList($url, $pattern);

  // 执行
  execute($news_info_list,"add_newslist_tt",$proxy);

  /*
  //getNewsInfo($siteinfo);
  $runtime->stop();
  echo "头条1执行时间: ".$runtime->spent()." 毫秒";
  


  getNewsInfo($siteinfo);
  unset($siteinfo);

  getNewsInfo($siteinfo);
  unset($siteinfo);

  getNewsInfo($siteinfo);
  unset($siteinfo);


  // 头条2
  $siteinfo = new NewsInfo();
  $siteinfo->url = "http://news.163.com/";
  $siteinfo->pattern = "/<h2\sclass=\"bigsize\"[^>]*>.*?<\/h2>/is";
  getNewsInfo($siteinfo);
  unset($siteinfo);
  // 体育
  $siteinfo = new NewsInfo();
  $siteinfo->index = 2;
  $siteinfo->url = "http://sports.people.com.cn/";
  $siteinfo->pattern = "/<div class=\"p1_center\"[^>]*>.*?<\/h3>/is";
  getNewsInfo($siteinfo);
  unset($siteinfo);
  // 国内
  $siteinfo = new NewsInfo();
  $siteinfo->url = "http://news.jinghua.cn/guonei/";
  $siteinfo->pattern =  "/<div\sclass=\"left txt22 w_510\"[^>]*>.*?<\/h2>/is";
  getNewsInfo($siteinfo);
  unset($siteinfo);
  // 社会
  $siteinfo = new NewsInfo();
  $siteinfo->url = "http://www.chinanews.com/society.shtml";
  $siteinfo->pattern =  "/<div\sclass=\"dd_bt\"[^>]*>.*?<\/div>/is";
  getNewsInfo($siteinfo);
  unset($siteinfo);
  // 娱乐
  $siteinfo = new NewsInfo();
  $siteinfo->url = "http://ent.163.com/";
  $siteinfo->pattern =  "/<h3\sclass=\"bigsize\"[^>]*>.*?<\/h3>/is";
  getNewsInfo($siteinfo);
  unset($siteinfo);
  // 国际
  $siteinfo = new NewsInfo();
  $siteinfo->url = "http://www.zaobao.com/gj/gj.shtml";
  $siteinfo->pattern =  "/<div\salign=\"left\"\sclass=\"title\"[^>]*>.*?<\/a>/is";
  getNewsInfo($siteinfo);
  unset($siteinfo);
  $smarty->assign("newslist_tt",$newslist_tt);// 左边头条

  //var_dump($newslist_tt);
  // 网易新闻
  $siteinfo = new NewsInfo();
  $siteinfo->index = -2;
  $siteinfo->url = "http://news.163.com/domestic/";
  $siteinfo->pattern =  "/<ul\sclass=\"cList1\"[^>]*>.*?<\/ul>/is";
  getNewsInfo($siteinfo);
  unset($siteinfo);
  var_dump($newslist_tt); */

  //$smarty->assign("newslist_163",$instance_163->getNewsList());//网易新闻

/* 首页生成 */
//$news_dir = ROOT_DIR."/apps_new/news/";
//$smarty->MakeHtmlFile($news_dir,"index.htm",$smarty->fetch("index.tpl"));
//echo "首页生成成功";

  function setNewsInfoList($url, $pattern, $selector = "a", $index = 0, $urlpre = null)
  {
    global $news_info_list;
    $news_info = new NewsInfo();
    $news_info->url = $url;
    $news_info->pattern = $pattern;
    $news_info->selector = $selector;
    $news_info->index = $index;
    $news_info->urlpre = $urlpre;
    array_push($news_info_list,$news_info);
    unset($news_info);
  }

  function getNewsInfo($siteinfo)
  {
    global $newslist_tt; 
    $url = $siteinfo->url;
    $pattern = $siteinfo->pattern;
    $selector = $siteinfo->selector;
    $index = $siteinfo->index;

    $proxy = '172.28.138.13:8080';
    $html = getWebContent($url,$proxy,"utf-8");
    preg_match($pattern,$html,$matches);
  //var_dump($html);
//$newslist_tt = array(); 
    if(sizeof($matches) > 0)
    {
      $dom = str_get_html($matches[0]);
      if($index < -1)
      {
        $elements = $dom->find($selector);
        foreach($elements as $element)
        {
          $href = $element->href;
          $text = $element->plaintext;
          $src  = $element->src;
        //echo $text . "                          " . $href . "<br>";
          $news = array("href" =>$href, "text" => $text,"src" => $src);
          array_push($newslist_tt,$news);
        }
      } else {
        $element = $dom->find($selector,$index);
        $href = $element->href;
        $text = $element->plaintext;
        $src  = $element->src;
        //echo $text . "                          " . $href . "<br>";

        $news = array("href" =>$href, "text" => $text,"src" => $src);
        array_push($newslist_tt,$news);
      }
    }
  }
  
  function add_newslist_tt($html,$news_info)
  {
    global $newslist_tt; 

    $url = $news_info->url;
//    echo $news_info->pattern . "<br>";
    $pattern = $news_info->pattern;
    $selector = $news_info->selector;
    $index = $news_info->index;

    preg_match($pattern,$html,$matches);
  //var_dump($html);
//$newslist_tt = array(); 


    if(sizeof($matches) > 0)
    {
    //echo $news_info->pattern . "<br>--";
    echo $matches[0] . "<br>--";
      $dom = str_get_html($matches[0]);

      if($index < -1)
      {
        $elements = $dom->find($selector);
        foreach($elements as $element)
        {
          $href = $element->href;
          $text = $element->plaintext;
          $src  = $element->src;
        //echo $text . "                          " . $href . "<br>";
          $news = array("href" =>$href, "text" => $text,"src" => $src);
          array_push($newslist_tt,$news);
        }
      } else {
           //   echo "matches==>";
        $element = $dom->find($selector,$index);
        $href = $element->href;
        $text = $element->plaintext;
        $src  = $element->src;
        //echo $text . "                          " . $href . "<br>";

        $news = array("href" =>$href, "text" => $text,"src" => $src);
        array_push($newslist_tt,$news);
      }
    }
   // $pattern = $siteinfo->pattern;
   // $selector = $siteinfo->selector;
   // $index = $siteinfo->index;
  	  
  	  
   // echo "OK" . "<br>";
  }
  

?>