<?php


class CourseAction extends CommonAction{
	
	public function index(){
		$position='内容管理 > 课程管理 > 家教信息';
		$pagesize = 12;
		$sum = M('Teach')->count();
		$sql = "SELECT t.*,c.name cname,u.uname uname,f.name fname FROM bd_teach t JOIN bd_city c ON t.city=c.id JOIN bd_user u ON t.uid=u.uid JOIN bd_classfiy f ON t.fid=f.id";
		$res = $this->setPage($pagesize,$sum,$sql);

		$this->assign(array('position'=>$position,'data'=>$res['data'],'link'=>$res['link'],'limit'=>$res['limit']));
		$this->display();
	}
}