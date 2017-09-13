<?php
//钱包控制器
class PurseAction extends CommonAction{
    //获取账户余额
    public function getMoney(){
        $param=$this->getData(array('uid'), 'get');
        if($param['uid']){
            $vmoney=M('Memberfields')->where("uid='$param[uid]'")->field('money')->find();
            $this->ajaxr(true, '', '',array('money'=>$vmoney['money']));
        }else{
            $this->ajaxr(false, '', '参数uid不存在');
        }
    }
    //获取学豆
    public function getVmoney(){
        $param=$this->getData(array('uid'), 'get');
        if($param['uid']){
            $vmoney=M('Memberfields')->where("uid='$param[uid]'")->field('vmoney')->find();
            $this->ajaxr(true, '', '',array('vmoney'=>$vmoney['vmoney']));
        }else{
            $this->ajaxr(false, '', '参数uid不存在');
        }
    }
    //充值
    public function charge(){
        $param=$this->getData(array('uid','money'),'post');
        if($param['uid'] && $param['money']){
            $ordernum='CZ8'.time().mt_rand(100,999);
            $res=M('Jjbm_order')->add(array('order_num'=>$ordernum,'suid'=>$param('uid'),'tuid'=>'','course'=>'','course_id'=>'','stu_name'=>'','address'=>'','place'=>'','money'=>$param['money'],'bm_time'=>time(),'type'=>'3'));
            $param['bm_time']= time();$param['order_num']=$ordernum;
            $this->ajaxr($res, '', '充值失败',$param);
        }else{
            $this->errorkey($param);
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
    //提现
    public function transMoney(){
        $param=$this->getData(array('uid','money'),'post');
        if($param['uid'] && $param['money']){
            $money=M('Memberfields')->where("uid='$param[uid]'")->fields('money');
            import("Com.Config");
            $cmoney=  Config::getConfig('常规配置', 'posit_min');
            if($cmoney>$money){
                $this->ajaxr(false, '', '账户余额小于'.$cmoney.'远，不能提现');exit();
            }
            if($money<$param['money']){
                $this->ajaxr(false, '', '提现金额超过余额');exit();
            }
            $res=D('Consume/Money')->setMoney($param['uid'],$param['money'],'申请提现'.$param['money'].'元，等待审核后发放','提现成功');
            $this->ajaxr($res, '申请提现成功，待审核后发放','提现失败');
        }else{
            $this->errorkey($param);
        }
    }
    //获取订单记录
    public function getOrders(){
        $param=$this->getData(array('uid','pagesize','cpage'), 'get');
        if($param['uid']){
            if(!$param['cpage']){
                $param['cpage']=6;
            }
            if(!$param['pagesize']){
                $param['pagesize']=6;
            }
            $limit=array(((int)$param['cpage']-1)*(int)$param['pagesize'],(int)$param['pagesize']);
            $orders=M('Jjbm_order')->where("status=1 and type=3")->order('bm_time desc')->limit($limit[0],$limit[1])->select();
            $this->ajaxr(true, '', '',$orders);
        }else{
            $this->ajaxr(false, '', '参数uid不存在');
        }
    }
    //获取用户钱包信息
    public function getUmInfo(){
        $param=$this->getData(array('uid','pagesize','cpage'), 'get');
        if($param['uid']){
             if(!$param['cpage']){
                $param['cpage']=6;
             }
            if(!$param['pagesize']){
                $param['pagesize']=6;
            }
             $vmoney=M('Memberfields')->where("uid='$param[uid]'")->field('money')->find();
             $money=M('Memberfields')->where("uid='$param[uid]'")->field('vmoney')->find();
             $limit=array(((int)$param['cpage']-1)*(int)$param['pagesize'],(int)$param['pagesize']);
             $orders=M('Jjbm_order')->where("status=0 and type in(1,2)")->order('bm_time desc')->limit($limit[0],$limit[1])->select();
             $this->ajaxr(true, '', '',array('vmoney'=>$vmoney,'money'=>$money,'orders'=>$orders));
        }else{
            $this->ajaxr(false, '', '参数uid不存在');
        }
    }
}
