<?php



/**
 * Description of ProxyermanageModel
 *
 * @author 樊波
 */
class ProxyermanageModel extends CommonModel{
    protected $fields = array('tname','timg','tintroduce','treson','cid','grade','pid','cid','city','type','telephone','oname','o_img','o_address','cname','c_descript','oid');
    protected  $_validate=array();
    protected $t_validate = array(
        array('tname','require','教师名不能为空'), 
        array('tintroduce','require','简介不能为空！'),
        array('grade','require','授课不能为空！'),
        array('city','require','城市不能为空！'),
        array('cid','require','类别不能为空！'),
        array('telephone','require','联系电话不能为空！'),
    );
    protected $c_validate = array(
        array('tname','require','教师名不能为空'), 
        array('tintroduce','require','简介不能为空！'),
        array('city','require','城市不能为空！'),
        array('cid','require','类别不能为空！'),
        array('telephone','require','联系电话不能为空！'),
        array('c_descript','require','课程描述不能为空！'),
        array('oid','require','课程描述不能为空！'),
    );
    protected $o_validate = array(
        array('oname','require','机构名不能为空'), 
        array('tintroduce','require','简介不能为空！'),
        array('city','require','城市不能为空！'),
        array('cid','require','类别不能为空！'),
        array('oaddress','require','机构地址不能为空！'),
        array('telephone','require','联系电话不能为空！'),
    );
    public function setValid($type){
        $valid=$type.='_validate';
        $this->_validate=$this->$valid;
    }
    
}
