<?php
/**
 * 
 * @author fanbo
 */
class MapService {
    private static $key='9f5703253d6926ecce6928a37c0e6a67';
    private static $tableid='55a715c1e4b0a76fce24e3bd';
    private static function init($table){
        switch($table){
            case 'user':
                self::$tableid='55a715c1e4b0a76fce24e3bd';
                break;
            case 'teach':
                self::$tableid='55a72f0ee4b0a76fce2529e6';
                break;
            case 'group':
                self::$tableid='55a72f46e4b0a76fce252a0d';
                break;
        }
    }
    //初始化，建表
    private static function dopost($data,$url){
        $ch = curl_init();
        $headers = array('Content-Type: application/x-www-form-urluncoded');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
    //初始化，建表
    private static function doget($url,$data){
        $parm='';
        $len=count($data);
        for($i=0;$i<$len;$i++){
            if($i===0){
                $parm.='?';
            }else{
                $parm.='&';
            }
            $parm.=$data[$i][0].'='.$data[$i][1];
        }
        $url.=$parm;unset($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $res=  substr($str, strpos($output, '{'));
        return json_decode($res,TRUE);
    }
    //初始化表
    public static function inittable(){
        $url='http://yuntuapi.amap.com/datamanage/table/create';
        $param=array('key'=>self::$key,'name'=>'badoumap');
        $res=self::dopost($param, $url);
        if($res['status']==='1'){
            return $res['tableid'];
        }else{
            return 'table_create_fail';
        }
    }
    //创建单条数据
    public static function createSingle($table,$param,$type=2){
        self::init($table);
        $url='http://yuntuapi.amap.com/datamanage/data/create';
        $para=array('loctype'=>$type,'key'=>self::$key,'tableid'=>self::$tableid,'data'=>json_encode($param));
        $str=self::dopost($para,$url);
        $res=  substr($str, strpos($str, '{'));
        return json_decode($res,TRUE);
    }
    //修改单条数据
    public static function updateSingle($table,$param,$type=2){
        self::init($table);
        $url='http://yuntuapi.amap.com/datamanage/data/update';
        $para=array('tableid'=>self::$tableid,'key'=>self::$key,'loctype'=>$type,'data'=>  json_encode($param));
        $str=self::dopost($para,$url);
        $res=  substr($str, strpos($str, '{'));
        return json_decode($res,true);
    }
    //修改用户数据
    public static function modifyUser($param=null){
            $uql="select user.type,fields.user_pic,fields.lab,user.gd_id,fields.rname,fields.address,fields.content,fields.sex from bd_user user left join bd_memberfields fields on fields.uid=user.uid where user.uid='$uid'";
            $uda=M('User')->query($uql);
            if($param['Lng'] && $param['Lat']){
                $par=array('_name'=>$uda[0]['rname'],'rname'=>$uda[0]['rname'],'_location'=>$param['Lng'].','.$param['Lat'],'uid'=>$uid,'desp'=>$uda[0]['content'],'u_lab'=>$uda[0]['lab'],'user_pic'=>$uda[0]['user_pic'],'type'=>$uda[0]['type'],'sex'=>$uda[0]['sex']);
            }else{
                $par=array('_name'=>$uda[0]['rname'],'rname'=>$uda[0]['rname'],'_address'=>  str_replace('-','',$uda[0]['address']),'uid'=>$uid,'desp'=>$uda[0]['content'],'u_lab'=>$uda[0]['lab'],'user_pic'=>$uda[0]['user_pic'],'type'=>$uda[0]['type'],'sex'=>$uda[0]['sex']);
            }
            if($uda[0]['gd_id']){
                MapService::updateSingle('user', $uda[0]['gd_id'], $par);
            }else{
                $res=MapService::createSingle('user', $par);
                if($res['_id']){
                    M('User')->where("uid='$uid'")->setField('gd_id',$res['_id']);
                }
            }
    }
    //获取周边数据
    public static function getAround($type,$param,$filter=null){
        $url='http://yuntuapi.amap.com/datasearch/around';
        $pda=array(array('sortrule','_distance'),array('radius','30000'),array('key',self::$key),array('center',$param['Lng'].','.$param['Lat']),array('limit',$param['pagesize']),array('cpage',$param['cpage']));
        switch($type){
            case 'user':
                self::init('user');
                $pda[]=array('tableid',self::$tableid);
                break;
            case 'teach':
                self::init('teach');
                $pda[]=array('tableid',self::$tableid);
                break;
            case 'group':
                self::init('group');
                $pda[]=array('tableid',self::$tableid);
                break;
            default:
                self::init('user');
                $pda[]=array('tableid',self::$tableid);
                break;
            
        }
        if($filter){
            $field='';
            foreach ($filter as $key=>$val){
                if(strpos($val, ',')){
                 $arr=  explode(',', $val);
                 $field.=$key.':['.$arr[0].','.$arr[1].']';
                }else{
                    $field.=$key.':'.$val;
                }
                $field.='+';
            }
            $pda[]=array('filter',  substr($field, 0,  strlen($field)-1));
        }
        $res=self::doget($url, $pda);
            if($res['status']){
                    return $res['datas'];
            }else{
                    
        }
    }
}
