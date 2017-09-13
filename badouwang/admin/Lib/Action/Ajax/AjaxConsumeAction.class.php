<?php

class AjaxConsumeAction extends CommonAction{
    public function handDepoit(){
        $data=$this->getData(array('id','info','ordernum'), 'post');
        if(!($data['id'] && !$data['info'] && !$data['ordernum'])){
            $mdata=array('h_timestamp'=>time());
            if($data['info']){
                $mdata['info']=$data['info'];
            }
            if($data['ordernum']){
                $mdata['ordernum']=$data['ordernum'];
                $mdata['info']='提现成功';
            }
            $mdata['status']=$data['info']?2:1;
            $res=M('Depoit')->where("id='$data[id]'")->setField($mdata);
            unset($mdata);
            if($res){
                $admin=session('admin');
                $hand=$data['info']?'拒绝':'同意';
                $rdada=array('admin'=>$admin,'timestamp'=>time(),'hand_info'=>'财务'.$admin.$hand.'申请编号为'.$data['id'].'提现申请！');
                $res=M('Hand_log')->add($rdada);
                $this->ajaxr($res, '处理成功！', '处理失败!');
            }else{
                $this->ajaxr(false, '', '处理失败，请重试！');
            }
        }else{
            $this->ajaxr(false, '', '参数不正确！');
        }
        
    }
}

