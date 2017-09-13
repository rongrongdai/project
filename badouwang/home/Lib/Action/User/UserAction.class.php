<?php
class ImageHandler{
    public  function handle($data){
        if($data['imgname']){
            $pos=strpos($data['imgname'], 'upload');
            return '/'.substr($data['imgname'],$pos);
        }
    }
}
class UserAction extends CommonAction{
        private $model;
        public function __construct() {
            $this->model=new UserModel();
            parent::__construct();
        }
        public function index(){
            $uid = session('uid');
            $data = M('Memberfields')->where("uid='$uid'")->field('rname,user_pic,money,vmoney,u_credit')->find();
            if(!$data['rname']){
              $data['rname'] = session('uname');
            }
            if(!$data['user_pic']){
              $data['user_pic'] = "public/images/home/uimg.png";
            }

            //判断用户身份、以及免费发布信息机会
            $data1 = M('Authentication')->where("verified=1 and uid=$uid")->find();
            if($data1['type']==1){
                $total = M('Teach')->where("uid=$uid")->count();
                $total = $total<3?3-$total:0;
            }else if($data1['type']==2){
                $total = M('organ_spred')->where("uid=$uid")->count();
                $total = $total<3?3-$total:0;
            }
          $this->assign(array('data'=>$data,'total'=>$total,'data1'=>$data1),'assign');  
          $this->display();
        }

	//用户登陆
	public function login(){
      $url = $_SERVER['HTTP_REFERER'];
      $this->assign(array('pre_url'=>$url));
		  $this->display();
	}

	public function doLogin(){
        $arr = $this->getData(array('uname','password','pre_url'),'post');
                    $uname = $arr['uname'];
        $pre_url = $arr['pre_url'];
        if(strpos($pre_url,'register') || strpos($pre_url,'doLogin')){
            $pre_url=substr(__URL__,0,  strpos(__URL__, 'index.php')+9);
        }

        import('Com.PasswordHelper');
	$pass = PasswordHelper::advDecode($arr['password']);
	$res = M('User')->where("uname='{$uname}' and password='{$pass}'")->find();
	if(!empty($res)){
            $this->assignData(array('uname'=>$res['uname'],'uid'=>$res['uid']), 'session');
            $rname = M('Memberfields')->where("uid='{$res['uid']}'")->field('rname')->find();
            if($rname['rname']){//显示昵称
            session('uname',$rname['rname']);
          }
          //添加每日登录经验
          if(date('Ymd',$res['err_time'])!=date('Ymd',time())){
              $uid = $res['uid'];
              $c_value = $this->setCredit('经验','login',$uid);
              $msg = "<font color='green'>+".$c_value."积分</font>";

              M('User')->where("uid=$uid")->setField('err_time',time());
          }
          $this->pagego('恭喜您,登录成功!'.$msg,'',$res,$pre_url);	
      }else{
          $this->pagego('','用户名或密码错误!',$res,'login');
      }
	}

        public function logout(){
          session_destroy();
          cookie('PHPSESSID',null);
          /*$url = $_SERVER['HTTP_REFERER'];
          if(strpos($url, 'ucenter')){
              $url=  substr(__URL__,0,  strpos(__URL__, 'index.php')+9);
          }*/
          $this->pagego('成功退出','','1',$this->getp());
        }

	//用户注册
      public function register(){     
      if(!empty($_POST)){
          import('Com.PasswordHelper');
          $usermodel = D('User');
          $_POST['reg_timestamp'] = time();
          $_POST['reg_ip'] = $_SERVER['REMOTE_ADDR'];
          //$_POST['city'] = $_POST['s_province'].'-'.$_POST['s_city'].'-'.$_POST['s_county'];
          if($data = $usermodel->create()){
            $data['password'] = PasswordHelper::advDecode($data['password']);
            session('password',$data['password']);
            if($res = $usermodel->add($data)){
                //设置自动登录
                $uname = $_POST['uname'];
                M('Memberfields')->add(array('uid'=>$res));//fanbo
                $_SESSION = array('uname'=>$uname,'uid'=>$res);
                //给邀请用户添加学豆
                if(cookie('yqcode')){
                    $code = cookie('yqcode');
                    $yuid = M('User_invite')->where("md5(code)='{$code}' and status=1")->getField('uid');
                    if($yuid){
                        //修改邀请码状态
                        M('User_invite')->where("md5(code)='{$code}'")->setField(array('status'=>2,'tuid'=>$res,'ctime'=>time()));
                        cookie('yqcode',null);
                        //添加积分，学豆
                        $this->setCredit('经验','yq',$yuid);
                        $this->setCredit('学豆','yq',$yuid);
                    }
                }
                $this->success('注册成功','zhuce');
            }else{
                $this->error('注册失败');
            }
          }else{
            $this->error($usermodel->getError());
          }
      }else{
          $arr = $this->getData(array('code'),'get');
          cookie('yqcode',$arr['code'],3600);

          $vist = substr_count($_SERVER['HTTP_REFERER'],'/User/User/invite');
          //累计注册人数
          $num = M('User')->count();

          $this->assign(array('num'=>$num+2001,'vist'=>$vist));
          $this->display();
      }
      
  	}


    public function zhuce(){
        if(!empty($_POST)){
          if($_FILES['mypic']['name']!=""){
             $src = $this->handUimg('mypic');
          }
          if($src){
            import("Com.ImageHelper");
            $src = '.'.$src;
            $res = ImageHelper::thumb($src,$src,'jpg',150,150,1,0);
            if($res){
              $x = $_POST['x1'];
              $y = $_POST['y1'];
              $width = (int)($_POST['x2']-$_POST['x1']);
              $height = (int)($_POST['y2']-$_POST['y1']);
              if(!empty($_POST['x2'])){
                  $src1 = ImageHelper::cut($res,$x,$y,$width,$height);
              }else{
                  $src1 = ltrim($res,'.');
              }
            }
          } 
          $uid = session('uid');
          $lab = $_POST['u_label'];
          $res = M('Memberfields')->where("uid=$uid")->setField(array('lab'=>$lab,'user_pic'=>$src1));
          $this->pagego('设置成功','设置失败',$res,'zhucy'); 
        }else{
          $arr = $this->getData(array('src'),'get');
          //用户标签
          $res = M('Config')->where("c_key='u_label'")->getField('c_value');
          $data = explode("，",$res,-2);

          $timestamp = $_SERVER['REQUEST_TIME'];
          $this->assign(array('src'=>$arr['src'],'data'=>$data,'token'=>md5('unique_salt'.$timestamp),'timestamp'=>$timestamp));
          $this->display();
        }
        
    }

    /*public function doRegImg(){
        if($_FILES['mypic']['name']!=""){
           $src = $this->handUimg('mypic');
        }    
        if($src){
          import("Com.ImageHelper");
          $src = '.'.$src;
          $res = ImageHelper::thumb($src,$src,'jpg',150,150,1,0);
          if($res){
            $x = $_POST['x1'];
            $y = $_POST['y1'];
            $width = $_POST['x2'];
            $height = $_POST['y2'];
            if(!empty($width)){
                $src1 = ImageHelper::cut($res,$x,$y,$width,$height);
            }else{
                $src1 = ltrim($res,'.');
            }
            $uid = session('uid');
            $res1 = M('Memberfields')->where("uid=$uid")->setField('user_pic',$src1);
            $this->pagego('上传成功','图片格式不支持',$res,'zhuce?src='.$src1);
          }else{
            $src = ltrim($src,'.');
            $this->pagego('上传成功','',$src,'zhuce?src='.$src);
          }
      }else{
        $this->pagego('','未上传图片',$src,'zhuce');
      }  
    }*/

    public function zhucy(){
      if(!empty($_POST)){
        $arr = $this->getData(array('rname','sex','s_province','s_city','s_county'),'post');
        $arr['address'] = $arr['s_province'].'-'.$arr['s_city'].'-'.$arr['s_county'];
        $uid = session('uid');
        $res = M('Memberfields')->where("uid=$uid")->setField($arr);
        if($res && $arr['rname']){
           //添加环信数据
           import("Com.HuanxinHelper");
           $uname=time()-1438575180;
           $password=session('password');
           $res=HuanxinHelper::manUser('addUser', array('username'=>$uname,'password'=>$password,'nickname'=>$arr['rname']));
           if($res){
               $res=M('User')->where("uid='$uid'")->setField('huid',$uname);
           }
        }
        session('password',null);
        if($res) session('uname',$arr['rname']);
        $this->pagego('资料完善成功','完善失败','$res',U('Index/Index/index'));
      }else{
        $this->display();
      }
    }

    //邀请注册
    public function invite(){
        $uid = session('uid');
        $pagesize = 6;
        $sum = M('User_invite')->where("uid=$uid")->count(); 
        $sql = "SELECT i.*,u.rname FROM bd_user_invite i JOIN bd_memberfields u ON i.tuid=u.uid WHERE i.uid=$uid";
        $res=$this->setPage($pagesize,$sum,$sql);

        $this->assign(array('data'=>$res['data'],'link'=>$res['link'],'limit'=>$res['limit']));
        $this->display();
    }

  	//显示验证码
  	public function vcode(){
  		import("Com.VerifyHelper");
  		VerifyHelper::buildImageVerify(4,2,'png',56,28,'vcode');
  	}

    public function uframe(){
        $uid = session('uid');
        $uname = session('uname');
        $page=$this->getData(array('page','type'), 'get');
        //获取用户身份
        $type = M('User')->where("uid=$uid")->getField('type');
        $this->assign(array('uname'=>$uname,'type'=>$type,'target'=>$page['type'],'page'=>$page['page']));
        $this->display();
    }

  //我的订单
  public function orderList(){
    $arr = $this->getData(array('name','cancel'),'get');
    $type = $arr['name']?$arr['name']:'pay';
    if($arr['cancel']){
        M('Jjbm_order')->where("id=".$arr['cancel'])->delete();
    }

    $uid = session('uid');
    $sql1 = "SELECT COUNT(z.id) sum0,COUNT(a.id) sum1,COUNT(b.id) sum2,COUNT(c.id) sum3 FROM bd_jjbm_order z LEFT JOIN bd_jjbm_order a ON z.id=a.id AND a.ispay=0 LEFT JOIN bd_jjbm_order b ON z.id=b.id AND b.ispay=1 AND b.status=0 LEFT JOIN bd_jjbm_order c ON z.id=c.id AND c.status=1 WHERE z.suid=$uid and z.type<3";
    $sum = M()->query($sql1);
   
    $condition = "";
    $condition .= "suid=$uid";
    switch($type){
        case 'all':$count = $sum[0]['sum0'];break;
        case 'pay':$condition .= " and ispay=0";$count = $sum[0]['sum1'];break;
        case 'do' :$condition .= " and ispay=1 and status=0";$count = $sum[0]['sum2'];break;
        case 'end':$condition .= " and status=1";$count = $sum[0]['sum3'];break;
    }
    $pagesize = 5;
    //$count = M('Jjbm_order')->where($condition." and type<3")->count();
    $sql = "SELECT o.*,a.real_name,a.self_img,comment.sum,pro.timg,pro.cname,pro.id sid,pro.s_time,pro.e_time,sum(ks.classhour) classhour FROM bd_jjbm_order o left JOIN bd_authentication a ON o.tuid=a.uid and a.type=5 left join bd_teacher_ks ks on o.id=ks.kid and ks.k_status=1 left join(select course.timg,course.cname,spred.id,spred.s_time,spred.e_time from bd_organ_spred spred left join bd_proxyermanage course on course.id=spred.cid) pro on pro.id=o.course_id left join (select count(uid) sum,aid from bd_comment where uid=$uid group by aid) comment on comment.aid=o.id where $condition and o.type<3 GROUP BY o.id ORDER BY o.bm_time DESC";
    $res = $this->setPage($pagesize,$count,$sql);

    $this->assign(array('data'=>$res['data'],'name'=>$arr['name'],'link'=>$res['link'],'type'=>$type,'all'=>$sum[0]['sum0'],'ispay'=>$sum[0]['sum1'],'do'=>$sum[0]['sum2'],'end'=>$sum[0]['sum3']));
    $this->display();
  }

  public function classHour(){
    $arr = $this->getData(array('kid'),'post');
    $arr['stime'] = $_SERVER['REQUEST_TIME'];
    $arr['k_status'] = '1';
    $kid = &$arr['kid'];
    $res = M('teacher_ks')->where("kid=$kid and k_status=0")->data($arr)->save();
    if($res){
       $sum = M()->query("SELECT o.hour,sum(k.classhour) sum FROM bd_jjbm_order o LEFT JOIN bd_teacher_ks k ON o.id=k.kid WHERE k.kid=$kid AND k.k_status=1");
       if($sum[0]['hour']===$sum[0]['sum']){
          M('Jjbm_order')->where("id=$kid")->setField('status','1');
       }
    }
    $this->pagego('课时确认成功','确认失败',$res,'orderList');
  }

        //用户中心
        public function ucenter(){
          $uid = session('uid');
          $uname = session('uname');
          $page=$this->getData(array('page','type'), 'get');
          //获取用户身份
          $type = M('User')->where("uid=$uid")->getField('type');
          $this->assignData(array('uname'=>$uname,'type'=>$type,'target'=>$page['type'],'page'=>$page['page']),'assign');
          $this->display();
        }

        private function getEmailUrl($email){
            if(strpos($email,'qq')){
                return 'https://mail.qq.com/';
            }
            if(strpos($email,'126')){
                return 'http://www.126.com/';
            }if(strpos($email,'163')){
                return 'http://www.126.com/';
            }
        }
        private function handlePwd($data){
            if($data['passwd'] && $data['cpasswd']){
                if($data['passwd']===$data['cpasswd']){
                    import('Com.PasswordHelper');
                    $this->model->where("uname='$data[uname]'")->setField(array('password'=>PasswordHelper::advDecode($data['passwd']),'comfirm'=>0,'c_time'=>0,'fpwd_step'=>1));
                    $this->success('修改密码成功','login');
                }else{
                     $this->error('新密码或确认密码不一致!');
                }
            }else{
                $this->error('请输入新密码或确认密码!');
            }
        }
        //忘记密码操作
        public function fpassword(){
            $unamearr=$this->getData(array('uname','email','time','cpassword'), 'get');
            $comfirm=true;
            $sar=array();
            if(!$unamearr['uname'] && !$unamearr['email']){
                $this->error('请输入用户名后再找回密码！');
            }else{
                $this->assign('email',$unamearr['uname']);
                $sar=$this->model->where("uname='$unamearr[uname]'")->field('fpwd_step,comfirm,uname,c_time,p_question')->find();
                $this->assign('p_question',$sar['p_question']);
            }
            if($unamearr['email']){
                $sar=$this->model->where("uname='$unamearr[email]'")->field('fpwd_step,comfirm,uname,c_time')->find();
            }
            if(!count($sar)){
                $this->error('用户名不存在！');
            }
            if($sar['fpwd_step']==3){
                if(!$sar['confirm']){
                    $this->assign('uname',$unamearr['email']);
                    $this->assign('type','pfind');
                }
            }
            if($unamearr['time']){
                if(time()-$sar['c_time']<=24*60*60){
                     $this->model->where("uname='$unamearr[email]'")->setField(array('comfirm'=>1));
                     $sar['fpwd_step']=3;
                     $this->assign('uname',$sar['uname']);
                }else{
                  $this->model->where("uname='$unamearr[email]'")->setField(array('c_time'=>0,'fpwd_step'=>1));
                   $this->error('找回密码连接已失效，请重试！',C('DOMAIN'));
                }
            }
            if($unamearr['email'] && $sar){
                $comfirm=$sar['comfirm'];
                if($_POST){
                    if($comfirm){
                        $data=$this->getData(array('passwd','cpasswd','uname'),'post');
                        $this->handlePwd($data);
                        exit();
                    }else{
                        $type=$this->getData(array('type'), 'post');
                        if($type['type']==='pfind'){
                             $data=$this->getData(array('passwd','cpasswd','uname'),'post');
                             $this->handlePwd($data);
                             exit();
                        }else{
                             $this->error('亲，先去邮箱验证哦');
                        }
                    }
                }else{
                        $this->assign(array('comfirm'=>$comfirm,'url'=>$this->getEmailUrl($sar['uname'])),'assign');
                }
            }
            
            $this->display('step'.$sar['fpwd_step']);
        }

    //修改密码
        public function changePwd(){
            import("Com.PasswordHelper");
             $uid=session('uid');
            if(!$_POST){
                $ftoken=  PasswordHelper::basicEncode(time());
                $this->assign('ftoken',$ftoken);
                session('ftoken',$ftoken);
                //密保设置
                import("Com.Config");
                $config=Config::getConfig('用户配置','u_pretected');
                $questions=  explode(';',$config['c_value']);
                $upro=M('User')->where("uid='$uid'")->field('p_question,p_awswer')->find();
                $this->assignData(array('questions'=>$questions,'upro'=>$upro),'assign');
                $this->display();
            }else{
                $data=$this->getData(array('pwd','npwd','ncpwd','ftoken','type','p_question','p_awswer'),'post');
                if($data['type']){
                    if($data['type']==='next'){
                        if(M('User')->where("p_question='$data[p_question]' and p_awswer='$data[p_awswer]'")->count()){
                           $this->assign('type','next');
                           import("Com.Config");
                           $config=Config::getConfig('用户配置','u_pretected');
                           $questions=  explode(';',$config['c_value']);
                           $this->assign('questions',$questions);
                           $this->display();exit();
                        }else{
                            $this->error('答案不正确！');exit();
                        }
                        
                    }else{
                       $cdata=array('p_question'=>$data['p_question'],'p_awswer'=>$data['p_awswer']);
                        $res=M('User')->where("uid='$uid'")->setField($cdata);
                        $this->pagego('修改密保成功！', '修改密保失败！', $res, $url);exit(); 
                    }
                    
                }else{
                    unset($data['type']);unset($data['p_question']);unset($data['p_awser']);
                }
                
                //表单重复提交
                if($data['ftoken']!==session('ftoken')){
                    $this->error('请不要重新提交！');
                }
                if($data['pwd']===$data['npwd']){
                    $this->error('新密码与原密码一致，无需修改！');
                }
                if($data['pwd'] && $data['npwd'] && $data['ncpwd']){
                   if($data['npwd']!==$data['ncpwd']){
                    $this->error('确认密码与新密码不一致！');
                    }else{
                        $data['npwd']=  PasswordHelper::advDecode($data['npwd']);
                         $data['pwd']=  PasswordHelper::advDecode($data['pwd']);
                        $upwd=$this->model->where("uid='$uid'")->field('password')->find();
                        if($upwd['password']===$data['pwd']){
                            $res=$this->model->where("uid='$uid'")->setField('password',$data['npwd']);
                            $this->pagego('修改密码成功！','修改密码失败，请重试！', $res,'');
                        }else{
                            $this->error('旧密码不正确，请重新输入！');
                        }
                    } 
                }else{
                    $this->error('请完整输入修改条件！');
                }
            }   
        }
    public function uset(){
      $uid = session('uid');
      $model = M('Memberfields');
      $data = $model->where("uid=$uid")->find();
      $data1 = M('User')->where("uid=$uid")->find();
      $data['city'] = explode('-',$data1['city']);
      $darr=explode('-',$data['address']);
      $data['d_detail']=$darr[count($darr)-1];
      $data['p_question']=$data1['p_question'];
      $data['p_awswer']=$data1['p_awswer'];
      unset($data1);
      $timestamp = time();
      $this->assign(array('data'=>$data,'questions'=>$questions,'token'=>md5('unique_salt'.$timestamp),'timestamp'=>$timestamp));
      $this->display();
    }    
    //完善个人资料
      public function doSet(){
        $uid = session('uid');
        $data = $this->getData(array('rname','sex','birth','qq','email','content','tname','d_detail'),'post');
        $data['uid'] = $uid;
        $data['address'] = $_POST['s_province'].'-'.$_POST['s_city'].'-'.$_POST['s_county'].'-'.$data['d_detail'];
        unset($data['d_detail']);
        import('Com.Config');
        $questions=Config::getConfig('用户配置','');
        //判断用户是修改，还是第一次填写
        $setModel = D('Memberfields');
        $res = $setModel->where("uid=$uid")->find();
        $add = $setModel->where("uid=$uid")->setField($data);
        
        if($add){//更新登录名称
            
            session('uname',$_POST['rname']);
            if(!empty($data['address'])){//更新User表中地址
                $city = $data['address'];
                M('User')->where("uid=$uid")->setField('city',$city);
            }
        }
        
        if($data['address']!==$res['address'] || $data['rname'] !==$res['rname'] || $data['sex'] !==$res['sex']){
            //添加高德数据 樊波
            import('Com.MapService');
            MapService::modifyUser($uid);
        }
        
        $this->pagego('修改成功','您没有修改操作',$add,'./uset');
        echo '<script>parent.location.reload();</script>';
      }
      public function uploadimg(){
        $picname = $_FILES['mypic']['name'];
        $picsize = $_FILES['mypic']['size']; 
        if ($picname != "") {
            if ($picsize > 1024*1024*0.5){  
                echo '图片大小不能超过0.5M';  
                exit;
            }  
            $type = substr($picname,strrpos($picname,'.')); 
            if ($type != ".gif" && $type != ".jpg" && $type != ".png") {  
                echo '图片格式不对！';  
                exit;  
            }  
            $rand = rand(100, 999);  
            $pics = time().$rand.$type;  
            //上传路径
            import('Com.FileHelper');
            $dirs = FileHelper::getUploadFileDir();
            $pic_path = "$dirs/".$pics;//绝对路径
            $pos = strpos($pic_path,'/upload');
            $pic_path1 = substr($pic_path,$pos);//相对路径
            $path_dir = substr($pic_path,0,$pos);
            $res = move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);
            $model = M('Memberfields');
            if($res){
                $uid = session('uid');
                $res1 = $model->where("uid=$uid")->find();
                if($res1){
                  $user_pic1 = $res1['user_pic'];
                  $res2 = $model->where("uid=$uid")->setField('user_pic',$pic_path1);
                  import('Com.MapService');
                  MapService::modifyUser();
                    if($res2){
                      unlink($path_dir.$user_pic1);//删除原有头像
                    }
                }else{
                  $model->add(array('uid'=>$uid,'user_pic'=>$pic_path1));
                }
              $arr = array('name'=>$picname,'pic'=>$pic_path1,'size'=>$picsize);  
              echo json_encode($arr);    
            }   
        }
      }


      private function inita($type,$uid,$sql){
           $page=$this->initPage();
            //加载分页类
            import('Com.PageHelper');
            if($type){
                $total = (int)M('jjbm')->where("suid='$uid' and type=2 or type=4")->count();
            }else{
                 $total =(int)M('jjbm')->where("suid='$uid' and type=1 or type=3")->count();
            }
            $pagesize = 10;
            PageHelper::init($pagesize,10,$page['page'],$total,'');
            $link = PageHelper::getPageInfos();
            $larr = PageHelper::getLimit();
            $limit = $larr['min'];
            $rsql = $sql.=" LIMIT $limit,$pagesize";
            $res = M('Teach')->query($rsql);
            $this->assign(array('link'=>$link,'page'=>$page['page']-1,'size'=>$pagesize),'assign');
            return $res;
      }
      //消息中心
      public function tsmgement(){
          $tarr=$this->getData(array('tag'), 'get');
          $this->assign('tag',$tarr['tag']);
          $this->display();
      }
      //我的预约及报名
      public function appointment(){
        $suid = session('uid');
        $pages = $this->getData(array('page','cpage','type'),'get');
        if(!$pages['type']){
            $pagesize = 6;
            $sum = M('Jjbm')->where("suid=$suid")->count(); 
            $sql="SELECT b.id bid,b.course,t.title,t.dtime,a.real_name,a.telephone,a.address FROM bd_jjbm b JOIN bd_teach t ON t.id=b.course  JOIN bd_authentication a ON a.id=t.teacher_id WHERE b.suid=$suid and b.type=1";
            $res=$this->setPage($pagesize,$sum,$sql);
            $this->assign(array('mybm'=>$res['data'],'link'=>$res['link'],'limit'=>$res['limit']));
        }else{
            $sql="select distinct bm.id bid,ifnull(ocourse.id,pcourse.id)id                                                                                                                                                                                                                                                                                            ,ifnull(ocourse.telephone,pcourse.telephone) telephone,ifnull(ocourse.address,pcourse.address) address,pcourse.oname,ocourse.aname,pcourse.cname,ocourse.real_name,pcourse.s_time,ocourse.as_time from bd_jjbm bm 
                  left join(select spred.id,spred.uid,spred.s_time,pc.oname,auth.telephone,auth.address,auth.real_name,course.cname from bd_organ_spred spred 
					left join bd_proxyermanage course on spred.cid=course.id left join bd_proxyermanage pc on pc.id=course.oid 
					left join bd_authentication auth on auth.id= course.pid) pcourse on pcourse.id=bm.course
                  left join (select auth.uid,auth.real_name,auth.address,auth.telephone,spred.s_time as_time,spred.id,course.aname from bd_organ_spred spred 
					left join bd_course course on spred.cid=course.id 
					left join bd_authentication auth on course.aid=auth.id) ocourse on ocourse.id=bm.course where bm.suid='$suid' and bm.type in (2,4)";
            $res=$this->inita('course', $suid, $sql);
            $this->assignData(array('type'=>$pages['type'],'courses'=>$res),'assign');
        }
        $this->display();
      }
      public function delJjbm(){
          $ids=$this->getData(array('ids'), 'get');
          $uid=session('uid');
          if($ids['ids']){
              $res=M('Jjbm')->where("id in ($ids[ids]) and suid='$uid'")->delete();
              $this->pagego('删除报名成功!','删除报名失败!', $res, '');
          }else{
              $this->error('参数不正确！');
          }
      }
       //qq登录接口
        public function qqLogin(){
           session('wuser',null);
           import('Com.Tcent');
           if($_GET['code'] ){
                cookie('qcode',$_GET['code']);
            }
           if(!cookie('qcode') && !$_GET['state']){
               TecentHelper::init();
           }
           if(cookie('qcode')){
                $token= TecentHelper::getToken(cookie('qcode'));
                $openid=  TecentHelper::getOpenId($token);
                $quser=TecentHelper::getUserinfo($token,$openid);
                $sql="select user.uid,uname,fields.rname from bd_user user left join bd_memberfields fields on fields.uid=user.uid where user.q_bind ='$quser[figureurl_2]'";
                $this->handu($sql);
                cookie('qcode',null);
                //处理用户
                $user=array('nickname'=>$quser['nickname'],'city'=>$quser['province'].'-'.$quser['city'],'uimg'=>$quser['figureurl_2']);
                session('quser',$user);
                $this->redirect('bind');
            }
        }
        
        //sina登录接口
        public function webLogin(){
            session('quser',null);
            import('Com.Sina');
            if($_GET['code']){
                cookie('wcode',$_GET['code']);
            }
            if(!cookie('wcode')){
                SinaWeiboHelper::initWeb();
            }
            if(cookie('wcode')){
                $tarr=  SinaWeiboHelper::getToken(cookie('wcode'),'http://www.zhou20.com/index.php/User/User/webLogin');
                $wuser= SinaWeiboHelper::getUserinfo($tarr['access_token'],$tarr['uid']);
                cookie('wcode',null);
                //处理用户
                $sql="select user.uid,uname,fields.rname from bd_user user left join bd_memberfields fields on fields.uid=user.uid where user.w_bind ='$wuser[profile_image_url]'";
                $this->handu($sql);
                if($wuser){
                    $user=array('nickname'=>$wuser['screen_name'],'uimg'=>$wuser['profile_image_url']);
                    $user['city']= join('-',explode(' ',$wuser['location']));
                    session('wuser',$user);
                    $this->assign('type','web');
                    $this->redirect('bind');
                }
            }
        }
        private function handu($sql){
            $uarr=M('User')->query($sql);
                $suser=$uarr[0];
                cookie('qcode',null);
                if($suser['uid']){
                    session('uid',$suser['uid']);
                    session('uname',$suser['rname']);
                    $this->redirect('Index/Index/index');
                    exit();
                }
        }
        //绑定网站号
        public function bind(){
            if($_POST){
                $user=session('quser')?session('quser'):session('wuser');
                if(!$user){
                    $this->error('请先第三方登录后在绑定！','login');
                }
                $data=$this->getData(array('email','password'), 'post');
                if(M('User')->where("uname='$data[email]'")->count()){
                    $this->error('该邮箱已被注册，请填写新邮箱！');
                }
                if($data['email'] && $data['password']){
                    if(session('quser')){
                    $user=session('quser');
                    }else if(session('wuser')){
                        $user=session('wuser');
                    }
                    
                    $data['uname']=$data['email'];unset($data['email']);
                    if(session('quser')){
                        $data['q_bind']=$user['uimg'];
                    }else if(session('wuser')){
                         $data['w_bind']=$user['uimg'];
                    }
                    import('Com.PasswordHelper');
                    $data['password']=  PasswordHelper::advDecode($data['password']);
                    $uid=M('User')->add($data);
                    if($uid){
                        $res= M('Memberfields')->add(array('uid'=>$uid,'rname'=>$user['nickname'],'user_pic'=>$user['uimg'],'address'=>$user['city']));//fanbo
                        import('Com.MapService');
                        MapService::modifyUser();
                        session('uid',$uid);
                        session('uname',$user['nickname']);
                        session('quser',null);session('wuser',null);
                        $this->redirect('Index/Index/index');
                    }else{
                        $this->error('绑定帐号失败，请重试','login');
                    }
                    
                }else{
                    $this->error('请填入完整信息！');
                }
            }else{
               if(session('quser') || session('wuser')){
                   if(session('quser')){
                       $this->assign('type','qq');
                   }else{
                       $this->assign('type','web');
                   }
                   $this->display();
               }else{
                   $this->error('未使用用第三方接口登录','login');
               }
            }
        }

    //家教我的课表
    public function kebiao(){
      if(!empty($_POST['yid'])){
        //接受对方的约课
        $arr = $this->getData(array('yid'),'post');
        $data = array();
        $data['k_confirm'] = 1;
        $data['stime'] = $_SERVER['REQUEST_TIME'];

        $res = M('Teacher_ks')->where("id=".$arr['yid'])->setField($data);
        $this->pagego('约课确定成功','约课确定失败',$res,'');
      }elseif(!empty($_POST['mid'])){
        //修改约课
        $arr = $this->getData(array('mid','begin_time','date'),'post');
        $time = $_SERVER['REQUEST_TIME'];
        $classhour = M('Teacher_ks')->where("id=".$arr['mid'])->getField('classhour');
        $endTime = strtotime($arr['date']." ".((int)$arr['begin_time']+$classhour).":00");
        $data = array('begin_time'=>$arr['begin_time'],'date'=>$arr['date'],'cuid'=>session('uid'),'ctime'=>$time,'end_time'=>$endTime,'stime'=>'','k_confirm'=>0);

        $res = M('Teacher_ks')->where("id=".$arr['mid'])->setField($data);
        $this->pagego('约课确定成功','约课确定失败',$res,'');
      }elseif(!empty($_POST['cid'])){
        //取消约课
        $arr = $this->getData(array('cid'),'post');
        $res = M('Teacher_ks')->where("id=".$arr['cid'])->delete();
        $this->pagego('取消成功','取消失败',$res,'');
      }else{
        import("Com.Calendar");
        $calendar = Calendar::showCalendar();

        //课表状态：1 课程日历、2 待约课、3 待上课、4 确认完成
        $arr = $this->getData(array('from','status'),'get');
        if((int)$arr['status']<1) $arr['status'] = 1;
        if((int)$arr['status']>4) $arr['status'] = 4;
        $status = $arr['status']?$arr['status']:1;

        $uid = session('uid');
        $from = $arr['from']?"o.tuid=".$uid:"stid=".$uid;
        $condition = $from;

        $today = date("Y-m-d",time());
        switch($status){
            case 1: $condition .= " and k_confirm=1 and date='{$today}'"; break;
            case 2: $condition .= " and k_confirm=0"; break;
            case 3: $condition .= " and k_confirm=1 and k_status=0 and end_time>UNIX_TIMESTAMP()"; break;
            case 4: $condition .= " and k_confirm=1 and k_status=0 and end_time<UNIX_TIMESTAMP()"; break; //课表过期
        }
        //约课列表
        if(!empty($arr['from'])){
            $sql = "SELECT ks.id yid,ks.*,o.*,m.rname real_name,m.user_pic id_front FROM bd_teacher_ks ks JOIN bd_jjbm_order o ON ks.kid=o.id JOIN bd_memberfields m ON o.suid=m.uid WHERE ".$condition;
        }else{
            $sql = "SELECT ks.id yid,ks.*,o.*,a.real_name,a.id_front FROM bd_teacher_ks ks JOIN bd_jjbm_order o ON ks.kid=o.id JOIN bd_authentication a ON o.tuid=a.uid WHERE ".$condition;
        }
        $data = M()->query($sql);

        //查询本月课程表UNIX_TIMESTAMP
        $from = $arr['from']?"tuid=".$uid:"stid=".$uid;
        $month = date("Y-m",time()); $days = date("t",time());
        $f_day = strtotime($month."-01");
        $l_day = strtotime($month."-".$days);
        $schedule = M("Teacher_ks")->where($from." and k_confirm=1 and unix_timestamp(date) between $f_day and $l_day ")->field("distinct(date)")->select();

        //各状态总数
        $from1 = $arr['from']?"ks.tuid=".$uid:"ks.stid=".$uid;
        $sql1 = "SELECT COUNT(un.id) un,COUNT(w.id) w ,COUNT(con.id) con FROM bd_teacher_ks ks LEFT JOIN bd_teacher_ks un ON ks.id=un.id AND un.k_confirm=0 LEFT JOIN bd_teacher_ks w ON ks.id=w.id AND w.k_confirm=1 AND w.k_status=0 AND w.end_time>UNIX_TIMESTAMP() LEFT JOIN bd_teacher_ks con ON ks.id=con.id AND con.k_confirm=1 AND con.k_status=0 AND con.end_time<UNIX_TIMESTAMP() WHERE ".$from1;
        $sum = M()->query($sql1); 

        $this->assign(array('calendar'=>$calendar,'data'=>$data,'schedule'=>$schedule,'sum'=>$sum[0]));
        $this->display();
      }    
    }

    //学生约课平台教师
    public function yueke(){
      if(!empty($_POST)){
        $arr = $this->getData(array('kid','tuid','k_addr','k_msg'),'post');
        $stid = session('uid');
        $kid = $arr['kid'];
        $tuid = $arr['tuid'];
        $k_addr = $arr['k_addr'];
        $k_msg = $arr['k_msg'];
      /*=============================*/  
        $cuid = $stid;

        $ctime = $_SERVER['REQUEST_TIME'];
        $classhour = $_POST['classhour'];
        $begin_time = $_POST['begin_time'];
        $date = $_POST['date'];
        $end_time = strtotime($date[1]." ".((int)$begin_time[1]+$classhour[1]).":00");

        //验证总课时
        $len = count($classhour);
        $sum = array_sum($classhour);
        $dhour = M()->query("SELECT o.hour,SUM(k.classhour) yhour FROM bd_jjbm_order o LEFT JOIN bd_teacher_ks k ON o.id=k.kid WHERE o.id=".$kid);

        $sum1 = $dhour[0]['hour']-(int)$dhour[0]['yhour'];
        if($sum > $sum1){ //提交总课时大于有效课时
          $this->pagego('','操作有误，请重试',null,'');
        }else{
          $sql = "INSERT INTO `bd_teacher_ks`(`kid`,`stid`,`tuid`,`classhour`,`begin_time`,`date`,`cuid`,`ctime`,`k_addr`,`k_msg`,`end_time`) VALUES($kid,$stid,$tuid,$classhour[1],'{$begin_time[1]}','{$date[1]}',$cuid,$ctime,'{$k_addr}','{$k_msg}',$end_time)";
          for($i=2;$i<=$len;$i++){
            $end_time = strtotime($date[$i]." ".((int)$begin_time[$i]+$classhour[$i]).":00:00");
            $sql .= ",($kid,$stid,$tuid,$classhour[$i],'{$begin_time[$i]}','{$date[$i]}',$cuid,$ctime,'{$k_addr}','{$k_msg}',$end_time)";
          }

          $res = M()->execute($sql);
          $this->pagego('约课成功，等待对方确认','约课失败，请重试',$res,'');
        }
      }else{
        import("Com.Calendar");
        $calendar = Calendar::showCalendar();
        $calendar['table'] = str_replace('星期','周',$calendar['table']);

        $arr= $this->getData(array('id'),'get');
        $id = (int)$arr['id'];
        $suid = session('uid');

        $sql = "SELECT o.id,o.course_id,o.tuid,o.course,o.hour,o.address,o.place,a.real_name,a.id_front FROM bd_jjbm_order o JOIN bd_authentication a ON o.tuid=a.uid WHERE suid=$suid AND o.id=$id";
        $data = M()->query($sql);

        //可预约课时
        $dhour = M()->query("SELECT o.hour,SUM(k.classhour) yhour FROM bd_jjbm_order o LEFT JOIN bd_teacher_ks k ON o.id=k.kid WHERE o.id=".$id);
        $k_sum = $dhour[0]['hour']-(int)$dhour[0]['yhour'];

        $this->assign(array('data'=>$data[0],'calendar'=>$calendar,'k_sum'=>$k_sum));
        $this->display();
      }
    }


}