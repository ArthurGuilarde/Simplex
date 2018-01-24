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
	$teste= array();
	for ($i=0; $i < $qtdRestri ; $i++) { 
		foreach ($_SESSION['arRes'.$i] as $key => $value) {
			print_r($value);
		};
	?>
	<br>
<?php 	
	}

 ?>
<br>
<br>

<?php 
	$l = $qtdRestri+1;
	$c = $qtdDecisao+$qtdRestri+2;
	
	$matrixSolu = array(array()) ;

	$geralTamanho = sizeof($_SESSION['arGeral']);
	$n = 0;
	for ($i=0; $i < $l ; $i++) { 
		for ($j=0; $j < $c ; $j++) { 
			$matrixSolu[$i][$j] = $_SESSION['arGeral'][$n];
			$n = $n +1;
			if ($n > $geralTamanho) {
				$n = 0;
			}
		}
	}

 ?>


<?php 

	foreach ($_SESSION['arGeral'] as $key => $value) {
		print_r($value);
	}
 ?>
<br>
<br>

 <?php 

	for ($i=0; $i < $l ; $i++) { 
		for ($j=0; $j < $c ; $j++) { 
		 echo $matrixSolu[$i][$j];
		}
		echo "<br>";
	}
  ?>

</body>
</html>