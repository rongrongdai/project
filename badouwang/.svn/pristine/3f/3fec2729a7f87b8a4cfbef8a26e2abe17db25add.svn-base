    /* 
     * js验证
     * @author fanbo
     */

    //非空验证
    function null_check(fields,info_fields){
        for(fd in fields){
            var fk="#"+fields[fd];
            var fv=$(fk).val();
            if(!fv){
                return Array(fields[fd],info_fields[fd]+"不能为空！");
            }
        }
    }
    //字符长度校验 id校验
    function length_check(fields,minlenth,maxlength,info_fields){
        var fk,fv;
        for(i=0;i<fields.length;i++){
            fk="#"+fields[i];
            fv=$(fk).val();
            if(fv.length>maxlength[i]){
                return Array(fields[i],info_fields[i]+"长度不能大于"+maxlength[i]);
            }
            if(fv.length>minlength[i]){
                return Array(fields[i],info_fields[i]+"长度不能小于"+minlenth[i]);
            }
        }
    }
    //邮箱校验
   function email_check(field){
            var fk="#"+field;
            var ck=/(\w+)@(\w+)\.(com|net|org)/i;
            if($(fk).val().match(ck)){
                return "邮箱格式不正确！";
            }
    }
    
    //特殊字符校验
  function spe_check(fields,info_fields){
            var ck=/\W/g;
            var fk,fv;
            for(fd in fields){
                fk="#"+fields[fd];
                fv=$(fk).val();
                if(fv.match(ck)){
                    return Array(fields[fd],info_fields[fd]+"中含有特殊字符！");
                }
            }
    }
        //手机号码校验
    function phone_check(field){
            var ck=/\d{11}/i;
            var  fk="#"+field;
            var  fv=$(fk).val();
                if(!fv.match(ck)){
                    return '手机号码格式不正确';
                }else{
                    return true;
                }
    }
    function compare(field,ofield){
        return $("#"+field).val()===$("#"+ofield).val();
    }
       
       
   
    
