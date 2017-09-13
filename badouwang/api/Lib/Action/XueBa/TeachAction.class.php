<?php
//家教信息控制器
class TeachAction extends CommonAction{
    //获取家教列表
    public function getTeachs(){
        $param=$this->getData(array('cpage','pagesize','cid'), 'get');
        if($param['cid']){
            $limit=$this->initLimit($param);
            $this->ajaxr(true, '', '',M('Teach')->where("fid='$param[cid]'")->limit($limit[0],$limit[1]));
        }else{
            $this->ajaxr(false, '', '参数cid不正确');
        }
    }
    //收藏家教
    public function tCollect(){
        $param=$this->getData(array('aid','uid'), 'post');
        if($param['aid'] && $param['uid']){
            $param['type']=1;$param['c_timestamp']=time();
            $res=M('Collection')->add($param);
            $this->ajaxr($res, '收藏成功', '收藏失败');
        }else{
            $this->errorkey($param);
        }
    }
    //家教报名
    public function inclass(){
        $param=$this->getData(array('tid','uid','address','place','phone'), 'post');
        if($param['tid'] && $param['uid'] && $param['address'] && $param['place'] && $param['phone']){
           $teach=M('Teach')->where("id='$param[tid]'")->field('uid,title,id,price')->find();
            $field=  array_merge($param,$teach);
            $res= M('jjbm_order')->add($field);
            $this->ajaxr($res, '报名成功','报名失败');
        }else{
            $this->errorkey($param);
        }
        
    }
    //获取机构信息
    //获取感兴趣家教
    public function getIteachs(){
        
    }
    //发布需求
    public function addSpred(){
        $param=$this->getData(array('address','cid','content','mobile','uid','city'), 'post');
        if($param['city'] && $param['address'] && $param['cid']  && $param['content'] && $param['uid'] && $param['mobile']){
           $param['user_ip']=$_SERVER['REMOTE_ADDR'];
            $res=M('Teacher_hunt')->add($param);
            $this->ajaxr($res,'发布成功','发布失败');
        }else{
            $this->errorkey($param);
        }
    }
    
}

