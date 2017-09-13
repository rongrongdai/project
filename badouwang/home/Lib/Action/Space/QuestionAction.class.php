<?php
/**
 * Description of Question
 *
 * @author fanbo
 */
class QuestionAction extends CommonAction{
    public function index(){
        //学问一级分类
        import('Com.ClassfiyHelper');
        $ask = ClassfiyHelper::getClassesByName('学问分类',1,M('Classfiy'));
        //热门问题
        $sql = "SELECT q.id,q.content,a.content asw FROM bd_question q JOIN (SELECT * FROM bd_answer GROUP BY tid) a ON q.id=a.tid LIMIT 10";
        $questions = M()->query($sql);
        //$questions = M('Question')->order("lnumber desc")->limit(10)->select();
        foreach($questions as $key=>$val){
            if(mb_strlen($val['asw'],'utf-8')>60){
                $questions[$key]['asw'] = mb_substr($val['asw'],0,60,'utf-8');
            }
        }
        //零回答问题
        $noanswer = M('Question')->where("aswnum=0")->limit(10)->select();
        //排行榜
        $rsql="SELECT q.id,q.content,q.aswnum,a.suma FROM bd_question q JOIN (SELECT count(id) suma,tid FROM bd_answer GROUP BY tid) a ON q.id=a.tid order by q.aswnum desc LIMIT 0,8";
        $rqes=M()->query($rsql);
        $this->assign(array('ask'=>$ask,'questions'=>$questions,'noanswer'=>$noanswer,'rqes'=>$rqes));
        $this->display();
   
    }

    public function qlist(){
        $arr = $this->getData(array('cid','tid'),'get');
        $cid = $arr['cid'];
        $tid = $arr['tid'];
        if(!$cid){
            $cid = M('Classfiy')->where("name='学习帮助'")->getField('id');
        }
        import('Com.ClassfiyHelper');
        $tids = ClassfiyHelper::getClassSon(M('Classfiy'),$cid);
        $cname = M('Classfiy')->where("id=$cid")->getField('name');
        //分类的学问
        $condition = !empty($tid)?"qes.cid=$cid and qes.tid=$tid":"qes.cid=$cid";
        $pagesize = 10;
        $ssql="select count(id) sum from bd_question qes where $condition";
        $sum = M('Question')->query($ssql);
        $sql = "SELECT qes.*,awr.suma,anw.rname,anw.user_pic,anw.content answer,anw.c_timestamp atime FROM bd_question qes left join (select count(id) suma,tid from bd_answer group by tid) awr on awr.tid=qes.id left join(select awr.content,awr.uid,awr.tid,mem.rname,mem.user_pic,c_timestamp from bd_answer  awr left join bd_memberfields mem on mem.uid=awr.uid  where awr.id in(select max(id) from bd_answer group by tid) group by awr.tid) anw on anw.tid=qes.id WHERE $condition ORDER BY c_timestamp DESC";
        $res = $this->setPage($pagesize,$sum[0]['sum'],$sql);
        foreach($res['data'] as $key=>$val){
            if($val['atime']){
                $ps=time()-(int)$val['atime'];
                if($ps<60){
                    $res['data'][$key]['atime']='刚刚';
                }else if($ps>=60 && $ps<60*60){
                    $res['data'][$key]['atime']=  ceil($ps/60).'分钟前';
                    
                }else if($ps>=60*60 and $ps<24*60*60){
                    $res['data'][$key]['atime']=ceil($ps/3600).'小时前';
                }else{
                    $res['data'][$key]['atime']=date('Y年m月d日',$val['atime']);
                }
            }
        }
        
        //热门问题
        $hotAsk = M('Question')->order("lnumber desc")->limit(10)->select();

        $this->assign(array('classes'=>$tids,'cid'=>$cid,'cname'=>$cname,'questions'=>$res['data'],'link'=>$res['link'],'hotAsk'=>$hotAsk));
        $this->display();
        
    }
    /*=======--2015-6-29-cht--======
    //问答主页
    public function index(){
        $self=$this->getData(array('type'), 'get');
        $qsql="select qes.*,awr.uid auid,fields.user_pic,tanswer.suma,awr.content acontent,awr.c_timestamp atimestamp,awr.v_money vmoney,user.uname,cla.name from bd_question qes left join bd_memberfields fields on fields.uid=qes.uid left join (select * from bd_answer   order by c_timestamp desc limit 0,1) awr on qes.id=awr.tid left join bd_user user on awr.uid=user.uid left join bd_classfiy cla on cla.id=qes.cid left join (select count(tid) suma,tid from bd_answer  group by tid) tanswer on tanswer.tid=qes.id ";
        if($self['type']){
            $uid=session('uid');
            $qsql.="where qes.uid=$uid";
        }
        $csql="select distinct cid,classfiy.name from bd_question ques left join bd_classfiy classfiy on ques.cid=classfiy.id";
        $page=$this->initPage();
        $pagesize=10;
        import('Com.PageHelper');
        $sum=M('')->query("select count(aqe.id) sum from ($qsql) aqe");
        PageHelper::init($pagesize,10, $page['page'], $sum[0]['sum'],'');
        $limit=  PageHelper::getLimit();
        $qsql.=" order by qes.c_timestamp desc limit $limit[min],$pagesize ";
        $this->assignData(array('classes'=>M('Question')->query($csql),'questions'=>M('Question')->query($qsql),'pages'=>  PageHelper::getPageInfos()),'assign');
        $this->display();
    }
    */

    //问答详细页面
    public function answerdetail(){
        if($_POST){
            $data=$this->getData(array('content','v_money'),'post');
            $tid=$this->getData(array('tid'),'get');
            $data['uid']=session('uid');$data['tid']=$tid['tid'];$data['c_timestamp']=time();
            $res=M('Answer')->add($data);
            if($res){
                M('Question')->where("id=$tid[tid]")->setInc('aswnum');
                $this->redirect("?tid=$tid[tid]");
            }else{
                $this->error('回答问题失败，请重试！');
            }
           
        }else{
             $tid=$this->getData(array('tid'),'get');
             if($tid['tid']){
                $asql="select aw.*,aw.content acontent,qes.uid quid,qes.content qcontent,qes.c_timestamp atime,user.rname uname,user.content,quser.uname qname,loc.qid from bd_answer aw left join bd_memberfields user on user.uid=aw.uid right join bd_question qes on aw.tid=qes.id left join bd_user quser on quser.uid=qes.uid left join bd_question_ulock loc on loc.qid=aw.id where aw.tid='$tid[tid]' order by aw.c_timestamp desc";
                $anwers=M('Answer')->query($asql);
                 M('Question')->where("id=$tid[tid]")->setInc('lnumber');
                if(!count($anwers)){
                    $anwer=M('question')->where("id=$tid[tid]")->find();
                    $uid=$anwer['uid'];
                    $anwers[]=array('qcontent'=>$anwer['content'],'atime'=>$anwer['c_timestamp'],'lnumber'=>$anwer['lnumber']);
                   
                }else{
                    $uid=$anwers[0]['uid'];
                }
                
                foreach($anwers as $key=>$val){
                    $anwers[$key]['resp']=  substr(date('m分钟',($val['c_timestamp']-$val['atime'])),1);
                }
                $question=$anwers[0]['qcontent'];
                vendor('Fenci.lib_splitword_full');
                $sp = new SplitWord();
                $karr=explode(' ',$sp->SplitRMM($question));
                $rsql="select content,aswnum,id from bd_question ";
                $sp->Clear();
                if(count($karr)){
                    $rsql.='where ';
                    $len=count($karr)>4?4:count($karr);
                    for($i=0;$i<4;$i++){
                        if($i===0){
                            $rsql.="content like '%$karr[$i]%'";
                        }else{
                            $rsql.=" or content like '%$karr[$i]%' ";
                        }
                    }
                }
                $rsql.=' order by c_timestamp desc limit 0,6';
                
                $usql="select fields.rname,user.uid,fields.lab,fields.content,ques.max from bd_user user left join bd_memberfields fields on fields.uid=user.uid left join (select uid,max(c_timestamp) max from bd_question) ques on ques.uid=user.uid where user.uid=$uid";
                $this->assignData(array('answers'=>$anwers,'rques'=>M('Question')->query($rsql),'sum'=>M('Answer')->where("tid=$tid[tid]")->count(),'user'=>M()->query($usql)),'assign');
                $this->display(); 
            }else{
                $this->error('问题不存在，请查看别的页面！');
            }
        }   
    }

}
