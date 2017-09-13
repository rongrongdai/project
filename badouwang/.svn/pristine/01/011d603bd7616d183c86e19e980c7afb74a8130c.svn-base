<?php
/**
 * 邮件操作类
 * @author 樊波
 */
include 'class.phpmailer.php';
class Mail{
    private $mail;
    private $body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
                    <html>
                    <head>
                    <title>八斗网-邮件中心</title>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <style>
                        <{style}>
                    </style>
                    </head>
                    <body>
                    <p><{body}></p>
                    </body>
                    </html>';
   
    public function Instance($user,$pwd,$host,$from,$fname,$to,$tname)
    {
        $this->mail = new PHPMailer(true);
        $this->mail->CharSet = 'utf-8';                  // 设置编码
        $this->mail->IsSMTP();                           // tell the class to use SMTP
        //$mail->IsMail();                               // tell the class to use MAIL
        $this->mail->SMTPAuth   = true;                  // enable SMTP authentication
        $this->mail->Port       = 25;                    // set the SMTP server port
        $this->mail->Host       = $host;                 // SMTP server
        $this->mail->Username   = $user;                 // SMTP server username
        $this->mail->Password   = $pwd;                 // SMTP server password
        $this->MFrom($from);
        $this->MFromName($fname);
        $this->mTo($to, $tname);
    }
    public function  mFrom($from)
    {
        
        $this->mail->From = $from;
    }
   
   
    public function mFromName($name)
    {
        $this->mail->FromName = $name;
    }
   
   
    public function mTo($to,$name)
    {
        if($to) $this->mail->AddAddress($to,$name);
        else die('mail error : 收件人不能为空');
    }
    public function mSubject($subject)
    {
        $this->mail->Subject = $subject;
    }
   
   
    public function mAttachment($attachment,$attachmentName = '')
    {
        if(file_exists(iconv("UTF-8", "GB2312", $attachment))){
            if(!$attachmentName){
                $arr = explode('/',$attachment);
                $attachmentName = $arr[count($arr) - 1];
            }
            $this->mail->AddAttachment(iconv("UTF-8", "GB2312", $attachment),$attachmentName);
        }
        else die('mail error : 附件不存在');
    }
   
   
    public function mBody($body,$style='')
    {
        if($body) {
            $this->body = str_replace('<{body}>',$body,$this->body);
            if($style){
                $this->body = str_replace('<{style}>',$style,$this->body);
                
            }
            $this->body = preg_replace('/\\\\/','', $this->body); //Strip backslashes
        }
        else{ 
            die('mail error : 邮件内容不能为空');
        }
    }
   
   
    public function mSend()
    {
        try{
            $this->mail->MsgHTML($this->body);
            $this->mail->IsHTML(true);
            $this->mail->Send();
            return true;
        }
        catch (phpmailerException $e){
            die($e->errorMessage());
        }
    }
    //发送邮件方法
    //content 内容 style样式，subject主题，to 收件人，toname收件人姓名可设置 atach为附件可以设置
    public static function sendMail($content,$style,$subject,$to,$toname='',$attach=null){
        $mail = new mail();
        if(!$style){
            $style=self::$style;
        }
        $content=self::$htemplate.$content.self::$ftemplate;
        $mail->Instance(C('MAIL_USER'),C('MAIL_PASSWORD'),C('MAIL_URL'),C('MAIL_ADD'),C('MAIL_FROM'),$to,$toname);
        $mail->mBody($content,$style);
        if($attach){
            $mail->mAttachment($attach['path'], $attach['name']);
        }
        //设置主题
        $mail->mSubject($subject);
        return $mail->mSend();
    }
    private static $htemplate='
        <body>
       <div class="emailall">
       <div class="em-top">
            <div class="top-img"><img src="http://www.zhou20.com/public/images/home/logo1.png" /></div>
            <div class="top-p"><p>八斗网<span>"一切为了学习，创新未来教育"
            www.baoue.com</span></p></div>
       </div>
       <div class="em-conne">';
    private static $ftemplate=' 
            <hr />
            <div class="em-conneer">
            <p>如果你并未发过此请求，可能是因为其他用户在重置密码时而误输入了你的邮箱地址而使你收到了这封邮件，你可以放心忽略此封邮件，无需进行任何操作。</p></div>
            <hr />
            <div class="em-connes">
            <p>如有任何问题，可以与我们联系，我们将尽快为你解答。</p> 
            <p>Email：kefu@bsxkj.com ，QQ:397595720</p>
            </div>
            <div class="em-connew">
            <p>为保证邮箱正常接收，请将<a href="kefu@bsxkj.com">kefu@bsxkj.com</a>添加进你的通讯录</p>
            </div>
            </div>
            </div>
        </body>';
    private static $style='
                @charset "utf-8";
                /* CSS Document */
                #allwang{ width:500px; height:400px; margin:0px auto;}
                #allqbu{ width:500px; height:380px; border-radius:15px; border:1px solid #CCC; background-color:#EEE;}
                #allone{ width:500px; height:30px; background-color:#36F; border-radius:15px;  padding:10px 0px; }
                #allone p{ color:#FFF; font-size:14px; padding:0px 250px 0px; width:40px;}
                #alltwo{ width:500px; height:270px;}
                #alltree{width:500px; height:60px; background-color:#AAA; border-radius:15px;}

                /*找回密码-邮箱*/
                .emailall{ margin:0px auto; width:640px; height:100%;}
                .em-top{ width:640px; margin:10px 0px 0px 0px; background-color:#35a841; height:76px; clear:both;}
                .top-img{ width:70px; float:left; margin:10px 0px 0px 10px;}
                .top-p{ width:355px; float:left;  font-size:24px; color:#FFF; margin:-10px 0px 0px 0px;}
                .top-p span{ font-size:18px;}
                .em-conne{ width:640px;} 
                .em-conneyi{ width:340px;  margin:40px 0px 0px 40px; font-family:"lucida Grande",Verdana,"Microsoft YaHei"; font-size:12px; color:#555; line-height:34px;}
                .em-conneyi span,
                .em-conneyi a{ color:#35a841; }

                .em-conneer p{color:#c5c5c5; font-size:12px; line-height:20px;}
                .em-connes p{ color:#555; font-size:16px; line-height:10px;}

                .em-connew{ margin:40px 0px 40px 130px;}
                .em-connew p{font-family: "lucida Grande",Verdana,"Microsoft YaHei"; font-size:14px; color: #555;}
                .em-connew a{ color:#35a841; }';
    }
?>




