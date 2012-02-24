<?php
function getWebContent($url,$proxy,$toEncoding){  
    $ch = curl_init();
    $timeout = 10;

    curl_setopt ($ch, CURLOPT_PROXY, $proxy);// 代理
    curl_setopt($ch,CURLOPT_PROXYUSERPWD,":"); // 用户名和密码

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
    $contents = trim(curl_exec($ch));
    curl_close($ch);
    $contents = convertEncoding($contents,$toEncoding);
    return $contents;
}

function convertEncoding($html,$toEncoding){
  $contents = "";
  $formEncoding = "";
  if(!empty($toEncoding))
  {
    $formEncoding = mb_detect_encoding($html,array("ASCII","UTF-8","GB2312","GBK",'BIG5'));
    echo $formEncoding;
    $contents = mb_convert_encoding($html,$toEncoding,$formEncoding);
  }
  return $contents;
}
?>