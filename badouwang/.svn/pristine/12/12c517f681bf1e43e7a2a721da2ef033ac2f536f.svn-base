<?php
//好友控制器
class FriendAction extends CommonAction{
    //获取附近好友
    //获取培训机构
    //获取家教
    public function getPerson(){
        $param=$this->getData(array('uid','cpage','pagesize','type'), 'get');
        if($param['type']){
            $param['type']=1;
        }
        if($param['uid']){
            $this->initLimit($param);
            $usql="select fd.user_pic,fd.rname,fd.lab form bd_user u left join bd_memberfields fd on fd.uid=u.uid where user.uid <> $param[uid] and type='$param[type]' limit $limit[0],$limit[1]";
            $this->ajaxr(1, '', '',M()->query($usql));
        }else{
            $this->errorkey($param);
        }
        
    }
    //获取好友列表
    public function getFriends(){
        $param=$this->getData(array('cpage','uid','pagesize'),'get');
        if($param['uid']){
            $limit=$this->initLimit($param);
            $fsql="select fields. from bd_user_follow fw left join bd_memberfields fd on fd.uid=fw.uid where fw.fid=$param[uid]  limit $limit[0],$limit[1]";
            $this->ajaxr(1, '', '',M()->query($fsql));
        }else{
            $this->errorkey($param,array('cpage','pagesize'));
        }
        
    }
    //关注
    public function follow(){
        $param=$this->getData(array('uid','fid'), 'post');
        if($param['uid'] && $param['fid']){
            $param['ctime']=time();
            $res=M('User_follow')->add($param);
            $this->ajaxr($res, '关注成功','关注失败');
        }else{
            $this->errorkey($param);
        }
    }
   
}

