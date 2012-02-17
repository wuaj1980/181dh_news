<?php
define("ROOT_DIR",$_SERVER['DOCUMENT_ROOT']);

require_once ROOT_DIR.'/smarty/libs/Smarty.class.php';

$smarty = new Smarty; 
$smarty->template_dir = 'templates'; 
$smarty->complile_dir = 'templates_c'; 
$smarty->config_dir = ROOT_DIR.'/smarty/configs/'; 
$smarty->cache_dir = ROOT_DIR.'/smarty/cache/'; 

$smarty->left_delimiter = '{%'; 
$smarty->right_delimiter = '%}'; 

$smarty->caching = false; 
$smarty->debugging = false; 
?>