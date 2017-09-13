<?php
//收藏控制器
class CollectionAction extends CommonAction{
    private function getC($type){
         $param=$this->getData(array('uid','cpage','pagesize'), 'get');
        if($param){
            $limit=$this->initLimit($param);
            $this->ajaxr(true, '', '',M('collection')->where("type='$type'")->limit($limit[0],$limit[1])->select());
        }else{
            $this->ajaxr(false, '', '参数uid不正确');
        }
    }
     //收藏家教
    public function getTeach(){
       $this->getC(1);
    }
    //收藏培训课程
    public function getCourse(){
        $this->getC(2);
    }
    //收藏试卷
    public function getPapers(){
        $this->getC(4);
    }
    //收藏学问
    public function getQes(){
        $this->getC(3);
    }
}

