<?php


/**
 * Description of BondModel
 *
 * @author fanbo
 */
class BondModel extends CommonModel{
    //put your code here
    //put your code here
    protected $fields = array('name','price','number','descript','timestamp','bac_img','curnumber','uid');
    protected $_validate = array(
        array('name','require','优惠券名称不能为空'), 
        array('price','require','优惠券面额不能为空！'),
        array('number','require','优惠券数量不能为空！'),
        array('descript','require','优惠券描述不能为空！'),
        array('price','require','优惠券价格不能为空！'),
        array('price',"/(\d)+(\.){0,1}(\d)*/",'优惠券格式不正确！'),
    );
    public function useBond($number,$id,$uid){
        $snumber=$this->where("uid='$uid' and id='$id'")->field('curnumber')->find();
        if($number<=$snumber['curnumber']){
             $this->startTrans();
             $rs=$this->where("uid='$uid' and id='$id'")->setDec('curnumber',$number);
             if($rs){
                 $cdata=array('uid'=>$uid,'type'=>5,'count'=>-$number,'info'=>'发布课程用掉'.$number.'张优惠券',time());
                 $rs=M('Consume')->add($cdata);
                 if($rs){
                     $this->commit();
                     return 'sucess';
                 }else{
                     $this->rollback();
                     return 'fail';
                 }
             }else{
                 $this->rollback();
             }
        }else{
            return 'too_match';
        }
       
    }
}
