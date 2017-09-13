<?php

/**
 * 公用方法
 *
 * @author 樊波
 */
class CommonAction extends Action{
    protected function getp(){
        return substr(__ACTION__, 0,  strpos(__ACTION__, 'index.php')+9);
    }
    public function _empty(){
        $uinf= explode('/',__INFO__);
        if(!$uinf[0]==='Index' || !$uinf[0]==='User'){
            if($_SERVER['HTTP_REFERER']){
                /*$this->redirect($this->getp().'/Index/Index/pempty',array('error'=>'访问操作不存在！','ref'=>$_SERVER['HTTP_REFERER']));*/ 
                $this->redirect(U('/Index/Index/pempty'),array('error'=>'访问操作不存在！','ref'=>$_SERVER['HTTP_REFERER'])); 
            }else{
                /*$this->redirect($this->getp().'/Index/Index/pempty',array('error'=>'访问操作不存在！'));*/ 
                $this->redirect(U('/Index/Index/pempty'),array('error'=>'访问操作不存在！')); 
            }
        }else{
            $this->display();
        }
    }
    //批量添加数据
    public function _initialize(){
        import('Com.StringHelper');
        $GLOBALS['city']=  iconv('GBK','UTF-8',StringHelper::unescape($_COOKIE['city']));
        $nlogin=(C('NO_LOGIN'));
        $uarr=  explode('/',__INFO__);
        if(!$uarr[2]){
            $uarr=explode('/','index.php/Index/Index/index');
        }
        if(!$uarr[3]){
            $uarr[3]='index';
        }
        $uid=session('uid');
        if($uid){
          $ubasic=M('Memberfields')->where("uid='$uid'")->field('user_pic,lab,rname')->find();
          if(!$ubasic['rname'] && !strpos(__INFO__, 'zhuce') && !strpos(__INFO__, 'zhucy')){
               if($ubasic['user_pic'] && $ubasic['lab']){
                    $this->redirect("User/User/zhucy");
                }else{
                    $this->redirect("User/User/zhuce");
                }
          }
        }
        $nurl=$nlogin[$uarr[2]];
        if($nurl){
             if(is_array($nurl)){
                if(!in_array($uarr[3], $nurl)){
                    if(!session('uid')){
                        /*$this->error('请先登录！',$this->getp().'/User/User/login');*/
                        $this->error('请先登录！',U('/User/User/login'));
                    }
                }
            }else{
               if(strpos($nurl,'ot')){
                   $nurl=trim(str_replace('not', '', $nurl));
                   if($uarr[3]===$nurl){
                       if(!session('uid')){
                        /*$this->error('请先登录！',$this->getp().'/User/User/login');*/
                        $this->error('请先登录！',U('/User/User/login'));
                       }
                   }
               }
            }
        }else{
            if(!session('uid')){
               $this->error('请先登录！','/User/User/login');
            }
        }
        if(session('quser') || session('wuser')){
            if(strpos(__INFO__,'bind')===-1){
                $this->redirect('/User/User/bind');
            }
        }   
        //登录限制
        if(!cookie('handtime')){
            cookie('handtime',time());
        }else{
            if(time()-cookie('handtime')>60*60 && session('uid') && !strpos(__INFO__, 'logout')){
                cookie('handtime',time());
                $this->redirect('/User/User/logout');
            }else{
                cookie('handtime',time());
            }  
        }
        //获取开通城市
        $cql="select city.id,city.name,pro.name pname from bd_city city left join bd_province pro on city.provincei_d=pro.id where city.isopen=1";
        $citys=M('City')->query($cql);
        foreach($citys as $key=>$val){
            if(strpos($val['name'],'市')){
                $citys[$key]['name']=  str_replace('市','',$val['name']);
            }
        }
        import('Com.ArrayHelper');
        $ocitys=ArrayHelper::sortcity($citys);
        $this->assign('cities',$citys);
        $this->assign('ocitys',$ocitys);
        $uid = session('uid');
        if(!cookie('cid')){
            $this->getcid($uid);
        }
        if($uid){
          $type=M('User')->Where("uid='$uid'")->field('type')->find();
          $mCount = M('Message')->where("to_uid=$uid and is_read=0 and type=1")->count();
          $tCount = M('Message')->where("to_uid=$uid and is_read=0 and type=3")->count();
          $cCount = M('Message')->where("to_uid=$uid and is_read=0 and type=2")->count();
          $dCount= M('Message')->where("to_uid=$uid and is_read=0 and type=4")->count();
          
          if($type['type']==='1'){
              $sCount+=$mCount;
          }else if($type['type']==='2'){
              $sCount+=$mCount+$tCount;
          }else if($type['type'] ==='3'){
               $sCount+=$mCount+$cCount;
          }else if($type['type']==='4'){
              $sCount+=($mCount+$tCount+$cCount+$dCount);
          }
          
          $this->assignData(array('mCount'=>$mCount,'tCount'=>$tCount,'cCount'=>$cCount,'dcount'=>$dCount,'sumcount'=>$sCount,'utype'=>$type['type']),'assign');
         }
         
    }
    private function getcid($uid){
        $carr=M('Memberfields')->Where("uid='$uid'")->field('address')->find();
        $cstr=explode('-',$carr['address']); 
        $city=M('city')->where("name='$cstr[1]' and isopen=1")->field('id,isopen')->find();
        if($city['id']){
            $this->assign('cityid',$city['id']);
            cookie('cid',$city['id']);
        }else{
             $city=M('city')->where("name='深圳市' and isopen=1")->field('id,isopen')->find();
             $this->assign('cityid',$city['id']);
             cookie('cid',$city['id']);
        }
    }
    public function assignData($data,$type){
        foreach($data as $key=>$val){
            switch($type){
                case 'assign':
                    $this->assign($key,$val);
                    break;
                case 'cookie':
                    cookie($key,$val);
                    break;
                case 'session':
                    session($key,$val);
                    break;
            }
            
        }
    }
    protected function handStatus($model,$url){
        $id=$this->getData(array('id'),'get');
        if($id['id']){
            $message= $model->where("id='$id[id]'")->field('id,status')->find();
            if($message){
                $stats=$message['status']==1?0:1;
                $smess=$message['status']==1?'取消发布成功':'恢复成功';
                $fmess=$message['status']==1?'取消发布失败':'恢复失败';
                $res=$model->where("id='$id[id]'")->setField('status',$stats);
                $this->pagego($smess, $fmess, $res,$url);
            }
        }else{
            $this->error('非法操作！');
        }
    }
    protected function handUimg($field,$handler=false){
               import("Com.FileHelper");
               $dir=  FileHelper::getUploadFileDir();
               $limit=(int)C('IMG_LIMIT_SIZE')*1024;
               $extend=substr($_FILES[$field]['name'],  strripos($_FILES[$field]['name'],'.'));
               $uploadfile=$dir.'/'.time().rand(1, 100).$extend;
                if(!$handler){
                    $handler=new ImageHandler();
                }
               return FileHelper::saveFile($uploadfile,$field, array('extension'=>array('jpg','png','gif'),'size'=>$limit), new ImageHandler());
    }
    //跳转处理
      protected function pagego($smessage,$fmessage,$res,$url){
          if($res){
              $this->success($smessage,$url);
          }else{
              $this->error($fmessage,$url);
          }
      }
      //获取页面数据
      protected function getData($fields,$type){
              $data=array();
              if($type=="post"){
                  foreach($fields as $key=>$val){
                     $data[$val]=trim($_POST[$val]);
                  }
              }elseif($type=='get'){
                  foreach($fields as $key=>$val){
                      $data[$val]=trim($_GET[$val]);
                   }
              }elseif($type="session"){
                  foreach ($fields as $key=>$val){
                      $data[$val]=trim(session($val));
                  }
              }
              return $data;
      }
      //初始化分页
    protected function initPage(){
        $page=$this->getData(array('page'), 'get');
        if(!$page['page']){
            $page['page']=1;
        }
        return $page;
    }
      //获取分页数据
      /*
       * model 模型类 where 总数条件 sumsql 总数查询语句；
       */
      protected function getPageData($model,$where,$sql,$page,$transdate=true,$sumql=''){
            $res=array();
            if($sumql){
                $rs=$model->query($sumql);
                $res['sum']=$rs[0]['sum'];
            }else{
                 $res['sum']=$model->where($where)->count();
            }
            $pagecount=10;
            $res['ppage']=$pagecount;
            $res['pages']=ceil($res['sum']/$pagecount);
            $min=($page['page']-1)*$pagecount;
            $qsql="$sql limit $min,$pagecount";
            import('Com.ClassfiyHelper');
            $datas=$model->query($qsql);
            foreach($datas as $key=>$val){
                if($transdate){
                   foreach($val as $k=>$v){
                        if(strpos($k, 'ime') && $v){
                            $datas[$key][$k]=date('Y-m-d',$v);
                        }
                    } 
                }
                if($val['cid']){
                    $srr=ClassfiyHelper::selfInfo('',M('Classfiy'),$val['cid']);
                    $datas[$key]['cid']=$srr['name'];
                }
                if($val['fid']){
                    $srr=ClassfiyHelper::selfInfo('',M('Classfiy'),$val['fid']);
                     $datas[$key]['fid']=$srr['name'];
                }
            }
            if($datas){
                $res['entities']=$datas;
                $res['code']=1;
            }else{
                $res['code']=0;
            }
            return $res;
      }
      //防止表单重复提交
      protected  function f_check($field){
          if($_POST[$field]===session('ftoken').''){
              return true;
          }else{
              return false;
          }
      }
      //获取时间
    protected function getTime($arr){
        foreach ($arr as $key=>$val){
            if(strpos($key, 'time')){
                $arr[$key]=  strtotime($val);
            }
        }
        return $arr;
    }
    //实体页面初始化
    protected function initEntity($model,$where){
            $token=md5(time());
            $data=$model->where($where)->find();
            $this->assign(array('token'=>$token));
            session('ftoken',$token);
            return $data;
    }
    //表单初始化
    protected function initForm(){
            $timestamp=time();
            $token=md5('unique_salt'.$timestamp);
            session('ftoken',$token);
            $this->assignData(array('token'=>$token,'timestamp'=>$timestamp),'assign');
    }
    protected  function ajaxr($res,$smess,$fmess){
        if($res){
            echo json_encode(array('code'=>1,'message'=>$smess));
        }else{
            echo json_encode(array('code'=>0,'message'=>$fmess));
        }
    }
    // 转换编码(cookie)，将Unicode编码转换成可以浏览的utf-8编码
    protected function unicode_decode($name){
        $pattern = '/([\w]+)|(\\\u([\w]{4}))/i';
        preg_match_all($pattern,$name,$matches);
        if (!empty($matches)){
            $name = '';
            for ($j = 0; $j < count($matches[0]); $j++){
                $str = $matches[0][$j];
                if (strpos($str,'\\u') === 0){
                    $code = base_convert(substr($str,2,2),16,10);
                    $code2 = base_convert(substr($str,4),16,10);
                    $c = chr($code).chr($code2);
                    $c = iconv('UCS-2','UTF-8',$c);
                    $name .= $c;
                }else{
                    $name .= $str;
                }
            }
        }
        return $name;
    }

    //计算信息的发布是在多久之前,$sec为分钟,$timestamp发布信息时的时间戳
    protected function beforeDate($sec,$timestamp){
        if($sec < 60){
          $btime = $sec.'分钟前';
        }elseif($sec >= 60){
          $hour = floor($sec/60);
          if($hour < 24){
            $btime = $hour.'小时前';
          }elseif($hour >= 24 && $hour < 72){
            $btime = floor($hour/24).'天前';
          }else{
            $btime = date("m月d日",$timestamp);
          }
        }
        return $btime;
    }

    //经验、学豆处理
    protected function setCredit($c_name,$c_key,$uid){
      //获取经验、学豆的配置值
      $data = M('Config')->where("c_name='{$c_name}' and c_key='{$c_key}'")->field("c_value,c_info")->find();
      $c_value = $data['c_value'];
      $name = $data['c_info'];
      if($c_value){
        switch($c_name){
          case '经验':
              $field = 'u_credit';
              break;
          case '学豆':
              $field = 'vmoney';
              break;    
        }
        $result = M('Memberfields')->where("uid=$uid")->setInc($field,$c_value);
        if($result){//添加消费日志
          $arr = array();
          $arr = array('uid'=>$uid,'type'=>$c_name,'name'=>$name,'val'=>$c_value,'ctime'=>time());
          M('Credit_log')->data($arr)->add();
        }

        return $c_value;
      } 
    }

    //设置分页
    protected function setPage($pagesize,$sum,$sql){
      $arr = $this->getData(array('page'),'get');
      $page = (int)$arr['page'];
      $page = $page<=1?1:$page;
      //加载分页类
      import('Com.PageHelper');
      PageHelper::init($pagesize,10,$page,$sum,'');
      $link = PageHelper::getPageInfos();

      $limit = PageHelper::getLimit();
      $limit = $limit['min'];
      $sql = "$sql limit $limit,$pagesize";
      $data = M()->query($sql);
      return array('data'=>$data,'link'=>$link,'limit'=>$limit);
    }


}