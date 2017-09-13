<?php


class AjaxStudyCenterAction extends CommonAction{
	//获取或搜索热门老师
	public function hotch(){
		$post = $this->getData(array('kwd'),'post');
		$kwd = $post['kwd'];
		
		$sql = "SELECT t.uid,t.title,t.introduce,t.c_img,t.price,a.address FROM bd_teach t JOIN bd_authentication a ON t.uid=a.uid WHERE t.title LIKE '%{$kwd}%' OR a.address LIKE '%{$kwd}%' LIMIT 6";
		$data = M('Teach')->query($sql);
		//$data = M('Teach')->where("title like '%{$kwd}%'")->limit(6)->select();
		echo json_encode($data);
	}

	//获取该标签的热门学生
	public function student(){
		$post = $this->getData(array('lab'),'post');
		$lab= $post['lab'];

		$data = M('Memberfields')->where("lab='{$lab}'")->select();
		echo json_encode($data);
	}

	//空间的学问
	public function ask(){
		$arr = $this->getData(array('content','cid','tid'),'post');
		$arr['uid'] = session('uid');
		$arr['c_timestamp'] = $_SERVER['REQUEST_TIME'];
		$res = M('Question')->data($arr)->add();
		if($res){
                        $model=D('Consume/Credit_log');
                        $res=$model->setCredit('qes_ask');
                        if(is_array($res)){
                            $data = array(
                                'code'=>1,
				'id'=>$res,
				'content'=>$arr['content'],
				'uname'=>session('uname'),
				'time'=>date('m-d H:i:s',$arr['c_timestamp']),
                                'res'=>$res);
                        }else{
                            $data=null;
                        }
			
		}else{
			$data = null;
		}
		echo json_encode($data);
	}
}