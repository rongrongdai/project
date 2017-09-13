<?php

class PayAction extends Action {   
    public function _initialize() {
        vendor('Alipay.Corefunction');
        vendor('Alipay.Md5function');
        vendor('Alipay.Notify');
        vendor('Alipay.Submit');    
    }
    
    public function doalipay(){
        $alipay_config      = C('alipay_config');  
        $payment_type       = "1"; //支付类型：
        $notify_url         = C('alipay.notify_url');
        $return_url         = C('alipay.return_url');
        $seller_email       = C('alipay.seller_email');
        $out_trade_no   = $_POST['order_num'];		//商户订单号
        $subject    	= $_POST['ordsubject'];  	//订单名称：必填 
        $total_fee  	= $_POST['money'];          //付款金额：必填 
        $anti_phishing_key  = "";
        $exter_invoke_ip    = get_client_ip();
    
        $parameter = array(
            "service"            => "create_direct_pay_by_user",
            "partner"            => trim($alipay_config['partner']),
            "payment_type"       => $payment_type,
            "notify_url"         => $notify_url,
            "return_url"         => $return_url,
            "seller_email"       => $seller_email,
            "out_trade_no"       => $out_trade_no,
            "subject"            => $subject,
            "total_fee"          => $total_fee,
            "body"               => $body,
            "show_url"           => $show_url,
            "anti_phishing_key"  => $anti_phishing_key,
            "exter_invoke_ip"    => $exter_invoke_ip,
            "_input_charset"     => trim(strtolower($alipay_config['input_charset']))
        );
       
        $alipaySubmit = new AlipaySubmit($alipay_config);
        $html_text    = $alipaySubmit->buildRequestForm($parameter,"post", "确认");
        echo $html_text;
    }

    function notifyurl(){
        $alipay_config=C('alipay_config');

        $alipayNotify = new AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyNotify();

        if($verify_result) {
            $out_trade_no   = $_POST['out_trade_no'];      //商户订单号
            $trade_no       = $_POST['trade_no'];          //支付宝交易号
            $trade_status   = $_POST['trade_status'];      //交易状态
            $total_fee      = $_POST['total_fee'];         //交易金额
            $notify_id      = $_POST['notify_id'];         //通知校验ID。
            $notify_time    = $_POST['notify_time'];       //时间。
            $buyer_email    = $_POST['buyer_email'];       //买家支付宝帐号；
            $parameter  = array(
                "out_trade_no"  => $out_trade_no, //商户订单编号；
                "trade_no"      => $trade_no,     //支付宝交易号；
                "total_fee"     => $total_fee,    //交易金额；
                "trade_status"  => $trade_status, //交易状态
                "notify_id"     => $notify_id,    //通知校验ID。
                "notify_time"   => $notify_time,  //通知的发送时间。
                "buyer_email"   => $buyer_email,  //买家支付宝帐号；
            );

            if($_POST['trade_status'] == 'TRADE_FINISHED') {
                    //
            }else if($_POST['trade_status'] == 'TRADE_SUCCESS'){
                if(!checkorderstatus($out_trade_no)){
                    orderhandle($parameter); 
                }
            }
            echo "success";        //请不要修改或删除
        }else{
            //验证失败
            echo "fail";
        }    
    }
    
    function returnurl(){
        $alipay_config=C('alipay_config');
        $alipayNotify = new AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyReturn();

        if($verify_result) {
            $out_trade_no   = $_GET['out_trade_no'];      //商户订单号
            $trade_no       = $_GET['trade_no'];          //支付宝交易号
            $trade_status   = $_GET['trade_status'];      //交易状态
            $total_fee      = $_GET['total_fee'];         //交易金额
            $notify_id      = $_GET['notify_id'];         //通知校验ID。
            $notify_time    = $_GET['notify_time'];       //通知的发送时间。
            $buyer_email    = $_GET['buyer_email'];       //买家支付宝帐号；
                
            $parameter = array(
                "out_trade_no"   => $out_trade_no,      //商户订单编号；
                "trade_no"       => $trade_no,          //支付宝交易号；
                "total_fee"      => $total_fee,         //交易金额；
                "trade_status"   => $trade_status,      //交易状态
                "notify_id"      => $notify_id,         //通知校验ID。
                "notify_time"    => $notify_time,       //通知的发送时间。
                "buyer_email"    => $buyer_email,       //买家支付宝帐号
            );
        
            if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
                if(!checkorderstatus($out_trade_no)){
                    orderhandle($parameter);
                }
                $this->redirect(C('alipay.successpage'));
            }else {
                echo "trade_status=".$_GET['trade_status'];
                $this->redirect(C('alipay.errorpage'));
            }
        }else {
            echo "支付失败！";
        }
    }
}
