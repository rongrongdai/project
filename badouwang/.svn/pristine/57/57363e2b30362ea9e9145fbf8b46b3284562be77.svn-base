<?php
/**
 * 代理商控制器
 *
 * @author fanbo
 */
class ImageHandler{
    public  function handle($data){
        if($data['imgname']){
            $pos=strpos($data['imgname'], 'upload');
            return '/'.substr($data['imgname'],$pos);
        }
    }
}
class ProxyerAction extends CommonAction{
    //代理商信息设置
    public function proxyerSet(){
        if($_POST){
            $data=$this->getData(array('telephone','address','telephone','real_name','company','s_city','s_province','dymess'),'post');
            $data['p_address']=$data['s_province'].','.$data['s_city'];unset($data['s_city']);unset($data['s_province']);
            $rf=$this->f_check('token');
            session('ftoken',NULL);
            if($rf){
                $model=D('Organization/Authentication');
                $data['type']=3;$data['uid']=session('uid');
                $uid=session('uid');
                if($data){
                    if($model->where("uid='$uid' and type=3")->count()){
                        $res=$model->where("uid='$uid' and type=3")->save($data);
                        $this->pagego('修改成功!','修改失败，请重试！', $res,'');
                    }else{
                        $res=$model->add($data);
                        $this->pagego('设置成功!','设置失败，请重试！', $res,'');
                    }
                    
                }else{
                    $this->error($model->getError());
                }
            }else{
                $this->error('请不要重复提交表单！');
            }
            
        }else{
            $uid=session('uid');
            $data=$this->initEntity(D('Organization/Authentication'), "uid='$uid' and type=3");
            $data['city']=explode(',',$data['p_address']);
            if(!$data['city'][0]){
               unset($data['city']); 
            }
            $this->assignData(array('data'=>$data),'assign');
            $this->display();
        }
        
    }
    // 课程管理
    public function  course(){
        $this->display();
    }
    //删除代理商信息
    private function del($id,$type){
        if($id['id']){
            $res=M('Proxyermanage')->where("id='$id[id]'")->setField('isshow','2');
            $this->pagego('删除'.$type.'成功', '删除'.$type.'失败！', $res,'');
        }else{
            $this->error($type.'不存在！');   
        }
    }
    //删除家教
    public function delTeacher(){
        $id=$this->getData(array('id'),'get');
        $this->del($id,'教师');
    }
    //删除课程
    public function delCourse(){
        $id=$this->getData(array('id'),'get');
        $this->del($id,'课程');
    }
     //删除机构
    public function delOrgan(){
        $id=$this->getData(array('id'),'get');
        $this->del($id,'机构');
    }
    //增加或修改课程
    public function addCourse(){
        if($_POST){
            $this->p_handle(array('cname','tintroduce','oid','c_descript','cid'),'timg', D('Organization/Proxyermanage'), 3,'c','课程','course',new ImageHandler());
        }else{
           $uid=session('uid');
           $this->initForm();
           $id=$this->getData(array('id'),'get');
           if($id['id']){
             $data=D('Organization/Proxyermanage')->where("id = $id[id]")->find();
             import("Com.ClassfiyHelper");
             try{
                $cla=  ClassfiyHelper::selfInfo('',M('Classfiy'), $data['cid']); 
                if($cla['name']){
                    $data['cid']=$cla['name'];unset($cla);
                }
             }catch(Exception $e){
                 
             }
             $this->assignData(array('data'=>$data,'hand'=>true,'id'=>$id['id']),'assign');  
           }
           $data=D('Organization/Proxyermanage')->where("pid=$uid and type=2 and isshow=1")->field('oname,id')->select();
           $this->assign('organs',$data);
           $this->display();
        }
    }
    //培训机构管理
    public function organ(){
        $this->display();
    }
    //增加修改培训机构
    public function addOrgan(){
        if($_POST){
            $this->p_handle(array('oname','tintroduce','telephone','o_address','treson'),'o_img',D('Organization/Proxyermanage'), 2,'o','培训机构','organ');
            
        }else{
            $id=$this->getData(array('id'), 'get');
            if($id['id']){
               $data=$this->gprep(M('Proxyermanage'));
               $this->assignData(array('data'=>$data,'hand'=>true,'id'=>$id['id']),'assign');
            }
            $this->initForm();
            $this->assignData(array('add'=>explode(',',$data['city'])),'assign');
            $this->display();
        }
        
    }
    //增加或修改教师
    public function addTeacher(){
        /* if($_POST){
             $this->p_handle(array('tname','cid','tintroduce','treson','telephone'),'timg',D('Organization/Proxyermanage'),1,'t', '教师','teacher');
        }else{
           $data=$this->gprep(M('Proxyermanage'));
           if($data){
                $this->assignData(array('add'=>  explode(',',$data['city']),'cid'=>$data['cid']), 'assign');
           }
           $this->display(); 
        }*/
        if(!empty($_POST)){
            if(!$this->f_check('token')){
                $this->error('请不要重复提交表单!');
            }
            session('ftoken',null);
            $arr = $this->getData(array('real_name','self_info','fid','gid','info','telephone','city','district','address'),'post');
            if($_FILES['self_img']['name']!=""){
                $arr['self_img']=$this->handUimg('self_img');
            }
            $arr['uid'] = session('uid');
            $arr['cid'] = $arr['fid']; $arr['grade'] = $arr['gid'];
            $arr['city'] = 200;   //模拟城市深圳
            $arr['ctime'] = time();
            $arr['type'] = 4;   //设置签约教师身份
            $res = M('Authentication')->data($arr)->add();
            $this->pagego('添加成功','添加失败',$res,'teacher');
        }else{
            $token=md5('unique_salt'.$arr['ctime']);
            session('ftoken',$token);
            $this->assign(array('token'=>$token,'timestamp'=>$arr['ctime']));
            $this->display();
        } 
    }

    private function gprep($model){
         $this->initForm();
         $id=$this->getData(array('id'),'get');
         if($id['id']){
                $data=$model->where("id='$id[id]]'")->find();
                $this->initForm();
                try{
                    import("Com.ClassfiyHelper");
                    $cla=  ClassfiyHelper::selfInfo('',M('Classfiy'),$data['cid']);
                    $data['cid']=$cla['name'];
                    unset($cla);
                }catch(Exception $e){

                }
                $this->assignData(array('id'=>$id['id'],'hand'=>true,'data'=>$data),'assign');
                return $data;
         }else{
             //$this->error('课程不存在！');
         }
         
         
    }
    private function p_handle($field,$img,$model,$type,$valid,$entity,$to,$iscity=true,$hander=false){
            if(!$this->f_check('token')){
                $this->error('请不要重复提交表单！');
            }
            session('ftokekn',null);
            $data=$this->getData($field,'post');
            if($_FILES[$img]['name']){
                import('Com.ImageHelper');
                $data[$img]=ImageHelper::upimg($img);
            }
            if($iscity){
                $add=$this->getData(array('s_province','s_city','s_county'),'post');
                $data['city']=$add['s_province'].','.$add['s_city'].','.$add['s_county'];
            }
            $uid=session('uid');
            $id=$this->getData(array('id'),'post');
            import("Com.ClassfiyHelper");
            $data['pid']=$uid;$data['type']=$type;
            $model->setValid($valid);
            if($model->create($data)){
                if($id['id']){
                    $res=$model->where("id='$id[id]'")->save($data);
                    $this->pagego('修改'.$entity.'成功！','信息未修改！', $res,$to);
                }else{
                    $res=$model->add($data);
                    $this->pagego('添加'.$entity.'成功！','添加$entity失败！', $res,$to);
                }
            }else{
                $this->error($model->getError());
            }
    }
    //信息发布
    public function spread(){
        if($_GET['type']){
            $this->assign('type',$_GET['type']);
        }
        $this->display();
    }
    public function addSpred(){
        if($_POST){
            $type=$_POST['type'];
            if($this->f_check('ftoken')){
                $this->error('请不要重复提交表单!');
            }
            session('ftoken',null);
            if($type==='1'){
               $data=$this->getData(array('cname','s_time','e_time','price','d_price','number','bid','bnumber'),'post');
               $uid=session('uid');
               $content=$this->getData(array('content','id'),'post');
               $oid=M('Proxyermanage')->where("id='$data[cname]'")->field('oid')->find();
               if($oid['oid']){
                    //添加地址信息 $address
                   $oinfo=M('Proxyermanage')->where("id='$oid[oid]'")->field('o_address,city')->find();
                   $data['address']=$oinfo['city'].','.$oinfo['o_address'];
               }else{
                   $this->error('请选择课程！');
               }
               $data['status']=1;$data['type']=2;$data['timestamp']=time();$data['aid']=$oid['oid'];
               $data['descript']=$content['content'];$data['cid']=$data['cname'];
               $data['s_time']= strtotime($data['s_time']);$data['e_time']=strtotime($data['e_time']);
               $data['uid']=session('uid');
               if($data['bnumber']==='0'){
                   $data['bid']=0;
               }
               $data['blnumber']=$data['bnumber'];
               unset($data['cname']);
               if($data){
                   if($content['id']){
                       $res=M('Organ_spred')->where("id='$content[id]'")->save($data);
                       $this->pagego('修改消息成功', '修改消息失败', $res, 'spread');
                   }else{
                       $res=M('Organ_spred')->add($data);
                       if($res){
                           if($data['bnumber']){
                               $res=D('Organization/Bond')->useBond($data['bnumber'],$data['bid'],$uid);
                                if($res==='sucess'){
                                    $res=true;
                                }else{
                                    $res=false;
                                }
                           }
                       }
                       $this->pagego('发布消息成功', '发布消息失败', $res, 'spread');
                   }

               }
            }else{
                $data=$this->getData(array('title','price','dtime','content','cid','uid'),'post');
                $data['introduce']=$data['content'];unset($data['content']);
                if($_FILES['c_img']['name']){
                    $data['c_img']=$this->handUimg('c_img');
                }
                $data['type']=2;$data['atime']=time();//初始化
                try{
                    import("Com.ClassfiyHelper");
                    $cla=  ClassfiyHelper::selfInfo($data['cid'],M('Classfiy'));
                    $data['fid']=$cla['id'];unset($data['cid']);
                }catch(Exception $e){
                }
                $model=M('Teach');
                $id=$_POST['id'];
                if($id){
                     $res=$model->where("id='$id'")->save($data);
                    $this->pagego('修改信息成功！','无修改内容！', $res,'spread');
                }else{
                    $res=$model->add($data);
                    $this->pagego('发布成功！','发布失败！', $res,'spread');
                }
            }
        }else{
            $type=$this->getData(array('type','id'),'get');
            if($type['type']=='1'){
                $uid=session('uid');
                $model=M('Proxyermanage');
                $courses=$model->where("pid='$uid' and type=3 and pid=$uid")->field('id,cname')->select();
                if(!count($courses)){
                    $this->error('你还没添加课程哦！');
                }
                $this->assignData(array('courses'=>$courses,'bonds'=>$bonds),'assign');
                if($type['id']){
                    $model=M('Organ_spred');
                    $this->assign('data',$model->where("id=$type[id]")->find());
                }
                }else{
                if($type['id']){
                    $this->assignData(array('data'=>M('Teach')->where("id=$type[id]")->find(),'hand'=>true), 'assign');
                }
                $uid=session('uid');
                $this->assign('teachers',M('Proxyermanage')->where("pid='$uid' and type=1")->select());
                $this->assign('type',2);
                $this->initForm();
            }
           $token=md5(time());
           session('ftoken',$token);
           import('Com.UeditorHelper');
           $this->assignData(array('type'=>$type['type'],'token'=>$token,'edit'=>  UeditorHelper::ueditor(400, 300,500, 2),'id'=>$type['id']),'assign');
           $this->display();
        }
        
    }
    
    public function handTeach(){
        $this->handStatus(M('Teach'),'spread?type=2');
    }
    public function handleSpread(){
        $this->handStatus(M('Organ_spred'),'spread');
    }
    //优惠全列表
    public function bond(){
        $this->display();
    }
    //报名管理
    public function inClass(){
        $this->display();
    }
    //增加或修改优惠券
    public function addBond(){
        if($_POST){
            if(!$this->f_check('token')){
               $this->error('请不要重复提交表单!'); 
            }
            session('ftoken',null);
            $data=$this->getData(array('name','price','number','descript'), 'post');
            $uid=session('uid');
            $data['uid']=$uid;$data['curnumber']=$data['number'];$data['timestamp']=time();
            if($_FILES['bac_img']['name']){
                $data['bac_img']=$this->handUimg('bac_img');
            }else{
                $data['bac_img']='/public/images/home/bond.png';
            }
           
            if(D('Organization/Bond')->create()){
                $res=D('Organization/Bond')->add($data);
                if($res){
                    $cdata=array('uid'=>$uid,'type'=>5,'count'=>$data['number'],'info'=>'购买'.$data['number'].'张优惠券',time());
                    $res=M('Consume')->add($cdata);
                }
                $this->pagego('添加优惠券成功！', '添加优惠券失败,请重试！', $res,'bond');
            }
        }else{
            $this->initForm();
            $this->display();
        }
    }

    //代理商签约老师列表
    public function teacher(){
        $uid = session('uid');
        //签约的老师
        $pagesize = 6;
        $sum = M('Authentication')->where("uid=$uid and type=4")->count();
        $sql = "SELECT a.*,c.name cname,d.name gname,t.id tid FROM bd_authentication a JOIN bd_classfiy c ON a.cid=c.id JOIN bd_classfiy d ON a.grade=d.id LEFT JOIN bd_teach t ON a.id=t.teacher_id WHERE a.uid=$uid AND a.type=4";
        $res = $this->setPage($pagesize,$sum,$sql);

        //免费发布5个信息
        $count = M('Teach')->where("uid=$uid and type=2")->count();
        $fcount = $count<5?5-$count:0;

        $this->assign(array('link'=>$res['link'],'data'=>$res['data'],'limit'=>$res['limit'],'fcount'=>$fcount));
        $this->display();
    }
    //代理商发布签约老师信息
    public function teachspd(){
        $uid = session('uid');
        $arr = $this->getData(array('id'),'get');
        $id = $arr['id'];
        if(!empty($_POST)){
            if(!$this->f_check('token')){
                $this->error('请不要重复提交表单！');
            }
            session('ftoken',null);
            $arr = $this->getData(array('title','dtime','uid','fid','gid','city','district','content','price'),'post');
            if($_FILES['c_img']['name']!=""){
                $arr['c_img']=$this->handUimg('c_img');
            }
            $arr['atime'] = time();
            $arr['type'] = 2; //发布签约老师信息
            $arr['teacher_id'] = $id;

            $res = M('Teach')->data($arr)->add();
            if($res){
                $ucredit = $this->setCredit('经验','dl_fbxx',$uid);
                $vmoney = $this->setCredit('学豆','dl_fbxx',$uid);
                $msg = "<font color='green'>+".$ucredit."经验，".$vmoney."学豆</font>";
            }
            $this->pagego('发布成功! '.$msg,'发布失败',$res,'teacher');
        }else{
            $sql = "SELECT a.id,a.real_name,a.uid,a.cid,a.grade,a.city,a.district,c.name cname,d.name gname FROM bd_authentication a JOIN bd_classfiy c ON a.cid=c.id JOIN bd_classfiy d ON a.grade=d.id WHERE a.id=$id";
            $data = M()->query($sql); $data = $data[0];

            import('Com.UeditorHelper');
            $edit = UeditorHelper::ueditor(600, 200,500, 2);
            $timestamp = time();

            //学豆限制
            $vmoney = M('Memberfields')->where("uid=$uid")->getField('vmoney');
            $vcount = M('Teach')->where("uid=$uid and type=2")->count();
            $token=md5('unique_salt'.$timestamp);
            session('ftoken',$token);
            $this->assign(array('data'=>$data,'edit'=>$edit,'vmoney'=>$vmoney,'vcount'=>$vcount,'token'=>$token,'timestamp'=>$timestamp));
            $this->display();
        }
    }

    //修改代理商发布的签约老师信息
    public function teachmod(){
        $uid = session('uid');
        $arr = $this->getData(array('id'),'get');
        $id = $arr['id'];
        if(!empty($_POST)){
            if($_FILES['c_img']['name']!=""){
                $_POST['c_img'] = $this->handUimg('c_img');
            }

            $res = M('Teach')->where("teacher_id=$id")->data($_POST)->save();
            $this->pagego('修改成功','没有修改',$res,'teacher');
        }else{
            $data = M('Teach')->where("teacher_id=$id")->find();
            $sql = "SELECT t.*, a.id,a.real_name,a.uid,a.cid,a.grade,a.city,a.district,c.name cname,d.name gname FROM bd_teach t JOIN bd_authentication a ON t.teacher_id=a.id JOIN bd_classfiy c ON a.cid=c.id JOIN bd_classfiy d ON a.grade=d.id WHERE a.id=$id";
            $data = M()->query($sql); $data = $data[0];

            import('Com.UeditorHelper');
            $edit = UeditorHelper::ueditor(600, 200,500, 2);
            $timestamp = time();

            $token=md5('unique_salt'.$timestamp);
            session('ftoken',$token);
            $this->assign(array('data'=>$data,'edit'=>$edit,'vmoney'=>$vmoney,'vcount'=>$vcount,'token'=>$token,'timestamp'=>$timestamp));
            $this->display();
        }
    }

    //代理商的报名学生
    public function inClassTch(){
        $tuid = session('uid');
        $pagesize = 5;
        $sum = M('jjbm')->where("tuid=$tuid")->count();
        $sql = "SELECT b.*,a.real_name,t.title FROM bd_jjbm b JOIN bd_teach t ON b.course=t.id JOIN bd_authentication a ON a.id=t.teacher_id WHERE b.tuid=$tuid";
        $res = $this->setPage($pagesize,$sum,$sql);

        $this->assign(array('link'=>$res['link'],'data'=>$res['data'],'limit'=>$res['limit']));
        $this->display();
    }

    //确认报名操作
    public function accept(){
        $arr = $this->getData(array('id','suid'),'get');
        $id = $arr['id'];

        $res = M('Jjbm')->where("id=$id")->setField('status','1');
        if($res){
            $data = array();
            $data['to_uid'] = $arr['suid'];
            $data['type'] = 1;
            $data['title'] = "家教报名状态";
            $data['body'] = "老师已确认，保持手机畅通吧";
            $data['ctime'] = time();
            M('Message')->data($data)->add();
        }
        $this->pagego('确认成功','确认失败',$res,'inClassTch');
    }

    //代理商添加验证码
    public function inviteTeacher(){
        $uid = session('uid');
        $pagesize = 12;
        $sum = M('Teacher_invite')->where("uid=$uid")->count();
        $sql = "SELECT t.*,a.real_name FROM bd_teacher_invite t LEFT JOIN bd_authentication a ON t.tuid=a.uid WHERE t.uid=$uid ORDER BY t.id DESC";
        $res = $this->setPage($pagesize,$sum,$sql);

        $this->assign(array('link'=>$res['link'],'data'=>$res['data'],'limit'=>$res['limit']));
        $this->display();
    }

    //代理商的平台老师
    public function myTeacher(){
        $arr = $this->getData(array('status'),'get');
        $status = $arr['status']?$arr['status']:'0';
        $uid = session('uid');
        $pagesize = 12;

        switch($status){
            case '0':
                $sum = M('Teacher_invite')->where("uid=$uid and status=2")->count();
                $sql = "SELECT i.tuid,a.real_name,a.address,a.telephone,b.name bname,c.name cname,SUM(p.classhour) sum_hour,SUM(p.pay) sum_pay FROM bd_teacher_invite i LEFT JOIN bd_authentication a ON i.tuid=a.uid LEFT JOIN bd_classfiy b ON a.cid=b.id LEFT JOIN bd_classfiy c ON a.grade=c.id LEFT JOIN bd_teacher_ks_pay p ON i.tuid=p.tuid WHERE i.uid=$uid AND i.status=2 GROUP BY i.tuid";
                break;
            case '1':
                $condition = "and k_confirm=1 and k_status=0 and end_time<UNIX_TIMESTAMP()";
                $count = M()->query("SELECT COUNT(ks.id) su FROM bd_teacher_invite i JOIN bd_teacher_ks ks ON i.tuid=ks.tuid $condition WHERE i.uid=$uid");
                $sum = $count[0]['su'];
                $sql = "SELECT ks.classhour,ks.date,ks.begin_time,o.course,o.stu_name,o.place,a.real_name FROM bd_teacher_invite i JOIN bd_teacher_ks ks ON ks.tuid=i.tuid $condition JOIN bd_jjbm_order o ON ks.kid=o.id JOIN bd_authentication a ON a.uid=o.tuid WHERE i.uid=$uid AND i.status=2";    
                break;
            case '2':
                $count = M()->query("SELECT COUNT(o.id) su FROM bd_teacher_invite i JOIN bd_jjbm_order o ON i.tuid=o.tuid WHERE i.uid=$uid AND i.status=2");
                $sum = $count[0]['su'];
                $sql = "SELECT i.tuid,o.*,a.real_name FROM bd_teacher_invite i JOIN bd_jjbm_order o ON i.tuid=o.tuid JOIN bd_authentication a ON a.uid=i.tuid WHERE i.uid=$uid AND i.status=2";
                break;
        }
  
        $res = $this->setPage($pagesize,$sum,$sql);

        $this->assign(array('status'=>$status,'link'=>$res['link'],'data'=>$res['data'],'limit'=>$res['limit']));
        $this->display();
    }
    
}
