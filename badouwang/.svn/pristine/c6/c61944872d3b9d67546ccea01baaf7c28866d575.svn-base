<?php

/**
 * 验证工具类
 *
 * @author fanbo
 */
class AjaxAuthcateAction extends CommonAction{
    private $res=array();
    public function __construct() {
        parent::__construct();
    }
    //发送忘记密码
    public function sendFPwdMail(){
        $data=$this->getData(array('email'), 'get');
        if($data['email']){
            if(preg_match('/(\w)+@(\w)+\.(com|org|net)/', $data['email'])){
                $model=M('User');
                $email=$model->where("uname='$data[email]'")->field('uname')->find();
                if($email['uname']===$data['email']){
                    import("Com.Mail");
                    //发送邮件
                    $time=time();
                    $content='<div class="em-conneyi">
                    <p>亲爱的<span> '.$email['uname'].' </span>，你好!</p>
                    <p>八斗已经收到了你的找回密码请求，请点击<a href="'.C('DOMAIN')."/index.php/User/User/fpassword?time=".$time."&email=$email[uname]".'"> 此链接重置密码 </a>。（本链接将在1天后失效）</p>
                    <p>八斗团队</p> 
                     <p>'.date('Y-m-d',time()).'</p>
                    </div>';
                    $res=Mail::sendMail($content,'','找回密码', $email['uname']);
                    $res=true;
                    if($res===true){
                        $model->where("uname='$data[email]'")->setField(array('fpwd_step'=>2,'c_time'=>$time));
                        $this->res['message']='success';
                        $this->res['code']=1;
                    }else{
                        $this->res['message']='发送邮件失败，请重试！';
                        $this->res['code']=0;
                    }
                }else{
                    $this->res['message']='输入注册时使用邮箱！';
                    $this->res['code']=0;
                }
            }else{
                $this->res['message']='邮箱格式不正确！';
                $this->res['code']=0;
                
            }
            
        }else{
            $this->res['message']='邮箱名不能为空';
            $this->res['code']=0;
        }
        echo json_encode($this->res);
    }
}
