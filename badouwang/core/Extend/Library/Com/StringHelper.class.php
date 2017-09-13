<?php
/*
   String，html模版方法类
 * @author fanbo
 */

class StringHelper {
    //js加码
    public static function escape($str) {  
        preg_match_all("/[\x80-\xff].|[\x01-\x7f]+/",$str,$r);  
        $ar = $r[0];  
        foreach($ar as $k=>$v) {  
          if(ord($v[0]) < 128)  
            $ar[$k] = rawurlencode($v);  
          else  
            $ar[$k] = "%u".bin2hex(iconv("GB2312","UCS-2",$v));  
        }  
        return join("",$ar);  
    }  
    //js解码
    public static function unescape($str) {  
        $str = rawurldecode($str);  
        preg_match_all("/(?:%u.{4})|.+/",$str,$r);  
        $ar = $r[0];  
        foreach($ar as $k=>$v) {  
          if(substr($v,0,2) == "%u" && strlen($v) == 6)  
            $ar[$k] = iconv("UCS-2","GB2312",pack("H4",substr($v,-4)));  
        }  
        return join("",$ar);  
   }  
}
