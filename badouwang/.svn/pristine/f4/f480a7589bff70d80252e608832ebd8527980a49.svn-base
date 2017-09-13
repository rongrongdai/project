<?php
/**
 * 消费模型
 *
 * @author fanbo
 */
class ConsumeModel extends CommonModel{
    //定义自动验证的规则
    protected $fields = array('uid','count','password','timestamp','type','info');
    protected $_validate = array(
			array('uid','require','用户id不能为空',0),
			array('count','require','操作数量不能为空',0),
			array('info','require','操作明细不能为空',0),
                        array('timestamp','require','操作时间不能为空',0),
                        array('type','require','提现类型不能为空',0),
                        );
    //日志消耗
    public function consume($type,$fuid,$number,$freson,$touid='',$treson=''){
        if($type && $fuid && $number && $freson){
            $this->startTrans();
            $data=array('uid'=>$fuid,'timestamp'=>time(),'type'=>$type,'count'=>-$number,'info'=>$freson);
            if($this->create($data)){
                $res=$this->add($data);
                if($res && $touid && $treson){
                    $data=array('uid'=>$touid,'timestamp'=>time(),'type'=>$type,'count'=>$number,'info'=>$treson);
                     $res=$this->add($data);
                     if($res){
                         $this->commit();
                         return 'true';
                     }else{
                         $this->rollback();
                         return 'parm not corect';
                     }
                }else{
                    $this->commit();
                    return 'true';
                }
            }else{
                $this->rollback();
                return 'parm not corect';
            }
        }else{
            return 'parm not corect';
        }
        
    }
    
}
