<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    private $model;
    public function __construct() {
        $this->model=new AdminstratorModel();
        parent::__construct();
    }
    //管理员首页
    public function index(){
       $this->display();
    }
    //登录操作
    public function login(){
        import("Com.VerifyHelper");
        if($_POST){
            $res= $this->getData(array('verify','token'),'session');
            $rdata=$this->getData(array('verify','admin','password','token'), 'post');
            if($rdata['token']!==$res['token']                                                                                                                                             ){
                $this->error('请勿重复提交表单！');
            }else{
                if($rdata['verify']===$res['verify']){
                    $password=$this->model->where("admin='$rdata[admin]'")->field('pwd,id')->find();
                    import("Com.PasswordHelper");
                    $rdata['password']=  PasswordHelper::basicEncode($rdata['password']);
                   if($password['pwd']===$rdata['password']){
                        session('token','null');
                        $linfo=  PasswordHelper::aencrypt(time().','.$rdata['admin'], C('SERCRET_KEY'));
                        $this->assignData(array('linfo'=>$linfo),'cookie');
                        $this->assignData(array('admin'=>$rdata['admin'],'id'=>$password['id']),'session');
                        $this->redirect('/Index/Index/index');
                    }else{
                        $this->error('用户名或密码不正确！');
                    }
                }else{
                    $this->error('验证码不正确！');
                }
            }
        }else{
            if(cookie('linfo')){
                $this->redirect('/Index/Index/index');
            }else{
               $token=md5(time());
                session('token',$token);
                $this->assign('token',$token);
                $this->display(); 
            }
        }
    }
    public function logImg(){
        import("Com.VerifyHelper");
        VerifyHelper::buildImageVerify(4,0,'png','60','29','verify');
    }
    //退出登录
    public function logOut(){
        session('admin',null);
        session('admin',null);
        session('token',null);
        cookie('linfo',null);
        $this->redirect('/Index/Index/login');
    }
    
    
}