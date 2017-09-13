<?php
//课程控制器
class CourseAction extends CommonAction{
    //获取优惠课程
    public function getDcourse(){
        $param=$this->getData(array('cpage','pagesize'), 'get');
        $limit=$this->initLimit($param);
        $course=M('Organ_spred')->where("d_price >0 and d_price<price")->order('timestamp desc')->limit($limit[0],$limit[1])->selsect();
        $this->ajaxr(true, '', '',$course);
    }
    //报名优惠课程
    public function inClass(){
        $id=$this->getData(array('cid','uid'),'get');
        $uid=session('uid');
        if($uid && $id){
            $dsql="select spred.d_price,spred.uid tuid,ifnull(spred.d_price,spred.price) money,spred.id course_id,ifnull(pro.cname,course.aname)course,spred.address from bd_organ_spred spred left join bd_proxyermanage pro on spred.cid=pro.id left join bd_course course on course.id=spred.cid where spred.id='$id[cid]'";
            $res=M('')->query($dsql);
            if($res[0]['d_price']>0){
                unset($res[0]['d_price']);
                $data=$res[0];
                $data['type']=2;$data['suid']=session('uid');$data['bm_time']=$_SERVER['REQUEST_TIME'];$data['msg']='';
                $data['order_num']='828'.str_shuffle($_SERVER['REQUEST_TIME']).mt_rand(100,999);$data['place']='';
                $data['stu_name']=session('uname');
                $res = M("Jjbm_order")->data($data)->add();
                $this->ajaxr($res, '报名成功','报名失败');
            }
            exit();
        }else{
            $this->errorkey($id);
        }
    }
    //收藏课程
    public function Cclloet(){
       $param=$this->getData(array('cid','uid'),'get'); 
       if($param['cid'] && $param['uid']){
           $param['type']=2;$param['aid']=$param['cid'];$param['c_timestamp']=time();unset($param['cid']);
           $res=M('Collect')->add($param);
           $this->ajaxr($res, '收藏成功','收藏失败');
       }else{
           $this->errorkey($param);
       }
    }
    //分享课程
    //获取优秀课程
    public function getGcourse(){
        $param=$this->getData(array('cpage','pagesize'), 'get');
        $limit=$this->initLimit($param);
        $course=M('Organ_spred')->where("d_price >0 and d_price<price")->order('pin_rate desc')->limit($limit[0],$limit[1])->selsect();
        $this->ajaxr(true, '', '',$course);
    }
}

