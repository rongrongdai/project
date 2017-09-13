<?php
/**
 * Description of FinanceAction
 *
 * @author Administrator
 */
class FinanceAction extends CommonAction{
    public function depoit(){
        $this->assign(array('mmenu'=>'Finance','submenu'=>'depoit'));
        import('Com.PageHelper');
        $pagesize=10;
        $type=$this->getData(array('status','rname'),'get');
        if(!$type['status']){
            $type['status']=0;
        }
        $page=$this->initPage();
        $where="status=$type[status]";
        if($type['rname']){
            $where.=" and name ='$type[rname]'";
        }
        $dql="select dept.*,fields.rname name from bd_depoit dept left join bd_memberfields fields on fields.uid=dept.uid";
        $sumql="select count(id) sum,name from($dql) depoit where $where";
        $sum=M('Depoit')->query($sumql);
        PageHelper::init($pagesize, 10, $page['page'], $sum[0]['sum'], '');
        $limit=  PageHelper::getLimit();
        $dsql="select * from ($dql) depoit where $where order by s_timestamp asc limit $limit[min],$pagesize";
        $depoits=M('Depoit')->query($dsql);
        
        $this->assignData(array('depoits'=>$depoits,'type'=>$type['status']), 'assign');
        $this->display();
    }
    //财务总览
    public function index(){
        $type=$this->getData(array('type'),'get');
        if(!$type['type']){
            $type['type']=1;
        }
        $this->assign(array('mmenu'=>'Finance','submenu'=>'index','type'=>$type['type']));
        $this->display();
    }
    
}
