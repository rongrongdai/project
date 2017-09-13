<?php
//城市控制器
class CityAction extends CommonAction{
    //获取已开通城市
    public function getCitys(){
        $city=M('City')->where('isopen = 1')->select();
        $this->ajaxr(1, '', '',$city);
    }
}


