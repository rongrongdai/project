<?php


class ExamAction extends CommonAction{
	public function index(){
		$position='内容管理 > 在线考试 > 试卷管理';
		//试卷与试卷文档
		$pagesize = 12;		
		$sum = M('Ex_paper')->count();
		$sql = "SELECT p.*,c.name cname,m.rname uname FROM bd_ex_paper p JOIN bd_classfiy c ON p.sid=c.id JOIN bd_memberfields m ON p.uid=m.uid";
		$res = $this->setPage($pagesize,$sum,$sql);

		$this->assign(array('position'=>$position,'data'=>$res['data'],'link'=>$res['link'],'limit'=>$res['limit']));
		$this->display();
	}

	//查看某试卷的考试情况
	public function examlist(){
		$position = '内容管理 > 在线考试 > 考试记录';
		$id = $this->getData(array('sid'),'get');
		$sid = $id['sid'];

		//获取记录
		$pagesize = 12;
		$sum = M('Ex_record')->where("sid=$sid")->count();
		$sql = "SELECT r.*,m.rname,m.address FROM bd_ex_record r JOIN bd_memberfields m ON r.uid=m.uid WHERE r.sid=$sid";
		$res = $this->setPage($pagesize,$sum,$sql);

		$this->assign(array('position'=>$position,'data'=>$res['data'],'link'=>$res['link'],'limit'=>$res['limit']));
		$this->display();
	}


}