<?php

/**
 * Description of CommonModel
 *
 * @author fanbo
 */
class CommonModel extends Model{
    //事物查询
    public function transQuery($sqls){
        $this->startTrans();
        $res=true;
        foreach($sqls as $key=>$val){
          // echo $val.'<br/>';
             $this->execute($val);
            if($this->getError()){
                $this->rollback();
                $res=false;
            }
        }
        if($res){
            $this->commit();
        }
        return $res;
    }
    
}
