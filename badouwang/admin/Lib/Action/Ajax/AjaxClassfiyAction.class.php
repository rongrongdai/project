<?php

class AjaxClassfiyAction extends CommonAction{
    private $model;
    public function __construct() {
        $this->model=new ClassfiyModel();
        parent::__construct();
    }
    //获取父分类所有下级子分类
    public function getClassesByParent(){
        $cname=$_GET['cname'];
        import("Com.ClassfiyHelper");
        $cnames=  ClassfiyHelper::getClassesByName($cname, 1, $this->model,'name,id');
        echo json_encode($cnames);
        
    }
    //获取所有省份
    public function getAllProvince(){
        $res=array('code'=>1,'pros'=>M('Province')->field('id,name')->select());
        echo json_encode($res);
    }
    //获取省份城市
    public function getAllCities(){
        $id=$_GET['pid'];
        if($id){
            $res=array('code'=>1,'cits'=>M('City')->where("provincei_d='$id'")->field('id,name')->select());
        }else{
           $res=array('code'=>0,'message'=>'请选择城市！'); 
        }
        echo json_encode($res);
    }
    public function getAllDis(){
        if($_POST){
            $data=$this->getData(array('province','city','district','new'), 'post');
        }else{
            $id=$_GET['cid'];
        if($id){
            $res=array('code'=>1,'dis'=>M('District')->where("city_id='$id'")->field('id,name')->select());
        }else{
           $res=array('code'=>0,'message'=>'请选择城市！'); 
        }
        echo json_encode($res);
        }
        
    }

    //获取开通的城市
    public function getCity(){
       $res = M('City')->where("isopen=1")->select();
       echo json_encode($res);
    }
}
