<?php
/**
 * 数组帮助类
 * @author Administrator
 */
class ArrayHelper {
   //城市排序
   public static function sortcity(&$citys){
        $ocitys=array();
        foreach ($citys as $key=>$val){
            if(!$ocitys[$val['pname']]){
                $ocitys[$val['pname']]=array();;
            }
            $ocitys[$val['pname']][]=$val;
        }
        return $ocitys;
    }
    public static function hotCity($citys){
        $hotcity=array();
        foreach($citys as $key=>$val){
            if(strpos($val['cname'],'市')){
                $val['cname']=  str_replace('市', '', $val['cname']);
            }
            if($val['rank']){
                if(count($hotcity)<5){
                   $hotcity[]=$val;
                }else{
                    break;
                }
            }else if(count($hotcity<5)){
                 $hotcity[]=$val;
            }
        }
        return $hotcity;
    }
}
