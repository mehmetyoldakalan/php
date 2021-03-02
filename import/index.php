<?php
try{
	$baglan=new PDO("mysql:host=localhost;dbname=excelcikti;charset=utf8",'root','');
	//echo "bağlandı";
}catch(PDOException $e){
	echo $e->getMessage();
}

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once __DIR__.'/src/SimpleXLSX.php';


if ( $xlsx = SimpleXLSX::parse('examples/books.xlsx') ) {
	echo "<pre>";
	print_r( $xlsx->rows() );
	echo "</pre>";
} else {
	echo SimpleXLSX::parseError();
}
echo '<pre>';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	echo $toplamsayi=count($xlsx->rows());

	for ($i=1; $i <$toplamsayi; $i++) { 
		echo $xlsx->rows()[$i][0]."<br>";
		echo $xlsx->rows()[$i][1]."<br>";
			@$veriler.="('".$xlsx->rows()[$i][0]."','".$xlsx->rows()[$i][1]."'),";
		
	}
	echo $veriler."<br>";	
	$veriler=rtrim($veriler,",");
	$baglan->query("INSERT INTO arabalar(marka,model) VALUES $veriler");
 ?>
</body>
</html>
