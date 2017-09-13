<?php
	/**
     * 生成图像验证码
     * @static
     * @access public
     * @param string $length  验证码位数
     * @param string $mode    类型: 0-纯数字 1-大小写字母 2-数字+大写字母
     * @param string $type    图像格式：默认png
     * @param string $width   宽度
     * @param string $height  高度
     * @param string $verifyName  $_SEESION的key值
     * @return string
     */
	class VerifyHelper{
	    static function buildImageVerify($length=4, $mode=1, $type='png', $width=48, $height=22, $verifyName='verify'){
	        if ($type != 'gif' && function_exists('imagecreatetruecolor')) {
	            $im = imagecreatetruecolor($width, $height);
	        } else {
	            $im = imagecreate($width, $height);
	        }

			//分配颜色
			$stringColorq = imagecolorallocate($im,149,173,168);
			$stringColors = imagecolorallocate($im,mt_rand(0,120),mt_rand(0,120),mt_rand(0,120));
			
			//准备一个随机字符串
			switch($mode){
				case 0:
					$str = str_shuffle(join(array_rand(range(0,9),$length)));
					break;
				case 1:
					$str = str_shuffle(join(array_rand(array_flip(array_merge(range('a','z'),range('A','Z'))),$length)));
					break;
				case 2:
				default:
					$str = str_shuffle(join(array_rand(array_flip(array_merge(range(0,9),range('A','Z'))),$length)));
			}
			//画布
	        imagefilledrectangle($im,0,0,$width,$height,$stringColorq);

	       	//写入字符串
	        for ($i=0; $i<$length;$i++) {
	        	$stringColors = imagecolorallocate($im,mt_rand(0,120),mt_rand(0,120),mt_rand(0,120));
	        	imagestring($im, 5, $i * 10 + 12, mt_rand(5, 8), $str[$i], $stringColors);
	        }
	        //加入干扰素
			for($i=0;$i<=10;$i++){
				imagesetpixel($im,mt_rand(0,$width),mt_rand(0,$height),$stringColors);
			}
			for($i=0;$i<=0;$i++){
				imageline($im,mt_rand(0,$width),mt_rand(0,$height),mt_rand(0,$width),mt_rand(0,$height),$stringColors);
			}
			//把字符串存入session
	        session($verifyName, strtolower($str));
	        //输出图像
	        VerifyHelper::output($im, $type);
	    }

	    static function output($im, $type='png', $filename='') {
	        header("Content-type: image/" . $type);
	        $ImageFun = 'image' . $type;
	        if (empty($filename)) {
	            $ImageFun($im);
	        } else {
	            $ImageFun($im, $filename);
	        }
	        imagedestroy($im);
	    }
	}