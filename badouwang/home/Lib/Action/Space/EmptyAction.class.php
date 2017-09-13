<?php

class EmptyAction extends Action{
    public function index(){
         if($_SERVER['HTTP_REFERER']){
            $this->redirect('Index/Index/pempty',array('error'=>'访问模块不存在！','ref'=>$_SERVER['HTTP_REFERER'])); 
        }else{
           $this->redirect('Index/Index/pempty',array('error'=>'访问模块不存在！')); 
        }
    }
}

