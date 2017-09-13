<?php

class AjaxIndexAction extends CommonAction{
	//更新新闻的点击量
	public function hit(){
		$arr = $this->getData(array('id'),'get');
		$id = $arr['id'];
		$res = M('Article')->where("id=$id")->setInc('hit');
	}

	//加载列表新闻
	public function loadnews(){
		$gid = M('Classfiy')->where("name='焦点新闻'")->getField('id');
        //最新新闻
        $arr = $this->getData(array('id'),'get');
		$id = $arr['id'];
        $data = M('Article')->where("gid=$gid")->order("mtime desc")->limit($id,5)->select();
        foreach($data as $key=>$val){
            $data[$key]['content'] = substr(strip_tags($val['content']),0,181);
        }

        if(count($data) == 5){
			echo json_encode($data);
		}
	}

	//热门试题
	public function getExam(){
		$fid = $this->getData(array('fid'),'post');$id = $fid['fid'];
		if($id){
	        $rlid = M('Classfiy')->where("id=$id")->field('lrf,rft')->find();
	        $lrf = $rlid['lrf'];
	        $rft = $rlid['rft'];
	        $sid = M('Classfiy')->where("lrf>$lrf and rft<$rft")->field('id')->select();
	        $arr = array();
	        foreach($sid as $key=>$val){
	            $arr[] = $val['id'];
	        }
	        $arrid = implode(',',$arr);
	        if(!empty($arrid)){
	        	$res = M('Ex_paper')->where("sid in ($arrid)")->limit(10)->select();
	        }else{
	        	$res = null;
	        }
	        
			echo json_encode($res);
		}
		
	}


}