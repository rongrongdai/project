<?php

/**
 * 分类ajax
 *
 * @author fanbo
 */
class AjaxClassfiyAction extends CommonAction{
    private $cname;
    public function __construct() {
        $this->cname=$_GET['cname'];
        parent::__construct();
    }
    public  function getLev(){
        if($this->cname){
            import("Com.ClassfiyHelper");
            $res=array('code'=>1,'message'=> ClassfiyHelper::getLevel($this->cname,M('Classfiy')));
        }else{
            $res=array('code'=>0,'message'=>'分类不存在');
        }
        echo json_encode($res);
    }
   //初始化分类
   public function getChild(){
       $data=$this->getData(array('ishot','lev','pname'),'get');
       if($this->cname){
            import("Com.ClassfiyHelper");
            $lev=$data['lev']?$data['lev']:1;
            if($data['ishot']){
                $res['data']=ClassfiyHelper::getClassesByName($this->cname,$lev, M('Classfiy'),'name,id',true,$data['pname']);
            }else{
                $res['data']=ClassfiyHelper::getClassesByName($this->cname,$lev, M('Classfiy'),'name,id',false,$data['pname']);
                
            }
            $res['code']=1;
       }else{
           $res=array('code'=>0,'message'=>'分类不存在');
       }
       echo json_encode($res);
   }
   //获取排序分类
   public function getOclass(){
       $type=$this->getData(array('type'),'get');
       if($type['type']){
           try{
               import('Com.ClassfiyHelper');
               $class=  ClassfiyHelper::getOclassByName($type['type'],M('Classfiy'));
               echo json_encode(array('code'=>1,'classes'=>$class['res']));
           }  catch (Exception $e){
              echo json_encode(array('code'=>0,'message'=>'获取分类失败')); 
           }
       }else{
           echo json_encode(array('code'=>0,'message'=>'请选择分类！'));
       }
       
   }
   public function getChildClassByParent(){
       $parr=$this->getData(array('pname','cname'),'get');
       if($parr['pname'] && $parr['cname']){
           import('Com.ClassfiyHelper');
           $cname=  ClassfiyHelper::getClassesByName($parr['cname'], 1, M('Classfiy'),'id,name', false,$parr['pname']);
           echo json_encode(array('code'=>1,'cnames'=>$cname));
       }else{
           echo json_encode(array('code'=>0,'message'=>'参数不正确!'));
       }
   }

  //获取开通的城市
   public function getCity(){
      $res = M('City')->where("isopen=1")->select();
      echo json_encode($res);
   }
  //获取开通城市的市区
  public function getDistrict(){
    $arr = $this->getData(array('id'),'post'); $id = $arr['id'];
    $res = M('District')->where("city_id=$id")->select();
    echo json_encode($res);
  }
  //设置热门
  public function setHot(){
      $parm=$this->getData(array('id','check'), 'get');
      if($parm['id'] && $parm['check']){
          $carr=explode(',',trim($parm['check']));
          $hot=array('ishot'=>0,'ischot'=>0,'isclihot'=>0,'isthot'=>0);
          foreach($carr as $key=>$val){
              if($val){
                  switch($val){
                      case 'ire':
                          $hot['ishot']=1;
                          break;
                      case 'cre':
                          $hot['ischot']=1;
                          break;
                      case 'clist':
                         $hot['isclihost']=1;
                          break;
                      case 'thot';
                          $hot['isthot']=1;
                          break;
                  }
              }
          }
          
          $res=M('Classfiy')->where("id='$parm[id]'")->setField($hot);
          $this->ajaxr($res,'设置成功！', '设置失败!');
      }else{
          echo json_encode(array('code'=>0,'message'=>'参数不正确!'));
      }
  }
}
