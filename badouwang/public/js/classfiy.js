//id 容器id cname分类名 fname为数据库字段 def默认字段
function initClass(id,cname,def){
    $.get("../../Ajax/AjaxClassfiy/getLev?cname="+cname,function(data){
                data=eval('('+data+')');
                if(data.code==1){
                    for(i=0;i<data.message;i++){
                        var content='<select  name="class" style="margin-right:10px;" onchange="initChild('+"'"+cname+"','',this"+')"><option>请选择分类</option></select>'
                        $("#"+id).append(content);
                    }
                    initChild(cname,true,false,id,def);
                }
                if(def){
                    $("select[name=class]:last").append("<option value="+def+" selected>"+def+"</option>");
                }
            });
            
}
function initChild(cname,first,self,id,def){
    if(self){
        cname=$(self).val();
    }
    var pname=$(self).parent().find("select:first").val();
    var url="../../Ajax/AjaxClassfiy/getChild?cname="+cname;
    if(pname!==cname && cname!=='培训分类'){
            url+="&pname="+pname;
    }
    $.get(url,function(data){
        data=eval('('+data+')');
        var content='';
        if(data.data.length>0){
            for(i in data.data){
                if(def && def===data.data[i].name){
                    content+='<option value="'+data.data[i].id+' " selected>'+data.data[i].name+'</option>'; 
                }else{
                   content+='<option value="'+data.data[i].id+'">'+data.data[i].name+'</option>'; 
                }
            }
            if(!first){
                if($(self).val()!='请选择分类'){
                         $(self).next("select[name=class]").find("option").remove();
                         var append='<option value="">'+'请选择分类'+'</option>'+content;
                         if(!$(self).next("select[name=class]").size()){
                            $(self).parent().append('<select  name="class" style="margin-right:10px;" onchange="initChild('+"'"+cname+"','',this"+')"></select>');
                         }
                        $(self).next("select[name=class]").append(append);
                }
              
            }else{
                if(id){
                   $("#"+id).find("select[name=class]:first").append(content);
                }
            }
        }else{
            $(self).nextAll("select[name=class]").remove();
        }
        
        
    });
}
function addata(arr,obj,content){
    $(".tser-yi").find(".hotclass").remove();
     var objt=$(content);
                var res='';
                for(i in arr){
                    objt.find("li").text(arr[i].name);
                    res+=content.replace('cname',arr[i].name);
                }
    $(obj).after($(res));
}
function getChidClass(name,carr,content,obj){
    if(name){
        if(carr.length){
            addata(carr[name][name]);
        }else{
                name=encodeURI(name) ;
                $.getJSON("../../Ajax/AjaxClassfiy/getChild?cname="+name+"&ishot=1",function(data){
                    addata(data.data,obj,content);
                    carr[name+'']=data;
            });
        }
        
        
    }
}

//获取家教分类
function getTclass(id){
    if(id){
        $("<select name='fid' id='fid' class='select4'></select>").appendTo($("#tclass"));
        $("<option value='0'>请选择</option>").appendTo("#fid");
        $.post("../../Ajax/AjaxTeach/tclass",{fid:id},function(data){
            for(var i=0;i<data.length;i++){
                $("<option value='"+data[i].id+"'>"+data[i].name+"</option>").appendTo($("#fid"));
            }
        },'json');
    
        $("#fid").change(function(){
            if($("#tclass").find($("#gid")).size()==0){
                $("<select name='gid' id='gid'></select>").appendTo($("#tclass"));
            }
            $("#gid").html("");
            var kid = $(this).val();
            if(kid == 0){$("#gid").fadeOut('fast')}else{$("#gid").fadeIn('fast')}
            $.post("../../Ajax/AjaxTeach/tclass",{gid:kid},function(data){
                $("<option value='0'>请选择</option>").appendTo("#gid");
                if(data.length<1){
                    $("#tclass").find("#gid").remove();
                    return;
                }
                for(var i=0;i<data.length;i++){
                    $("<option value='"+data[i].id+"'>"+data[i].name+"</option>").appendTo($("#gid"));
                }
            },'json');
        })

    }
}

//获取开通的城市
function getCity(){
    $.post("../../Ajax/AjaxClassfiy/getCity",{},function(data){
        $("<select name='city' id='city'></select>").appendTo($("#getcity"));
        $("<option value='0'>请选择</option>").appendTo("#city");
        for(var i=0;i<data.length;i++){
            $("<option value='"+data[i].id+"'>"+data[i].name+"</option>").appendTo("#city");
        }
    },'json');

    $("#city").live('change',function(){
        if($("#getcity").find($("#district")).size()==0){
            $("<select name='district' id='district'></select>").appendTo($("#getcity"));
        }
        $("#district").html("");
        var cid = $(this).val();
        if(cid == 0){$("#district").fadeOut('fast')}else{$("#district").fadeIn('fast')}
        $.post("../../Ajax/AjaxClassfiy/getDistrict",{'id':cid},function(data){
            if(data){
                $("<option value='0'>请选择</option>").appendTo("#district");
                for(var i=0;i<data.length;i++){
                    $("<option value='"+data[i].id+"'>"+data[i].name+"</option>").appendTo("#district");
                }
            }

        },'json');
    });
}

//获取某城市的区域
function getArea(id){
    $.post("../../Ajax/AjaxClassfiy/getDistrict",{'id':id},function(data){
        $("<select name='district' id='district'></select>").appendTo($("#getarea"));
        $("<option value='0'>请选择</option>").appendTo("#district");
        for(var i=0;i<data.length;i++){
            $("<option value='"+data[i].id+"'>"+data[i].name+"</option>").appendTo("#district");
        }
    },'json');
}

//只获取城市
function getCityOnly(){
    $.ajaxSetup({
        async: false
    });
    $.post("../../Ajax/AjaxClassfiy/getCity",{},function(data){
        $("<select name='city_id' id='city_id' class='select4'></select>").appendTo($("#getcityonly"));
        $("<option value='0'>请选择</option>").appendTo("#city_id");
        for(var i=0;i<data.length;i++){
            $("<option value='"+data[i].id+"'>"+data[i].name+"</option>").appendTo("#city_id");
        }
    },'json');
}
