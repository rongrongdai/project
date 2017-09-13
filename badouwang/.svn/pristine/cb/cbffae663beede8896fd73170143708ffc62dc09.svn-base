<?php
/**
 * 找人
 *
 * @author fanbo
 */
class AjaxFindAction extends CommonAction{
    //获取最新关注关注
    public function getpPerson(){
        $uid=session('uid');
        $data=$this->getData(array('lab','zone','page'),'get');
        $page=1;
        $pagesize=9;
        if($data['page']){
            $parr=$this->initPage();
            $page=$parr['page'];
        }
        $min=($page-1)*$pagesize;
        $max=($page)*$pagesize;
        if($uid){
            $sql="select user.uid,user.uname,auth.id,sflow.uid isF,auth.self_info,fields.user_pic img,fields.visitednumber from bd_user_follow follow left join bd_user user on follow.uid=user.uid left join bd_authentication auth on user.uid = auth.uid left join bd_memberfields fields on fields.uid=user.uid left join bd_user_follow sflow on sflow.fid=user.uid and sflow.uid='$uid'";
            $csql="select count(user.uid) sum from bd_user user";
            if($data['lab']){
                    $sql=str_replace('bd_user_follow follow left join', "",$sql);
                    $sql=str_replace('on follow.uid=user.uid', "",$sql);
                    $sql= str_replace("left join bd_memberfields","right join bd_memberfields",$sql);
                    $sql.=" and fields.lab like '%$data[lab]%'";
                    $sql.=" left join bd_user_follow follow on follow.fid=user.uid and follow.uid='$uid'";
                    $csql.=" right join bd_memberfields fields on fields.uid=user.uid and fields.lab like '%$data[lab]%'";
            }
            if($data['zone']){     
                $sql= str_replace("left join bd_memberfields","right join bd_memberfields",$sql);
                $sql.=" and fields.address like %$data[zone]%";
                $sql.=" left join bd_user_follow follow on follow.fid=user.uid and follow.uid='$uid'";
                $csql.=" right join bd_memberfields fields on fields.uid=user.uid and fields.address like '%$$data[zone]%'";
            }
            if(!$data['lab'] && !($data['zone'])){
                $sql.=" where follow.fid='$uid' order by follow.ctime limit $min,$max";
            }else{
                $sql.=" where user.uid <> '$uid' limit $min,$max";
            }
            $csql.=" where user.uid <> '$uid'";
            $users=M('User_follow')->query($sql);
            foreach($users as $key=>$val){
                if(!$val['uid']){
                    unset($users[$key]);
                }
            }
            $sum=M('User_follow')->query($csql);
            echo json_encode(array('code'=>1,'datas'=>$users,'sum'=>$sum[0]['sum']));
        }else{
            echo json_encode(array('code'=>0,'mess'=>"用户不存在"));
        }
    }
}
