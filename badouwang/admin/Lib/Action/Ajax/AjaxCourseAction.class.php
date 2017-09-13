<?php

class AjaxCourseAction extends CommonAction{
        public function setHot(){
            $parm=$this->getData(array('type','id','time'),'get');
            if($parm['type'] && $parm['id'] &&$parm['time']){
                switch($parm['type']){
                    case '1':
                        $mod['ic_time']=  strtotime($parm['time']);
                        $mod['ic_comment']=1;
                        $type='培训首页';
                        break;
                    case '2':
                        $mod['cin_time']=  strtotime($parm['time']);
                        $mod['cid_comment']=1;
                        $type='网站首页';
                        break;
                     case '3':
                        $mod['ci_time']=  strtotime($parm['time']);
                        $mod['ci_pro']=1;
                        $type='优惠课程';
                        break;
                }
                $res=true;
                $res=M('Organ_spred')->where("id=$parm[id]")->setField($mod);
                if($res){
                    $entity=array('admin_id'=>session('id'),'timestamp'=>time(),'type'=>1,'hand_info'=>session('admin').'设置课程'.$parm['id'].'为'.$type.'推荐成功');
                    $res=M('Hand_log')->add($entity);
                }
                $this->ajaxr($res, '推荐成功！','已推荐，且时间未更改！');
            }else{
                echo json_encode(array('code'=>0,'message'=>'参数不正确！'));
            }
        }


}	