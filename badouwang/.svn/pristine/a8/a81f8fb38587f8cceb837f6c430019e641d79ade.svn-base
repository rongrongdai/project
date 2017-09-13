selectrate = 1;
rate = 1;
cimg='';
function clacImgZoomParam(maxWidth, maxHeight, width, height) {
    var param = {top: 0, left: 0, width: width, height: height};
    if (maxWidth) {
        rateWidth = width / maxWidth;
        rateHeight = height / maxHeight;
        if (rateWidth > rateHeight)
        {
            param.width = maxWidth;
            param.height = Math.round(height / rateWidth);
            //rate=rateWidth;
        } else
        {
            param.width = Math.round(width / rateHeight);
            param.height = maxHeight;
//rate=rateHeight;
        }
        /*param.left = Math.round((maxWidth - param.width) / 2);
         param.top = Math.round((maxHeight - param.height) / 2);*/
    }
    return param;
}
function preview(img, selection) {
    if (!selection.width || !selection.height)
    {
        return;
    } 
    var img = $("#view_photo");
    var scaleX = $("#preview").width() / selection.width;
    var scaleY = $("#preview").height() / selection.height;
    $('#view_photo').css({
        width: Math.round(scaleX * $("#"+cimg).width()),
        height: Math.round(scaleY * $("#"+cimg).height()),
        marginLeft: -Math.round(scaleX * selection.x1),
        marginTop: -Math.round(scaleY * selection.y1)
    });
    
    $("#startX").val(Math.round(selection.x1 * rate));
    $("#startY").val(Math.round(selection.y1 * rate));
    $("#width").val(Math.round(selection.width * rate));
    $("#height").val(Math.round(selection.height * rate));
}
function init(w, h, oimg,cim) {
    cimg=cim;
    var width = $('#'+oimg).width();
    var height = $('#'+oimg).height();
    var obj=$("#"+oimg);
    obj.imgAreaSelect({
        aspectRatio: "1:1",
        handles: false,
        fadeSpeed: 200,
        onSelectChange: preview,
        x1: 0, y1: 0, x2: w, y2: h
    });
   
}