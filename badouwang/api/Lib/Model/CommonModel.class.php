<?php

/**
 * Description of CommonModel
 *
 * @author fanbo
 */
class CommonModel extends Model{
    //事物查询
    public function transQuery($sqls){
        $this->startTrans();
        $res=true;
        foreach($sqls as $key=>$val){
          // echo $val.'<br/>';
             $this->execute($val);
            if($this->getError()){
                $this->rollback();
                $res=false;
            }
        }
        if($res){
            $this->commit();
        }
        return $res;
    }
    public function consume($type,$tname,$rson='提出问题'){
        import('Com.Config');
        $c_val=(int)Config::getConfig($tname,$type);
        $uid=session('uid');
        $aname=$c_val>0?'获取':'消耗';
        if($c_val){
            $res=M('Credit_log')->add(array('uid'=>$uid,'type'=>'经验','name'=>$rson.','.$aname.'经验'.abs($c_val),'val'=>$c_val,'ctime'=>time()));
            if($res){
                $res=M('Memberfields')->where("uid='$uid'")->setInc('u_credit',$c_val);
                return array('res'=>$res,'count'=>$c_val,'tname'=>$tname);
            }else{
                return 'cerror';
            }
            
        }else{
            return 'typeerr';
        }
    }
    //经验消费
    /*
     * rson 原因
     * type 配置值key
     */
    public function setCredit($type,$rson){
        return $this->consume($type, '经验',$rson);
    }
    //学豆消费
    public function setVmoney($type,$rson){
         return $this->consume($type, '学豆',$rson);
    } 
    //现金消费
    public function setMoney($uid,$money,$reson,$title){
        $res=M('Consume')->add(array('uid'=>$uid,'count'=>$money,'info'=>$reson,'type'=>1,'timestamp'=>time()));
        if($res){
            if($res){
                if($money>0){
                    $res=M('Memberfields')->where("uid='$uid'")->setInc('money',$money);
                }else{
                     $res=M('Memberfields')->where("uid='$uid'")->setDec('money',  abs($money));
                }
                
            }
            $res=M('Message')->add(array('to_uid'=>$uid,'title'=>$title,'body'=>$reson,'ctime'=>time()));
            return $res;
        }
    }
    
    //发送站内信
    public function senMessage($tuid,$fuid,$message,$title,$type=1){
        if($tuid && $message && $title){
            return M('Message')->add(array('from_uid'=>$fuid,'to_uid'=>$tuid,'type'=>$type,'title'=>$title,'body'=>$message,'ctime'=>time(),'isred'=>0));
        }else{
            return false;
        }
        
    }
    
}