<?php

/* 
 * 
 */
class LogAction extends CommonAction{
    //日志首页
    public function index(){
        $type=$this->getData(array('type','etime','stime'), 'get');
        if(!$type['type']){
            $type['type']=3;
        }
        if($type['etime']){
            $type['etime']=  strtotime($type['etime']);
            $type['stime']=  strtotime($type['stime']);
        }
        $page=$this->initPage();
        import("Com.PageHelper");
        $pagesize=1;
        $where="type=$type[type]";
        if($type['etime']){
            $where .=" and timestamp>$type[stime] and timestamp<$type[etime]";
        }
        $sum=M("Hand_log")->where($where)->count();
        PageHelper::init($pagesize, 10,$page['page'], $sum,'');
        $min=  PageHelper::getLimit();
        $logs=M('Hand_log')->where($where)->limit($min['min'],$pagesize)->select();
        $this->assign(array('logs'=>$logs,'pages'=>  PageHelper::getPageInfos(),'type'=>$type['type']));
        $this->display();
    }
}
