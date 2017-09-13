<?php

class ImageHandler{
    public  function handle($data){
        if($data['imgname']){
           $pos=strpos($data['imgname'], 'upload');
            return '/'.substr($data['imgname'],$pos);
        }
    }
}
class TeachAction extends CommonAction{
	private $model;
    
    public function doApply(){//提交认证
    	//安全过滤部分字段
    	$data = $this->getData(array('type','real_name','telephone','grade','fid','gid','city','district','address','self_info'),'post');
        $data['uid'] = session('uid');
        $data['ctime'] = time();
        if($data['type'] == '1'){
            $data['cid'] = $data['fid'];
            $data['grade'] = $data['gid'];
        }
        if($_FILES['id_front']['name']!=""){
            $data['id_front']=$this->handUimg('id_front');
        }
        if($_FILES['lincence']['name']!=""){
            $data['lincence']=$this->handUimg('lincence');
        }

        if(M('Authentication')->create()){
            $res = M('Authentication')->add($data);
            $this->pagego('申请成功','申请失败',$res,'apply');
        }else{
            var_dump($this->model->getError());
        }
    }

    public function apply(){//认证与否
        $uid = session('uid');
        $res = $this->model->where("uid=$uid")->find();
        if($res['verified'] == 3){//认证等待中
            $data =$res;
            $data['freson'] = "认证等待中···";
        }else if($res['verified'] == 1){//认证通过
            $data = $res;
        }else if($res['verified'] == 2){//认证不通过
            $data = $res;
            $data['freson'] = $res['freson'];
        }
        switch($data['type']){
            case 1:
                $data['type'] = "老师";
                break;
            case 2:
               $data['type'] = "机构";
                break; 
            case 3:
               $data['type'] = "代理商";
                break;        
        }
        $city = M('User')->where("uid=$uid")->find();
        $data['city'] = $city['city'];
        $timestamp = time();
        $this->assign(array('data'=>$data,'token'=>md5('unique_salt'.$timestamp),'timestamp'=>$timestamp));
        $this->display();
    }

    public function message(){//教师发布招生消息
        import('Com.UeditorHelper');
        $txt = UeditorHelper::ueditor(450,150,200,1);
        $timestamp = time();
        $this->assign(array('txt'=>$txt,'token'=>md5('unique_salt'.$timestamp),'timestamp'=>$timestamp));
        $this->display();
    }
    
    public function setting(){
         $uid = session('uid');
         if($_POST){
            $data = $this->getData(array('title','cid','grade','s_province','s_city','s_county'),'post');
            if($_FILES['id_img']['name']!=""){
               $data['id_img']=$this->handUimg('id_img');
            }
            import("Com.ClassfiyHelper");
            try{
                $class=  ClassfiyHelper::selfInfo($data['cid'], M('Classfiy'));
                $data['cid']=$class['id'];
                $class=  ClassfiyHelper::selfInfo($data['grade'], M('Classfiy'));
                $data['grade']=$class['id'];
            }catch(Exception $e){
                $this->error('分类不存在！');
            }
            $data['p_address']=$data['s_province'].','.$data['s_city'].','.$data['s_county'];$data['uid']=$uid;
            unset($data['s_province']);unset($data['s_county']);unset($data['s_county']);
            $data['info']=$data['title'];unset($data['title']);$data['type']=1;
            if(M('Authentication')->where("uid='$uid'")->count()){
                $res=M('Authentication')->where("uid='$uid'")->save($data);
                $this->pagego('修改家教信息成功','修改家教信息失败', $res,'');
            }else{
                $res=M('Authentication')->add($data);
                $this->pagego('添加家教信息成功','添加家教信息失败', $res,'');
            }
         }else{
             $this->initForm();
             $data=M('Authentication')->where("uid='$uid' and type=1")->find();
             $data['city']=  explode(',',$data['p_address']);
             if($data){
                 import("Com.ClassfiyHelper");
                 try{
                  $class=  ClassfiyHelper::selfInfo('', M('Classfiy'),$data['cid']);
                  $data['cid']=$class['name'];
                    $this->assign('data',$data);
                  }catch(Exception $e){
                      $this->error('分类不存在！');
                  }
             }
             $this->display();
         }
         
    }
  
    public function domessage(){//提交表单处理
        $uid = session('uid');
        //安全过滤部分字段
        $data = $this->getData(array('title','fid','gid','city','district','price','introduce','content','dtime','style'),'post');
        if($_FILES['c_img']['name']!=""){
            $data['c_img']=$this->handUimg('c_img');
        }
        /*import("Com.ClassfiyHelper");
        $carr=array();
        try{
             $carr=ClassfiyHelper::selfInfo($data['class'],M('Classfiy'));
             unset($data['class']);
        }catch (Exception $e){
            $this->error('分类不存在！');
        }
        $data['cid']=$carr['id'];*/
        $data['uid'] = $uid;
        $data['atime'] = time();
        $teach = D('Teach');
        if($teach->create()){
            $res = $teach->add($data);
            $this->pagego('发布成功','发布失败',$res,'manage');
        }
    }

    public function manage(){//管理自己发布的消息
        $uid = session('uid');
        $teach = M('Teach');

        $pages = $this->getData(array('page'),'get');
        $page = $pages['page'];
        $page = $page<=1?1:$page;
        //加载分页类
        import('Com.PageHelper');
        $total = $teach->where("uid=$uid")->count();
        $pagesize = 5;

        PageHelper::init($pagesize,10,$page,$total,'');
        $link = PageHelper::getPageInfos();
        $limit = PageHelper::getLimit();
        $limit = $limit['min'];
        $sql = "SELECT t.*,c.name FROM bd_teach t JOIN bd_classfiy c ON t.fid=c.id WHERE uid=$uid LIMIT $limit,$pagesize";
        //$res = $teach->where("uid=$uid")->limit($limit,$pagesize)->select();
        $res = M()->query($sql);
        $this->assign(array('link'=>$link,'page'=>$page-1,'size'=>$pagesize,'ress'=>$res));
        $this->display();
    }

    public function del(){
        $id = $_GET['id'];
        $res = M('Teach')->where("id=$id")->delete();
        $this->pagego('删除成功','删除失败',$res,'manage');
    }

    public function mod(){//修改家教发布内容
        $id = $_GET['id'];
        $res = D('Teach')->where("id=$id")->find();
        import('Com.UeditorHelper');
        $txt = UeditorHelper::ueditor(450,150,200,1);
        $timestamp = time();
        //获取分类名称
        $fid = $res['fid']; $mid = $res['gid']; $city = $res['city']; $district = $res['district'];
        $fidn = M('Classfiy')->where("id=$fid")->getField('name');
        $midn = M('Classfiy')->where("id=$mid")->getField('name');
        $cityn = M('City')->where("id=$city")->getField('name');
        $districtn = M('District')->where("id=$district")->getField('name');

        $this->assign(array('fidn'=>$fidn,'midn'=>$midn,'cityn'=>$cityn,'districtn'=>$districtn,'txt'=>$txt,'res'=>$res,'token'=>md5('unique_salt'.$timestamp),'timestamp'=>$timestamp));
        $this->display();
    }

    public function domod(){//执行修改
        if($_POST){
            $data = $this->getData(array('price','introduce','content','dtime'),'post');
            if($_FILES['c_img']['name']!=""){
                $data['c_img']=$this->handUimg('c_img');
            }
            $mid = $_POST['mid'];
            $add = M('Teach')->where("id=$mid")->setField($data);
            $this->pagego('修改成功','没有修改操作',$add,'manage');
        }

    }

    //预约学生列表
    public function student(){
        $tuid = session('uid');

        $pages = $this->getData(array('page'),'get');
        $page = $pages['page'];
        $page = $page<=1?1:$page;
        //加载分页类
        import('Com.PageHelper');
        $total = M('jjbm')->where("tuid=$tuid")->count();
        $pagesize = 2;
        PageHelper::init($pagesize,10,$page,$total,'');
        $link = PageHelper::getPageInfos();
        $limit = PageHelper::getLimit();
        $limit = $limit['min'];

        $sql = "SELECT b.*,t.title FROM bd_jjbm b JOIN bd_teach t ON b.course=t.id WHERE tuid=$tuid LIMIT $limit,$pagesize";
        $res = M()->query($sql);

        $this->assign(array('link'=>$link,'page'=>$page-1,'size'=>$pagesize,'student'=>$res),'assign');
        $this->display();
    }

    //我的收藏(家教)
    public function collect(){
        $sql = "SELECT c.*,t.title,t.dtime,a.real_name,a.telephone,a.address FROM bd_collection c JOIN bd_teach t ON c.aid=t.id JOIN bd_authentication a ON t.uid=a.uid WHERE c.type=1";
        $data = M()->query($sql);

        $this->assign(array('data'=>$data));
        $this->display();
    }

}