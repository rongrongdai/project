<?php

class ImageHandler{
    public  function handle($data){
        if($data['imgname']){
          
            return substr($data['imgname'], strpos($data['imgname'], '/upload'));
        }
    }
}

class ArticleAction extends CommonAction{
	
	public function index(){
		$position='内容管理 > 文章管理';
		$arr = $this->getData(array('id','page'),'get');
		$id = $arr['id'];
		$page = $arr['page'];
		import('Com.ClassfiyHelper');
		$res = ClassfiyHelper::getClassesByName('新闻分类',1,M('Classfiy'));
		
		//分页
		import('Com.PageHelper');
		$id = $id?$id:$res[0]['id'];
		$page = $page?$page:1;
		$pages = 5;
		$sum = M('Article')->where("fid=$id")->count();
		PageHelper::init($pages,10,$page,$sum,'');
		$limit = PageHelper::getLimit();
		$limit = $limit['min'];
		$link = PageHelper::getPageInfos();

		$sql = "SELECT a.*,c.name,m.admin FROM bd_article a JOIN bd_classfiy c ON a.gid=c.id JOIN bd_adminstrator m ON a.uid=m.id WHERE a.fid=$id LIMIT $limit,$pages";
		$data = M()->query($sql);

		$this->assign(array('position'=>$position,'classfiy'=>$res,'data'=>$data,'link'=>$link,'count'=>$pages*($page-1)));
		$this->display();
	}

	//提交文章/修改文章
	public function addArticle(){
		if(!empty($_POST)){
			$arr = $this->getData(array('title','city_id','fid','gid','content'),'post');
			$arr['uid'] = session('id');

			$arr['mtime'] = time();
			//判断是发布还是修改
			if(!empty($_POST['mod'])){
				if($_FILES['logos']['name']!=""){
	                $arr['logo']=$this->handUimg('logos');
	            }
				$id = $_POST['mod'];
				$res = M('Article')->where("id=$id")->setField($arr);
				$this->pagego('修改成功','修改失败',$res,'index');
			}else{
				if($_FILES['logo']['name']!=""){
	                $arr['logo']=$this->handUimg('logo');
	            }
				$res = M('Article')->data($arr)->add();
				$this->pagego('发布成功','发布失败',$res,'index');
			}
			
		}else{
			$arr = $this->getData(array('id'),'get');
			$id = $arr['id'];
			$position='内容管理 > 文章管理 > 添加文章';
			//获取编辑器
			import('Com.UeditorHelper');
	        $txt = UeditorHelper::ueditor(900,300,2000,1);
	        if(!empty($id)){
	        	//获取要修改的内容
	        	$sql = "SELECT a.*,c.name fname,d.name gname FROM bd_article a JOIN bd_classfiy c ON a.fid=c.id JOIN bd_classfiy d ON a.gid=d.id WHERE a.id=$id";
	        	$data = M('Article')->query($sql);
	        	$data = $data[0];
	        }

	        $timestamp = time();
			$this->assign(array('position'=>$position,'txt'=>$txt,'data'=>$data,'token'=>md5('unique_salt'.$timestamp),'timestamp'=>$timestamp));
			$this->display();
		}
		
	}

	//删除文章
	public function delArticle(){
		$arr = $this->getData(array('id'),'get');
		$id = $arr['id'];

		$res = M('Article')->where("id=$id")->delete();
		$this->pagego('删除成功','删除失败',$res,'index');
	}
}