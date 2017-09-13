<?php
class SinaWeiboHelper{
        private static $key='2979675352';
        private static $secret='9b47083d1ca632f58ac6a1e66aca5206';
        private static $bac_url = 'http://www.zhou20.com/index.php/User/User/webLogin';
        public function init($key='',$secret='',$bac_url=''){
            if($key){
                self::$key =$key;
            }
            if($secret){
                 self::$secret=$secret;
            }
            if($bac_url){
                self::$bac_url = $bac_url;
            }
        }
        private static function post($data,$url) {
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
        public static function initWeb(){
                 $url='https://api.weibo.com/oauth2/authorize?client_id='.self::$key."&redirect_uri=".self::$bac_url;
                 header("Location:$url");
        }
        //获取tokens
        public static function getToken($code,$bac_url){
            $key=self::$key;$secret=self::$secret;
            if($code){
                     $url='https://api.weibo.com/oauth2/access_token';
                     $contents=json_decode(self::post(array('client_secret'=>$secret,'client_id'=>$key,'code'=>$code,'grant_type'=>'authorization_code','redirect_uri'=>$bac_url),$url),TRUE);
                     return array('uid'=>$contents['uid'],'access_token'=>$contents['access_token']);
            }
        }
        //发表文字微博
        public static function spredWord($token,$content){
            if($token && $content){
                $url='https://api.weibo.com/2/statuses/update.json';
                $res=json_decode(self::post(array('access_token'=>$token,'status'=>  urlencode($content),'visible'=>0),$url),TRUE);
                if($res['id']){
                    return 'sccuse';
                }
            }else{
                 return 'param_not_correct';
            }
            
        }
        //发表图片微博
        public static function spredPic($token,$content,$pic){
            if($token && $content){
                $url='https://api.weibo.com/2/statuses/update.json';
                $res=json_decode(self::post(array('access_token'=>$token,'status'=>  urlencode($content),'pic'=>  urldecode($pic),'visible'=>0),$url),TRUE);
                if($res['id']){
                    return 'sccuse';
                }
            }else{
                 return 'param_not_correct';
            }
        }
        //获取用户信息
        public static function getUserinfo($access_token,$uid){
            if($access_token && $uid){
                 $url='https://api.weibo.com/2/users/show.json?access_token='.$access_token.'&uid='.$uid;
                 return json_decode(file_get_contents($url),TRUE);
            }else{
                 return 'param_not_correct';
            }
        }
        //获取touken信息
        public static function getTokenInfo($access_token){
            if($access_token){
                $url='https://api.weibo.com/oauth2/get_token_info?access_token='.$access_token;
                return json_decode(file_get_contents($url),TRUE);
            }else{
                return 'param_not_correct';
            }
        }
        //关注某用户
        public static function contern($request_token,$nickname){
            if($request_token && $nickname){
                $url='https://api.weibo.com/2/friendships/create.json';
                $res=json_decode(self::post(array('access_token'=>$request_token,'screen_name'=>$nickname),$url),TRUE);
                if($res['id']){
                    return 'sccuse';
                }
            }else{
                return 'param_not_correct';
            }
        }
}


?>