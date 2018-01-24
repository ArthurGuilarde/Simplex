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
	
	$matrixSolu = array(array());

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
		 echo $matrixSolu[$i][$j]."\t"."\t";
		}
		echo "<br>"."<br>";
	}

	echo "<br>"."<br>";

//começando calculos

$terminou = 0;

do {

	//VERIFICANDO QUEM ENTRA
	$maior = 0;
	$maiorIndex = 0;
	for ($j=0; $j < $c-1 ; $j++) { 
		if ($matrixSolu[0][$j] < 0){
			$temp = -1 * $matrixSolu[0][$j];
		}else{
			$temp = $matrixSolu[0][$j];
		}
		$temp = -1 * $matrixSolu[0][$j];
		#echo "<br>".$temp."<br>"."<br>";
		if ($temp > $maior) {
			$maior = $temp;
			$maiorIndex = $j;

		}
	}

	#echo "Este é o maior index".$maiorIndex."<br>"."<br>";

	//VERIFICANDO QUEM SAI
	$menor=9999999;
	$menorIndex = 0;

	for ($n=1; $n < $qtdRestri+1; $n++) { 
		$numerador = $matrixSolu[$n][$c-1];
		$denominador = $matrixSolu[$n][$maiorIndex];
		
		#echo "Este é o numerador: ".$numerador."<br>";
		#echo "Este é o denominador: ".$denominador."<br>"."<br>";
		if($denominador > 0){
			$temp = $numerador / $denominador;
			#echo "Este é o resultado da divisao".$temp."<br>"."<br>";
			if ($temp < $menor) {
				$menor = $temp;
				$menorIndex = $n;
			}
		}else{

		}
	}
	
	#echo "<br>".$maiorIndex."<br>"."<br>";

	//transformar pivot em 1 e dividindo a linha do pivot
	$valorPivot = $matrixSolu[$menorIndex][$maiorIndex];
	#echo "Este é o valor do pivot ".$valorPivot."<br>"."<br>";
	
	for ($j=0; $j < $c ; $j++) { 
		#echo "Antes: ".$matrixSolu[$menorIndex][$j]."<br>"."<br>";
		$temp =	$matrixSolu[$menorIndex][$j];
		
		#echo "<br>".$temp."<br>"."<br>";

		$matrixSolu[$menorIndex][$j] = $temp / $valorPivot;

		#echo "Depois: ".$matrixSolu[$menorIndex][$j]."<br>"."<br>";
	}

	//Zerando a coluna do pivot
	for ($i=0; $i < $l ; $i++) { 
		if ($i != $menorIndex) {
			
			$vaLinha = -1*$matrixSolu[$i][$maiorIndex];
			#echo "Valor da linha: ".$vaLinha."<br>"."<br>";
			$copiaPivot = array();
			for($j=0; $j < $c; $j++){
				$copiaPivot[]=$matrixSolu[$menorIndex][$j];

			}
			
			for($j=0; $j < $c; $j++){
				$temp = $copiaPivot[$j];			
				$copiaPivot[$j] = $temp * $vaLinha;
			}
			
			for($j=0; $j < $c; $j++){
				$temp = $copiaPivot[$j];
				$temp2 = $matrixSolu[$i][$j];
				$matrixSolu[$i][$j] = $temp + $temp2;		
			}

		}else{

		}
		
	}

	//confirmar se precisa repitir
	for ($j=0; $j < $qtdRestri+1; $j++) { 
		$ter = $matrixSolu[0][$j];
		#echo "<br>".$ter."<br>"."<br>";
		if ($ter < 0) {
			$terminou = 0;
			break;
		}else{
			$terminou = 1;
		}

	}

}while ($terminou != 1);

	for ($i=0; $i < $l ; $i++) { 
		for ($j=0; $j < $c ; $j++) { 
		 echo $matrixSolu[$i][$j]."\t"."\t";
		}
		echo "<br>"."<br>";
	}
  ?>



</body>
</html>