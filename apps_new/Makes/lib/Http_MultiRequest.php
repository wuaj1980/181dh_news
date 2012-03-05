<?php
/**
* Multiple Curl Handlers
* @author Jorge Hebrard ( jorge.hebrard@gmail.com )
**/
class Http_MultiRequest {
    static private $listenerList;
    private $callback;

    public function __construct($news_info){
        $new =& self::$listenerList[];
        $new['news_info'] = $news_info;
        $new['url'] = $news_info->url;
            //$news_info->url = "http://news.sina.com.cn/world/";
    //$news_info->pattern = = "/<div\sclass=\"blkTop\"[^>]*>.*?<\/h1>/is";
        
        
        $this->callback =& $new;
    }
    /**
    * Callbacks needs 3 parameters: $url, $html (data of the url), and $lag (execution time)
    **/
    public function addListener($callback){
        $this->callback['callback'] = $callback;
    }

    static public function clearListener(){
      
    }
    
    /**
    * curl_setopt() wrapper. Enjoy!
    **/
    public function setOpt($key,$value){
        $this->callback['opt'][$key] = $value;
    }
    /**
    * Request all the created curlNode objects, and invoke associated callbacks.
    **/
    static public function request(){
        $newslist = array();

        //create the multiple cURL handle
        $mh = curl_multi_init();
        $running=null;

        # Setup all curl handles
        # Loop through each created curlNode object.
        foreach(self::$listenerList as &$listener){
            $url = $listener['url'];
            $current =& $ch[];
            
            # Init curl and set default options.
            # This can be improved by creating
            $current = curl_init();

            curl_setopt($current, CURLOPT_PROXY, '172.28.138.13:8080');
            //curl_setopt($current, CURLOPT_PROXYUSERPWD, ":");

            curl_setopt($current, CURLOPT_URL, $url);
            # Since we don't want to display multiple pages in a single php file, do we?
            curl_setopt($current, CURLOPT_HEADER, 0);
            curl_setopt($current, CURLOPT_RETURNTRANSFER, 1);
            
            # Set defined options, set through curlNode->setOpt();
            if (isset($listener['opt'])){
                foreach($listener['opt'] as $key => $value){
                    curl_setopt($current, $key, $value);
                }
            }
            
            curl_multi_add_handle($mh,$current);
            
            $listener['handle'] = $current;
            $listener['start'] = microtime(1);
        } unset($listener);

        # Main loop execution
        do {
            # Exec until there's no more data in this iteration.
            # This function has a bug, it
            curl_multi_select($mh);
            while(($execrun = curl_multi_exec($mh, $running)) == CURLM_CALL_MULTI_PERFORM);
            if($execrun != CURLM_OK) break; # This should never happen. Optional line.

            # Get information about the handle that just finished the work.
            while($done = curl_multi_info_read($mh)) {
               $info = curl_getinfo($done['handle']);
               //echo $info['http_code'];
               if ($info['http_code'] == 200)  {

                # Call the associated listener
                foreach(self::$listenerList as $listener){
                    # Strict compare handles.
                    if ($listener['handle'] === $done['handle']) {
                        # Get content
                        $html = curl_multi_getcontent($done['handle']);
                        $html = Http_MultiRequest::convertEncoding($html);
                        # Call the callback.
                        call_user_func($listener['callback'],$listener['news_info'],$html,&$newslist,(microtime(1)-$listener['start']));
                        # Remove unnecesary handle (optional, script works without it).
                        curl_multi_remove_handle($mh, $done['handle']);
                    }
                }
              }
            }
            # Required, or else we would end up with a endless loop.
            # Without it, even when the connections are over, this script keeps running.
            if (!$running) break;
            
            # I don't know what these lines do, but they are required for the script to work.
//            while (($res = curl_multi_select($mh)) === 0);
//            if ($res === false) break; # Select error, should never happen.
        } while (true);

        # Finish out our script ;)
        curl_multi_close($mh);
        return $newslist;
    }
    
    static function convertEncoding($html){
      $formEncoding = mb_detect_encoding($html,array("ASCII","UTF-8","GB2312","GBK","BIG5"));
  // echo $formEncoding;
      $contents = mb_convert_encoding($html,'utf-8',$formEncoding);
      return $contents;
    }
    
}

//$curlGoogle = new Http_MultiRequest('http://news.sina.com.cn/world/');
//$curlGoogle->addListener('callbackGoogle');

//$curlMySpace = new Http_MultiRequest('http://news.ifeng.com/mainland/');
//$curlMySpace->addListener('callbackGoogle');

//Http_MultiRequest::request();
//  function callbackGoogle($url,$html,$time)
//  {
//    echo $time . "    " .$url . "<br>";
//  }
  


?>