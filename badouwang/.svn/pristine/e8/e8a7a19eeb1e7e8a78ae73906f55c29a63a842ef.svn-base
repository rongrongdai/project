<?php
/**
*自动调用Ueditor编辑器
*@param string $width  设置宽度
*@param string $height 设置高度
*@param string $len    限制字数
*@param string $type   类型: 1 文章发布  2 留言板
*
*/
class UeditorHelper{
	public static function ueditor($width,$height,$len,$type){
		$str = '<script type="text/javascript" charset="utf-8" src="__ROOT__/thirdapi/uediter/ueditor.config.js"></script>';
		$str .= '<script type="text/javascript" charset="utf-8" src="__ROOT__/thirdapi/uediter/ueditor.all.min.js"> </script>';
		$str .= '<script type="text/javascript" charset="utf-8" src="__ROOT__/thirdapi/uediter/lang/zh-cn/zh-cn.js"></script>';
		$str .= '<textarea id="content" name="content"></textarea>';
		$str .= <<<EOT
			<script>
				var tool; 
				if($type == 1){
					tool = [['fullscreen','undo','redo','|','bold', 'italic','fontfamily','fontsize','|','justifyleft', 'justifycenter','lineheight','paragraph', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|','simpleupload', 'emotion','map']];
				}else if($type == 2){
					tool = [['bold', 'italic', 'underline','emotion']];
				}
				var ue = UE.getEditor('content',{
					//修改编辑器的配置
					toolbars:tool,
					initialFrameWidth:$width,//编辑器宽度
					initialFrameHeight:$height,//编辑器高度
					initialContent:"请填写内容...",
					elementPathEnabled : false,//是否启用元素路径
					maximumWords:$len,//最大输入字数
					enableAutoSave: false,//取消自动保存
					saveInterval: 60000,
					autoHeightEnabled:false,//是否自动长高		
					autoClearinitialContent:false,//清除初始内容
					focus:false //初始化时获取焦点
				});
			</script>
EOT;
		return $str;
	}

}