<?php



/**
 * 分类控制器
 *
 * @author fanbo
 */

class ImageHandler{
    public  function handle($data){
        if($data['imgname']){
            return substr($data['imgname'], strpos($data['imgname'], '/upload'));
        }
    }
}
class ClassfiyAction extends CommonAction{
    private $model;
    public function __construct() {
        $this->model=new ClassfiyModel();
        parent::__construct();
    }
    public function index(){
        //查看分类
        $position='<span>网站设置></span><span>分类设置</span>';
        $this->assignData(array('mmenu'=>'webconfig','smenu'=>'classfiy'), 'assign');
        $this->assignData(array('position'=>$position,'token'=> md5('unique_salt'.time()),'timestamp'=>time()),'assign');
        $this->display();
    }
    //保存分类
    public function saveClassfiy(){
         import('Com.FileHelper');
         import('Com.ClassfiyHelper');
         if($_FILES['cimg']['name']){
              $limit=(int)C('IMG_LIMIT_SIZE')*1024;
              $dir=  FileHelper::getUploadFileDir();
              $uploadfile=$dir;
              $extend=substr($_FILES['cimg']['name'],  strripos($_FILES['cimg']['name'],'.'));
              $uploadfile=$dir.'/'.rand(1, 1000).time().$extend;
                $data['cimg']=FileHelper::saveFile($uploadfile,'cimg', array('extension'=>array('jpg','png','gif'),'size'=>$limit),new ImageHandler());
         }
         $data=$this->getData(array('name','cimg','ctextbrand','pname'),'post');
         $res= ClassfiyHelper::addClissfiy($data, $this->model);
         if($res){
             echo json_encode(array('code'=>1,'message'=>'添加分类成功！'));
         }else{
             echo json_encode(array('code'=>0,'message'=>'添加分类失败！'));
         }
         
        
    }
    //修改分类
    public function entity() {
        $name=$_GET['cname'];
        $idarr=$this->model->where("name='$name'")->field('id')->find();
        $position='网站设置 > 分类管理';
        $id=$idarr['id'];
        $this->assignData(array('timestimp'=>$time,'token'=>md5('unique_salt'.time())), 'assign');
        if($id){
            $this->preEntity($id, $this->model,'分类',$position,'saveClass',null);
        }else{
                $this->error('非法访问');
        }
        parent::entity();
    }
    //保存修改
    public function saveClass(){
       $data=$this->getData(array('ctextbrand','name','oname','oid'),'post');
       $id=$data['oid'];unset($data['id']);
       unset($data['oname']);
       $path=PROJECT_ROOT.'/'.C('PROJECT_NAME').$iarr['cimg'];
       echo $path;exit();
       if($_FILES['cimg']['name']){
           import("Com.FileHelper");
           $data['cimg']=  FileHelper::saveFile($path,'cimg', array('extension'=>array('jpg','png','gif')),new ImageHandler());
       }
       $res=true;
       if($this->model->create($data)){
           $res=$this->model->where("id='$id'")->save($data);
           $this->pagego('保存分类成功','未修改数据', $res, 'index');
       }else{
           $this->error('请输入完整信息!');
       }
    }
    //删除分类
    public function delClass(){
        $cname=$_GET['cname'];
        if($cname){
            import('Com.ClassfiyHelper');
            $res=ClassfiyHelper::delClassById($cname, $this->model, true);
            $this->pagego('删除分类成功','删除分类失败', $res,'');
        }else{
            $this->error('非法操作！');
        }
    }
}
