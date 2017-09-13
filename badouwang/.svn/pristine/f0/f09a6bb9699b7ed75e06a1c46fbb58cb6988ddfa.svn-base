<?php
/**
 * 管理员模型类
 *
 * @author 樊波
 */
class AdminstratorModel extends CommonModel{
    protected $fields = array('id','admin', 'pwd', 'isforbidden','identity','privlege','timestamp');
    protected $_validate = array(
        array('admin','require','管理员名称不能为空！'),
        array('pwd','require','管理员密码不能为空')
    );
   public  $_form=array('admin'=>array('input','管理员用户名',array('null'=>'管理员用户名')),'pwd'=>array('password','管理员密码',array()),'identity'=>array('select',"管理员类型",array()));
}
