<?php


class StudyCenterAction extends CommonAction{
    //put your code here
    public function index(){
    	//热门老师
    	$hotch = M('Teach')->order("hit desc")->limit(6)->select();
        foreach($hotch as $key=>$val){
            $hotch[$key]['introduce'] = mb_substr($val['introduce'],0,50,'utf-8').' · · ·';
        }

    	//最新家教信息
    	$sql = "SELECT t.title,t.id,t.hit,a.rname FROM bd_teach t JOIN bd_memberfields a ON t.uid=a.uid ORDER BY t.atime LIMIT 10";
    	$msg = M()->query($sql);

    	//热门学生
    	$hotstud = M('Memberfields')->limit(12)->select();

    	//老师学吧
    	$tbar = M('Memberfields')->limit(8)->select();

    	//学生学吧
    	$sbar = M('Memberfields')->limit(10)->select();
        //学吧动态
        $dsql="select dymic.content,dymic.publisttime,fields.priv,dymic.uid,fields.rname,fields.user_pic,dymic.readnumber from bd_dynamic dymic left join bd_memberfields fields on dymic.uid=fields.uid where fields.priv=1 order by publisttime desc  limit 0,5";
        //热门讨论
        $hsql="select dymic.content,dymic.publisttime,fields.priv,dymic.uid,fields.rname,fields.user_pic,dymic.readnumber,awr.sum from bd_dynamic dymic left join bd_memberfields fields on dymic.uid=fields.uid left join (select aid,count(id)sum from bd_comment group by aid) awr on awr.aid=dymic.id where fields.priv=1 order by awr.sum desc limit 0,10";
        $ddynimics=M('Dynamic')->query($dsql);
        $hdynimics=M('Dynamic')->query($hsql);
        $len=count($hdynimics)>count($ddynimics)?count($hdynimics):count($ddynimics);
        for($i=0;$i<$len;$i++){
            if(strpos($hdynimics[$i]['content'],'\"')){
               $hdynimics[$i]['content']=  str_replace('\"','', $hdynimics[$i]['content']);
            }
            if($ddynimics[$i]['content']){
                if(strpos($ddynimics[$i]['content'],'\"')){
                    $ddynimics[$i]['content']=  str_replace('\"','', $ddynimics[$i]['content']);
                }
            }
        }
        $cid=cookie('cid');
        $notices=M('Notice')->where("type='4' and cid='$cid'")->limit(1,6)->select();
    	$this->assign(array('ddynimics'=>$ddynimics,'hdynimics'=>$hdynimics,'hotch'=>$hotch,'hotstud'=>$hotstud,'msg'=>$msg,'tbar'=>$tbar,'sbar'=>$sbar,'notices'=>$notices),'assign');
        $this->display();
    }
}
