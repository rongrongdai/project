<?php

/**
 * 
 *
 * @author fanbo
 */
class AuthenticationModel extends CommonModel{
    protected $fields = array('real_name','id_img','self_info','telephone','cid','grade','address','s_time','company','type','p_address','uid','verified','reason','vtime');
    protected $_validate = array(
        array('real_name','require','名称不能为空'), 
        array('self_info','require','简介不能为空！'),
        array('address','require','详细地址'),
       // array('real_name','/([^\x80-\xff])+/','用户名格式不正确！')
    );
  
}
