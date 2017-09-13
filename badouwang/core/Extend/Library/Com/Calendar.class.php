<?php

class Calendar{
	public function showCalendar($cY,$cM){
		$_year = isset($cY)?$cY:date("Y"); 
		$_month = isset($cM)?$cM:date("m");

		if($_month>12){ $_month=1; $_year++; }
		if($_month<1){ $_month=12; $_year--; }
		$_month = strlen($_month)===1?"0".$_month:$_month;

		$_currentDate = $_year.'年'.$_month.'月';
		$_days = date("t",mktime(0,0,0,$_month,1,$_year));
		$_dayofweek = date("w",mktime(0,0,0,$_month,1,$_year));


		$_table="<table><tbody align='center'><tr class='bd_head'>";  
		$_table .="<td>星期一</td><td>星期二</td><td>星期三</td><td>星期四</td><td>星期五</td>"; 
		$_table .="<td style='color:red'>星期六</td>";
		$_table .="<td style='color:red'>星期日</td>"; 
		$_table.="</tr>"; 


		$nums=$_dayofweek;
		//输出1号之前的空白日期
		$len = $_dayofweek==0?7:$_dayofweek;
		for ($i=1;$i<$len;$i++){ 
			$_table.="<td> </td>"; 
		}

		//输出天数信息
		$_date = strtotime(date("Y-m-d"));
		for($i=1;$i<=$_days;$i++){
			$i = $i<10?'0'.$i:$i;
			//给日期绑定参数
			$_data_date = strtotime($_year."-".$_month."-".$i);
			if($_date>$_data_date){
				$_value = "class='bd_past getCalendar'";
			}else if($_date==$_data_date){
				$_value = "class='bd_today getCalendar'";
			}else{
				$_value = "class='bd_future getCalendar'";
			}
			$data_day = $nums%7;
			$_value .= " data-value='".$_year."-".$_month."-".$i."' data-year='".$_year."' data-month='".$_month."' data-date='".$i."' data-day='".$data_day."'"; 
		 	
		 	//换行处理：7个一行
			if ($nums%7==0){
				$_table.="<td ".$_value.">$i</td></tr><tr>";
			}else{
				$_table.="<td ".$_value.">$i</td>";
			}
			$nums++;
		}

		$_table.="</tbody></table>"; 
		$_table.="<style>table{border-spacing:0;} .bd_head>td{border-bottom:1px solid #C0CFCB;} tr{margin-bottom:2px;} td{width:80px;height:29px;} .getCalendar{cursor:default;} .bd_past{color:#888;} .bd_today{color:#EC4E4E;font-weight:600;} .aclick{color:#FFF;background:#128AAD;}</style>";

		return array('table'=>$_table,'date'=>$_currentDate);
	} 
}