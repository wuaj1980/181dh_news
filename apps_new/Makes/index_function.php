<?php 
  require_once 'news-info.php';
  require_once 'lib/Http_MultiRequest.php';
  require_once 'lib/simple_html_dom.php';

  ini_set("max_execution_time", 2400);
  ini_set("memory_limit", 1048576000);

  /* 取得头条新闻 */
  function getTt()
  {
    /* 头条1 */
    $url = "http://news.sina.com.cn/world/";
    $pattern = "/<div\sclass=\"blkTop\"[^>]*>.*?<\/h1>/is";
    addNewsInfo($url, $pattern);
    /* 国内 */ 
    $url = "http://news.ifeng.com/mainland/";
    $pattern = "/<div\sclass=\"sysNews sysNW hotNews\"[^>]*>.*?<\/h1>/is";
    addNewsInfo($url, $pattern);
    /* 社会 */
    $url = "http://news.ifeng.com/society/";
    $pattern = "/<h1\sclass=\"sysNW fz20\"[^>]*>.*?<\/h1>/is";
    addNewsInfo($url, $pattern);
    /* 国际 */
    $url = "http://news.sina.com.cn/world/";
    $pattern = "/<div\sclass=\"blkTop\"[^>]*>.*<\/h1>/is";
    addNewsInfo($url, $pattern,'a', 2);
    /* 娱乐 */
    $url = "http://ent.sina.com.cn/";
    $pattern = "/<div\sclass=\"S_Blk02\"[^>]*>.*?<\/h3>/is";
    addNewsInfo($url, $pattern);
    /* 国际 */
    $url = "http://news.ifeng.com/world/";
    $pattern = "/<div\sclass=\"sysNews sysNW hotNews\"[^>]*>.*?<\/h1>/is";
    addNewsInfo($url, $pattern);

    /* 头条2 */
    $url = "http://news.163.com/";
    $pattern = "/<h2\sclass=\"bigsize\"[^>]*>.*?<\/h2>/is";
    addNewsInfo($url, $pattern);
    /* 体育 */
    $index = 2;
    $url = "http://sports.people.com.cn/";
    $pattern = "/<div class=\"p1_center\"[^>]*>.*?<\/h3>/is";
    addNewsInfo($url, $pattern,'a',$index);
    /* 国内 */
    $url = "http://news.jinghua.cn/guonei/";
    $pattern =  "/<div\sclass=\"left txt22 w_510\"[^>]*>.*?<\/h2>/is";
    addNewsInfo($url, $pattern);
    /* 社会 */
    $url = "http://www.chinanews.com/society.shtml";
    $pattern =  "/<div\sclass=\"dd_bt\"[^>]*>.*?<\/div>/is";
    addNewsInfo($url, $pattern,'a',0,0,'http://www.chinanews.com');
    /* 娱乐 */
    $url = "http://ent.163.com/";
    $pattern =  "/<h3\sclass=\"bigsize\"[^>]*>.*?<\/h3>/is";
    addNewsInfo($url, $pattern);
    /* 国际 */
    $url = "http://www.zaobao.com/gj/gj.shtml";
    $pattern =  "/<div\salign=\"left\"\sclass=\"title\"[^>]*>.*?<\/a>/is";
    addNewsInfo($url, $pattern,'a',0,0,'http://www.zaobao.com');
    return getNewsInfoList();
  }

  /* 取得头条图片新闻 */
  function getTtPhoto()
  {
    /* 头条图片1 */
    $url = "http://news.ifeng.com/photo/";
    $pattern =  "/<div\sclass=\"photoPublicBox\"[^>]*>.*?<\/h3>/is";
    addNewsInfo($url, $pattern,'a',1,0);
    /* 头条图片2 */
    $url = "http://news.ifeng.com/photo/";
    $pattern =  "/<div\sclass=\"photoPublicBox\"[^>]*>.*?<\/h3>.*?<\/h3>/is";
    addNewsInfo($url, $pattern,'a',4,1);
    return getNewsInfoList();
  }

  /* 腾讯排行 */
  function getQqph()
  {
    $url = "http://news.qq.com/paihang.htm";
    $pattern =  "/<tr\sbgcolor=\"#FFFFFF\"[^>]*>.*?<\/table>/is";
    addNewsInfo($url, $pattern,'.pl18 a',-1);
    return getNewsInfoList();
  }

  /* 网易新闻 */
  function getWy163()
  {
    $url = "http://news.163.com/domestic/";
    $pattern =  "/<ul\sclass=\"cList1\"[^>]*>.*?<\/ul>/is";
    addNewsInfo($url, $pattern,'a',-1);
    return getNewsInfoList();
  }

  /* 凤凰新闻 */
  function getIfeng()
  {
    $url = "http://news.ifeng.com/toprank/day/";
    $pattern =  "/<div\sclass=\"listPicBox\"[^>]*>.*?<div\sclass=\"rightbar\"[^>]*>/is";
    addNewsInfo($url, $pattern,'.sys_url',-1);
    return getNewsInfoList();
  }
  
  /* 网易图片新闻 */
  function getWy163Photo()
  {
    $url = "http://news.163.com/photo/";
    $pattern =  "/<ul\sclass=\"list_pic\spic_3\sclearfix\"[^>]*>.*?<\/div>/is";
    addNewsInfo($url, $pattern,'h5 a',-1);
    return getNewsInfoList();
  }

  /* 腾讯话题 */
  function getQqht()
  {
    $url = "http://view.news.qq.com/";
    $pattern =  "/<ol\sclass=\"bd\"[^>]*>.*?<\/ol>/is";
    addNewsInfo($url, $pattern,'a',-1);
    return getNewsInfoList();
  }

  /* 优酷视频新闻 */
  function getYkvideo()
  {
    $url = "http://news.youku.com/focus/index";
    $pattern =  "/<div\sclass=\"collgrid6t\"[^>]*>.*?<div\sclass=\"LPageBar\"[^>]*>/is";
    addNewsInfo($url, $pattern,'.v_title a',-1);
    return getNewsInfoList();
  }

  /* 互联网要闻 */
  function getHlwyw()
  {
    $url = "http://tech.sina.com.cn/topnews/index.html";
    $pattern =  "/<table\scellspacing=01\sbgcolor=#E8E8E8[^>]*>.*?<\/table>/is";
    addNewsInfo($url, $pattern,'span a',-1);
    return getNewsInfoList();
  }

  /* 人在江湖 */
  function getRoll()
  {
    $url = "http://tech.sina.com.cn/blog/internet/roll.html";
    $pattern = "/class=f14.*?<br><br>.*?<br><br>.*?<br><br>.*?<br><br>/is";
    addNewsInfo($url, $pattern,'li a[target=_blank]',-1);
    return getNewsInfoList();
  }

  /* 天涯论坛 */
  function getTybbs()
  {
    $url = "http://www.tianya.cn/bbs/index.shtml";
    $pattern = "/<div\sclass=\"bbstime-list\"[^>]*>.*?<\/div>.*?<\/div>/is";
    addNewsInfo($url, $pattern,'.bbstitle',-1);
    return getNewsInfoList();
  }

  /* 猫扑大杂烩 */
  function getMopdzh()
  {
    $url = "http://dzh.mop.com/right.do";
    $pattern = "/<ul\sclass=\"phbC2\"[^>]*>.*?<\/ul>/is";
    addNewsInfo($url, $pattern,'.dt_1 a',-1);
    return getNewsInfoList();
  }

  function getNewsInfoList()
  {
    global $list_index;
    $list_index = 0;
    $list = Http_MultiRequest::request();
    Http_MultiRequest::clearListener();
    return $list;
  }

  function callbackNews($news_info,$html,&$newslist,$time)
  {
    $url = $news_info->url;
    $pattern = $news_info->pattern;
    $selector = $news_info->selector;
    $index = $news_info->index;
    $imgindex = $news_info->imgindex;
    $list_index = $news_info->list_index;
    $urlpre = $news_info->urlpre;

    preg_match($pattern,$html,$matches);

    if(sizeof($matches) > 0)
    {
      $dom = str_get_html($matches[0]);
      if($index < 0)
      {
        $elements = $dom->find($selector);

        foreach($elements as $element)
        {
          //$imgelement = $element->prev_sibling()->find("img",$imgindex);
          $imgelement = "";
          if($element->parent()->prev_sibling() != null)
          {
            $imgelement = $element->parent()->prev_sibling()->find("img",0);
          }

          $href = $element->href;
          $text = $element->plaintext;
          $src = "";
          if($imgelement != null)
          {
            $src  = $imgelement->src;
          }
        //echo $text . "                          " . $href . "<br>";
          $news = array("href" =>$href, "text" => $text,"src" => $src);
          array_push($newslist,$news);
        }
      } else {
           //   echo "matches==>";
        $element = $dom->find($selector,$index);
        $imgelement = $dom->find("img",$imgindex);
        
        $href = $urlpre == null?$element->href:$urlpre . $element->href;
        $text = $element->plaintext;
        $src = "";
        if($imgelement != null)
        {
          $src  = $imgelement->src;
        }
        //echo $list_index . "      " . $text . "                          " . $href . "<br>";

        $news = array("href" =>$href, "text" => $text,"src" => $src,"index" =>$list_index);
        $newslist[$list_index-1] = $news;
        //array_push($newslist,$news);
      }
      unset($dom);
    }
  }

  function addNewsInfo($url, $pattern, $selector = "a", $index = 0, $imgindex = 0, $urlpre = null)
  {
    global $list_index;
    $list_index = $list_index + 1;
    $news_info = new NewsInfo();
    $news_info->url = $url;
    $news_info->pattern = $pattern;
    $news_info->selector = $selector;
    $news_info->index = $index;
    $news_info->imgindex = $imgindex;
    $news_info->urlpre = $urlpre;
    $news_info->list_index = $list_index;

    $request = new Http_MultiRequest($news_info);
    $request->addListener('callbackNews');
    unset($news_info);
  }
?>