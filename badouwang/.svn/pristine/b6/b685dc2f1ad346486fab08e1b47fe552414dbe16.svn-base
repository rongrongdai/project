<?php
/* 
 * 环信
 */
class HuanxinHelper{
    private static $client_id='YXA6pQoOUDdMEeWoBfuyRnNylA';
    private static $client_secred='YXA6MPQ0cEfZBa1KSaNp70apxva6l_w';
    private static $organ='bsxkj';
    private static $app_name='xuebaapp';
    //初始化，建表
    private static function dopost($url,$type,$data=null,$headers=null){
        $ch = curl_init();
        $headers[] = array('Content-Type: application/json');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER,$headers);
        if($type==='post'){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $res= json_decode(substr(substr($output,strpos($output,'{')),0,strpos( $output,'}')),TRUE);
        return $res;
    }
    //get请求
    private static function doget($data,$url){
        foreach($data as $key=>$val){
            if($key===0){
                $url.='?'.$val[0].'='.$val[1];
            }else{
                $url.= '&'.$val[0].'='.$val[1];
            }
        }
        echo $url;
        echo file_get_contents($url);exit();
    }
    //用户管理 active deactivate nickname newpassword
    public static function manUser($type,$param){
        $res=true;
        $token=  Cache::getInstance('File')->get('htoken');
        if(!$token){
                    $token=self::getToken();
        }
        switch($type){
            case 'addUser':
                // username password nickname”
                $url="https://a1.easemob.com/bsxkj/xuebaapp/users";
                $res= self::dopost($url, 'post',$param);
                break;
            case 'hand_user':
                $url="https://a1.easemob.com/easemob-demo/chatdemoui/users/$param[uname]/$param[hand]";
                $res= self::dopost($url, 'post','',array('Authorization'=>'Bearer '.$token));
                break;
            case 'nname':
                $url="https://a1.easemob.com/easemob-demo/chatdemoui/users/$param[uname]/";
                unset($param['uname']);
                $res=self::dopost($url,'post',$param['val'],array('Authorization'=>'Bearer '.$token));
                break;
            case 'npassword':
                $url="https://a1.easemob.com/easemob-demo/chatdemoui/users/$param[uname]/password";
                unset($param['uname']);
                $res=self::dopost($url,'post',$param['val'],array('Authorization'=>'Bearer '.$token));
                break;
        }
        return $res;
    }
    //组管理 groupname desc public maxusers approvals owner members(可选)
    public static function manGroup($type,$param){
        $res=true;
        $token=  Cache::getInstance('File')->get('htoken');
        if(!$token){
                    $token=self::getToken();
        }
        switch($type){
            case 'addGroup':
                $url="https://a1.easemob.com/easemob-demo/chatdemoui/chatgroups";
                $res=self::dopost($url,'post',$param,array('Authorization'=>'Bearer '.$token));
                break;
            case 'addUser':
                $url="https://a1.easemob.com/easemob-demo/chatdemoui/chatgroups/$param[gid]/users/$param[huid]";
                 $res=self::dopost($url,'post',null,array('Authorization'=>'Bearer '.$token));
                break;
            case 'modGroup':
                $url="https://a1.easemob.com/easemob-demo/chatdemoui/chatgroups/$param[gid]}";
                unset($param['gid']);
                $res=$res=self::dopost($url,'post',$param,array('Authorization'=>'Bearer '.$token));
                break;
        }
        return $res;
    }
    //获取token
    public static function getToken(){
        $url="https://a1.easemob.com/bsxkj/xuebaapp/token?grant_type=client_credentials&client_id=YXA6pQoOUDdMEeWoBfuyRnNylA&client_secret=YXA6MPQ0cEfZBa1KSaNp70apxva6l_w";
        $res=self::dopost($url,'',array('grant_type'=>'client_credentials','client_id'=>self::$client_id,'client_secret'=>self::$client_secred));
        $cache=  Cache::getInstance('File',array('expire'=>$res['expires_in']));
        if($res){
             $cache->set('htoken',$res['access_token']);
        }
        return $res['access_token'];
    }
}

