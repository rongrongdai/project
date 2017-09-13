<?php

/**
 * 消费记录
 *
 * @author fanbo
 */
class ConsumeAction extends CommonAction{
    //消费详情
    public function echarge(){
        $this->display();
    }


    //提现记录
    public function deposit(){
       $uid=session('uid');
       $uinfo=M('Memberfields')->where("uid='$uid'")->field('vmoney,ali_count,money,ali_count')->find();
       if($uinfo['ali_count']){
           $acount=  explode(',', $uinfo['ali_count']);
           if(count($acount)){
               foreach($acount as $key=>$val){
                    $arr=  explode(':',$val);
                   $acount[$key]=array('cname'=>$arr[1],'acount'=>$arr[0]);
               }
           }
           
       }
       $page=$this->initPage();
       $pagesize=8;
       $sum=M('Jjbm_order')->where("suid='$uid' and type=3")->count();
       import('Com.PageHelper');
       PageHelper::init($pagesize, 10, $page['page'], $sum, '');
       $min=($page['page']-1)*(int)$pagesize;
       $orders=M('Jjbm_order')->where("suid='$uid' and type=3")->field('order_num,bm_time,msg,money,ispay')->limit($min,$pagesize)->select();
       import('Com.Config');
       $plimit=  Config::getConfig('常规配置','posit_min');
       $this->assign(array('uinfo'=>$uinfo,'acount'=>$acount,'plimit'=>$plimit,'orders'=>$orders,'pages'=>  PageHelper::getPageInfos()));
       $this->display();
    }
    private function init($number,$type){
        $data['count']=$number;$data['uid']=session('uid');$data['info']='体现'.$number.'学豆';$data['timestamp']=time();
        $data['type']=$type;
        return $data;
    }
    //提现
    public function posit(){
        if($_POST){
            $number=$this->getData(array('number','type'),'post');
            $rf=$this->f_check('token');
            $uid=session('uid');
            if($rf){
                $model=D('User/Consume');
                if($number['type']){
                    $money=((int)$number['number'])*0.1;
                    $mmodel=M('Memberfields');
                    $cmoney=$mmodel->where("uid='$uid'")->field('money,vmoney')->find();
                    if($cmoney['money']<$money){
                        $this->error('当前余额不足，请先充值！','charge');
                    }else{
                        $model->startTrans();
                        $data=$this->init($number['number'],'2');
                        $data['info']='购买'.$number['number'].'学豆';
                        $res=true;
                        if($model->create($data)){
                            $res=$model->add($data);
                            if($res){
                                $data=$this->init(-$money,1);
                                $data['info']='购买'.$number['number'].'学豆，花费'.$money.'元';
                                $res=true;
                                if($model->create($data)){
                                    $res=$model->add($data);
                                    if($res){
                                        $res=$mmodel->where("uid='$uid'")->save(array('money'=>$cmoney['money']+(-$money),'vmoney'=>$number['number']));
                                        if($res){
                                            $this->success('购买成功','charge');
                                            $model->commit();
                                        }else{
                                            $model->rollback();
                                            $this->error($mmodel->getError());
                                        }
                                    }else{
                                        $model->rollback();
                                        $this->error($model->getError());
                                    }
                                }else {
                                    $model->rollback();
                                    $this->error($model->getError());
                                }
                            }
                        }else{
                            $model->rollback();
                            $this->error($model->getError());
                        }
                    }
                    return;
                }
                $fields=M('Memberfields')->where("uid='$uid'")->field('money,vmoney')->find();
                if($number['number']>$fields['vmoney']){
                    $this->error('提现数量超过您当前余额，请重试！');
                    return;
                }
                $data=$this->init(-$number['number'],2);
                $data['info']='体现'.$number.'学豆';
                if($model->create($data)){
                    $model->startTrans();
                    $res=$model->add($data);
                    $count=0;
                    if($res){
                       $count=((int)$number['number'])*0.1;
                       $data=$this->init($count, 1);
                       $data['info']='提现'.$number['number'].'学豆,获取现金'.$count.'元';
                       if($model->create($data)){
                           $res=$model->add($data);
                       }
                       //更新memberfilds
                       if($res){
                           $data=array('money'=>$fields['money']+$count,'vmoney'=>$fields['vmoney']-$number);
                           $res=$model->where("uid='$uid'").save($data);
                       }else{
                           $model->rollback();
                       }
                       if($res){
                           $model->commit();
                           $this->success('体现成功！');
                       }else{
                           $model->rollback();
                           $this->success('体现失败！');
                       }
                    }else{
                        $model->rollback();
                    }
                }else{
                    $this->error($model->getError());
                }
            }else{
                $this->error('请不要重复提交表单！');
            }
        }else{
            $token=md5(time());
            $uid=session('uid');
            $this->assignData(array('token'=>$token,'timestamp'=>time(),'cmoney'=>M('Memberfields')->where("uid='$uid'")->field('vmoney')->find()),'assign');
            session('ftoken',$token);
            $type=$_GET['type'];
            if($type){
                $this->assign('type',$type);
            }
            $this->display();
        }
        
    }
    //充值
    public function bind(){
        if($_POST){
            $uid=session('uid');
            $data=$this->getData(array('acount','c_acount','cname'),'post');
            if($data['acount'] && $data['c_acount'] && $data['acount']===$data['c_acount'] && $data['cname']){
                $ocount=M('Memberfields')->where("uid='$uid'")->field('ali_count')->find();
                if($ocount['ali_count'] && strpos($ocount['ali_count'],$data['acount'],1)!==0){
                    $this->error('该账号已绑定！');
                }else{
                    if($ocount['ali_count']){
                        $acunt=$ocount['ali_count'].','.$data['acount'].':'.$data['cname'];
                    }else{
                        $acunt=$data['acount'].':'.$data['cname'];
                    }
                    $res=M('Memberfields')->where("uid='$uid'")->setField('ali_count',$acunt);
                    $this->pagego('绑定账号成功！', '绑定账号失败', $res, '');
                }
            }else{
                $this->error('请正确填写绑定账号！');
            }
        }else{
            $this->error('非法访问！');
        }
        
    }
    //提现
    public function depoit(){
       $data=$this->getData(array('money','ali_count','rname'), 'post');
       if($data['money'] && $data['ali_count']){
           $uid=session('uid');
           $max=M('Memberfields')->where("uid='$uid'")->field('money')->find();
           if($data['money']>$max['money']){
               $this->error('提现金额超出可提现范围，提现失败！');
           }else{
               $res=M('Depoit')->add(array('uid'=>$uid,'rname'=>$data['rname'],'s_timestamp'=>time(),'status'=>0,'a_count'=>$data['ali_count'],'money'=>$data['money']));
               if($res){
                   //扣去余额
                   $res=M('Memberfields')->where("uid='$uid'")->setDec('money', -(int)$data['money']);
                   //发送站内信
                   if($res){
                       $model=D('User/Message');
                       $res=$model->senMessage($uid,null,'提取现金'.$data['money'].'成功，待审后发放!','提现成功');
                       $this->pagego('提现成功！','提现失败', $res,'');
                   }
                   
               }
           }
       }else{
           $this->error('提现信息不完整，请重试！');
       }
       
    }

    

}