<?php
	class UserAction extends CommonAction{
		private $model;
		public function __construct(){
			$this->model = new UserModel();
			parent::__construct();
		}
		//用户列表
		public function index(){			
			$pages = $this->getData(array('page'),'get');
			$page = $pages['page'];
			if($page<=1){
				$page = 1;
			}
                        //樊波增加搜索功能
                        $uarr=$this->getData(array('uname'), 'get');
			//加载分页类
			import('Com.PageHelper');
                        if($uarr['uname']){
                             $total = $this->model->where("uname='$uarr[unme]'")->count();
                            
                        }else{
                            $total = $this->model->count();
                        }
			$pagesize = 10;
			PageHelper::init($pagesize,10,$page,$total,'');
			$link = PageHelper::getPageInfos();
			$limit = PageHelper::getLimit();
                        if($uarr['uname']){
                            $data = $this->model->where("uname='$uarr[uname]'")->limit($limit['min'],$pagesize)->select();
                        }else{
                           $data = $this->model->limit($limit['min'],$pagesize)->select(); 
                        }
			$position='用户管理 > 会员管理';
			$this->assignData(array('link'=>$link,'users'=>$data,'position'=>$position,'identity'=>C("IDENTITY"),'isforbidden'=>C("ISFORBIDDEN"),'mmenu'=>'user','smenu'=>'index'),'assign');
                        $this->display();
		}
		//禁用会员
		public function forbd(){
			$uid = $this->getData(array('id'),'get');
			$data['isforbidden'] = 1;
			$res = $this->model->where("uid=$uid[id]")->save($data);
			$url = $_SERVER['HTTP_REFERER'];
			$this->pagego('成功禁用','禁用失败',$res,$url);
		}
		//解除禁用
		public function restore(){
			$uid = $this->getData(array('id'),'get');
			$data['isforbidden'] = 0;
			$res = $this->model->where("uid=$uid[id]")->save($data);
			$url = $_SERVER['HTTP_REFERER'];
			$this->pagego('恢复成功','恢复失败',$res,$url);
		}
	}