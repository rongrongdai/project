<?php
class IndexAction extends CommonAction {
    //首页
    public function index(){
//        import("Com.FileHelper");
//        var_dump(FileHelper::getUploadFileDir());exit();
        
        //获取普通老师
        $sql = "SELECT a.uid,a.real_name,a.id_front,m.visitednumber,c.name cname,d.name dname FROM bd_authentication a JOIN bd_memberfields m ON a.uid=m.uid JOIN bd_classfiy c ON a.cid=c.id JOIN bd_classfiy d ON a.grade=d.id WHERE a.type=1 ORDER BY m.visitednumber DESC LIMIT 4";
        $teacher = M()->query($sql);
        //累计注册人数
        $num = M('User')->count();
        //优惠课程
        $ccourses=M('Organ_spred')->query("select spred.id,spred.price,spred.d_price,course.cname aname,course.timg,spred.number from bd_organ_spred spred left join  bd_proxyermanage course on spred.cid=course.id where d_price>0 and d_price<spred.price and spred.type=2 limit 0,5");
       //热门学问
        $sql = "SELECT q.id,q.content,q.lnumber FROM bd_question q  order by q.lnumber desc LIMIT 10 ";
        $questions = M()->query($sql);
        //焦点新闻(图集)
        $gid = M('Classfiy')->where("name='焦点新闻'")->getField('id');
        $news = M('Article')->where("gid=$gid")->limit(11)->select();
        foreach($news as $key=>$val){
            if(mb_strlen($val['title'],'utf-8')>15){
                $val['title'] = mb_substr($val['title'],0,15,'utf-8').'...';
            }
            $val['content'] = mb_substr(strip_tags($val['content']),0,100,'utf-8');
            if($key>=0 && $key<5){
                $news1[$key] = $val;
            }else if($key>=5 && $key<11){
                $news2[$key] = $val;
            }
        }

        //八斗家教
        $bd_teach = M('Authentication')->where("type=3")->field('uid,real_name,lincence,address')->limit(3)->select();
        foreach ($bd_teach as $key => $value) {
            $a_uid = $value['uid'];
            $bd_teach[$key]['count'] = M('Authentication')->where("uid=$a_uid and type=4")->count();
            $bd_teach[$key]['yuyue'] = M('Jjbm')->where("tuid=$a_uid")->count();
        }
        //培训招生
        import('Com.ClassfiyHelper');
        $hotpclass=ClassfiyHelper::getClassesByName('培训分类','',M('Classfiy'),'name,id',true);
        $hotCourse=M('Organ_spred')->where("ic_comment=1")->select();
        //热门学吧
        $sbar = M('Memberfields')->limit(5)->select();

        //热门考题
        import('Com.ClassfiyHelper');
        $data1 = ClassfiyHelper::getClassesByName('在线考试',1,M('Classfiy'));
        $data1s = array();
        for($i=0;$i<7;$i++){//主页只显示九大类
            $data1s[] = $data1[$i];
        }
        //默认打开的二级分类
        $id = $data1[0]['id'];
        $rlid = M('Classfiy')->where("id=$id")->field('lrf,rft')->find();
        $lrf = $rlid['lrf'];
        $rft = $rlid['rft'];
        $sid = M('Classfiy')->where("lrf>$lrf and rft<$rft")->field('id')->select();
        $arr = array();
        foreach($sid as $key=>$val){
            $arr[] = $val['id'];
        }
        $arrid = implode(',',$arr);
        $data2 = M('Ex_paper')->where("sid in ($arrid)")->limit(10)->select();
        $this->assign(array('hotpclass'=>$hotpclass,'hotCourse'=>$hotCourse,'teacher'=>$teacher,'questions'=>$questions,'courses'=>$ccourses,'num'=>$num+2000,'news1'=>$news1,'news2'=>$news2,'bd_teach'=>$bd_teach,'sbar'=>$sbar,'classfiy'=>$data1s,'data2'=>$data2));
        $this->display();
    }

    public function renc(){
        import('Com.Config');
        $zhao=  Config::getConfig('用户配置','u_zhao');
        $zarr=  explode(":", $zhao['c_value']);
        foreach($zarr as $key=>$val){
            
            $zarr[$key]=  explode(';', $val);
            $zarr[$key][0]=trim($zarr[$key][0]);
            $zarr[$key][1]=  explode(',',$zarr[$key][1]);
            $zarr[$key][2]=  explode(',',$zarr[$key][2]);
        }
        $this->assign('zhaos',$zarr);
        $this->display();
    }
    //帮助中心
    public function helpcenter(){
        //获取帮助中心文章分类
        import('Com.ClassfiyHelper');
        try{
            $res = ClassfiyHelper::getClassesByName('帮助中心',1,M('Classfiy'));
        }catch(Exception $e){
            $this->error("不存在");
        }

        //获取分类下的文章
        if(!empty($res)){
            foreach($res as $key=>$val){
                $gid = $val['id'];
                $res[$key]['article'] = M('Article')->where("gid=$gid")->getField('id,title,gid');
            }
        }
        //获取文章内容
        $arr = $this->getData(array('aid'),'get');
        $aid = $arr['aid'];
        if(!empty($aid)){
            $content = M('Article')->where("id=$aid")->getField('content');
            $content = str_replace('\\','',$content);            
        }
        $this->assign(array('classfiy'=>$res,'content'=>$content));
        $this->display();
    }
    public function search(){
        $karr=$this->getData(array('keyword'),'get');
        $keyword=$karr['keyword'];
        if($keyword['keyword']){
            $tsql="select id,type,title,introduce detail,c_img img from bd_teach where title like '%$keyword%' or content like '%$keyword%' or introduce like '%$keyword%' limit 0,2";
            $teach=M()->query($tsql);
            $qsql="select id,content,a.sum from bd_question qes left join (select tid,count(uid) sum from bd_answer group by tid) a on a.tid=qes.id where content like'%$keyword%' limit 0,1";
            $question=M()->query($qsql);
            $csql="select spred.id,spred.cid,course.aname title,course.descript detail,course.c_img img from bd_organ_spred spred left join bd_course course on course.id=spred.cid where course.descript like '%$keyword%' or introduce like '%$keyword%' limit 0,2";
            $course=M()->query($csql);
            $usql="select user.uid id,ifnull(fields.rname,user.uname)title,fields.content detail,fields.user_pic img,fields.lab from bd_user user left join bd_memberfields fields on fields.uid=user.uid where uname like '$keyword' or rname like '%$keyword%' or lab like '%$keyword%'  limit 0,2";
            $user=M()->query($usql);
            echo json_encode(array('code'=>1,'res'=>array($user,$teach,$question,$course)));
        }else{
            json_encode(array('code'=>0,'message'=>'关键词不存在！'));
        }
    }

    //新闻详情页
    public function news(){
        $arr = $this->getData(array('id'),'get');
        $id = $arr['id'];
        $data = M('Article')->where("id=$id")->field('title,content,mtime,hit')->find();
        $data['content'] = str_replace('\\','',$data['content']);
        
        //热门文章
        $gid = M('Classfiy')->where("name='焦点新闻'")->getField('id');
        $hotnews = M('Article')->where("gid=$gid")->order("hit desc")->limit(8)->field('id,title')->select();
        //上一条
        $pre = M('Article')->where("gid=$gid and id<$id")->order("id desc")->getField('id');
        //下一条
        $next = M('Article')->where("gid=$gid and id>$id")->order("id asc")->getField('id');
        
        $this->assign(array('data'=>$data,'hotnews'=>$hotnews,'pre'=>$pre,'next'=>$next));
        $this->display();
    }

    //新闻列表页
    public function newslist(){
        $gid = M('Classfiy')->where("name='焦点新闻'")->getField('id');
        //最新新闻
        $data = M('Article')->where("gid=$gid")->order("mtime desc")->limit(5)->select();
        foreach($data as $key=>$val){
            $data[$key]['content'] = mb_substr(strip_tags($val['content']),0,70,'utf-8');
        }
        //热门文章
        $hotnews = M('Article')->where("gid=$gid")->order("hit desc")->limit(8)->field('id,title')->select();

        $this->assign(array('data'=>$data,'hotnews'=>$hotnews));
        $this->display();
    }


    public function setCcity(){
        $cid=$this->getData(array('cid'), 'get');
        if($cid){
            cookie('cid',$cid['cid']);
            $this->ajaxr(true, '设置成功', '');exit();
        }
        $this->ajaxr(FALSE, '', '设置失败');
    }
    //短信接口
    //短信发送成功回调
    public function message_callback(){
        
    }
    
}