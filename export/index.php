<?php include "excel.php";
try{
	$baglan=new PDO("mysql:host=localhost;dbname=excelcikti;charset=utf8",'root','');
	//echo "bağlandı";
}catch(PDOException $e){
	echo $e->getMessage();
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	$arababaslik=array(
		"araba marka",
		"araba model"
	);
	$arabaveri=array();

$verial=$baglan->prepare("SELECT * FROM arabalar");
$verial->execute();
		while($veriyaz=$verial->fetch(PDO::FETCH_ASSOC)){
			$arabaveri[]=array(
				$veriyaz['marka'],$veriyaz['model']
			);
		}



if (isset($_POST['indir'])) {
	excelcek(date('d.m.Y'),$arababaslik,$arabaveri);
}

 ?>
 <form action="index.php" method="POST">
 	<input type="submit" name="indir" value="indir">
 </form>
</body>
</html>