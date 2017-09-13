function ajaxGet(url,param,handel,anrc){
        $.get(url,param,function(data){
            handel(data);
        });
}
function ajaxPost(url,param,handel){
    $.post(url,param,handel);
}
$(function(){
        $("#nav").find("li").click(function(){
              $("nav").find("li").css("background","#3B3E40");
              $(this).css("background","#208ed3");
              $(".submenu").css("display","none");
              $(this).find(".submenu").css("display","block");
        })


          $("#nav").find("li").mouseout(function(){
              if($(this).find(".submenu").css("display")!="block"){
                    $(this).css("background","#3B3E40");
              }
          })
          $(".submenu").each(function(){
              if($(this).css("display")==='block'){
                  $(this).parent().css("background","#208ed3");
              }
          })
          
          
          
})
$("#c_img").click(function(){
    $("input[type=file]").click();
 })

