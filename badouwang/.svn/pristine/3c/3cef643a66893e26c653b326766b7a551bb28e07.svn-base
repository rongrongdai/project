<?php
/**
 * 管理员管理
 * @author 樊波
 */
class AdminAction extends CommonAction{
    private $model;
    public function __construct() {
        $this->model=new AdminstratorModel();
        parent::__construct();
    }
    public function index(){
        $page=$this->initPage();
        import('Com.PageHelper');
        $sum=$this->model->count();
        $pagesize=10;
        PageHelper::init($pagesize, 10, $page['page'], $sum, '');
        if($sum>0){
            $limit=  PageHelper::getLimit();
            $admins=$this->model->query("select admin.id,admin.admin,admin.isforbidden,config.c_key from bd_adminstrator admin left join  bd_config config on config.c_value=admin.identity");
            $this->assignData(array('page'=>PageHelper::getPageInfos(),'admins'=>$admins),'assign');
        }
        $position='用户管理 > 管理员管理';
        $this->assignData(array('mmenu'=>'user','smenu'=>'admin','position'=>$position), 'assign');
        $this->display();
    }
    //添加和修改管理员
    public function entity() {
        $id=$this->getData(array('id'),'post');
        $position='用户管理 > 管理员管理';
        $model=new ConfigModel();
        $arole=$model->where("c_name='系统管理员'")->field('c_key,c_value')->select();
        $options='';
        foreach($arole as $key=>$val){
            $options.='<option value="'.$val['c_value'].'">'.$val['c_key'].'</option>';
        }
        $this->preEntity($id, $this->model,'管理员',$position,'saveAdmin',null,$options);
        parent::entity();
    }
    //保存管理员
    public function saveAdmin(){
        $data=$this->getData(array('admin','pwd','identity'),'post');
        //加密数据
        $data['pwd']=  md5($data['pwd']);
        $data['timestamp']=time();
        $data['privlege']='';
        $res=true;
        if($res=$this->model->create($data)){
            $res=$this->model->add($data);
        }
        
        $this->pagego('添加管理员成功','添加管理员失败', $res, 'index');
    }
    //处理用户
    public function handelAdmin(){
        $idarr=$this->getData(array('fid','cid'),'get');
        $res=true;
        $status=0;
        if($idarr['fid']){
            $isforbid=$this->model->where("id='$idarr[fid]'")->field('isforbidden')->find();
            $isforbid['isforbidden']==1?$status=0:$status=1;
            $res=$this->model->where("id='$idarr[fid]'")->setField('isforbidden', $status);
        }
        $smessage=$status=1?'成功锁定该管理员':'成功解除锁定';
        $fmessage=$status=1?'锁定失败':'解除锁定失败';
        $this->pagego($smessage,$fmessage, $res,'index');
    }
    //修改密码
    public function chpwd(){
        $data=$this->getData(array('cpwd','pwd','opwd'), 'post');
        if($_POST){
            if($data['cpwd'] && $data['pwd'] && $data['opwd']){
            if($data['pwd']=== $data['cpwd']){
                $admin=session('admin');
                 import("Com.PasswordHelper");
                 $opwd=  PasswordHelper::basicEncode($data['opwd']);
                 $npwd=  PasswordHelper::basicEncode($data['pwd']);
                if(M('Adminstrator')->where("admin='$admin' and pwd='$opwd'")->count()){
                    $res=M('Adminstrator')->where("admin='$admin'")->setField('pwd',$npwd);
                    $this->pagego('修改密码成功','修改密码失败', $res,'');
                }else{
                     $this->error('旧密码不正确！');
                }
            }else{
                $this->error('新旧密码不一致！');
            }
        }else{
            $this->error('参数不正确!');
        }
        }else{
            $this->display();
        }
        
    }
}
