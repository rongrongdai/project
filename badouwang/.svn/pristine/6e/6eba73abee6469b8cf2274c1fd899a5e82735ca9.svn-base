<?php
//订单控制器
class OrderAction extends CommonAction{
    //获取订单列表
    public function getOrders(){
        $param=$this->getData(array('uid','type','pagesize','cpage'), 'get');
        if($param['uid']){
            if(!$param['type']){
                $param['type']=0;
            }
            if(!$param['cpage']){
                $param['cpage']=6;
            }
            if(!$param['pagesize']){
                $param['pagesize']=6;
            }
            $limit=array(((int)$param['cpage']-1)*(int)$param['pagesize'],(int)$param['pagesize']);
            $orders=M('Jjbm_order')->where("status='$param[type]' and type in(1,2)")->order('bm_time desc')->limit($limit[0],$limit[1])->select();
            $this->ajaxr(true, '', '',array('orders'=>$orders));
        }else{
            $this->ajaxr(false, '', '参数uid不存在');
        }
    }
    
    //充值成功回调
    public function sorder() {
        $param=$this->getData(array('order_num','uid','status'), 'post');
        if(M('Jjbm_order')->where("uid='$param[uid]' && order_num=order_num")->count()){
            $res=M('Jjbm_order')->where("uid='$param[uid]' && order_num=order_num")->setField('status',$status);
            $this->ajaxr($res, '修改订单成功','修改订单失败 ');
        }
    }
    //获取订单数
    public function getOrderNumber(){
        $param=$this->getData(array('uid'), 'get');
        if($param['uid']){
            $sum=M('Jjbm_order')->where("status=0 and type in(1,2)")->count();
            $this->ajaxr(true, '', '', array('data'=>array('order_num'=>$sum)));
        }else{
            $this->ajaxr(false, '', '参数uid不存在');
        }
    }
    //订单评价
    public function comOrder(){
        $param=$this->getData(array('uid','order_num','content','star','p_start'), 'post');
        if($param['uid'] && $param['order_num']){
            $order=M("Jjbm_order")->where("order_num='$param[order_num]' and suid='$param[uid]'")->find();
            $type=$order['type']==='1'?2:3;
            $comment=array('aid'=>$order['course_id'],'com_timestamp'=>time(),'p_start'=>$param['p_start'],'star'=>$param['star'],'content'=>$param['content'],'type'=>$type);
            $res=M('Comment')->add($comment);
            $this->ajaxr($res,'评价成功','评价失败');
        }else{
            $this->errorkey($param);
        }
    }
    //取消订单
    public function canOrder(){
        $param=$this->getData(array('uid','order_num'), 'post');
        if($param['uid'] && $param['order_num']){
            if(M('Jjbm_order')->where("uid='$param[uid]' and order_num='$param[order_num]'")->count()){
                $can=M('Jjbm_order')->where("uid='$param[uid]' and order_num='$param[order_num]'")->field('is_sconfirm')->find();
                if($can['is_sconfirm']==='0'){
                    $res=M('Jjbm_order')->delete();
                    $this->ajaxr($res, '取消订单成功','取消订单失败');
                }else{
                    $this->ajaxr(false, '', '不能取消该订单');
                }
            }else{
                $this->ajaxr(false, '', '订单不存在');
            }
        }else{
            $this->errorkey($param);
        }
    }
}

