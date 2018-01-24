 <!DOCTYPE html>
 <?php 
	session_start();

	$qtdDecisao = $_SESSION['decisao'];
	$qtdRestri = $_SESSION['restricoes'];

	$_SESSION['arDec'] = array();
	$_SESSION['arGeral'] = array();

	for ( $i=0; $i < $qtdRestri ; $i++) { 
		$_SESSION['arRes'.$i] = array();
	}	
		


 ?>
 <html>
 <head>
 	<title></title>
 </head>
 <body>

<h1>Equação de Decisão</h1>
<?php
		//EXIBINDO OS VALORES DAS VARIAVEIS DE DECISAO 
		$_SESSION['arGeral'][] = 1;
		for ($i=0; $i < $qtdDecisao; $i++) {
?> 
		<label>
			<?php print_r($_POST['dX'.$i]); 
				  echo "X".$i;

				  //MONTADNO ARRAY NA SESSION
				  $_SESSION['arDec'][] = -1 * $_POST['dX'.$i];
				  $_SESSION['arGeral'][] = -1 * $_POST['dX'.$i];

				   ?> 
			<?php if ($i < $qtdDecisao -1) {?>
					+
			<?php } ?>
		</label>

	<?php }
		//Resultado
		$_SESSION['arGeral'][] = 0;

		//vairiaveis add
		for ($i=0; $i < $qtdRestri ; $i++) { 
			$_SESSION['arGeral'][] = 0;
		}
	 ?>

	<br>

<h1>Equações de Restrições</h1>

<?php 
	
	for ($i=0; $i < $qtdRestri; $i++) {
		$_SESSION['arGeral'][] = 0;
?> 
<?php 
		for ($j=0; $j < $qtdDecisao + 2; $j++) {
?> 	
<?php 
			if ($j < $qtdDecisao) {
?> 	
				<label>
					<?php print_r($_POST['rX'.$i.$j]); 
					echo "X".$j;

					$_SESSION['arRes'.$i][] = $_POST['rX'.$i.$j];
					$_SESSION['arGeral'][] = $_POST['rX'.$i.$j];
					?>
				<?php if ($j < $qtdDecisao -1) {?>
					+
				<?php } ?>

				</label>
		<?php }elseif ($j < $qtdDecisao + 1) { ?>
				<?php  

				for ($z=0; $z <  $qtdRestri ; $z++) { 
					if ($i == $z) {
						$_SESSION['arGeral'][] = 1;
					}else{
						$_SESSION['arGeral'][] = 0;
					}
				}

				//TIRAR A DESIGUALDADE!!!
				if ($_POST['sinal'.$i] == '<=') { 
							$temp = 1;
							$_SESSION['arRes'.$i][] = $temp;
							$SinalNovo = "=";
							$_SESSION['arRes'.$i][] = $SinalNovo;
						}else{
							$temp = 1;
							$_SESSION['arRes'.$i][] = $temp;
							$_SESSION['arRes'.$i][] = $_POST['sinal'.$i];
						}
				?>
				<label>
					<?php print_r($_POST['sinal'.$i]); ?>
				</label>

		<?php }else{?>
				<label>
					<?php print_r($_POST['rX'.$i.'resultado']); echo "X".$j;

						$_SESSION['arRes'.$i][] = $_POST['rX'.$i.'resultado'];

						$_SESSION['arGeral'][] = $_POST['rX'.$i.'resultado'];
					?>
					
				</label>
				<br>						
		<?php } ?>
	<?php } ?>
		
<?php } ?>
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

 <form action="exibir.php" method="post">
 	<input type="submit" value="Próximo">
 </form>
 </body>
 </html>

