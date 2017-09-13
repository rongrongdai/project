<?php

function checkorderstatus($ordid){
    $Ord=M('Jjbm_order');
    $ordstatus=$Ord->where("order_num='{$ordid}'")->getField('ispay');
    if($ordstatus==1){
        return true;
    }else{
        return false;    
    }
}

function orderhandle($parameter){
    $ordid=$parameter['out_trade_no'];
    $data['order_no'] = $ordid;
    $data['trade_no'] = $parameter['trade_no'];
    $data['total_fee'] = $parameter['total_fee'];
    $data['trade_status'] = $parameter['trade_status'];
    $data['notify_id'] = $parameter['notify_id'];
    $data['notify_time'] = $parameter['notify_time'];
    $data['buyer_email'] = $parameter['buyer_email'];

    $Ord = M('Jjbm_order');
    $Note = M('Pay_note');
    $Meb = M('Memberfields');
    $Ord->where("order_num='{$ordid}'")->setField('ispay',1);
    $Note->data($data)->add();
    if(substr($ordid,0,2)==='CZ'){
        // $Meb->where("uid=".session('uid'))->setInc('money',$data['total_fee']);
        $uid = $Ord->where("order_num='{$ordid}'")->getField('suid'); 
        $Meb->where("uid=".$uid)->setInc('money',$data['total_fee']);
    }
}
