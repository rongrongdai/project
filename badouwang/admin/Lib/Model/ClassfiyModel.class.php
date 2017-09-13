<?php

class ClassfiyModel extends CommonModel{
   protected $fields = array('id', 'name', 'cimg', 'ctextbrand','timestamp','lrf','rft','lev');
   protected $_validate = array(
        array('name','require','分类名称不能为空！'), 
        //array('ctextbrand','require','分类文字广告不能为空')
    );
   public  $_form=array('name'=>array('input','分类名称',array('null'=>'分类名')),'cimg'=>array('imgupload','广告图片',array()),'textbrand'=>array('textarea','分类广告',array()),'oname'=>array('hidden','',array()),'oid'=>array('hidden','',array()));
}

