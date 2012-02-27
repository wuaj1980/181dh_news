<?php
function execute($news_info_list, $callback,$proxy){  
    $timeout = 10;

    $custom_options = array(
    	CURLOPT_PROXY => $proxy,
        CURLOPT_PROXYUSERPWD => ":",
        CURLOPT_CONNECTTIMEOUT => $timeout
    );

    rolling_curl($news_info_list,$callback,$custom_options);

    return $contents;
}

function rolling_curl($news_info_list, $callback, $custom_options = null) {

    // make sure the rolling window isn't greater than the # of urls
    $rolling_window = 5;
    $news_info_size = sizeof($news_info_list);
    $rolling_window = ($news_info_size < $rolling_window) ? $news_info_size : $rolling_window;

    $master = curl_multi_init();
    $curl_arr = array();

    // add additional curl options here
    $std_options = array(CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_MAXREDIRS => 5);
    $options = ($custom_options) ? ($std_options + $custom_options) : $std_options;

    // start the first batch of requests
    for ($i = 0; $i < $rolling_window; $i++) {
        $ch = curl_init();
        $options[CURLOPT_URL] = $news_info_list[$i]->url;
        curl_setopt_array($ch,$options);
        curl_multi_add_handle($master, $ch);
    }
    $index = 0;
    do {
        while(($execrun = curl_multi_exec($master, $running)) == CURLM_CALL_MULTI_PERFORM);
        if($execrun != CURLM_OK)
            break;

        // a request was just completed -- find out which one
        while($done = curl_multi_info_read($master)) {

            $info = curl_getinfo($done['handle']);
            if ($info['http_code'] == 200)  {

                $html = curl_multi_getcontent($done['handle']);
                $html = convertEncoding($html);

                // request successful.  process output using the callback function.
                $callback($html,$news_info_list[$index++]);

                // start a new request (it's important to do this before removing the old one)
                $next = $i++;// increment i 
                //echo $next;
                if($news_info_size>$next)
                {
                  $ch = curl_init();
                  $options[CURLOPT_URL] = $news_info_list[$next]->url;  // increment i
                  curl_setopt_array($ch,$options);
                  curl_multi_add_handle($master, $ch);
                }
                // remove the curl handle that just completed
                curl_multi_remove_handle($master, $done['handle']);
            } else {
                // request failed.  add error handling.
            }
        }
    } while ($running);
    curl_multi_close($master);
    return true;
}

function convertEncoding($html){
  $formEncoding = mb_detect_encoding($html,array("ASCII","UTF-8","GB2312","GBK","BIG5"));
  // echo $formEncoding;
  $contents = mb_convert_encoding($html,'utf-8',$formEncoding);
  return $contents;
}
?>