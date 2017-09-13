<?php
//搜索控制器
class SearchAction extends CommonAction{
    //获取搜索列表
    public function search(){
        $karr=$this->getData(array('keyword','cpage','pagesize'),'get');
        $limit=$this->initLimit($karr);
        $keyword=$karr['keyword'];
        if($keyword['keyword']){
            $tsql="select id,type,title,introduce detail,c_img img from bd_teach where title like '%$keyword%' or content like '%$keyword%' or introduce like '%$keyword%' limit $limit[0],$limit[1]";
            $teach=M()->query($tsql);
            $qsql="select id,content,a.sum from bd_question qes left join (select tid,count(uid) sum from bd_answer group by tid) a on a.tid=qes.id where content like'%$keyword%' limit limit[0],$limit[1]";
            $question=M()->query($qsql);
            $csql="select spred.id,spred.cid,course.aname title,course.descript detail,course.c_img img from bd_organ_spred spred left join bd_course course on course.id=spred.cid where course.descript like '%$keyword%' or introduce like '%$keyword%' limit limit[0],$limit[1]";
            $course=M()->query($csql);
            $usql="select user.uid id,ifnull(fields.rname,user.uname)title,fields.content detail,fields.user_pic img,fields.lab from bd_user user left join bd_memberfields fields on fields.uid=user.uid where uname like '$keyword' or rname like '%$keyword%' or lab like '%$keyword%'  limit limit[0],$limit[1]";
            $user=M()->query($usql);
            echo json_encode(array('code'=>1,'data'=>array('user'=>$user,'teach'=>$teach,'question'=>$question,'course'=>$course)));
        }else{
            json_encode(array('code'=>0,'message'=>'关键词不存在！'));
        }
    }
    //获取大家都在搜索
    public function getSearchWord(){
        import("Com.config");
        $search=  explode(',', Config::getConfig('常规配置','search_word'));
        $this->ajaxr(true, '', '',$search);
    }
}

