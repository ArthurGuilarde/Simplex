<!DOCTYPE html>
<html>
<head>
	<title>Sistema</title>
</head>
<body>
	<h1>Simplex</h1>

	<form action="descrevendo.php" method="post">
		
	<fieldset>
		<legend>Definir quantidade de Variaveis</legend>
		
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