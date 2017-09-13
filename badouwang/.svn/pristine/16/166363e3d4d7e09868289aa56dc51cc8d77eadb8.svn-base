<?php

class OrganAction extends CommonAction{
    public function __construct() {
        parent::__construct();
    }
    public function verfiyImg(){
        $tarr=$this->getData(array('type','id'),'get');
        $vtime=M('Authentication')->where("id='$tarr[id]'")->field('vtime')->find();
        //var_dump($vtime,$tarr);exit();
        if(!$vtime){
           $osql="select auth.vtime,organ.id from bd_authentication auth left join bd_proxyermanage organ on organ.pid=auth.id where organ.id='$tarr[id]'";
           $vtime=M('')->query($osql);
        }
        $text=date('Y年m月d日',$vtime['vtime']);
        if($tarr['type'] && $tarr['id']){
            import('Com.ImageHelper');
            ImageHelper::verify('organ',$text);
            exit();
        }
    }
    public function index(){
        import("Com.ClassfiyHelper");
        try{
           $course=  ClassfiyHelper::getClassesByName('培训分类','1',M('Classfiy'),'name'); 
        }catch (Exception $e){
        }
        
        $sum=M('Organ_spred')->where("blnumber>0")->count();
        $ccourses=M('Organ_spred')->query("select spred.id,course.cname aname,course.timg,spred.number from bd_organ_spred spred left join  bd_proxyermanage course on spred.cid=course.id where d_price>0 and d_price<price and spred.type=2 limit 0,5");
        foreach($spreds as $key=>$val){
            if(!$val['aname']){
                $spreds[$key]['aname']=$val['cname'];
            }
        }
        $cid=cookie('cid');
        $notices=M('Notice')->where("type='2' and cid='$cid'")->limit(1,6)->select();
        $links=M('Friendlink')->where('type=3')->field('url,logo,descrip,name')->limit(0,6)->select();
        $this->assignData(array('courses'=>$course,'notices'=>$notices,'spreds'=>$spreds,'csum'=>$sum,'ccourses'=>$ccourses,'links'=>$links),'assign');
        $this->display();
    }
    public function organList(){
        $data=$this->getData(array('page','hot','price','ctype','price','ct','keyword','cid','discount'),'get');
        $pagesize=10;
        if(!$data['page']){
           $data['page']=1; 
        }
        $min=((int)$data['page']-1)*$pagesize;
        if(count($data)){
                $page=$this->initPage();
                $this->assign('cid',$data['cid']);
                $cid=$data['cid'];
                $ssql="select spred.s_time,ifnull(courses.aid,prox.oid) oid,ifnull(courses.introduce,prox.tintroduce)introduce,ifnull(courses.cid,prox.cid) cid,spred.number,ifnull(courses.uid,prox.pid)uid,spred.type,spred.timestamp,spred.id,ifnull(spred.d_price,spred.price)price,courses.descript desp,ifnull(courses.aname,prox.cname) aname,ifnull(courses.c_img,prox.timg)img from bd_organ_spred spred left join (select uid,aname,introduce,descript,id,cid,aid,c_img from bd_course";
                $ssql.=") courses on courses.id=spred.cid  left join bd_proxyermanage prox on prox.id=spred.cid";
                $ssql="select acourse.*,auth.p_address,auth.real_name from ($ssql) acourse left join bd_authentication auth on auth.id=acourse.oid";
                if($cid){
                  $ssql.=" where acourse.cid = '$cid'";
                }else{
                    $ssql.=" where 1 = 1";
                }
                if($data['ct']){
                    $ssql.=" and auth.p_address like '%$data[ct]%'";
                }
                
                //$ssql.=" where spred.type=1";
                //关键词搜索
                if($data['keyword']){
                    $keyword=$data['keyword'];
                    $ssql.=" and spred.descript like '%$keyword%' or auth.address like '%$keyword%' or courses.descript like '%$keyword%' or course.aname like '%$keyword%'";
                }
                
                //优惠课程
                if($data['price']){
                    $range=array();
                    preg_match_all("/(\d)+/",$data['price'],$range);
                    $min=(int)$range[1][0];
                    $max=(int)$range[0][0];
                    if(strpos('上',$data['price'])){
                        $ssql.=" and spred.d_price>$min";
                    }else if(strpos('下', $data['price'])){
                        $ssql.=" and spred.d_price<$min";
                    }else{
                        $ssql.=" and spred.d_price<$min and spred.d_price <$max";
                    }
                }
                if($data['ctype']){
                    switch($type){
                        case 'price':
                            $ssql.=' order by spred.price desc';
                            break;
                        case 'hot':
                            break;
                        case 'nvf':
                            $ssql=" and type=2";
                            break;
                        case 'vf':
                                $ssql=" and type=1";
                            break;}
                }
                
                import('Com.PageHelper');
                $pagesize=10;
                $sumsql="select count(id) sum from (".$ssql.") res where res.aname <> ''";
                $sum=M('Organ_spred')->query($sumsql);
                PageHelper::init($pagesize,10,$page['page'],$sum[0]['sum'],'');
                $limit=  PageHelper::getLimit();
                $ssql="select * from (".$ssql.") res where res.aname <> '' order by res.type desc ,res.timestamp desc limit $limit[min],$pagesize";
                $this->assignData(array('datas'=>M('Organ_spred')->query($ssql),'ctype'=>$data['ctype'],'sum'=>$sum[0]['sum'],'pages'=>  PageHelper::getPageInfos()),'assign');
        }
        import("Com.ClassfiyHelper");
        $classes=  ClassfiyHelper::getOclassByName('培训分类',M('Classfiy'));
        $cid=cookie('cid');
        if($cid){
            $csql="select id,name from bd_district where city_id='$cid'";
            $citys=M('City')->query($csql);
        }
        $this->assignData(array('adv_organs'=>M('Authentication')->where('type=2 and is_adv=1')->limit(0,5)->select(),'classes'=>$classes['res'],'citys'=>$citys),'assign');
        $this->display();
    }
    //获取热点城市
    private function hotCity($citys){
        $hotcity=array();
        foreach($citys as $key=>$val){
            if($val['rank']){
                if(count($hotcity)<5){
                   $hotcity[]=$citys[$key]; 
                }else{
                    break;
                }
            }
        }
        return $hotcity;
    }
    public function organ(){
        $oar=$this->getData(array('oid'),'get');
       if($oar['oid']){
            $organ=M('Authentication')->where("id='$oar[oid]' and type=2")->find();
            
            $mess=M('Authentication')->where("id='$organ[pid]' and type=3")->field('dymess')->find();
            $tsql="select tea.*,class.name,course.city rcity from bd_teach tea left join bd_classfiy class on class.id=tea.fid left join bd_proxyermanage course on course.id=tea.tid and course.type=1 where tea.uid='$organ[uid]' and tea.type=2";
            $teach=M('Teach')->query($tsql);
            $csql="select spred.*,course.city,course.cname from bd_organ_spred spred left  join bd_proxyermanage course on course.id=spred.cid left join bd_classfiy class on class.id=course.id where spred.uid=$organ[uid] and spred.type=2";
            $course=M('Organ_spred')->query($csql);
            $isql="select id from bd_teach where uid='$organ[pid]' union select id from bd_organ_spred where uid='$organ[pid]'";
            $idarr=M('Comment')->query($isql);
            $ids='';
            if(count($idarr)){
                foreach($idarr as $key=>$val){
                    $ids.=$val['id'].',';
                }
            }
            unset($idarr);
            $ids=substr($ids,0,  strlen($ids)-1);
            if(strlen($ids>0)){
                $csum=M('Comment')->where("aid in($ids) and type =2 or type =3")->count();
                $comments=M('Comment')->where("aid in($ids) and type =2 or type =3")->select();
            }else{
                $comments=null;
                $csum=0;
            }
            
            foreach($course as $key=>$val){
                $city=  explode(',',$course[$key]['city']);
                $course[$key]['city']=$city[1];
                unset($city);
            }
            $sumteacher=M('Proxyermanage')->where("pid='$organ[pid]' and type=1")->count();
            $sumin=M('Jjbm')->where("tuid='$organ[pid]'")->count();
            $this->assignData(array('organ'=>$organ,'teach'=>$teach,'course'=>$course,'sumt'=>$sumteacher,'sumin'=>$sumin,'mess'=>$mess,'csum'=>$csum,'comments'=>$comments),'assign');
        }else{
            $this->error('该代理商不存在');
        }
        $this->display();
    }
    //搜索页面
    public function search(){
        $this->display('organlist');
    }
    //课程详情
    public function odetail(){
        $id=$this->getData(array('id','type'),'get');
        $cid=M('Organ_spred')->where("id='$id[id]'")->field('cid,type,aid')->find();
        $page=$this->initPage();
        if($id['type']==='1'){
            $csql="select count(id) sum from(select comment.id from bd_proxyermanage course left join (select * from bd_comment where type=3) comment on comment.aid=course.id where course.id='$cid[cid]') com";
        }else{
            $csql="select count(id) sum from(select comment.id from bd_course course left join (select * from bd_comment where type=3) comment on comment.aid=course.id where course.id='$cid[cid]') com";
        }
        $sum=M('Course')->query($csql);
        $pagesize=10;
        import("Com.PageHelper");
        PageHelper::init($pagesize, 10, $page['page'],$sum[0]['sum'], '');
        $limit=  PageHelper::getLimit();
        if($id['type']==='1'){
            $sql="select spred.*,course.aname,course.aid,course.descript des,course.introduce,course.c_img img,comment.id ctid,comment.content,comment.com_timestamp,auth.address from bd_organ_spred spred left join bd_course course on spred.cid=course.id left join bd_authentication auth on course.aid=auth.id left join (select * from bd_comment where type=3) comment on comment.aid=course.id where spred.id='$id[id]' limit $limit[min],$pagesize";
        }else{
            $sql="select spred.*,course.cname aname,course.c_descript des,course.tintroduce introduce,course.oid aid,course.timg img,comment.id ctid,course.o_address address ,comment.content,comment.com_timestamp from bd_organ_spred spred left join bd_proxyermanage course on spred.cid=course.id left join (select * from bd_comment where type=3) comment on comment.aid=course.id where spred.id='$id[id]' limit $limit[min],$pagesize";
        }
        $comments=M('Course')->query($sql);
        $course=$comments[0];unset($course['ctid'],$course['com_timestamp'],$course['content']);
        //收藏数
        $ccount=M('Collection')->where("aid='$id[id]'")->count();
        $course['cbond']=$course['blnumber'];
        if(session('uid')){
            $uid=session('uid');
            $course['ain']=M('Jjbm')->where("course='$course[id]' and suid='$uid'")->count();
        }
        if($id['type']==='1'){
            $organ=M('Authentication')->where("id='$course[aid]'")->find();
        }else{
            $organ=M('Proxyermanage')->where("id='$course[aid]'")->find();
            $organ['address']=$organ['o_address'];
        }
        $isin=false;
        if(session('uid')){
            $uid=session('uid');
            $isin=M('Jjbm')->where("course='$course[id]' and suid='$uid'")->count();
        }
        
        $this->assignData(array('ccount'=>$ccount,'type'=>$id['type'],'comments'=>$comments,'sum'=>$sum[0]['sum'],'course'=>$course,'organ'=>$organ,'isin'=>$isin,'type'=>$cid['type'],'oid'=>$cid['aid']),'assign');
        if($course['cbond']>0){
            $scql="select pcourse.cname aname,pcourse.timg,spred.id,pcourse.oid from bd_organ_spred spred left join bd_proxyermanage pcourse on pcourse.id=spred.cid where spred.d_price>0 and spred.d_price< spred.price";
            $this->assign('courses',M('Course')->query($scql));
            $this->display('ordezsh');
        }else{
            $scql="select ifnull(pcourse.cname,course.aname) aname,ifnull(pcourse.timg,course.c_img) timg,spred.id,pcourse.oid,course.aid  from bd_organ_spred spred left join bd_proxyermanage pcourse on pcourse.id=spred.cid  left join bd_course course on spred.cid=course.id where oid='$organ[id]' or course.aid='$organ[id]'";
            $this->assign('courses',M('Course')->query($scql));
            $this->display();
        }
        
    }
    //报名
    public function inclass(){
        $id=$this->getData(array('id'),'get');
        $uid=session('uid');
        if($uid && $id){
            $dsql="select spred.d_price,spred.uid tuid,ifnull(spred.d_price,spred.price) money,spred.id course_id,ifnull(pro.cname,course.aname)course,spred.address from bd_organ_spred spred left join bd_proxyermanage pro on spred.cid=pro.id left join bd_course course on course.id=spred.cid where spred.id='$id[id]'";
            $res=M('')->query($dsql);
            if($res[0]['d_price']>0){
                unset($res[0]['d_price']);
                $data=$res[0];
                $data['type']=2;$data['suid']=session('uid');$data['bm_time']=$_SERVER['REQUEST_TIME'];$data['msg']='';
                $data['order_num']='828'.str_shuffle($_SERVER['REQUEST_TIME']).mt_rand(100,999);$data['place']='';
                $data['stu_name']=session('uname');
                $res = M("Jjbm_order")->data($data)->add();
                $this->pagego('报名成功！请到消费中心完成支付！','报名失败', $res,'');
            }else{
                if(M('Jjbm')->where("course='$id[id]' and suid='$uid'")->count()>0){
                    $this->error('您已经成功报名，无需再次报名！');
                }
                $sql="select spred.id,spred.s_time sk_timestamp,spred.uid tuid ,auth.address,auth.telephone from bd_organ_spred spred left join bd_course course on spred.cid=course.id left join bd_authentication auth on auth.id=course.aid";
                $darr=M('course')->query($sql);
                $data=$darr[0];$data['type']=2;$data['bm_timestamp']=time();$data['suid']=session('uid');$data['payment']=0;$data['course']=$id['id'];
                unset($data['id']);
                $res=M('Jjbm')->add($data);
                $this->pagego('报名成功！','报名失败！', $res,'');
            }
            
            exit();
            
           
           
        }else{
            $this->redirect('Index/Index/login');
        }
    }
    //代理商列表页
    public function dmore(){
        $page=$this->initPage();
        $cname=M('Proxyermanage')->query("select distinct pro.cid,class.name from bd_proxyermanage pro right join bd_classfiy class on pro.cid=class.id where pro.type=3");
        $sum=M('Proxyermanage')->where('type=3')->count();
        import('Com.PageHelper');
        $pagesize=10;
        $limit=  PageHelper::getLimit();
        PageHelper::init($pagesize, 10, $page, $sum,'');
        $this->assign('pages',  PageHelper::getPageInfos());
        $csql="select spred.*,prox.cname,prox.city,prox.o_address from bd_organ_spred spred left join bd_proxyermanage prox on spred.cid=prox.id  where spred.type=2 limit $limit[min],$pagesize";
        $this->assignData(array('courses'=>M('Proxyermanage')->query($csql),'cname'=>$cname),'assign');
        $this->display();
    }
    //获取更多优惠课程
    public function getMCourse(){
        $page=$this->initPage();
        $pagesize=5;
        $min=($page['page']-1)*5;
        $sql="select spred.id,course.cname aname,course.timg from bd_organ_spred spred left join  bd_proxyermanage course on spred.cid=course.id where spred.blnumber>0 limit $min,$pagesize ";
        echo json_encode(array('code'=>1,'courses'=>M('Organ_spred')->query($sql)));
    }
}

