<?php

class AjaxConfigAction extends CommonAction{
    public function getConfig(){
        import('Com.Config');
        $arr=$this->getData(array('type','key'),'get');
        if($arr['type'] && $arr['key']){
            $res=array('code=>1','labs'=>  Config::getConfig($arr['type'], $arr['key']));
        }else{
            $res=array('code'=>0,'message'=>'参数不正确！');
        }
        echo json_encode($res);
    }
    //保存标签
    public function saveLab(){
        $lab=$this->getData(array('lable'),'get');
        if($lab['lable']){
            $uid=session('uid');
            $res=M('Memberfields')->where("uid='$uid'")->setField('lab',$lab['lable']);
            $this->ajaxr($res,'保存成功！','保存失败！');
        }else{
            echo json_encode(array('code'=>0,'message'=>'请选择标签！'));
        }
    }
    //设置空间访问权限
    public function savePrivleges(){
        //空间权限 0 自己可见 1 全部可见 2 好友可见
        $type=$this->getData(array('type'),'get');
        if($type['type']){
            $uid=session('uid');
            switch ($type['type']){
                case 'all':
                    $res=M('Memberfields')->where("uid='$uid'")->setField('priv',1);
                    $this->ajaxr($res, '设置成功！','设置失败！');
                    break;
                case 'self':
                     $res=M('Memberfields')->where("uid='$uid'")->setField('priv',0);
                    $this->ajaxr($res, '设置成功！','设置失败！');
                    break;
                case 'friend':
                     $res=M('Memberfields')->where("uid='$uid'")->setField('priv',2);
                    $this->ajaxr($res, '设置成功！','设置失败！');
                    break;
                default :
                    echo json_encode(array('code'=>0,'message'=>'设置失败！'));
                    break;
            }
        }else{
            echo json_encode(array('code'=>0,'message'=>'设置失败！'));
        }
    }
}

