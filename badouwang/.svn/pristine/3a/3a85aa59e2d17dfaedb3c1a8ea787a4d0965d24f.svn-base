<?php


/**
 *  ClassfiyHelper 分类sql
 *
 * @author Administrator
 */
class ClassfiyHelper {
    //获取父分类
    public static function selfInfo($name,$model,$id='',$pname=''){
        $sirr=array();
        if($pname){
                $sirr=$model->where("name='$pname'")->field('id,lrf,rft,lev')->find();
        }
        if($id){
            $where="id='$id'";
            if($pname){
                $where.=" and lrf>$sirr[lrf] and rft<$sirr[rft]";
            }
            return $model->where($where)->field('name,id,lrf,rft,lev')->find();
        }else{
            $where="name='$name'";
            if($pname){
                $where.=" and lrf>$sirr[lrf] and rft<$sirr[rft]";
            }
            return $model->where($where)->field('id,lrf,rft,lev')->find();
        }
        
    }
    //删除某分类
    //self 有子集的时候是否删掉自身；
    public static function delClassById($id,$model,$self){
        $selfinfo=self::selfInfo('', $model,$id);
        if($selfinfo['rft']-$selfinfo['lrf']==1){
            $usql="update bd_classfiy set lrf=lrf-2,rft=rft-2 where lrf>'$selfinfo[rft]'";
            $upsql="update bd_classfiy set  rft=rft-2 where lrf<'$selfinfo[lrf]' and rft>'$selfinfo[rft]'";
            $dsql="delete from bd_classfiy where id='$id'";
            $res=$model->transQuery(array($usql,$upsql,$dsql));
            return $res;
        }else{
            $del="delete from bd_classfiy where lrf>$selfinfo[lrf] and rft<'$selfinfo[rft]'";
            $minus=(int)$selfinfo['rft']-(int)$selfinfo['lrf']+1;
            $usql="update bd_classfiy set lrf=lrf-$minus,rft=rft-$minus where lrf>'$selfinfo[rft]'";
            $upsql="update bd_classfiy set  rft=rft-$minus where lrf<'$selfinfo[lrf]' and rft>'$selfinfo[rft]]'";
            $res=true;
            if($self){
                $dsql="delete  from bd_classfiy where id='$id'";
                $res=$model->transQuery(array($del,$upsql,$usql,$dsql));
            }else{
                $res=$model->transQuery(array($del,$upsql,$usql));
            }
            return $res;
            
        }
    }
    //获取某分类
    //name 分类名 clevel 多少级子分类
    public static function getClassesByName($name,$clevel,$model,$fields,$ishot=false,$hotfield='ishot',$pname=''){
        $sql='';
        if($name){
            if(intval($name)){
               $selfinfo=self::selfInfo('', $model, $name);
            }else{
               
               $selfinfo=self::selfInfo($name, $model,'',$pname); 
            }
            
            if($fields){
                if($clevel){
                    $sql="select $fields from bd_classfiy where lrf>'$selfinfo[lrf]' and rft<'$selfinfo[rft]]' and lev-$selfinfo[lev]=$clevel";
                }else{
                    $sql="select $fields from bd_classfiy where lrf>'$selfinfo[lrf]' and rft<'$selfinfo[rft]]' ";
                }
            }else{
                if($clevel){
                    $sql="select id,name,cimg,ctextbrand from bd_classfiy where lrf>'$selfinfo[lrf]' and rft<'$selfinfo[rft]]' and lev-$selfinfo[lev]=$clevel";
                }else{
                    $sql="select name,cimg,ctextbrand from bd_classfiy where lrf>'$selfinfo[lrf]' and rft<'$selfinfo[rft]]'"; 
                }
                
            }
        }else{
            if($fields){
                $sql="select $fields from bd_classfiy where lev=2";
            }else{
                $sql="select name,cimg,ctextbrand from bd_classfiy where lev=2";
            }
        }
        
        if($ishot){
            $sql.=" and $hotfield=1";
        }
        return $model->query($sql);                                                                           
    }
    //获取某分类详细信息
    public static function classDetail($name,$model){
       return $model->where("name='$name'")->fields('cimg,curl,ctextbrand')->find();
    }
    
    //添加分类
    public  static function addClissfiy($data,$model){
        if(!$data['pname']){
            $data['pname']=1;
        }
        $selfinfo=self::selfInfo('',$model,$data['pname']);
        unset($data['pname']);
        $data['lrf']=$selfinfo['rft'];
        $data['rft']=$selfinfo['rft']+1;
        $data['lev']=$selfinfo['lev']+1;
        $data['set_timestamp']=time();
        $insql="insert into bd_classfiy (".  implode(',', array_keys($data)).") values('".  implode("','",$data)."')";
        $usql="update bd_classfiy set lrf=lrf+2,rft=rft+2 where lrf>$selfinfo[rft]";
        $upsql="update bd_classfiy set rft=rft+2 where lrf<=$selfinfo[lrf] and rft>=$selfinfo[rft]";
        return $model->transQuery(array($insql,$upsql,$usql));
    }
    //获取分类子集数目
    public static function getLevel($cname,$model){
        if($cname){
             $selfinfo=self::selfInfo($cname, $model);
             if($selfinfo){
                 $sql="select max(lev) mlev from bd_classfiy where lrf>$selfinfo[lrf] and rft<$selfinfo[rft]";
                 $res=$model->query($sql);
                 return ((int)$res[0]['mlev']-(int)$selfinfo['lev']);
             }else{
                 return '分类不存在';
             }
             
        }
    }
    //对分类排序
    private static function sortC(&$arr){
        $len=count($arr);
        //冒泡排序
        
        for($i=0;$i<$len;$i++){
            for($j=0;$j<$len-$i-1;$j++){
                if($arr[$j+1]['plev']<$arr[$j]['plev']){
                    $temp=$arr[$j+1];
                    $arr[$j+1]=$arr[$j];
                    $arr[$j]=$temp;
                }
            }
        }
       
        return $arr;
    }
    
    //获取排序后的分类值
    public static function getOclassByName($cname,$model){
        $sel=self::selfInfo($cname, $model);
        $sql="select classfiy.name,id,classfiy.ishot,pclass.name pname,ifnull(pclass.lev,0) plev from bd_classfiy classfiy left join( select name,lrf,rft,lev from bd_classfiy where lrf>$sel[lrf] and rft<$sel[rft]) pclass on classfiy.lrf>pclass.lrf and classfiy.rft<pclass.rft and classfiy.lev-pclass.lev=1 where classfiy.lrf>$sel[lrf] and classfiy.rft<$sel[rft]";
        $class=self::sortC($model->query($sql));
        $res=array();
        //分类排序
        foreach ($class as $key=>$val){
            if(!$val['plev']){
                $val['pname']=$val['name'];;
            }
            if(!in_array($val['pname'],  array_keys($res))){
                $res[$val['pname']]=array();
                if($val['plev']){
                    $res[$val['pname']][]=$class[$key];
                }
            }else{
                unset($class[$key]['pname']);
                $res[$val['pname']][]=$class[$key];
            }
        }
        //var_dump($res);exit();
       //组合第三级分类
        foreach($res as $key=>$val){
            if($val[0]['plev']<=3){
                foreach($val as $k=>$v){
                    if($res[$v['name']]){
                        $res[$key][$k]['classes'][]=$res[$v['name']];
                        unset($res[$v['name']]);
                    }
                };
            }
            
        }
       
        $hotclass=array();
        foreach ($res as $key=>$val){
            if($val['ishot']){
                $hotclass[]=$res[$key];
            }
            foreach ($val as $k=>$v){
                if($v['ishot']){
                    $hotclass[]=$res[$key][$k];
                }
                foreach ($v['class'] as $kv=>$vv){
                   if($v['ishot']){
                        $hotclass[]=$v['class'][$kv];
                    } 
                }
            }
        }
        unset($class);
        return array('res'=>$res,'hot'=>$hotclass);
    }

    //获取一级子分类----2015-6-29-cht-----
    public static function getClassSon($model,$cid){
        $res = $model->where("id=$cid")->field("lrf,rft")->find();
        $lrf = $res['lrf'];
        $rft = $res['rft'];
        $data = $model->where("lrf > $lrf and rft < $rft")->field("id,name")->select();
        return $data;
    }

}
