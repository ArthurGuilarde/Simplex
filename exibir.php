<?php 
	session_start();

	$qtdDecisao = $_SESSION['decisao'];
	$qtdRestri = $_SESSION['restricoes'];

	$_SESSION['arDec'] = array();
	$_SESSION['arRes'] = array();

 ?>

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
					<?php print_r($_POST['rX'.$j]); echo "X".$j;?>	
				</label>
		<?php }elseif ($j < $qtdDecisao + 1) { ?>
				<?php  
				//TIRAR A DESIGUALDADE!!!
				if ($_POST['sinal'] == '<=') { 
							echo "X".$j;
						}
				?>

				<select name="sinal">
					<option value="="> = </option>
					<option value="<="> <= </option>
				</select>

		<?php }else{?>
				<label>
					<?php print_r($_POST['rX'.$i.'resultado']); echo "X".$j;?>
					
				</label>						
		<?php } ?>
	<?php } ?>
		<br>
<?php } ?>