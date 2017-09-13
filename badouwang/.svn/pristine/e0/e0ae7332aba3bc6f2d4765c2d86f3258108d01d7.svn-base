<?php

/**
 * Description of AjaxComment
 *
 * @author fanbo
 */
class AjaxCommentAction extends CommonAction{
    //put your code here
    //星级计算
    private function setStar($type,$aid,$uid){
        $snumber=  floatval(M('Comment')->where("uid='$uid' and type =$type and aid='$aid'")->sum('star'));
        $scount=(int)M('Comment')->where("uid='$uid' and type=$type and star!=0")->sum('id');
        $star=floor(($snumber)/$scount+0.5);
        if($type==='3'){
            $res=M('Organ_spred')->where("uid=$uid and aid='$aid'")->setField('star',$star);
        }else if($type==='2'){
            $res=M('Teach')->where("uid=$uid and aid='$aid'")->setField('star',$star);
        }
        return $res;
    }
    //好评率计算
    private function setRate($aid,$uid,$type){
        $cpin=  floatval(M('Comment')->where("uid='$uid' and type =$type and p_start=0 and aid='$aid'")->count());
        if($type === '2'){
            $opin=M('Teach')->where("id='$aid'")->field('pin_rate')->find();
        }else if($type==='3'){
            $opin=M('Organ_spred')-where("id='$aid")->field('pin_rate')->find();
        }
        if($cpin >0){
             $gpin=  floatval(M('Comment')->where("uid='$uid' and type =$type and p_start=1 and aid='$aid'")->count());
             $nrate=  floatval($gpin/($cpin+$gpin));
        }else{
            if((floatval($opin['pin_rate']))>=1){
                $nrate=1;
            }else{
                $nrate=$opin['pin_rate']+=0.05;
            }
            if($type==='2'){
                 $res=M('Teach')->setField('pin_rate',$nrate);
            }else if($type==='3'){
                 $res=M('Organ_spred')->setField('pin_rate',$nrate);
            }
            return $res;
        }
       
       
    }
   
    //设置积分
    private function setGrade($type){
        $gtype='';
        $ctype='';
        import('Com.config');
        switch($type){
            case '2':
                $gtype='coment_teach';
                $ctype='家教';
                break;
            case '3':
                $gtype='coment_course';
                $ctype='课程';
                break;
        }
        $res=D("Consume/Credit_log")->setCredit($gtype,$ctype);
        return $res;
    }
    public function comment(){
        $data=$this->getData(array('aid','type','star','content'), 'get');
        $uid=session('uid');
        $ac=M('Comment')->where("aid='$data[aid]' and uid='$uid' and type='$data[type]'")->count();
        if($ac){
            $this->ajaxr(false,'','您已经评价过该课程！');
        }else{
           if($data['aid'] && $data['star']){
            $data['com_timestamp']=time();$data['uid']=$uid;
            $res=M('Comment')->add($data);
            if($res){
                $res=$this->setRate($data['aid'], $uid, $data['type']);
                if($res){
                    $res=$this->setStar($data['type'], $data['aid'], $uid);
                    $this->setGrade($data['type']);
                    $this->ajaxr($res, '评论成功','评论失败！');
                }else{
                    $this->ajaxr(false, '', '评价失败，请重试！');
                }
            }else{
                $this->ajaxr(false, '', '评价失败，请重试！');
            }
            }else{
                $this->ajaxr(false, '', '参数不正确！');
            } 
        }
        
    }
}