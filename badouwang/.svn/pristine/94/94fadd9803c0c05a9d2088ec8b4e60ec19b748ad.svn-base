<?php


/**
 * 课程模型类
 *
 * @author fanbo 
 */
class CourseModel extends CommonModel{
    //put your code here
    protected $fields = array('aname','c_img','introduce','price','descript','cid','uid','aid');
    protected $_validate = array(
        array('aname','require','课程名不能为空'), 
        array('introduce','require','简介不能为空！'),
        array('descript','require','课程详情不能为空！'),
        array('cid','require','课程分类不能为空！'),
        array('price','require','课程价格不能为空！'),
        array('price',"/(\d)+(\.){0,1}(\d)*/",'课程价格格式不正确！'),
    );
}
