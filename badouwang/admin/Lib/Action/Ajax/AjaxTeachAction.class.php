<?php

class AjaxTeachAction extends CommonAction{
	//获取家教分类
	public function tclass(){
		$fid = $this->getData(array('fid','gid'),'post');
		$aname=$fid['fid']; $gid = $fid['gid'];

		import('Com.ClassfiyHelper');
		$ids = M('Classfiy')->where("name='{$aname}'")->find();
		$id = $gid?$gid:$ids['id'];
		$name = ClassfiyHelper::selfInfo($aname,M('Classfiy'),$id);
		$res = ClassfiyHelper::getClassesByName($name['name'],1,M('Classfiy'));

		echo json_encode($res);
	}
        public function setHot(){
            $parm=$this->getData(array('type','id','time'),'get');
            if($parm['type'] && $parm['id'] &&$parm['time']){
                $mod=array('ic_time'=>0,'ic_commend'=>0,'tin_comment'=>0,'tin_time'=>0,'ti_time'=>0,'ti_comment'=>0);
                $type='';
                switch($parm['type']){
                    case 'index':
                        $mod['ic_time']=  strtotime($parm['time']);
                        $mod['ic_commend']=1;
                        $type='首页';
                        break;
                    case 'tindex':
                        $mod['ti_time']=  strtotime($parm['time']);
                        $mod['ti_commend']=1;
                        $type='家教首页';
                        break;
                     case 'tnindex':
                        $mod['tin_time']=  strtotime($parm['time']);
                        $mod['tin_commend']=1;
                        $type='最新家教';
                        break;
                }
                $res=true;
                $res=M('Teach')->where("id=$parm[id]")->setField($mod);
                if($res){
                    $entity=array('admin_id'=>session('id'),'timestamp'=>time(),'type'=>1,'hand_info'=>session('admin').'设置'.$parm['id'].'为'.$type.'推荐成功');
                    $res=M('Hand_log')->add($entity);
                }
                $this->ajaxr($res, '推荐成功！','已推荐，且时间未更改！');
            }else{
                echo json_encode(array('code'=>0,'message'=>'参数不正确！'));
            }
        }


}	