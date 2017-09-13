<?php
/*
* author fanbo
 *  */
include 'PHPExcel.php';
include __DIR__.'/PHPExcel/IOFactory.php';
include __DIR__.'/PHPExcel/Writer/Excel5.php';

class ExcelHelper{
    public static function redPaper($uploadfile,$kid,$sid){
        $objReader = PHPExcel_IOFactory::createReader('Excel5');
        $objPHPExcel = $objReader->load($uploadfile); 
        $sheet = $objPHPExcel->getSheet(0); 
        $highestRow = $sheet->getHighestRow();        //取得总行数 
        $highestColumn = $sheet->getHighestColumn();
        $clumns = PHPExcel_Cell::columnIndexFromString($highestColumn); //取得总列数
  
        $datas=array();
        for ($row = 2;$row <= $highestRow;$row++) 
            {
                $data=array();
                $fields=array('type','question','aanswer','banswer','canswer','danswer','right','fa');
                //注意highestColumnIndex的列数索引从0开始
                for ($col = 0;$col <$clumns;$col++)
                {
                    $data[$fields[$col]] =$sheet->getCellByColumnAndRow($col, $row)->getValue();
                }  
                $data['kid']=$kid;$data['sid']=$sid;$data['uid']=session('uid');$data['c_timestamp']=time();
                $datas[]=$data;
            }
         return $datas;
        }
}

