<?php
/**
 * 表单字段帮组类
 *
 * @author 樊波
 */
class FormHelper {
    private static $input='<input type="text" name="#name" value="#value" id="#name" class="#class" />';
    private static $hidden='<input type="hidden" name="#name" value="#value" id="#name" class="#class" />';
    private static $select='<select type="text" name="#name" id="#name">#option</select>';
    private static $textarea='<textarea name="#name" id="#name">#value</textarea>';
    private static $imgupload='<span style="margin-left:10px;" id="img">当前图片:  <img src="__ROOT__#value" width="100px" style="margin-left:10px;"></span><div class="btn" id="c_img" style="width:120px;height:30px;line-height:30px;text-align:center;"> 选择图片</div>
                                <input id="#name" name="#name" value="#value" type="file" multiple="true" style="display:none" self="file_upload">';
    private static $password="<input type='password' name='#name' class='#class' />";
    private static function replaceLabel($replace,$type){
        $res=$type;
        foreach($replace as $key=>$val){
            $res=  str_replace($key, $val, $res);
        }
        return $res;
    }
    //获取字段html
    public static function getInput($type,$name,$class,$value,$option,$checked=false){
        switch($type){
            case 'input':
                    $res=self::replaceLabel(array('#name'=>$name,'#class'=>$class,'#value'=>$value),self::$input);
                    return $res;
                break;
            case 'hidden':
                    $res=self::replaceLabel(array('#name'=>$name,'#class'=>$class,'#value'=>$value),self::$hidden);
                    return $res;
                break;
            case 'textarea':
                    $res=self::replaceLabel(array('#name'=>$name,'#class'=>$class,'#value'=>$value),self::$textarea);
                    return $res;
                break;
            case 'select':
                    $res=self::replaceLabel(array('#name'=>$name,'#class'=>$class,'#option'=>$option),self::$select);
                    return $res;
            break;
            case 'imgupload':
                    $res=self::replaceLabel(array('#name'=>$name,'#class'=>$class,'#value'=>$value),self::$imgupload);
                    return $res;
                break;
            case 'password':
                    $res=self::replaceLabel(array('#name'=>$name,'#class'=>$class),self::$password);
                    return $res;
                break;
            
        }
    }
}
