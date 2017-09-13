<?php
//动态控制器
class DynamicAction extends CommonAction{
    //获取我的动态
    public function getMDynamic(){
        $param=$this->getData(array('uid','cpage','pagesize'), 'get');
        if($param['uid']){
            $limit=$this->initLimit($param);
            $dql="select dy.content,publisttime,dy.contentpic,dy.publisttime,fi.rname,fi.user_pic from bd_dynamic dy left join bd_memberfields fi on fi.uid=dy.uid order by dy.publisttime desc where dy.uid=$param[uid] limit $limit[0],$limit[1]";
            $dymics=M('Dynamic')->query($dql);
            $this->ajaxr(true, '', '',$dymics);
        }else{
            $this->ajaxr(false,'','参数uid不正确');
        }  
    }
    //获取好友动态
    public function getFDynamic(){
        $param=$this->getData(array('uid','cpage','pagesize'), 'get');
        if($param['uid']){
            $limit=$this->initLimit($param);
            $dql="select dy.content,publisttime,dy.contentpic,dy.publisttime,fi.rname,fi.user_pic from bd_dynamic dy left join bd_memberfields fi on fi.uid=dy.uid order by dy.publisttime desc where dy.uid in(select uid from user_follow where fid='$param[uid]') limit $limit[0],$limit[1]";
            $dymics=M('Dynamic')->query($dql);
            $this->ajaxr(true, '', '',$dymics);
        }else{
            $this->ajaxr(false,'','参数uid不正确');
        }  
    }
    //发布动态
    public function addSpred(){
        $param=$this->getData(array('content','content_pic','uid'),'post');
        if($param['uid'] && $param['content']){
            if($param['content_pic']){
                $param['type']=1;
            }else{
                $param['type']=2;
            }
            $param['publisttime']=time();
            $res=M('Dynamic')->add($param);
            $this->ajaxr($res, '', '发布失败',$param);
        }else{
            $this->errorkey($param,array('content_pic'));
        }
            
    }
    //评论动态
    public function comment(){
        $param=$this->getData(array('uid','aid','content'), 'post');
        if($param['uid'] && $param['aid'] && $param['content']){
            $param['com_timestamp']=time();
            $res=M('Comment')->add($param);
            $this->ajaxr($res, '', '评论失败',$res);
        }else{
            $this->errorkey($param);
        }
    }
    //赞动态
    public function gDynamic(){
         $param=$this->getData(array('uid','aid'), 'post');
          if($param['uid'] && $param['aid']){
              $res=M('Dynamic')->where("id='$param[aid]'")->setInc('goodnumber',1);
              $this->ajaxr($res, '点赞成功','点赞失败');
          }else{
              $this->errorkey($param);
          }
    }
    //分享动态
    public function sDynamic(){
        $param=$this->getData(array('uid','aid'), 'post');
        if($param['uid'] && $param['aid'] && $param['content']){
              $dynamic=M('Dynamic')->where("id='$param[aid]'")->find();
              $dynamic['transid']=$dynamic[id];unset($dynamic['id']);$dynamic['uid']=$param['uid'];
              $res=M('Dynamic')->add($dynamic);
              $this->ajaxr($res, '', '',$dynamic);
        }else{
            $this->errorkey($param);
        }
    }
}

