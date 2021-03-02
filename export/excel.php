<?php 

 function excelcek($filename='ExportExcel',$baslik=array(),$veri=array()){
		header("Content-Encoding: UTF-8");
		header("Content-Type: text/plain;charset=utf-8");
		header("Content-disposition: attacment;filename=".$filename.".xls");
		echo "\xEF\xBB\xBF";

		echo '<table border="1">
			<th style="background-color: #000000" colspan="2">
				<font color="#8B8B8B">arabalar</font>
			</th>
			<tr>';
				
			

		foreach ($baslik as $v) {
			echo '<th style="background-color: #FFA500">'.trim($v).'</th>';
			 
		}
		echo '</tr><tr>';
		 
		 $basliksayi=count($baslik);

		foreach ($veri as $val) {
			echo '<tr>';
			for ($i=0; $i < $basliksayi; $i++) { 
				echo'<td>'.$val[$i].'</td>';
			}
			echo '</tr>';
			
		}
		echo '</table>';

	}



?>