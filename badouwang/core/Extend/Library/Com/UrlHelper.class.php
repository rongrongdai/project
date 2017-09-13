<?php
/*
   Url方法类
 * @author fanbo
 * 
 *  */

class UrlHelper {
    //发送简单post请求
    public static function post($data,$url) {
        $data = array("username" => "xiaoming");
        $data = http_build_query($data);
        $opts = array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-type: application/x-www-form-urlencoded\r\n" .
                "Content-Length: " . strlen($data) . "\r\n",
                'content' => $data
            )

        );
        $context = stream_context_create($opts);
        $html = file_get_contents($url, false, $context);
        return $html;
    }
    //发送get请求
    public static function get($data,$url){
        for($i=0;$i<count($data);$i++){

            if($i==0){
                $url.='?'.$data[$i];
            }else{
                $url.='&'.$data[$i].',';
            }

        }
        $end=substr($url, strlen($url)-1);
        if($end==','){
            $url=  substr($url, 0,  strlen($url)-1);
        }
        return $html = file_get_contents($url);
    }
}
