<?php
// 用户控制器
class UserAction extends CommonAction {
    //注册
    public function regist(){
	$param=$this->getData(array('uname','password','user_pic','lab','rname','step','uid','Lng','Lat','vcode','sex'), 'post');
        switch($param['step']){
            case 1:
                if($param['vcode']){
                    $code=M('Sms')->where("mobile='$param[uname]'")->order('timestamp dec')->field('code');
                    if($code!==$code['code']){
                        $this->ajaxr(false, '', '验证码不正确');
                    }
                }
                if($param['uname'] && $param['password'] && $param['Lng'] && $param['Lat']){
                    import("Com.ArrayHelper");
                    var_dump(ArrayHelper::hotCity(array()));exit();
                    $res=M('User')->add(array('uname'=>$param['uname'],'password'=> PasswordHelper::advDecode($param['password']),'reg_timestamp'=>  time()));
                    import('Com.MapService');
                    MapService::modifyUser(array('Lng'=>$param['Lng'],'Lat'=>$param['Lat']));
                    $this->ajaxr($res, '', '',array('uid'=>$res));
                }else{
                    $this->errorkey($param,array('user_pic','lab','rname','uid'));
                }
                break;
            case 2:
                if($param('uid') && $param['user_pic']){
                    $res=M('Memberfields')->where("uid='$param[uid]'")->save(array('user_pic'=>$param['user_pic']));
                    $this->ajaxr($res,'设置头像成功','设置头像失败');
                }else{
                    $this->errorkey($param,array('uname','password','rname','lab','Lng','Lat'));
                }
                break;
            case 3:
                if($param('uid') && $param['lab'] && $param['rname']){
                    $res=M('Memberfields')->where("uid='$param[uid]'")->save(array('lab'=>$param['lab'],'rname'=>$param['rname']));
                    $data=M('User')->where("uid='$param[uid]'")->field('uname')->find();
                    import('Com.PasswordHelper');
                    $code=  PasswordHelper::aencrypt($data['uname'], $data['uname']);
                    $this->ajaxr($res,'','设置失败',array('token'=>$code));
                }else{
                    $this->errorkey($param,array('uname','password','user_pic','lab','Lng','Lat'));
                }
                break;
            default:
                $this->ajaxr(false, '', '请求步骤不正确');
        }
        
    }
    //登录
    public function login(){
        $data=$this->getData(array('uname','password'), 'post');
        if($data['uname'] && $data['password']){
            import("ComPasswordHelper");
            $password=  PasswordHelper::advDecode($data['password']);
            $user=M('User')->where("uname='$data[uname]' and password='$password'")->field('uname','password','uid','err_time')->find();
            if(count($user)){
                $code=  PasswordHelper::aencrypt($data['uname'], $data['uname']);
                $nickname=M('Memberfields')->where("uid='$user[uid]'")->field('rname')->find();
                $isfirst=date('Y-m-d',$user['err_time'])===date('Y-m-d',time())?1:0;
                if($isfirst){
                    import('Com.Config');
                    $isfirst=  Config::getConfig('经验','login');
                }
                $this->ajaxr(1,'', '',array('utoken'=>$code,'uname'=>$nickname['rname'],'isfirst'=>$isfirst));
            }else{
                $this->ajaxr(false, '', '用户名或密码为空！');
            }
        }else{
            $this->ajaxr(false, '', '用户名或密码为空！');
        }
    }
    //第三方登录绑定接口
    public function thirdLogin(){
        $data=$this->getData(array('uname','user_pic','rname','sex','city','password','type'), 'post');
        if($data['uname'] && $data['user_pic'] && $data['rname'] && $data['sex'] && $data['sex'] && $data['password']){
            import("Com.PasswordHelper");
            $bind=$data['type']==="1"?'q_bind':'w_bind';
            $uid=M('User')->add(array('uname'=>$data['uname'],'password'=>  PasswordHelper::advDecode($data['password']),
                'reg_timestamp'=>time(),$bind=>$data['user_pic']));
            if($uid){
                $res=M('Memberfields')->add(array('uid'=>$uid,'sex'=>$data['sex'],'rname'=>$data['rname'],'user_pic'=>$data['user_pic']));
                $this->ajaxr($res, '', '绑定账号失败！',array('uid'=>$uid,'sex'=>$data['sex'],'rname'=>$data['rname'],'user_pic'=>$data['user_pic']));
            }else{
                $this->ajaxr(false, '','绑定账号失败！');
            }
        }else{
            $this->errorkey($data);
        }
    }
    
    //找回密码
    public function chPassword(){
        $param=$this->getData(array('npwd,uid'), 'post');
        if($param['npwd'] && $param['uid']){
             import('Com.PasswordHelper');
             $res=M('User')->where("uid='$param[uid]'")->setField('password',  PasswordHelper::advDecode($param['npwd']));
             $this->ajaxr($res, '找回密码成功','找回密码失败');
        }else{
            $this->errorkey($param);
        }
       
    }
    //重置密码
    public function rePassword(){
        $param=$this->getData(array('opwd','npwd','uid'), 'post');
        if($param['uid'] && $param['opwd'] && $param['npwd']){
            if($param['opwd']===$param['npwd']){
                $this->ajaxr(false, '', '新旧密码一致');exit;
            }
            import('Com.PasswordHelper');
            $pass=  PasswordHelper::advDecode($param['opwd']);
            if(M('User')->where("uid='$param[uid]' and password='$pass'")->find()){
                $res=M('User')->where("uid='$param[uid]' and password='$pass'")->setField('password',  PasswordHelper::advDecode($param['npwd']));
                $this->ajaxr($res, '修改密码成功','修改密码失败');
            }else{
                 $this->ajaxr(false, '', '旧密码不正确');exit;
            }
        }else{
            $this->errorkey($param);
        }
        
    }
    //个人设置
    public function uset(){
        $param=$this->getData(array('rname','tname','sex','birth','email','qq','telephone'),'post');
        $res=M('Memberfieds')->save($param);
        $this->ajaxr($res, '修改信息成功', '信息未修改');
    }
    //获取token
    public function getCode(){
        $type=$this->getData(array('type'),'get');
        if(!$type['type']){
            echo json_encode(array('code'=>0,'message'=>'参数type不存在'));exit;
        }
        $code=  md5($type['type'].time());
        $res=M('Client')->add(array('type'=>$type['type'],'code'=>$code,'atime'=>time()));
        $this->ajaxr($res, '获取token成功','',array('code'=>1,'token'=>$code));exit;
    }
    //身份认证
    public function verify(){
        $param=$this->getData(array('type','real_name','telephone','cid','lincence','city',
            'address','self_info','school','id_img','c_url','dymess','invite','uid'),'post');
        switch($param['type']){
            case '1':
                if($param['type'] && $param['real_name'] && $param['telephone'] && $param['id_img'] && $param['cid'] &&  $param['self_info'] && $param['address'] && $param['city'] && $param['uid']){
                    $res=M('Authentication')->add(array(array('type'=>$param['type'] ,'real_name'=>$param['real_name'] ,'telephone'=> $param['telephone'] ,'id_img'=> $param['id_img'] ,'cid'=> $param['cid'] , 'self_info'=> $param['self_info'] ,'address'=> $param['address'] , 'city'=>$param['city'] ,'uid'=> $param['uid'])));
                    $this->ajaxr($res, '', '',$param);
                }else{
                    $this->errorkey($param, array('school','c_url','dymess','licence'));
                }
                break;
            case '2':
                if($param['type'] && $param['real_name'] && $param['lincence'] && $param['id_img'] && $param['cid'] &&  $param['self_info'] && $param['address'] && $param['city'] && $param['uid']){
                    $res=M('Authentication')->add(array(array('type'=>$param['type'] ,'real_name'=>$param['real_name'] ,'telephone'=> $param['telephone'] ,'id_img'=> $param['id_img'] ,'cid'=> $param['cid'] , 'self_info'=> $param['self_info'] ,'address'=> $param['address'] , 'city'=>$param['city'] ,'uid'=> $param['uid'])));
                    $this->ajaxr($res, '', '',$param);
                }else{
                    $this->errorkey($param, array('school','c_url','dymess'));
                }
                break;
            case '3':
                 if($param['type'] && $param['real_name'] && $param['lincence'] && $param['id_img'] && $param['cid'] &&  $param['self_info'] && $param['address'] && $param['city'] && $param['uid'] && $param['c_url'] && $param['dymess']){
                    $res=M('Authentication')->add(array(array('type'=>$param['type'] ,'real_name'=>$param['real_name'] ,'telephone'=> $param['telephone'] ,'id_img'=> $param['id_img'] ,'cid'=> $param['cid'] ,'c_url'=>$param['c_url'],'dymess'=>$param['dymess'], 'self_info'=> $param['self_info'] ,'address'=> $param['address'] , 'city'=>$param['city'] ,'uid'=> $param['uid'])));
                    $this->ajaxr($res, '', '',$param);
                }else{
                    $this->errorkey($param, array('school'));
                }
                break;
            case '4':
                if($param['type'] && $param['real_name'] && $param['telephone'] && $param['id_img'] && $param['cid'] &&  $param['self_info'] && $param['address'] && $param['city'] && $param['uid'] && $param['invite']){
                    $res=M('Authentication')->add(array('type'=>$param['type'] ,'real_name'=>$param['real_name'] ,'telephone'=> $param['telephone'] ,'id_img'=> $param['id_img'] ,'cid'=> $param['cid'] , 'self_info'=> $param['self_info'] ,'address'=> $param['address'] , 'city'=>$param['city'] ,'uid'=> $param['uid'] ,'invite'=>$param['invite']));
                    $this->ajaxr($res, '', '',$param);
                }else{
                    $this->errorkey($param, array('school','district','c_url','dymess','licence'));
                }
                break;
            default:
                $this->ajaxr(false, '', '认证类型错误');
        }
    }
    //修改环信信息
    public function modifyHUser(){
        $param=$this->getData(array('type','val','uname'), 'post');
        $param['val']=  json_decode($param['val'],TRUE);
        if($param['type'] && $param['val'] && $param['uname']){
            import('Com.HuanxinHelper');
            $res=HuanxinHelper::manUser($param['type'], array($param['val'],$param['uname']));
            $this->ajaxr($res, '修改信息成功','修改失败');
        }else{
            $this->errorkey($param);
        }
    }
    //获取附近的人
    public function getAroundPerson(){
        $param=$this->getData(array('Lng','Lat','cpage','pagesize','sex','type'), 'get');
        if($param['Lng'] && $param['Lat']){
             $limit=$this->initLimit($param);
             import('Com.MapService');
             if($param['sex']){
                 $filter[]=array('sex',$param['sex']);
             }
             if($param['type']){
                 $filter[]=array('type',$param['type']);
             }
             $this->ajaxr(1, '', '',MapService::getAround('user',array('Lng'=>$param['Lng'],'Lat'=>$param['Lat'],'cpage'=>$limit[0],'pagesize'=>$limit[1]),$filter));
        }else{
           $this->errorkey($param,array('cpage','pagesize','lprice','hprice'));
        }
    }
    //用户标签接口
    public function getUlab(){
        import("Com.Config");
        $param=$this->getData(array('cpage','pagesize'),'get');
        $limit=$this->initLimit($param);
        $configs= explode(',',Config::getConfig('用户配置', 'u_label'));
        foreach ($configs as $key=>$val){
            if(!($key>=$limit[0] && $key<$limit[1])){
                unset($configs[$key]);
            }
        }
        $this->ajaxr(TRUE,'','',array('labs'=>$configs));
    }
    //获取短信验证码
    public function getVcode(){
        $param=$this->getData(array('mobile'),'get');
        if($param['mobile']){
            import('Com.MessageHelper');
            $res=  MessageHelper::sendMessage($param['mobile']);
            echo json_encode($res);
        }else{
            $this->errorkey($param);
        }
    }
}