<!DOCTYPE html>
<?php session_destroy(); ?>
<html>
<head>
	<title>Sistema</title>
</head>
<body>
	<h1>Bem vindo ao Sistema</h1>

	<form action="descrevendo.php" method="post">
		
	<fieldset>
		<legend>Realizar login</legend>
		
		<table>
			<tr>
				<th>
					<label>
						Variavel de decisão:
						<input type="text" name="decisao">	
					</label>
				</th>
			</tr>

			<tr>
				<th>
					<label>
						Restrições
						<input type="text" name="restricoes">
					</label>
				</th>
			</tr>

		</table>
	</fieldset>


	<input type="submit" name="enviar" value="Enviar">

	</form>
</body>
</html>