<?php
/**
 * Description of BonusAction
 *
 * @author fanbo
 */
class BonusAction extends CommonAction{
    //put your code here
    public function index(){
        $cid=$this->getData(array('id'),'get');
        $carr="select cids.cid id,class.name from (select distinct prox.cid cid from bd_organ_spred spred left join bd_proxyermanage prox on prox.id=spred.cid where spred.type=2) cids left join bd_classfiy class on class.id=cids.cid";
        $classes=M('Classfiy')->query($carr);
        $csql="select spred.*,prox.cname,prox.timg from bd_organ_spred spred left join bd_proxyermanage prox on prox.id=spred.cid where spred.blnumber";
        if($cid['id']){
            $csql.=' and prox.cid='.$cid['id'];
        }
        $courses=M('proxyermanage')->query($csql);
        $this->assignData(array('classes'=>$classes,'courses'=>$courses),'assign');
        $this->display();
    }
}
