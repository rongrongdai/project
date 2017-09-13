<?php

class ImageHandler{
    public  function handle($data){
        if($data['imgname']){
          
            return substr($data['imgname'], strpos($data['imgname'], '/upload'));
        }
    }
}

class AdAction extends CommonAction{
	
	public function index(){
		$position='广告位管理 > 广告管理';
		$data = M('Ad')->select();

		$this->assign(array('position'=>$position,'data'=>$data));
		$this->display();
	}

	//添加广告
	public function addAd(){
		$position='广告位管理 > 添加广告';
		if(!empty($_POST)){
            $arr = $this->getData(array('fid','city_id','title','ad_url','begin_time','end_time'),'post');
            if($_FILES['ad_img']['name']!=""){
                $arr['ad_img']=$this->handUimg('ad_img');
            }
            $arr['c_time'] = time();
            $arr['uid'] = session('id');

            if(!empty($_POST['mod'])){
                $id = $_POST['mod'];
                $arr['id'] = $id;

                $res = M('Ad')->where("id=$id")->data($arr)->save();
                $this->pagego('修改成功','修改失败',$res,'index');
            }else{
                $res = M('Ad')->data($arr)->add();
                $this->pagego('添加成功','添加失败',$res,'index');
            }
        }else{
            $arr = $this->getData(array('id','aid'),'get');
            $id = $arr['id'];
            $aid = $arr['aid'];
            if(!empty($id)){//修改
            	$sql = "SELECT a.*,b.fname,b.pname FROM bd_ad a JOIN bd_ad_area b ON a.fid=b.id WHERE a.id=$id";
                $res = M()->query($sql);
                $res = $res[0];
                $res['pos'] = $res['fname'].'--'.$res['pname'];
            }
            if(!empty($aid)){//发布
            	$res1 = M('Ad_area')->where("id=$aid")->find();
            	$res['pos'] = $res1['fname'].'--'.$res1['pname'];
            	$res['fid'] = $res1['id'];
            }
      
            $timestamp = time();
            $this->assign(array('position'=>$position,'data'=>$res,'token'=>md5('unique_salt'.$timestamp),'timestamp'=>$timestamp));
            $this->display();
        }
	}

	//删除广告
	public function delAd(){
		$arr = $this->getData(array('id'),'get');
		$id = $arr['id'];
		$res = M('Ad')->where("id=$id")->delete();
		$this->pagego('删除成功','删除失败',$res,'index');
	}

	//配置广告位
	public function addArea(){
		$position='广告位管理 > 配置广告位';
		if(!empty($_POST)){
			$arr = $this->getData(array('fname','pname','ad_sum','price'),'post');
			
			if(!empty($_POST['mod'])){
				$id = $_POST['mod'];
				$res = M('Ad_area')->where("id=$id")->data($arr)->save();
				$this->pagego('修改成功','没有修改',$res,'addArea');
			}else{
				//判断广告位是否存在
				$pname = $arr['pname'];
				$fname = $arr['fname'];
				$exists = M('Ad_area')->where("fname='{$fname}' and pname='{$pname}'")->find();
				if(!$exists){
					$res = M('Ad_area')->data($arr)->add();
				}
				$this->pagego('添加成功','已存在，勿重复添加',$res,'./addArea');
			}
			
		}else{
			$arr = $this->getData(array('id'),'get');
			$mod = $arr['id'];
			if($mod){
				$modata = M('Ad_area')->where("id=$mod")->find();
			}else{
				$pagesize = 10;
				$sum = M('Ad_area')->count();
				$sql = "SELECT * FROM bd_ad_area";
				$res = $this->setPage($pagesize,$sum,$sql);
			}
			
			$this->assign(array('position'=>$position,'data'=>$res['data'],'link'=>$res['link'],'limit'=>$res['limit'],'modata'=>$modata));
			$this->display();
		}

	}

	//删除广告位
	public function delArea(){
		$arr = $this->getData(array('id'),'get');
		$id = $arr['id'];
		$res = M('Ad_area')->where("id=$id")->delete();
		$this->pagego('删除成功','删除失败',$res,'addArea');
	}

	//广告位查看
	public function areaList(){
		$position='广告位管理 > 广告位查看';
		$arr = $this->getData(array('city_id'),'get');

		$pagesize = 10;
		$sum = M('Ad_area')->count();
		$sql = "SELECT * FROM bd_ad_area";
		$res = $this->setPage($pagesize,$sum,$sql);

		//获取广告位使用情况
		$city_id = 200;//默认城市为深圳
		if(!empty($arr['city_id'])){
			$city_id = $arr['city_id'];
		}
		foreach($res['data'] as $key=>$val){
			$fid = $val['id'];
			$res['data'][$key]['use'] = M('Ad')->where("city_id=$city_id and fid=$fid")->count();
		}

		$this->assign(array('position'=>$position,'city_id'=>$city_id,'data'=>$res['data'],'link'=>$res['link'],'limit'=>$limit));
		$this->display();
	}


}	