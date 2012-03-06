<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 
  require_once 'config.php';
  require_once 'index_function.php';

  ini_set("max_execution_time", 2400);
  ini_set("memory_limit", 1048576000);
  //$proxy = '172.28.138.13:8080';

  $tt_text = getTt();           // 头条文字新闻
  $tt_photo = getTtPhoto();     // 头条图片新闻
  $smarty->assign("tt_text",$tt_text);
  $smarty->assign("tt_photo",$tt_photo);

  //--- 重点关注 start -------
  $qqph = getQqph();            // 腾讯排行
  $wy163 = getWy163();          // 网易新闻
  $ifeng = getIfeng();          // 凤凰新闻 
  $wyphoto = getWy163Photo();   // 网易图片新闻
  $smarty->assign("qqph",$qqph);
  $smarty->assign("wy163",$wy163);
  $smarty->assign("ifeng",$ifeng);
  $smarty->assign("wyphoto",$wyphoto);
  //--- 重点关注 end -------

  //--- 今日话题 start -------
  /* 新浪评论 js */
  $qqht = getQqht();            // 腾讯话题
  $ykvideo = getYkvideo();      // 优酷视频新闻
  $smarty->assign("qqht",$qqht);
  $smarty->assign("ykvideo",$ykvideo);
  //--- 今日话题 end ---------

  //--- 互联网江湖 start -------
  $hlwyw = getHlwyw();          // 互联网要闻
  $roll = getRoll();            // 人在江湖
  $smarty->assign("hlwyw",$hlwyw);
  $smarty->assign("roll",$roll);
  //--- 互联网江湖 end -------

  //--- 论坛热帖 start -------
  $tybbs = getTybbs();          // 天涯论坛
  $mopdzh = getMopdzh();        // 猫扑大杂烩
  $smarty->assign("tybbs",$tybbs);
  $smarty->assign("mopdzh",$mopdzh);

  /* 首页生成 */
  $news_dir = ROOT_DIR."/apps_new/news/";
  $smarty->MakeHtmlFile($news_dir,"index.htm",$smarty->fetch("index.tpl"));
  echo "首页生成成功";
?>