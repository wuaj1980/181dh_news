<?php 
require 'config.php';
require_once 'news-163.php';
require_once 'news-ifeng.php';
require_once 'news-qqpaihang.php';
require_once 'news-sinapl.php';
require_once 'news-qqht.php';
require_once 'news-hlwyw.php';
require_once 'news-rdjh.php';
require_once 'news-tyrt.php';
require_once 'news-163photo.php';
require_once 'news-youku.php';

$news_dir = ROOT_DIR."/apps_new/news/";
$smarty->assign("newslist_163",$instance_163->getNewsList());//网易新闻
$smarty->assign("newslist_ifeng",$instance_ifeng->getNewsList());//凤凰新闻
$smarty->assign("newslist_qqpaihang",$instance_qqpaihang->getNewsList());//腾讯排行
$smarty->assign("newslist_sinapl",$instance_sinapl->getNewsList());//新浪评论
$smarty->assign("newslist_qqht",$instance_qqht->getNewsList());//腾讯话题
$smarty->assign("newslist_hlwyw",$instance_hlwyw->getNewsList());//互联网要闻
$smarty->assign("newslist_rdjh",$instance_rdjh->getNewsList());//人在江湖
$smarty->assign("newslist_tyrt",$instance_tyrt->getNewsList());//天涯论坛 热帖
$smarty->assign("newslist_163photo",$instance_163photo->getNewsList());//网易图片新闻
$smarty->assign("newslist_youku",$instance_youku->getNewsList());//优酷视频新闻

/* 首页生成 */
$smarty->MakeHtmlFile($news_dir,"index.htm",$smarty->fetch("index.tpl"));
echo "首页生成成功";

  	   /*foreach($newslist as $e) 
	   {
	      echo $e.href;
	   }*/

?>