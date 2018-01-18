 <!DOCTYPE html>
 <?php 
	session_start();

	$qtdDecisao = $_SESSION['decisao'];
	$qtdRestri = $_SESSION['restricoes'];

	$_SESSION['arDec'] = array();

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
		for ($i=0; $i < $qtdDecisao; $i++) {
?> 
		<label>
			<?php print_r($_POST['dX'.$i]); 
				  echo "X".$i;

				  //MONTADNO ARRAY NA SESSION
				  $_SESSION['arDec'][] = $_POST['dX'.$i];

				   ?> 
			<?php if ($i < $qtdDecisao -1) {?>
					+
			<?php } ?>
		</label>

	<?php } ?>

	<br>

<h1>Equações de Restrições</h1>

<?php 
	for ($i=0; $i < $qtdRestri; $i++) {
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

					?>
				<?php if ($j < $qtdDecisao -1) {?>
					+
				<?php } ?>

				</label>
		<?php }elseif ($j < $qtdDecisao + 1) { ?>
				<?php  
				//TIRAR A DESIGUALDADE!!!
				if ($_POST['sinal'.$i] == '<=') { 
							$temp = 1;
							$_SESSION['arRes'.$i][] = $temp;
							$SinalNovo = "=";
							$_SESSION['arRes'.$i][] = $SinalNovo;
						}else{
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

