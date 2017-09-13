<?php
class FileHandler{
    public  function handle($data){
        if($data['imgname']){
            $pos=strpos($data['imgname'], 'upload');
            return '/'.substr($data['imgname'],$pos);
        }
    }
}
class AjaxResourceAction extends CommonAction{
    private $res;
    private function response($res){
         if($res){
                $this->res=array('code'=>1,'message'=>'上传成功！');
            }else{
                $this->res=array('code'=>0,'message'=>'上传失败！');
            }
    }
    public function upload(){
        $data=$this->getData(array('rname','dmoney','sid','type','cid','fit'), 'post');
        import("Com.ClassfiyHelper");
        $id=  ClassfiyHelper::selfInfo($data['cid'],M('Classfiy'));
        $data['cid']=$id['id'];
        $limit=array('extension'=>array('ppt','doc','xls'),'size'=>10*1024*1024);
        import("Com.FileHelper");
        if($data['type']==='1'){
            if($_FILES['rcontent']){
                $dir=  FileHelper::getUploadFileDir();
                $extend=$extend=substr($_FILES['rcontent']['name'],  strripos($_FILES['rcontent']['name'],'.'));
                $uploadfile=$dir.'/'.time().rand(1,100).$extend;
                $file= FileHelper::saveFile($uploadfile,'rcontent',$limit, new FileHandler());
                if(!strpos($file,'upload')){
                    $this->res=array('code'=>0,'message'=>'上传失败,请重试！');
                    return;
                }
                import('Com.ExcelHelper');
                $datas=  ExcelHelper::redPaper($uploadfile,$data['cid'],$data['sid']);
                $res=true;
                foreach($datas as $key=>$val){
                    $res=M('Ex_question')->add($val);
                }
                $this->response($res);
            }
        }else{
            unset($data['sid']);
           
            if($_FILES['rcontent']['name']){
                $dir=  FileHelper::getUploadFileDir();
                $extend=$extend=substr($_FILES['rcontent']['name'],  strripos($_FILES['rcontent']['name'],'.'));
                $uploadfile=$dir.'/'.time().rand(1,100).$extend;
                $data['rcontent']= FileHelper::saveFile($uploadfile,'rcontent', $limit, new FileHandler());
                if(!strpos($data['rcontent'],'upload')){
                    $this->res=array('code'=>0,'message'=>'上传失败,请重试！');
                    return;
                }
                
            }
            $data['type']=2;$data['atime']=time();$data['uid']=session('uid');
            $res=M('Resource')->add($data);
            $this->response($res);
        }
        echo json_encode($this->res);
    }
    //获取我的资料
    public function getResource(){
        $page=$this->initPage();
        $page['page']=(int)$page['page'];
        $uid=session('uid');
        $sql="select rid,atime,res.dnumber,class.name,paper.ispay dmoney from bd_resource sour left join bd_ex_paper paper on sour.rid=paper.id left join (select count(id) dnumber,id from bd_ex_paper group by uid) res on res.id=paper.id left join bd_classfiy class on paper.sid=class.id where sour.uid='$uid'";
        $res=$this->getPageData(M('Resource'),'', $sql,$page);
        foreach ($res['entities'] as $key=>$val){
            $res['entities'][$key]['money']=floatval($val['dmoney'])*(int)($val['dnumber'])*0.1;
        }
        echo json_encode($res);
    }
}

