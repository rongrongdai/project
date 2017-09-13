function resize(){
    //父页面获取框架高度自动调整
    ifram()   //运行
    var he = $(document).height();
    function ifram(){$(window.parent.document).find("#irm").load(function(){	$(this).height(he);	})}
    $(window).resize(function () { ifram()  })// 改变浏览器可视窗口宽度与高度
}
$(function(){
    //resize();
})
//js设置cookie
function setCookie(c_name,value,expiredays)
{
var exdate=new Date()
exdate.setDate(exdate.getDate()+expiredays)
document.cookie=c_name+ "=" +escape(value)+
((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
}
//js获取cookies
function getCookie(c_name)
{
if (document.cookie.length>0)
  {
  c_start=document.cookie.indexOf(c_name + "=")
  if (c_start!=-1)
    { 
    c_start=c_start + c_name.length+1 
    c_end=document.cookie.indexOf(";",c_start)
    if (c_end==-1) c_end=document.cookie.length
    return unescape(document.cookie.substring(c_start,c_end))
    } 
  }
return ""
}
function initclass(cid,cname,grade,gname,def){
    if(cid){
            initClass(cid,cname,def); 
    }else{
          initClass("cid",cname,def); 
    }
    if(grade){
                initClass("grade",gname,grade); 
    }else{
         initClass("grade",gname); 
    }
    
    
}


