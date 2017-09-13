<?php

/* 
 *配置类
 */
class Config {
   public static function getConfig($cname, $ckey){
       $res= M('Config')->where("c_name='$cname' and c_key='$ckey'")->field('c_value')->find();
       return $res['c_value'];
   }
}
