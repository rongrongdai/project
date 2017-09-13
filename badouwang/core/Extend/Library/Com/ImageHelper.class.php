<?php
/**
 * 图片功能类
 *
 * @author fanbo
 */
include __DIR__.DIRECTORY_SEPARATOR."FileHelper.class.php";
class ImageHelper {
    private static function getDir(){
        return substr(__DIR__,0,  stripos(__DIR__, 'core'));
    }
    public static function verify($type,$text){
        $cimg=self::getDir().'public'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'home'.DIRECTORY_SEPARATOR;
        if($type==='teach'){
            $cimg.='hverfiy.png';
        }else if($type==='organ'){
            $cimg.='overfiy .png';
        }
        $img=imagecreatetruecolor(300,75);
        $bac = imagecolorallocate($img, 255, 255, 255);
        imagefilledrectangle($img, 0, 0, 300, 75, $bac);
        $current_image = imagecreatefrompng($cimg);
        imagecopy($img, $current_image, 0, 0,0,0, 301,75);
        $textcolor = imagecolorallocate($img, 229, 68, 2);
        $dir=substr(__FILE__,0,  strpos(__FILE__, 'core')).'public'.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR;
        $font=$dir."simhei.ttf";
        imagettftext($img, 10, 0,180, 63, $textcolor, $font,$text);
        header("content-type:image/png");
        imagepng($img);
        imagedestroy($img);
    }



    //获取图片信息==========2015-7-7=====cht======
    private static function getImageInfo($img) {
        $imageInfo = getimagesize($img);
        if ($imageInfo !== false) {
            $imageType = strtolower(substr(image_type_to_extension($imageInfo[2]), 1));
            $imageSize = filesize($img);
            $info = array(
                "width" => $imageInfo[0],
                "height" => $imageInfo[1],
                "type" => $imageType,
                "size" => $imageSize,
                "mime" => $imageInfo['mime']
            );
            return $info;
        } else {
            return false;
        }
    }

    //缩略图
    public static function thumb($image, $thumbname, $type='', $maxWidth=200, $maxHeight=150, $interlace=true) {
        $info = ImageHelper::getImageInfo($image);
        if ($info !== false) {
            $srcWidth = $info['width'];
            $srcHeight = $info['height'];
            $type = empty($type) ? $info['type'] : $type;
            $type = strtolower($type);
            $interlace = $interlace ? 1 : 0;
            unset($info);
            $scale = min($maxWidth / $srcWidth, $maxHeight / $srcHeight);
           
            if ($scale >= 1) {
                $width = $srcWidth;
                $height = $srcHeight;
            } else {
                $width = (int) ($srcWidth * $scale);
                $height=(int) ($srcHeight * $scale);
            }
            $createFun = 'ImageCreateFrom' . ($type == 'jpg' ? 'jpeg' : $type);
            if(!function_exists($createFun)) {
                return false;
            }
            $srcImg = $createFun($image);

            if ($type != 'gif' && function_exists('imagecreatetruecolor'))
                $thumbImg = imagecreatetruecolor($width, $height);
            else
                $thumbImg = imagecreate($width, $height);

            if('png'==$type){
                imagealphablending($thumbImg, false);
                imagesavealpha($thumbImg,true);    
            }elseif('gif'==$type){
                $trnprt_indx = imagecolortransparent($srcImg);
                 if ($trnprt_indx >= 0) {
                       $trnprt_color = imagecolorsforindex($srcImg , $trnprt_indx);
                       $trnprt_indx = imagecolorallocate($thumbImg, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
                       imagefill($thumbImg, 0, 0, $trnprt_indx);
                       imagecolortransparent($thumbImg, $trnprt_indx);
              }
            }

            if (function_exists("ImageCopyResampled"))
                imagecopyresampled($thumbImg, $srcImg, 0, 0, 0, 0, $width, $height, $srcWidth, $srcHeight);
            else
                imagecopyresized($thumbImg, $srcImg, 0, 0, 0, 0, $width, $height, $srcWidth, $srcHeight);

            if ('jpg' == $type || 'jpeg' == $type)
                imageinterlace($thumbImg, $interlace);

            $imageFun = 'image' . ($type == 'jpg' ? 'jpeg' : $type);
            $imageFun($thumbImg, $thumbname);
            imagedestroy($thumbImg);
            imagedestroy($srcImg);
            return $thumbname;
        }
        return false;
    }

    //裁剪图片
    public static function cut($src,$x,$y,$width,$height){
        $info =  ImageHelper::getImageInfo($src);
        if ($info !== false){
            $src_width = $info['width'];
            $src_height = $info['height'];
            $type = empty($type) ? $info['type'] : $type;
            $type = strtolower($type);
            unset($info);
            //$src_res = $info['res'];
            $createFun = 'ImageCreateFrom' . ($type == 'jpg' ? 'jpeg' : $type);
            if(!function_exists($createFun)) {
                return false;
            }
            $src_res = $createFun($src);
            //return $src_res;
            $dst_res = imagecreatetruecolor($width,$height);
            imagecopyresampled($dst_res,$src_res,0,0,$x,$y,$width,$height,$width,$height);
            
            //输出图像
            $arr = pathinfo($src);
            $file = $arr['dirname']."/".$arr['filename']."_small.jpg";
            imagejpeg($dst_res,$file);
            
            //销毁资源
            imagedestroy($dst_res);
            imagedestroy($src_res);
            return ltrim($file,'.');
        }
        return false;
    }
    public static function upimg($ifield){
        /**
        * Jcrop image cropping plugin for jQuery
        * Example cropping script
        * @copyright 2008-2009 Kelly Hallman
        * More info: http://deepliquid.com/content/Jcrop_Implementation_Theory.html
        */
       $dir= FileHelper::getUploadFileDir();
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if ((($_FILES[$ifield]["type"] == "image/gif")
			|| ($_FILES[$ifield]["type"] == "image/jpeg")
			|| ($_FILES[$ifield]["type"] == "image/pjpeg")
			|| ($_FILES[$ifield]["type"] == "image/png"))){
                        $file=$_FILES[$ifield]["name"];
                        $filename=substr($file,0,strpos($file,'.'));
                        $extend=substr($file,  strpos($file,'.'));
			move_uploaded_file($_FILES[$ifield]["tmp_name"],$dir .DIRECTORY_SEPARATOR.urlencode($filename).time().$extend);
			$src = $dir.DIRECTORY_SEPARATOR.urlencode($filename).time().$extend;
                        self::thumb($src,$src,'',300,250,true);
			if($_FILES[$ifield]["type"]== "image/jpeg"||$_FILES["file"]["type"] == "image/pjpeg"){
                            $img_r = imagecreatefromjpeg($src);
			}else if($_FILES[$ifield]["type"] == "image/png"){
                            
                            $img_r = imagecreatefrompng($src);
			}else if($_FILES[$ifield]["type"] == "image/gif"){
                            $img_r = imagecreatefromgif($src);
			}
                        
			$dst_r = ImageCreateTrueColor($_POST['w'],$_POST['h'] );
			imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
			$_POST['w'],$_POST['h'],$_POST['w'],$_POST['h']);
                        //header('Content-type: image/png');
			imagepng($dst_r,$src);
                        return substr($src,strpos($src, 'upload'));
                        }else{
                            echo 'gg';
                            exit();
                            return false;
                        }
        }
    }
}
