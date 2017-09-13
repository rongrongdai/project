<?php



/**
 * 分页类
 *
 * @author 樊波
 */
class PageHelper {
    //获取总分页
    private static $pagesize=10;//每页内容数目
    private static $pageshow=10;//显示多少页
    private static $pagenow=1;//当前页面数
    private static $sumcount=0;//总记录数
    private static $p_url='';
    public static function setPageSize($pages){
        self::$pagesize=$pages;
    }
    public static function setP_url($url){

        self::$p_url=$url;
    }
    public static function setPageShow($pshow){
        self::$pageno=$pshow;
    }
    public static function setPageNow($now){
        self::$pagenow=$now;
    }
    public static function setSumCount($sum){
        self::$sumcount=$sum;
    }
    //初始化
    public static function init($pages,$pshow,$now,$sum,$url){
         self::$pagesize=$pages;
         self::$pageshow=$pshow;
         self::$pagenow=$now;
         self::$sumcount=$sum;
         self::$p_url=$url;
    }
   //获取页面总数
   private static function getPages(){
      return ceil(self::$sumcount/self::$pagesize);
   }
   private static function comChild($i){
        //先判断程序是否URL传参
        $urle = $_SERVER["REQUEST_URI"];
        $url_e = strpos($urle,'?');
        $url_p = strpos($urle,'?page');
        if($url_e && !$url_p){
            $url_f = strpos($urle,'&page=');
            if($url_f){//判断&page是否存在
              $urle = substr($urle,0,$url_f);
            }
            $url=$urle.'&page=';
        }else{
            $url=self::$p_url.'?page=';
        }

        $rurl=$url.$i;
        $res='';
        if(self::$pagenow!=$i){ 
            $res.='<span class="t_page">'.'<a href="'.$rurl.'">['.$i.']</a></span>';
        }else{
            $res.='<span class="t_page">['.$i.']</span>';
        }
        return $res;
   }
   //组成分页信息
   private static function comPages(){
       $h_pages=self::$pagesize/2;
       $res='<span class="t_pages">';
       if(self::getPages()>=self::$pageshow){
                if(self::$pagenow<=$h_pages){
                    
                    for($i=1;$i<=self::$pageshow;$i++){
                       $res.=self::comChild($i);
                    }
                }else{
                    if(self::getPages()-self::$pagenow<=($h_pages-1)){
                        for($i=self::getPages()-self::$pagesize+1;$i<=self::getPages();$i++){
                             $res.=self::comChild($i);
                         }
                         
                    }else{
                        for($i=(self::$pagenow-$h_pages+1);$i<=self::$pagenow;$i++){
                           $res.= self::comChild($i);
                        }
                        
                        for($i=self::$pagenow+1;$i<(self::$pagenow+$h_pages+1);$i++){
                            $res.=self::comChild($i);
                        }
                    }
                }
       }else{
           
           for($i=1;$i<=self::getPages();$i++){
              $res.=self::comChild($i);
           }
           
       }
       $res.='</span>';
       return $res;
   }
   public static function getLimit(){
       return array('min'=>(self::$pagenow-1)*(self::$pagesize),'max'=>(self::$pagenow)*(self::$pagesize));
   }
   //获取分页html
   public static function getPageInfos(){
       $pre=(int)self::$pagenow-1;
       $next=(int)self::$pagenow+1;
       $sump=(int)self::getPages();
       if($pre<1){
           $pre=1;
       }
       if($next>self::getPages()){
           $next=$sump;
       }
      if($sump > 1){
        $urlc = $_SERVER["REQUEST_URI"];
        $url_c = strpos($urlc,'?');//判断程序是否URL传参
        $url_p = strpos($urlc,'?page');
        if($url_c && !$url_p){
            $url_d = strpos($urlc,'&page');
            if($url_d){//判断&page是否存在
              $urlc = substr($urlc,0,$url_d);
            }
            $pages='<div class="page"><span class="t_l"><a href="'.$urlc."&page=1".'">首页</a></span><span class="t_l"><a href="'.$urlc."&page=$pre".'">上一页</a></span>'.self::comPages().'<span class="t_l"><a href="'.$urlc."&page=$next".'">下一页</a></span><span class="t_l"><span><a href="'.$urlc."&page=$sump".'">最后页</a></span></div>';
        }else{
            $pages='<div class="page"><span class="t_l"><a href="'.self::$p_url."?page=1".'">首页</a></span><span class="t_l"><a href="'.self::$p_url."?page=$pre".'">上一页</a></span>'.self::comPages().'<span class="t_l"><a href="'.self::$p_url."?page=$next".'">下一页</a></span><span class="t_l"><span><a href="'.self::$p_url."?page=$sump".'">最后页</a></span></div>';
        }
          return $pages;
      }else{
          return false;
      }

   }
}
