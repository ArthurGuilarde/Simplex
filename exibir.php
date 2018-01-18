<!DOCTYPE html>
 <?php 
	session_start();

	$qtdDecisao = $_SESSION['decisao'];
	$qtdRestri = $_SESSION['restricoes'];

 ?>
<html>
<head>
	<title></title>
</head>
<body>

<?php 

	foreach ($_SESSION['arDec'] as $key => $value) {
		print_r($value);
	}
 ?>

<br>

<?php 
	for ($i=0; $i < $qtdRestri ; $i++) { 
		foreach ($_SESSION['arRes'.$i] as $key => $value) {
			print_r($value);
		};
	?>
	<br>
<?php 	
	}

 ?>


</body>
</html>