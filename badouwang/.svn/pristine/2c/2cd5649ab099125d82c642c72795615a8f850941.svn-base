<?php

/**
 * 消息获取类
 *
 * @author 樊波
 */
class AjaxMessageAction extends CommonAction{
    public function getMessages(){
        $res=array();
        $page=$this->getData(array('page','type'),'get');
        if(!$page['page']){
           $page['page']=1; 
        }
        $page['page']=(int)$page['page'];
        $model=M('Message');
        if($page['type']){
             $res['sum']=$model->where("type='$type'")->count();
        }else{
             $res['sum']=$model->count();
        }
        $pagecount=10;
        $res['ppage']=$pagecount;
        $res['pages']=ceil($res['sum']/$pagecount);
        
        $uid=session('uid');
        $min=($page['page']-1)*$pagecount;
        $sql="select user.uname,message.id,message.from_uid,message.to_uid,message.type,message.title,message.body,message.ctime,message.is_read from bd_message message left join  bd_user user on message.from_uid=user.uid where message.to_uid='$uid'";
        if($page['type']){
            $sql.=" and message.type='$page[type]'";
        }else{
            $sql.=" and message.type=1";
        }
        $sql.=" limit $min,$pagecount ";
        $messages=$model->query($sql);
        foreach($messages as $key=>$val){
            $messages[$key]['ctime']=date('Y-m-d',$val['ctime']);
            switch($val['type']){
                case '1';
                    $type='系统消息';
                    break;
                case '2';
                    $type='培训咨询';
                    break;
                case '3';
                    $type='家教咨询';
                    break;
            }
            $messages[$key]['type']=$type;
        }
        if($messages){
            $res['messages']=$messages;
            $res['code']=1;
        }else{
            $res['code']=0;
        }
        echo json_encode($res);
    }
    //标记消息已读
    public function read(){
        $id=$this->getData(array('id'), 'get');
        if($id){
            $model=M('message');
            $model->where("id='$id[id]'")->setField('is_read',1);
            $res['code']=1;
            echo json_encode($res);
        }
    }
    //发送消息
    public function sendMessage(){
        $to=$this->getData(array('to','content','type'),'get');
        if($to['to'] && $to['to']===session('uid')){
            echo json_encode(array('code'=>0,'message'=>'不能给自己发送消息！'));
            return;
        }
        if($to['to'] && $to['content'] && $to['type']){
            $res=M('Message')->add(array('from_uid'=>session('uid'),'to_uid'=>$to['to'],'type'=>$to['type'],'title'=>'培训咨询','body'=>$to['content'],'ctime'=>time()));
            $this->ajaxr($res,'咨询成功！','咨询失败');
        }else{
            echo json_encode(array('code'=>0,'message'=>'内容不能为空！'));
        }
    }
    //回复咨询邮件
    public function response(){
        $id=$this->getData(array('id'),'get');
        if($id['id']){
           $tuser=M('')->query("select user.aname from bd_message mess left join bd_user on user.uid=mess.to_uid where mess='$id[id]'");
           if($tuser){
               import('Com.Mail');
               $res=Mail::sendMail('', '', '咨询回复', $tuser['aname'], $tuser['aname']);
               $this->ajaxr($res, '回复邮件成功!','回复邮件失败！');
           }else{
               echo json_decode(array('code'=>0,'message'=>'消息接受者不存在!'));
           }
        }else{
            echo json_decode(array('code'=>0,'message'=>'消息不存在!'));
        }
    }
}
