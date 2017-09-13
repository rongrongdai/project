<?php
	class UserModel extends Model{
		//定义自动验证的规则
		protected $_validate = array(
			//验证用户名和密码是否为空
			array('uname','require','用户名不能为空',0),
			array('password','require','密码不能为空',0),

			//验证用户名不能重复
			array('uname','','用户名已存在',0,'unique',1),
		);
	}