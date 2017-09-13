<?php

/**
 * Description of ConfigModel
 *
 * @author fanbo
 */
class ConfigModel extends CommonModel{
   protected $fields = array('id', 'c_name', 'c_key', 'c_value','c_info','timestamp');
   protected $_validate = array(
        array('c_name','require','配置项名称不能为空！'), 
        array('c_key','require','配置项键值不能为空！'),
        array('c_value','require','配置项值不能为空')
    );
   public  $_form=array('c_name'=>array('input','配置名称',array('null'=>'配置名')),'c_key'=>array('input','配置项key',array('null'=>'配置项')),'c_value'=>array('input','配置项值',array('null'=>'配置值')),'c_info'=>array('textarea','配置项说明',array()));
}


