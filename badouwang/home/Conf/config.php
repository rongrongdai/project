<?php
return array(
	//'配置项'=>'配置值'
        //'URL_MODEL'=>1,
        'TMPL_L_DELIM'=>'<{',
        //'VAR_FILTERS'=>'stripslashes,strip_tags',
        'TMPL_R_DELIM'=>'}>',
        'APP_GROUP_LIST' => 'Index,User,Ajax,Organization,Proxyer,Consume,Source,Exam,Space,Teach,Organ,Pay', //项目分组设定
        'DEFAULT_GROUP'  => 'Index',
        //'APP_SUB_DOMAIN_DEPLOY'=>1,
        /*'APP_SUB_DOMAIN_RULES'=>array(   
        'xueba'=>array('Space/'),  // admin域名指向Admin分组
         // test域名指向Test分组
         ),*/

        'TMPL_DETECT_THEME' => true,//支持主题
        'THEME_LIST'=>'default,winter',//支持的模板主题项
        'DEFAULT_THEME'  => 'default',
        'SHOW_PAGE_TREACE'=>true,
        //'URL_CASE_INSENSITIVE'=>true
        'URR_IGNORE_LOGIN_CHECK'=>array(),
        'F_SERCRETE'=>'27309d260e6f43809945d5e7f0dabd32',
        'NO_LOGIN'=>array('Index'=>'all',
                'User'=>array('login','doLogin','logout','register','doReg','vcode','fpassword','qqLogin','webLogin','bind'),
                'Teach'=>array('index','lists','agentlist','agentdetail','teachDetail','teachList','getArrId','getHotTeacher','getCourceTeacher','getPage'),
                'Organ'=>'not inclass',//初inclass外都不需要
                'Exam'=>array('index','examlist','detail'),
                'AjaxAuthcate'=>'all',//所有写法
                'AjaxClassfiy'=>'all',
                'Space'=>'all',
                'Pay'=>'all',
                'AjaxConfig'=>array('getConfig'),
                'AjaxCourse'=>array('getChildCourse','getMoreCourse','getOspred'),
                'AjaxExam'=>array('getFen','praise','exam','collect'),
                'AjaxStudyCenter'=>'all',
                'AjaxIndex'=>array('hit','loadnews','getExam'),
                'AjaxTeach'=>array('tclass','index','hit','hunt','more','getHot','harea','looking','teacher','nosign','total','collect'),
                'AjaxUser'=>array('vcode','vuser','vpass','getP','valiP','getl'),
                'Question'=>array('index','qlist','answerdetail'),
                'StudyCenter'=>'all'

        ),
        //支付宝配置参数
        'alipay_config' => array(
            'partner'       =>'2088601123352346',   //支付宝接口PID；
            'key'           =>'390fobkjwv4rftcriphnfopz6xxendds',//支付宝接口Key
            'sign_type'     =>strtoupper('MD5'),
            'input_charset' => strtolower('utf-8'),
            'cacert'        => getcwd().'\\cacert.pem',
            'transport'     => 'http'
        ),   
        'alipay' => array(
            'seller_email'  =>'18929322711', //支付宝账号
            'notify_url'    =>'http://www.badoue.com/index.php/Pay/Pay/notifyurl', //notifyurl方法
            'return_url'    =>'http://www.badoue.com/index.php/Pay/Pay/returnurl', //returnurl方法
            'successpage'   =>'User/myorder?ordtype=payed',   //支付成功（已支付列表）
            'errorpage'     =>'User/myorder?ordtype=unpay'   //支付失败跳转（未支付列表）
        ),
        //URL
        /*'URL_MODEL'=>2,
        'URL_PATHINFO_DEPR'=>'/',
        'URL_HTML_SUFFIX'=>'html',
        'URL_ROUTER_ON'   => true,
        'URL_ROUTE_RULES' => array(
            'index.html'=>'index.php'
        ),*/

    )
?>