<?php
//分类控制器
class ClassfiyAction extends CommonAction{
    private function getCByType($type){
        import('Com.ClassfiyHelper');
        switch($type){
            case 'paper':
                $this->ajaxr(true, '在线考试分类', '',  ClassfiyHelper::getClassesByName('', '', M('Classfiy'), 'id,name', ''));
                break;
            case 'teach':
                $this->ajaxr(true, '家教分类', '',  ClassfiyHelper::getClassesByName('', '', M('Classfiy'), 'id,name', ''));
                break;
            case 'course':
                $this->ajaxr(true, '培训分类', '',  ClassfiyHelper::getClassesByName('', '', M('Classfiy'), 'id,name', ''));
                break;
            case 'qes':
                $this->ajaxr(true, '学问分类', '',  ClassfiyHelper::getClassesByName('', '', M('Classfiy'), 'id,name', ''));
                break;
            default:
                $this->ajaxr(FALSE,'', '分类不存在');
                break;
        }
    }
    //获取家教分类
    public function getTeachClassfiy(){
        $this->getCByType('teach');
    }
    //获取培训推荐分类
    public function getCourseClassfiy(){
        $this->getCByType('course');
    }
    //获取题库分类
    public function getPaperClassfiy(){
        $this->getCByType('paper');
    }
    //获取学问分类
    public function getQestionClassfiy(){
        $this->getCByType('qes');
    }
    //获取附近老师分类
    public function getATeachClassfiy(){
        $class="select distinct fid,cf.name from bd_teacher_km km left join bd_classfiy cf on km.fid=cf.id";
        $this->ajaxr(true, '', '',M('Classfiy')->query($class));
    }
    //获取优惠培训分类
    public function getDCourseClassfiy(){
        $class="select distinct cf.id,cf.name from bd_organ_spred spred left join bd_proxyermanage prox on spred.cid=prox.id right join bd_classfiy cf on cf.id=prox.cid where spred.d_price>0 
        and spred.d_price<spred.price";
        $this->ajaxr(true, '', '',M('Classfiy')->query($class));
    }
    
}


