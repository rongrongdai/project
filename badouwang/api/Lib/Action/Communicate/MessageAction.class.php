<?php
//消息控制器
class MessageAction extends CommonAction{
    //发送消息（普通消息，群消息）
    public function sendMessage(){
        $param=$this->getData(array('content','content_pic','fuid','type','to_uid'), 'post');
        if($param['content'] && $param['content_pic'] && $param['fuid'] && $param['type']){
            $param['timestamp']=time();
            $res=M('User_message')->add($param);
            $this->ajaxr($res, '发送消息成功','发送消息失败');
        }else{
            $this->errorkey($param,array('to_uid'));
        }
    }
    //接收好友消息
    public function getMessages(){
        $param=$this->getData(array('uid','cpage','pagesize'), 'get');
        if($param['uid']){
            $limit=$this->initLimit($param);
            $msql="select content,content_pic,timestamp,fname,fpic,id from bd_user_message where to_uid in (select uid from bd_user_follow where fid=$param[uid] and is_read=0 and type=1 limit $limit[0],$limit[1]";
            $res=M('User_message')->query($msql);
            $rid='';
            foreach($res as $key=>$val){
                $rid.=$val['id'].',';
            }
            M('User_message')->where("id in($rid)")->setField('is_read',1);
            $this->ajaxr(true, '', '',$res);
        }else{
            $this->errorkey($param);
        }
    }
    //接收群消息
    public function getGMessages(){
        $param=$this->getData(array('uid','gid','cpage','pagesize'), 'get');
        if($param['uid'] && $param['gid']){
            $limit=$this->initLimit($param);
            $msql="select content,content_pic,timestamp,fname,fpic,id from bd_user_message where to_uid in (select uid from bd_user_follow where fid=$param[uid] and is_read=0 and type=2 and gid='$param[gid]' limit $limit[0],$limit[1]";
            $res=M('User_message')->query($msql);
            $rid='';
            foreach($res as $key=>$val){
                $rid.=$val['id'].',';
            }
            M('User_message')->where("id in($rid)")->setField('is_read',1);
            $this->ajaxr(true, '', '',$res);
        }else{
            $this->errorkey($param);
        }
    }
}

