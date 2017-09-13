<?php
/**
 * 空间控制器
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
class SpaceAction extends CommonAction{
    //空间首页
    public function _initialize(){
       $uarr=$this->getData(array('uid'),'get');
            if(!$uarr['uid']){
                $uid=session('uid');
                if(!$uid){
                    $this->error('请登录后再继续！');
                }
            }else{
                $uid=$uarr['uid'];
                $suid=session('uid');
                $this->assignData(array('other'=>'true','concerend'=>M('User_follow')->where("fid=$uid and uid='$suid'")->count()),'assign');
        }
        parent::_initialize();
        $sql="select user.uid,user.uname,que.sq,fields.rname,fields.lab,fields.user_pic,fields.sex,fields.content,fields.birth,fields.address,fields.u_lev,fields.u_credit,user.type,fields.address,fields.visitnumber,fields.visitednumber,fields.comstomer from bd_user user left join bd_memberfields fields on fields.uid=user.uid left join (select uid,count(id) sq from bd_question group by uid) que on user.uid=que.uid where user.uid=$uid";
        $userinfo=M('User')->query($sql);
        if($userinfo[0]['visitednumber']){
           $this->getFans($uid); 
        }
        $userinfo[0]['birth']=date('m-d',  strtotime($userinfo[0]['birth']));
        if($userinfo[0]['visitnumber']<=1){
            $userinfo[0]['visitnumber']=M('User_follow')->where("fid=$uid")->count();
        }
        $this->assign('user',$userinfo[0]);
    }
    //主页
    public function space(){
        if($_POST){
            $content=$this->getData(array('content'),'post');
            $data=array();
            if($content['content']){
                $data['content']=$content['content'];
                $data['publisttime']=time();$data['istrans']=0;$data['type']=2;$data['uid']=session('uid');
                if($_FILES['simg']['name']){
                    $data['contentpic']=$this->handUimg('simg');
                    $data['type']=1;
                }
                if(count($data)){
                    $res=M('Dynamic')->add($data);
                    if($res){
                        echo json_encode(array('code'=>1,'message'=>'发布动态成功！','img'=>$data['contentpic'],'type'=>$data['type'],'content'=>$data['content']));
                    }else{
                        echo json_encode(array('code'=>0,'message'=>'发布动态失败！'));
                    }
                }
            }else{
                $this->error('请输入分享内容');
            }
        }else{
            $uarr=$this->getData(array('uid'),'get');
            if(!$uarr['uid']){
                $uid=session('uid');
            }else{
                $uid=$uarr['uid'];
                if(!$uid){
                    $this->error('请登录后再继续！');
                }
                $suid=session('uid');
                $this->assignData(array('other'=>'true','concerend'=>M('User_follow')->where("fid=$uid and uid='$suid'")->count()),'assign');
             }
             
            $page=$this->initPage();
            import("Com.PageHelper");
            //查看空间类型
            $parr=$this->getData(array('type'),'get');
            if(!$parr['type']){
                $parr['type']='all';
            }
            $sum=M('Dynamic')->where("uid='$uid'")->count();
            $pagesize=10;
            if($sum>10){
                PageHelper::init($pagesize, 10, $page['page'], $sum,'');
                $this->assign('pages',  PageHelper::getPageInfos());
            }
            $gusers=M('User_follow')->where("fid='$uid'")->field('uid')->select();
            $ustr='';
            if(!$parr['type']==='self'){
                foreach ($gusers as $key=>$val){
                    $ustr.=$val['uid'].',';
                }
            }
            $this->assign('type',$parr['type']);
            $ustr.="$uid";  
            $min=  PageHelper::getLimit();
            //获取动态列表
            $dsql="select c.com_timestamp,c.content ccontent,d.*,suser.user_pic,suser.rname from bd_comment c right join (select dynamic.*,fields.user_pic,ifnull(fields.rname,user.uname)rname from bd_dynamic dynamic left join bd_user user on user.uid=dynamic.uid left join bd_memberfields fields on fields.uid=dynamic.uid where dynamic.uid in('$ustr') order by publisttime desc limit $min[min],$min[max] ) d on d.id=c.aid and d.uid=11 left join(select user.uid,ifnull(fields.rname,user.uname) rname,user_pic from bd_user user left join bd_memberfields fields on fields.uid=user.uid) suser on suser.uid=c.uid order by d.publisttime desc";
            $dymicsarr=M('User')->query($dsql);
            $dymics=array();
            //组合动态
            foreach ($dymicsarr as $key=>$val){
                $val['com_timestamp']=date('Y-m-d H:i',$val['com_timestamp']);
                $val['content']=str_replace('\"','', $val['content']);
                if(!in_array($val['id'],array_keys($dymics))){
                    $val['publisttime']=date('Y-m-d',$val['publisttime']);
                    $val['contentpic'];
                    $dymics[$val['id']]=array('publisttime'=>$val['publisttime'],'type'=>$val['type'],'transnumber'=>$val['transnumber'],'readnumber'=>$val['readnumber'],'goodnumber'=>$val['goodnumber'],'istrans'=>$val['istrans'],'content'=>$val['content'],'contentpic'=>$val['contentpic']);
                    if($val['ccontent']){
                        $dymics[$val['id']]['comment'][]=array($val['com_timestamp'],$val['ccontent'],$val['rname'],$val['user_pic']);
                    }
                }else{
                    $dymics[$val['id']]['comment'][]=array($val['com_timestamp'],$val['ccontent'],$val['rname'],$val['user_pic']);
                }
            }
            unset($dymicsarr);
            $wday=array('末','一','二','三','四','五','六');
            $week=$wday[date('w',time())];
            $time=date('m.d',time());
            $ssum=M('Dynamic')->where("uid='$uid'")->count()>0?M('Dynamic')->where("uid='$uid'")->count():0;
            $asum=M('Dynamic')->where("uid in ($ustr)")->count()>0?M('Dynamic')->where("uid in ($ustr)")->count():0;
            $visitorsql="select * from bd_user_follow follow left join (select ifnull(rname,uname) rname,fields.user_pic,user.uid from bd_user user left join bd_memberfields fields on fields.uid=user.uid) puser on puser.uid=follow.uid where follow.fid=$uid";
            $this->assignData(array('page'=>'index','dymics'=>$dymics,'sum'=>$asum,'ssum'=>$ssum,'week'=>$week,'time'=>$time,'visitors'=>M('')->query($visitorsql)),'assign');
            $this->initForm();
            $this->display();
        }
        
    }
    private function getFans($uid){
        //获取粉丝列表
            if(!$_GET['fpage']){
                $fpage=1;
            }else{
                $fpage=$_GET['fpage'];
            }
            $pagesize=6;
            $min=($fpage-1)*$pagesize;
            $fsql="select * from bd_user_follow follow left join bd_user user on user.uid=follow.fid=user.uid left join bd_memberfields fields on fields.uid=follow.fid where follow.fid='$uid' limit $min,$pagesize";
            $this->assign('fans',M('User_follow')->query($fsql));
    }
    //点赞
    public function gcomment(){
        $id=$this->getData(array('id'),'get');
        if($id['id']){
            $sql="update bd_dynamic set goodnumber=goodnumber+1 where id='$id[id]'";
            $res=M('Dynamic')->execute($sql);
            $this->ajaxr($res,'点赞成功','点赞失败');
        }else{
            echo json_encode(array('code'=>0,'message'=>'id不存在，请重试！'));
        }
    }
    //评论
   public function comment(){
       $id=$this->getData(array('id','content'),'get');
       if($id['id']){
           $data=array('aid'=>$id['id'],'com_timestamp'=>time(),'content'=>"$id[content]",'uid'=>session('uid'));
           $res=M('Comment')->add($data);
           $res=true;
           if($res){
               $uid=session('uid');
               $uinfo=M('')->query("select ifnull(uname,rname) rname,user_pic from bd_user user left join bd_memberfields fields on fields.uid=user.uid where user.uid='$uid'");
               echo json_encode(array('code'=>1,'res'=>array('content'=>$id['content'],'time'=>date('Y-m-d H:i',time()),'rname'=>$uinfo[0]['rname'],'img'=>$uinfo[0]['user_pic'])));
           }else{
               echo json_encode(array('code'=>0,'message'=>'评论失败，请重试！'));
           }
       }else{
           echo json_encode(array('code'=>0,'message'=>'id不存在，请重试！'));
       }
   }
   //关注某用户
   public function concern(){
       $id=$this->getData(array('uid'),'get');
       $uid=session('uid');
       if($id['uid']===$uid){
           echo json_encode(array('code'=>0,'message'=>'你不能自己关注自己！'));
           return;
       }
       if($id['uid']){
           if(M('User_follow')->where("uid='$uid' and fid='$id[uid]'")->count()){
               echo json_encode(array('code'=>0,'message'=>'你已关注该用户！'));
           }else{
               $res=M('User_follow')->add(array('uid'=>$uid,'fid'=>$id['uid'],'ctime'=>time()));
               if($res){
                   $res=M('Memberfields')->where("uid='$uid'")->setInc('visitnumber');
                   if($res){
                       $res=M('Memberfields')->where("uid='$id[uid]'")->setInc('visitednumber');
                   }
               }
               $res=true;
               $this->ajaxr($res,'关注用户成功！','关注用户失败！');
           }
       }else{
           echo json_encode(array('code'=>0,'message'=>'id不存在，请重试！'));
       }
   }
   private function initp($model,$ofield,$type){
       $page=$this->initPage();
       $uid=session('uid');
       if($uid){
           $sum=$model->where("uid='$uid'")->count();
           if($sum>0){
                $pagesize=10;
                import('Com.PageHelper');
                PageHelper::init($pagesize, 10, $page['page'], $sum,'');
                $limit=  PageHelper::getLimit();
                if($type==='teach'){
                    $this->assign('datas',$model->where("uid='$uid'")->order($ofield)->limit($limit['min'],$pagesize)->select());
                    $this->assign('hdatas',$model->where("ishot=1")->order($ofield)->limit(0,5)->select());
                }else{
                    $sql="select spred.*,course.aname,mna.cname,course.c_img from bd_organ_spred spred left join bd_course course on spred.cid=course.id left join bd_proxyermanage mna on spred.cid=mna.id where spred.uid='$uid' order by spred.timestamp desc limit $limit[min],10";
                    $this->assign('datas',M('Organ_spred')->query($sql));
                    $hsql="select spred.*,course.aname,mna.cname,course.c_img from bd_organ_spred spred left join bd_course course on spred.cid=course.id  left join bd_proxyermanage mna on spred.cid=mna.id where spred.ishot=1 order by spred.timestamp desc limit $limit[min],10";
                    $this->assign('hdatas',M('Organ_spred')->query($hsql));
                }
                $this->assign('pages',PageHelper::getPageInfos());
           }
       }
       $this->display();
   }
   public function teach(){
       $this->assignData(array('page'=>'teach'),'assign');
       $this->initp(M('Teach'),'atime desc','teach');
   }
   /*-------2015-6-30-cht-----
   //学问中心
   public function qcenter(){
       $this->assignData(array('page'=>'qcenter'),'assign');
       import('Com.ClassfiyHelper');
       try{
           $class=ClassfiyHelper::getClassesByName('学问', 1,M('Classfiy'),'name,id');
       }catch(Exception $e){
           
       }
       $uid=session('uid');
       $qsql="select qes.*,awr.uid auid,awr.content acontent,awr.c_timestamp atimestamp,user.uname,quser.uname qname from bd_question qes left join (select user.uid,user.uname,fields.rname from bd_user user left join bd_memberfields fields on user.uid=fields.uid) quser on quser.uid=qes.uid left join (select * from bd_answer where uid=$uid and v_money=0  order by c_timestamp desc limit 0,1) awr on qes.id=awr.tid left join (select user.uid,user.uname,fields.rname from bd_user user left join bd_memberfields fields on user.uid=fields.uid) user on awr.uid=user.uid left join (select count(tid) suma,tid from bd_answer group by tid) aes on aes.tid=qes.id where qes.uid=$uid order by qes.c_timestamp desc";
       $this->assignData(array('classes'=>$class,'questions'=>M('Question')->query($qsql)),'assign');
       $this->initForm();
       $this->display();
   }
   //问答
   public function addQestion(){
       $data=$this->getData(array('cid','content'),'post');
       if($_FILES['c_img']){
           $data['c_img']=$this->handUimg('c_img');
       }
       
       if($data['cid'] && $data['content']){
           $data['uid']=session('uid');$data['c_timestamp']=time();
           $res=M('Question')->add($data);
           $res=1;
           if($res){
               $data['c_timestamp']=date('Y-m-d');$data['uname']=session('uname');
               $res=array('code'=>1,'data'=>$data);
           }else{
               $res=array('code'=>'0','message'=>'提问失败！');
           }
       }else{
           $res=array('code'=>'0','message'=>'参数不正确，请正确访问！');
       }
        echo json_encode($res);
   }
    */

   //学问中心
   public function qcenter(){
      $arr = $this->getData(array('uid'),'get');
      if(!empty($arr['uid'])){
          $uid = $arr['uid'];
          $from = 'him';
      }else{
          $uid = session('uid');
          $from = 'self';
      }
      $this->assignData(array('page'=>'qcenter'),'assign');
      $myQuestion = M('Question')->where("uid=$uid")->order("c_timestamp desc")->limit(12)->select();
      $hotAsk = M('Question')->order("lnumber desc")->limit(7)->select();

      $this->assign(array('myQuestion'=>$myQuestion,'hotAsk'=>$hotAsk,'from'=>$from));
      $this->display();
   }

   public function course(){
       $this->assignData(array('page'=>'course'),'assign');
       $this->initP(M('Organ_spred'),'timestamp','course');
   }

   //在线考试
   public function exam(){
      $arr = $this->getData(array('uid','page'),'get');
      $uid = !empty($arr['uid'])?$arr['uid']:session('uid');
      
      //分页
      import('Com.PageHelper');
      $page = $arr['page'];
      $page = $page?$page:1;
      $pages = 5;
      $sum = M('Ex_record')->where("uid=$uid")->count();
      PageHelper::init($pages,10,$page,$sum,'');
      $limit = PageHelper::getLimit();
      $limit = $limit['min'];
      $link = PageHelper::getPageInfos();
      //获取考试记录
      $sql = "SELECT r.*,p.name FROM bd_ex_record r JOIN bd_ex_paper p ON r.sid=p.id LIMIT $limit,$pages";
      $data = M()->query($sql);
      //获取热门试题
      $hot = M('Ex_paper')->order("answer desc")->limit(5)->select();
      $this->assign('page','exam');
      $this->assign(array('data'=>$data,'hot'=>$hot,'link'=>$link,'p_count'=>$pages*($page-1)));
      $this->display();
   }

  //邀请好友注册
  /*public function invite(){
      $this->assign(array('page'=>'invite'));
      $this->display();
  }*/


   public function find(){
       $this->assignData(array('page'=>'find'),'assign');
       $this->display();
   }
   //空间设置
   public function setting(){
       $uid=session('uid');
       $priv=M('Memberfields')->where("uid='$uid'")->field('priv')->find();
       if($priv['priv']==='1'){
           $priv='all';
       }else if($priv['priv']==='2'){
           $priv='friend';
       }else if($priv['priv']==='0'){
           $priv='self';
       }
       $this->assignData(array('priv'=>$priv,'page'=>'setting','labs'=>M("Memberfields")->where("uid='$uid'")->field('lab')->find()),'assign');
       $this->display();
   }
   public function mainpage(){
      
       $this->display();
   }
}