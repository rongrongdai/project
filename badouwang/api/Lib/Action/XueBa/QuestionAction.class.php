<?php
//问题控制器
class QuestionAction extends CommonAction{
    //获取问题列表(热门问题，零回答)
    public function getHotQes(){
        $param=$this->getData(array('type','cpage','pagesize'), 'get');
        if($param['param']){
            $sql='';
           switch($param['type']){
               case '1':
                   $sql="select qes.* from bd_question qes right join (select count(tid) sum,tid from bd_answer group by tid) an on an.tid=qes.id";
                   break;
               case '2':
                   $sql="select * from bd_question where in not in(select distinct sid from bd_answer)";
                   break;
               default :
                   $this->ajaxr(false, '', '参数type不正确');
           } 
           $limit=array(((int)$param['cpage']-1)*(int)$param['pagesize'],(int)$param['pagesize']);
           $sql.=" limit $limit[0],$limit[1]";
           $this->ajaxr(1,'', '',M('Quetion')->query($sql));
        }else{
            $this->errorkey($param, array('cpage','pagesize'));
        }
    }
    //获取某分类问题
    public function getQesByCid(){
        $param=$this->getData(array('cpage','pagesize','cid'), 'get');
        if($param['cid']){
            $limit=$this->initLimit($param);
            $this->ajaxr(true, '', '',M('Question')->where("cid='$param[cid]'")->limit($limit)->select());
        }else{
            $this->ajaxr(false, '', '参数cid不正确');
        }
    }
    //获取问题回答
    public function getAnswer(){
        $param=$this->getData(array('tid','cpage','pagesize'), 'get');
        if($param['tid']){
            $limit=$this->initLimit($param);
            $this->ajaxr(true, '', '',M('Answer')->where("tid='$param[tid]'")->limit($limit)->select());
        }else{
            $this->ajaxr(false,'','参数tid不正确');
        }
        
    }
    //提取提问人信息
    //提问
    public function ask(){
       $param=$this->getData(array('content','cid','tid'), 'post');
       if($param['content'] && $param['cid'] && $param['tid']){
           $param['c_timestamp']=time();
           $res=M();
       }else{
           $this->errorkey($param);
       }
    }
    //我的学问
    public function getMyQes(){
         $param=$this->getData(array('cpage','pagesize','uid'), 'post');
         if($param['uid']){
            $limit=$this->initLimit($param);
         }else{
            $this->ajaxr(false, '', '参数uid不正确');
         }
         $this->ajaxr(true, '', '',M('Question')->where("uid='$param[uid]'")->limit($limit)->select());
    }
    //获取学问达人
    public function getPperson(){
        $param=$this->getData(array('cpage','pagesize'), 'get');
        $limit=$this->initLimit($param);
        $psql="select fields.rname,fields.user_pic,fields.lab from bd_question qes right join (select count(tid),tid from bd_answer group by tid) an on an.tid=qes.id left join bd_memberfields fields on fields.uid=que.uid limit $limit[0],$limit[1]";
        $teachs=M()->query($psql);
        if(count($teachs)){
           $this->ajaxr(true, '', '',$teachs);
        }else{
            $this->ajaxr(false, '', '暂无相关学问达人');
        }
    }
}

