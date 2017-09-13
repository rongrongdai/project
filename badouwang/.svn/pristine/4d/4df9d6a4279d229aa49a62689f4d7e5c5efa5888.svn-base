<?php

/**
 * 课程
 * @author fanbo
 */
class AjaxCourseAction extends CommonAction{
    //获取课程列表
    public function getCourse(){
        $page=$this->initPage();
        $page['page']=(int)$page['page'];
        $uid=session('uid');
        $sql="select course.*,class.name,user.uname from bd_course course left join bd_classfiy class on class.id=course.cid left join  bd_user user on user.uid=course.uid where course.uid='$uid' and course.ishow=1";
        $res=$this->getPageData(M('Course'),"ishow=1 and uid='$uid'", $sql,$page);
        echo json_encode($res);
    }
    //获取某分类下所有课程
    public function getChildCourse(){
        $carr=$this->getData(array('type'),'get');
        if($carr['type']){
            import("Com.ClassfiyHelper");
            try{
                $cids= ClassfiyHelper::getClassesByName($carr['type'],'',M('Classfiy'),'id','');
            }catch(Exception $e){
               echo json_encode(array('code'=>0,'message'=>'获取课程失败！'));  
            }
            if($cids){
                $cstr='';
                foreach($cids as $key=>$val){
                    $cstr.=$val['id'].',';
                }
                $cstr=substr($cstr,0,  strlen($cstr)-1);
                $psql="select * from(select spred.s_time,spred.price,spred.id,spred.d_price,spred.type,course.cid cuid,course.cname,course.timg aname,course.city p_address,ifnull(course.o_address,spred.address)address from bd_organ_spred spred left join bd_proxyermanage course on spred.cid=course.id left join bd_classfiy type on type.id=course.cid ) sp where sp.cuid in($cstr) and sp.type=2 limit 0,8";
                $pcourse=M('Organ_spred')->query($psql);
                if(count($pcourse)<8){
                    $more=8-count($pcourse);
                    $sql="select * from(select spred.s_time,spred.id,spred.type,spred.price,spred.d_price,course.cid cuid,course.aname,auth.p_address,ifnull(auth.address,spred.address)address,course.c_img timg from bd_organ_spred spred left join bd_course course on spred.cid=course.id left join bd_classfiy type on type.id=course.cid left join bd_authentication auth on course.aid=auth.id) sp where sp.cuid in($cstr) and sp.type=1 limit 0,$more";
                    unset($cids);
                    $course=M('Organ_spred')->query($sql);
                    $course=array_merge($pcourse,$course);
                    
                }else{
                    $course=$pcourse;
                }
                foreach($course as $key=>$val){
                    $course[$key]['s_time']=date('Y-m-d',$val['s_time']);
                    $city=explode(',',$val['p_address']);
                    $course[$key]['p_address']=$city[2];
                }
                unset($pcourse);
                echo json_encode(array('code'=>1,'datas'=>$course));
            }else{
                echo json_encode(array('code'=>0,'message'=>'无当前分类课程！')); 
            }
            
        }else{
            echo json_encode(array('code'=>0,'message'=>'分类不存在！'));
        }
    }
    //获取报名列表
    public function getRegistration(){
        $page=$this->initPage();
        $page['page']=(int)$page['page'];
        $uid=session('uid');
        $sql="select spred.s_time,sprea.number,reg.id,spred.e_time,reg.bm_timestamp,reg.status,fields.telephone,course.aname,user.uname,course.cid from bd_Jjbm reg left join bd_user user on user.uid=reg.suid  left join bd_memberfields fields on fields.uid=reg.suid left join bd_organ_spred spred on spred.id=reg.course left join bd_course course on course.id=spred.cid where reg.suid='$uid'";
        $res=$this->getPageData(M('Jjbm'),'', $sql,$page);
        
        echo json_encode($res);
    }
    //发布列表
    public function getOrgspred(){
        $page=$this->initPage();
        $page['page']=(int)$page['page'];
        $uid=session('uid');
        $type=$this->getData(array('type'),'get');
        $sql="";
        if($type['type']){
            $sql="select spred.id,spred.s_time,course.cid,spred.s_time,spred.e_time,spred.status,spred.descript,course.cname aname from bd_organ_spred spred left join bd_proxyermanage course on spred.cid=course.id where spred.uid='$uid'";
            $sql.=" and spred.type=2";
        }else{
            $sql="select spred.id,spred.s_time,course.cid,spred.s_time,spred.e_time,spred.status,spred.descript,course.aname from bd_organ_spred spred left join bd_course course on course.id=spred.cid where spred.uid='$uid'";
            $sql.=' and spred.type = 1';
        }
        $where=$type['type']=='1'?'type = 2':'';
        $res=$this->getPageData(M('Organ_spred'),$where, $sql,$page);
        echo json_encode($res);
    }
    //获取家教
    public function getTeacher(){
        $page=$this->initPage();
        $page['page']=(int)$page['page'];
        $uid=session('uid');
        $sql="select id,tname,grade,cid,telephone,timg,treson,tintroduce from bd_proxyermanage where pid='$uid' and type=1";
        $res=$this->getPageData(M('Proxyermanage'),"type=1 and pid='$uid'", $sql, $page);
        echo json_encode($res);
    }
    public function getOrgan(){
        $page=$this->initPage();
        $page['page']=(int)$page['page'];
        $uid=session('uid');
        $sql="select id,oname,city,o_address,tintroduce,telephone,o_img,treson,tintroduce from bd_proxyermanage where pid='$uid' and type=2 and isshow=1";
        $res=$this->getPageData(M('Proxyermanage'),"type=1 and pid='$uid' and isshow=1", $sql, $page);
        echo json_encode($res);
    }
    public function getPcource(){
        $page=$this->initPage();
        $page['page']=(int)$page['page'];
        $uid=session('uid');
        $sql="select id,cname,cid,tintroduce,c_descript,oid,timg from bd_proxyermanage where pid=$uid and type=3 and isshow=1";
        $res=$this->getPageData(M('Proxyermanage'),"pid=$uid and type=3 and isshow=1", $sql,$page);
        echo json_encode($res);
    }
    public function getTeach(){
        $page=$this->initPage();
        $page['page']=(int)$page['page'];
        $uid=session('uid');
        $sql="select id,uid,title,fid,c_img,atime,dtime,price,introduce,content,status,fid from bd_teach where uid=$uid and type=2";
        $res=$this->getPageData(M('Teach'),"type=2 and uid=$uid", $sql,$page,false);
        echo json_encode($res);
    }
    public function getMoreCourse(){
        $page=$this->initPage();
        $data=$this->getData(array('cid'),'get');
        $pagesize=10;
        $min=((int)$page['page']-1)*$pagesize;
        $ssql="select * from (select spred.*,courses.descript desp,courses.aname from bd_organ_spred spred right join (select aname,descript,id from bd_course where cid = $data[cid]) courses on courses.id=spred.cid where spred.type=1) res where res.aname <> '' limit $min,$pagesize";
        echo  json_encode(array('code'=>1,'datas'=>M('Organ_spred')->query($ssql)));
    }
    //获取发布列表
    public function getOspred(){
        $type=$this->getData(array('type'),'get');
        import('Com.ClassfiyHelper');
        try{
            $idarr=  ClassfiyHelper::selfInfo($type['type'],M('Classfiy'));
            $psql="select course.cid,course.cname aname,course.city p_address,course.o_address address,course.timg,spred.* from bd_organ_spred spred left join bd_proxyermanage course on spred.cid=course.id  where course.cid=$idarr[id]";
            $pcourse=M('Organ_spred')->query($psql);
            if(count($pcourse)<8){
                $max=8-count($pcourse);
                $sql="select course.cid,course.aname,auth.p_address,auth.address,spred.*,course.c_img timg from bd_organ_spred spred left join bd_course course on spred.cid=course.id left join bd_authentication auth on course.aid=auth.id where course.cid=$idarr[id] limit 0,$max";
                $course=M('Organ_spred')->query($sql);
                $course=  array_merge($pcourse,$course);
            }
            foreach($course as $key=>$val){
                $course[$key]['s_time']=date('Y-m-d',$val['s_time']);
            }
            echo json_encode(array('code'=>1,'course'=>$course));
        }catch(Exception $e){
           echo json_encode(array('code'=>0,'message'=>'分类不存在！'));
        }
    }
    //获取预约报名
    public function getInclass(){
        $type=$this->getData(array('type'),'get');
        $uid=session('uid');
        $page=$this->initPage();
        $sql="";
        if($type['type']){
            if($type['type']==='organ'){
                $sql="select jj.*,fields.telephone from bd_jjbm jj left join bd_memberfields fields on fields.uid=jj.suid where jj.type=3 and jj.tuid='$uid'";
            }else if($type['type']==='teach'){
                $sql="select jj.*,fields.telephone from bd_jjbm jj left join bd_memberfields fields on fields.uid=jj.suid where jj.type=4 and jj.tuid='$uid'";
            }
            $res=$this->getPageData(M('Jjbm'),"type=4 and tuid='$uid'", $sql, $page);
            echo json_encode($res);
        }else{
            json_encode(array('code'=>0,'message'=>'分类不存在！'));
        }
    }
    //收藏课程
    public function collect(){
        $id=$this->getData(array('id'),'get');
        $uid=session('uid');
        if($id['id']){
            if(M('Collection')->where("aid=$id[id] and uid='$uid'")->count()){
                $this->ajaxr(false, '','已收藏该课程！');
                return;
            }
            $data['aid']=$id['id'];$data['uid']=$uid;$data['type']=1;$data['c_timestamp']=time();
            $res=M('Collection')->add($data);
            $this->ajaxr($res, '收藏成功','收藏失败，请重试！');
        }else{
            $this->ajaxr(false, '','培训信息不存在');
        }
    }
    //获取收藏课程
    public function  getCollect(){
        $page=$this->initPage();
        $uid=session('uid');
        $type=$this->getData(array('type'),'get');
        if(!$type['type']){
            $type['type']=2;
        }
       
        if($type['type']==='1' || $type['type']==='3'){
            $sql="select teach.id,teach.c_img,teach.introduce,teach.title aname,co.type from bd_collection co left join bd_teach teach on co.aid=teach.id where co.uid='$uid' and co.type=1";
        }else{
            $sql="select spred.id,course.c_img,mna.timg,course.introduce,mna.tintroduce,course.aname,mna.cname,co.type from bd_collection co left join bd_organ_spred spred on spred.id=co.aid left join bd_course course on spred.cid=course.id left join bd_proxyermanage mna on spred.cid=mna.id where co.uid='$uid'";
        }
        $res=$this->getPageData(M('Collection'),"uid='$uid' and type=$type[type]", $sql,$page);
        foreach($res['entities'] as $key=>$val){
            if(!$val['aname']){
                $res['entities'][$key]['aname']=$res['entities'][$key]['cname'];
            }
            if(!$val['c_img']){
                $res['entities'][$key]['c_img']=$val['timg'];
            }
            if(!$val['introduce']){
                $res['entities'][$key]['introduce']=$val['tintroduce'];
            }
        }
        echo json_encode($res);
    }
}
