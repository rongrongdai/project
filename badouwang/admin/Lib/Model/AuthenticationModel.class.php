<?php

/**
 * 
 *
 * @author fanbo
 */
class AuthenticationModel extends CommonModel{
    protected $fields = array('real_name','id_img','self_info','telephone','address','reason','verified');
    protected $_validate = array(
        array('real_name','require','名称不能为空'), 
        array('self','require','简介不能为空！'),
        array('address','require','详细地址')
    );
  
}
