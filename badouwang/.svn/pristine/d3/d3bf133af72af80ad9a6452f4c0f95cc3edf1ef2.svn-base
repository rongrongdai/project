<?php
class TecentHelper{
	private static $key='101218640';
	private static $secret='c4fa8eeb29091575943c84bbbb17a4ba';
	private static $rurl="http://www.zhou20.com/index.php/User/User/qqLogin";
	//初始化获取
	public static function init(){
		$url='https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id='.self::$key.'&state=1&redirect_uri='.urlencode(self::$rurl);
		header("Location:$url");
	}
	//获取accesstoken
	public static function getToken($code){
		$url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id=".self::$key."&client_secret=".self::$secret."&code=$code&redirect_uri=".urlencode(self::$rurl);	
		$contents=explode('&',file_get_contents($url));
		$arr=explode('=',$contents[0]);
		return $arr[1];
	}
	//获取oppenid
	public static function getOpenId($token){
		 //获取openid
		$url = "https://graph.qq.com/oauth2.0/me?access_token=$token";
		$openid='';
		$contents=file_get_contents($url);
		if(strpos($contents,'openid')){
			 $tempid=substr($contents,strripos($contents,':')+2);
			 $openid=substr($tempid,0,strpos($tempid,'"'));
                         return $openid;
                }
        }
	//获取用户信息
	public static function getUserinfo($token,$openid){
    	//获取用户信息
            $contents=file_get_contents("https://graph.qq.com/user/get_user_info?access_token=$token&oauth_consumer_key=".self::$key."&openid=$openid");
            $user=  json_decode($contents,TRUE);
            return $user;
	}

}	
?>