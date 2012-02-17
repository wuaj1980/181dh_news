<?php 
require 'config.php'; 
$smarty->assign('hello','Hello Word'); 
//$smarty->display('index.tpl');
$news_dir = ROOT_DIR."/apps/news/";

// 头条新闻
$news_emphasis = array(
 array("url" => "www.1.com", "title" => "haha1"),
 array("url" => "www.2.com", "title" => "haha2"),
 array("url" => "www.3.com", "title" => "haha3"),
 array("url" => "www.4.com", "title" => "haha4"),
 array("url" => "www.5.com", "title" => "haha5"),
 array("url" => "www.6.com", "title" => "haha6"),
 array("url" => "www.7.com", "title" => "haha7"),
 array("url" => "www.8.com", "title" => "haha8"),
 array("url" => "www.9.com", "title" => "haha9"),
 array("url" => "www.10.com", "title" => "haha10"),
 array("url" => "www.10.com", "title" => "haha11"),
 array("url" => "www.10.com", "title" => "haha12")
);
$smarty->assign("news_emphasis",$news_emphasis);


/* 首页生成 */
$smarty->MakeHtmlFile($news_dir,"index.htm",$smarty->fetch("index.tpl"));
echo "首页生成成功";



?>