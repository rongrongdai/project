<?php

/**
 * 培训管理
 *
 * @author 樊波
 */
class ImageHandler{
    public  function handle($data){
        if($data['imgname']){
            $pos=strpos($data['imgname'], 'upload');
            return '/'.substr($data['imgname'],$pos);
        }
    }
}
class OrganizationAction extends CommonAction{
    //put your code here
    private $model;
    public function __construct() {
        $this->model=D('User/Authentication');
        parent::__construct();
    }
    public  function iorganization(){
        $uid=session('uid');
        if($_POST){
           $data=$this->getData(array('real_name','self_info','telephone','address','reason','s_province','s_city','s_county'),'post');
           if(!($data['s_county'] && $data['s_county']!=='请选择')){
               $this->error('请选择机构所在地！');
           }else{
               $data['p_address']=$data['s_province'].','.$data['s_city'].','.$data['s_county'];
           }
           foreach($data as $key=>$val){
               if(!$val){
                   $data[$key]='';
               }
           }
           if($_FILES['id_img']['name']){
               $data['id_img']=$this->handUimg('id_img');
           }
           $data['uid']=session('uid');
           if($uid){
               if($this->model->create()){
                  if(!$this->model->where("uid='$uid'")->count()){
                      $res=$this->model->add($data);
                      $this->pagego('添加机构信息成功！','添加机构信息失败', $res,'');
                      exit();
                  }else{
                      $res=$this->model->where("uid='$uid'")->save($data);
                      $this->pagego('修改机构信息成功！','修改机构信息失败', $res,'');
                      exit();
                 } 
               }else{
                   $this->error($this->model->getError());
               }
           }
        }else{
           $timestamp=time();
           $or=$this->model->where("uid='$uid'")->find();
           $or['citys']= count(explode(',', $or['p_address']))>1?explode(',', $or['p_address']):null;
           if($or){
               $this->assign('data',$or);
           }
           $this->assign(array('token'=>md5('unique_salt'.$timestamp),'timestamp'=>$timestamp)); 
        }
        $this->display();
    }
    //课程管理
    public function course(){
        $this->display();
    }
    public function addCourse(){
        $uid=session('uid');
        $timestamp=time();
        $add=M('authentication')->where("uid='$uid' and type=2")->field('p_address')->find();
        if(!$add['p_address']){
            $this->error('请先设置机构所在地！');
        }
        if($_POST){
            $course=new CourseModel();
            $data=$this->getData(array('aname','introduce','price','descript','cid'),'post');
            $data['atime']=$timestamp;
            $data['uid']=  session('uid');
            $aid=M('authentication')->where("uid='$uid' and type=2")->field(('id'))->find();
            if($aid['id']){
                $data['aid']=$aid['id'];
            }else{
                $this->error('请先申请后继续！');
            }
            if($_FILES['c_img']['name']){
                
                $data['c_img']=$this->handUimg('c_img');
               
            }
            if($course->create()){
                $res=$course->add($data);
                $this->pagego('添加课程成功！', '添加课程失败', $res,'course');
                exit();
            }else{
                $this->error($course->getError());
            }
        }else{
            $this->initForm();
            $this->display();
        }
    }
    //修改课程信息
    public function modifyCourse(){
        if($_POST){
            $rf=$this->f_check('token');
            if($rf){
                $data=$this->getData(array('aname','introduce','price','descript','id','cid'),'post');
                if($_FILES['c_img']['name']){
                      import('Com.ImageHelper');
                      $data['c_img']=ImageHelper::upimg('c_img');
                }
                
                $data['s_time']= strtotime($data['s_time']);
                 import("Com.ClassfiyHelper");
                try{
                    $idarr=  ClassfiyHelper::selfInfo($data['cid'], M('Classfiy'));
                    $data['cid']=$idarr['id'];
                }catch (Exception $e){
                    $data['cid']=0;
                }
                
                $course=new CourseModel();
                 if($course->create()){
                    $res=$course->where("id='$data[id]'")->save($data);
                    $this->pagego('修改课程成功！', '课程未修改！', $res,'course');
                }else{
                    $this->error($course->getError());
                }
            }else{
                $this->error('请不要重复提交表单！');
            }
        }else{
            $id=$this->getData(array('id'), 'get');
            if($id){
                $timestamp=time();
                $token=md5('unique_salt'.$timestamp);
                session('ftoken',$token);
                $this->initForm();
                $this->assign('id',$id['id']);
                $data=M('Course')->where("id='$id[id]'")->find();
                import("Com.ClassfiyHelper");
                try{
                    $idarr=  ClassfiyHelper::selfInfo('',M('Classfiy'), $data['cid']);
                    $data['cid']=$idarr['name'];
                }catch (Exception $e){
                    $data['cid']=0;
                }
                $data['s_time']=date('Y-m-d',$data['s_time']);
                $this->assign('data',$data);
                $this->assign('hand',true);
                $this->display('addCourse');
            }else{
                $this->error('非法访问');
            }
        }
    }
    //报名列表
    public function registration(){
        $this->display();
    }
    //确认报名操作
    public function confirm(){
        $id=$this->getData(array("id"),'get');
        if($id){
            $uid=session('uid');
            if(M('Jjbm')->where("id='$id[id]' and suid='$uid'")->count()){
                $res=M('Jjbm')->where("id='$id[id]'")->setField('status',1);
                $this->pagego('确认报名成功','确认报名失败', $res, 'registration');
            }else{
                $this->error('该课程不是你发布的！');
            }
        }
    }
    //消息发送列表
    public function organspread(){
        $this->display();
    }
    //删除课程
    public function delCourse(){
        $id=$this->getData(array('id'), 'get');
         if($id['id']){
            $res=M('Course')->where("id='$id[id]'")->setField('ishow','2');
            $this->pagego('删除'.$type.'成功', '删除'.$type.'失败！', $res,'');
        }else{
            $this->error($type.'不存在！');   
        }
    }
    //发布消息
    public function addOrganspread(){
        if($_POST){
           $data=$this->getData(array('cid','price','d_price','e_time','s_time','number'),'post'); 
           if($data['cid'] && $data['cid']!=='请选择课程'){
               foreach($data as $key=>$val){
                if(strpos($key, 'time')){
                    $data[$key]=  strtotime($val);
                }
            }
            //添加地址
            $address=M('Authentication')->where("uid=$uid and type=2")->field('address')->find();
            if($address['address']){
                $data['address']=$address['address'];
            }else{
                $this->error('尚未完成机构认证！');
            }
            $uid=session('uid');
            $oid=M('Course')->where("id='$data[cid]' and uid='$uid'")->field('aid')->find();
            $content=$this->getData(array('content'),'post');
            $data['aid']=$oid['aid'];$data['uid']=$uid;
            $data['type']=1;$data['status']=1;$data['timestamp']=time();$data['descript']=trim($content['content']);
            $res=$res=M('Organ_spred')->add($data);
            $this->pagego('发布消息成功', '发布消息失败', $res, 'organspread');
            
           }else{
               $this->error('请选择课程');
           }
           
        }else{
            $uid=session('uid');
            if($uid){
                $this->assign('courses',M('Course')->where("uid='$uid'")->field('id,aname')->select());
            }
            import("Com.UeditorHelper");
            $this->assign('edit',  UeditorHelper::ueditor(400, 200, 150, 1));
            $this->display();
        }
        
    }
    //修改发布消息
    public function modifiyOrganspread(){
        if(!$_POST){
            import("Com.UeditorHelper");
            $id=$this->getData(array('id'), 'get');
            $data=M('Organ_spred')->where("id='$id[id]'")->find();
            foreach($data as $key=>$val){
                if(strpos($key, 'time')){
                    $data[$key]=date('Y-m-d',$val);
                }
            }
            $uid=session('uid');
            $this->assign('courses',M('Course')->where("uid='$uid'")->field('id,aname')->select());
            $token=md5(time());
            $this->assignData(array('edit'=> UeditorHelper::ueditor(400, 200, 150, 2),'data'=>$data,'id'=>$id['id'],'token'=>$token,'hand'=>true), 'assign');
            session('ftoken',$token);
            $this->display('addOrganspread');
        }else{
            $id=$this->getData(array('id','token'),'post');
            if(session('ftoken')===$id['token']){
                $data=$this->getData(array('cid','price','d_price','e_time','s_time'),'post');
                $data=$this->getTime($data);
                $content=$this->getData(array('content'),'post');
                $data['descript']=$content['content'];
                $res=M('Organ_spred')->where("id='$id[id]'")->save($data);
                $this->pagego('修改消息成功','消息无更新内容', $res,'organspread');
            }else{
                $this->error('请不要重复提交表单!');
            }
        }
    }
    //操作发送类
    public function handSpred(){
        $id=$this->getData(array('id'),'get');
        if($id){
            $status=M('Organ_spred')->where("id='$id[id]'")->field('status')->find();
            if($status['status']==1){
                $res=M('Organ_spred')->where("id='$id[id]'")->setField('status',0);
                $this->pagego('取消发布成功！','取消发布失败', $res,'');
            }else{
                
                $res=M('Organ_spred')->where("id='$id[id]'")->setField('status',1);
                $this->pagego('恢复成功！','恢复失败', $res,'');
            }
        }else{
            $this->error('非法操作');
        }
    }
}
