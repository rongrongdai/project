<?php

class AjaxExamAction extends CommonAction{
	//获取主页的二级分类
	public function getFen(){
		$fid = $this->getData(array('fid'),'post');$id = $fid['fid'];
		if($id){
			//sleep(1);
			import('Com.ClassfiyHelper');
			$name = ClassfiyHelper::selfInfo('在线考试',M('Classfiy'),$id);
			$res = ClassfiyHelper::getClassesByName($name['name'],1,M('Classfiy'),'','','在线考试');
			echo json_encode($res);
		}
		
	}

	//试卷详情页的评论
	public function publish(){
		$uid = session('uid');
		if($uid){
			$arr = $this->getData(array('sid','content'),'post');
			$arr['uid'] = $uid;
			$arr['ctime'] = time();
			$res3 = M('Ex_message')->where("uid=$uid")->field('ctime')->order("ctime desc")->limit(3)->select();
			
			if($res3[2] && ($arr['ctime']-$res3[2]['ctime'])<60){
				$data = array('code'=>'quick','data'=>null);
			}else{
				//执行添加
				$res = M('Ex_message')->data($arr)->add();
				if($res){//增加评论次数、并返回
					$id = $arr['sid'];
					$res2 = M('Ex_paper')->where("id=$id")->setInc('message');
					$message = M('Ex_paper')->where("id=$id")->getField('message');
				}
				$res1 = M('Memberfields')->where("uid=$uid")->field('user_pic,address')->find();
				$img = $res1 ? $res1['user_pic'] : "public/images/home/uimg.png";
				$data = array(
					'code'=>'success',
					'data'=>array('id'=>$res,'uname'=>session('uname'),'content'=>$arr['content'],'ctime'=>date('Y-m-d H:i:s',$arr['ctime']),'address'=>$res1['address'],'praise'=>0,'img'=>$img),
					'message'=>$message
				);
			}
			
		}else{
			$data = array('code'=>'error','data'=>null);
		}
		echo json_encode($data);
	}

	//统计某试卷的答题次数
	public function answer(){
		$uid = session('uid');
		if(!empty($uid)){
			$id = $this->getData(array('id'),'get');
			$id = $id['id'];
			//判断用户的学豆是否满足条件
			$vmoney = M('Memberfields')->where("uid=$uid")->getField('vmoney');
			$ispay = M('Ex_paper')->where("id=$id")->getField('ispay');
			if($vmoney>=$ispay){
				//记录答题次数
				M('Ex_paper')->where("id=$id")->setInc('answer');
			}else{
				echo json_encode('nomoney');
			}
		}else{
			echo json_encode('nologin');
		}
		
	}

	//对评论点赞
	public function praise(){
		$id = $this->getData(array('id'),'post');$id = $id['id'];
		//判断
		$uid = session('uid');
		$res = M('Ex_message')->where("id=$id and uid=$uid and praise=0")->find();
		if($res){
			$add = M('Ex_message')->where("id=$id")->setInc('praise');
			if($add){
				$daa = M('Ex_message')->where("id=$id")->getField('praise');
			}
		}else{
			$daa = null;
		}
		echo json_encode($daa);
	}

	//试卷详细页--收藏
	public function collect(){
		$arr = $this->getData(array('aid'),'get');
		$arr['uid'] = session('uid');
		$arr['type'] = 3; //3 试卷收藏
		$arr['c_timestamp'] = time();
		if(!empty($arr['uid'])){
			$res = M('Collection')->data($arr)->add();
			if($res){
				echo json_encode("success");
			}
		}else{
			echo json_encode("nologin");
		}
	}

	//考试结果页更多评论
	public function more(){
		$arr = $this->getData(array('sid','id'),'post');
		$page = $arr['id'];
		$sid = $arr['sid'];
		$offset = $page*10;
		//获取留言信息
		$sql = "SELECT m.*,u.rname,u.user_pic,u.address FROM bd_ex_message m JOIN bd_memberfields u ON m.uid=u.uid WHERE m.sid=$sid ORDER BY m.ctime DESC LIMIT $offset,10";
		$msg = M()->query($sql);
		foreach($msg as $key=>$val){
			$msg[$key]['ctime'] = date('Y-m-d H:i',$val['ctime']);
		}

		$data = array();
		$data = $msg?$msg:null;
		echo json_encode($data);
	}





	//========================================
	//随机抽取试题
	public function exam(){
		$dan = $_GET['dan']; $duo = $_GET['duo'];
		$sql = "SELECT id FROM bd_ex_question where type=1 ORDER BY RAND() LIMIT $dan";
		$sql2 = "SELECT id FROM bd_ex_question where type=2 ORDER BY RAND() LIMIT $duo";
		$danx = M()->query($sql);
		$duox = M()->query($sql2);

		if($danx || $duox){
			$xuan = array_merge($danx,$duox);
			foreach($xuan as $val){
				foreach($val as $v){
					$xt[] = (int)$v;
				}
			}
			$xt = json_encode($xt);
			echo $xt;
		}else{
			echo "error";
		}
	}

	/*public function collect(){
		$tid = $_GET['id'];$uid = session('uid');
		$data['ctime'] = time();$data['uid']=$uid;$data['tid']=$tid;
		$res = M('Ex_collect')->where("uid='{$uid}' and tid='{$tid}'")->find();
		if($res){
			echo 'has';//已经收藏
		}else{
			$res = M("Ex_collect")->add($data);
			if($res){
				echo 'success';
			}

		}
	}*/
	public function cancel(){
		$tid = $_GET['tid'];$uid = session('uid');
		$res = M('Ex_collect')->where("uid='{$uid}' and tid='{$tid}'")->delete();
		if($res){
			echo "success";
		}else{
			echo "error";
		}
	}

	
}