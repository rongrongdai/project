<?php
/**
 * 
 *
 * @author fanbo
 */
class CommonAction extends Action{
    //初始化
    protected function getp(){
        return substr(__ACTION__, 0,  strpos(__ACTION__, 'admin.php')+9);
    }
    protected function _initialize(){
        $info=__SELF__;
        if(strpos($info,'?')){
            $info =  substr($info, 0,  strpos($info,'?'));
        }
        $method=  substr($info, strripos($info, '/')+1);
        if($method!='login' && $method!='logImg'){
            if(!cookie('linfo')){
               $this->redirect('/Index/Index/login');
            }
        }
        if(cookie('linfo')){
            //失效判断
            import('Com.PasswordHelper');
            $linfo=PasswordHelper::adecrypt(cookie('linfo'), C('SERCRET_KEY'));
            $alinfo= explode(',',$linfo);
            if(time()-(int)$alinfo[0]>((int)C("L_EXPIRE"))*60){
                cookie('linfo',null);
                $this->error('用户已过期,请重新登录',$this->getp().'/Index/Index/logout');
                
            }else{
                $slinfo=  PasswordHelper::aencrypt(time().','.$alinfo[1], C('SERCRET_KEY'));
                cookie('linfo',$slinfo);
            }
        }
        import("Com.PasswordHelper");
    }
    //批量添加数据
    protected function assignData($data,$type){
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
    //初始化分页
    protected function initPage(){
        $page=$this->getData(array('page'), 'get');
        if(!$page['page']){
            $page['page']=1;
        }
        return $page;
    }
    //增加,修改页面
    protected function entity(){
        $this->display('Public:page:entity');
    }
    //为实体页面准备数据
        protected function preEntity($id,$model,$ename,&$positon,$action,$data,$options=''){
        import("Com.FormHelper");
        $form=array();
        $hidden=array();
        $isEdit=false;
        if($id){
            $entity=$model->where("id='$id'")->find();
            foreach($model->_form as $key=>$val){
                   $form[$key]=array('info'=>$val[1],'html'=>  FormHelper::getInput($val[0], $key,'', $entity[$key],$options));
                   if($val[0]==='hidden'){
                       $nkey=substr($key,1);
                       $hidden[]=FormHelper::getInput($val[0], $key,'', $entity[$nkey],$options);
                       unset($form[$key]);
                   } 
            }
            $positon.=' >编辑'.$ename;
            $isEdit=true;
        }else{
              foreach($model->_form as $key=>$val){
                  if(!$data){
                      $form[$key]=array('info'=>$val[1],'html'=>  FormHelper::getInput($val[0], $key,'','',$options));
                  }else{
                      if(in_array($key,  array_keys($data))){
                           $form[$key]=array('info'=>$val[1],'html'=>  FormHelper::getInput($val[0], $key,'',$data[$key],$options));
                      }else{
                           $form[$key]=array('info'=>$val[1],'html'=>  FormHelper::getInput($val[0], $key,'','',$options));
                      }
                  }
                  if($val[0]==='hidden'){
                       $nkey=substr($key,1);
                       $hidden[]=FormHelper::getInput($val[0], $key,'', $entity[$nkey],$options);
                       unset($form[$key]);
                  }
                 
            }
            $positon.=' >新建'.$ename;
        }
        $this->assign(array('form'=>$form,'position'=>$positon,'mmenu'=>'网站配置','smenu'=>'分类设置','entity'=>'配置','edit'=>$isEdit,'action'=>$action,'hiddens'=>$hidden),'assign');
        //校验数据指定
        $null_check='';
        $null_info='';
        $email_check='';
        $spec_check='';
        foreach($model->_form as $key=>$val){
            foreach($val[2] as $k=>$v){
               if($k=='null'){
                   if($isEdit){
                     if(!strpos($key,'img')){
                         $null_check.=$key.',';
                         $null_info.=$v.',';
                     }  
                   }else{
                        $null_check.=$key.',';
                        $null_info.=$v.',';
                   }
               }elseif($k=='email'){
                   $email_check.=$key.',';
               }elseif($k=='spec'){
                   $spec_check.=$key.',';
               }
            }
        }
        $null_check=  substr($null_check,0,  strlen($null_check)-1);
        $null_info=  substr($null_info,0,  strlen($null_info)-1);
        $email_check=substr($email_check,0,  strlen($email_check)-1);
        $spec_check=substr($spec_check,0,  strlen($spec_check)-1);
        $this->assign(array('null'=>$null_check,'null_info'=>$null_info,'email'=>$email_check,'spec'=>$spec_check));
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
     protected  function ajaxr($res,$smess,$fmess){
        if($res){
            echo json_encode(array('code'=>1,'message'=>$smess));return;
        }else{
            echo json_encode(array('code'=>0,'message'=>$fmess));return;
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

    //上传图片
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

    
}


