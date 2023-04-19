<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title>Teste de Classe \jacknpoe\CalculaJuros (de juros a acréscimo e de acréscimo a juros)</title>
 		<link rel="stylesheet" href="php_testejuros.css"/>
		<link rel="icon" type="image/png" href="php_testejuros.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<?php
			header( "Content-Type: text/html; charset=ISO-8859-1", true);
		?>
		<h1>Juros a Acréscimos</h1>
		<?php
			require_once( 'CalculaJuros.php');
			$calculajuros = new \jacknpoe\CalculaJuros( 4, true, 30);		// 4 parcelas, compostas, com juros de 30 dias
			$calculajuros->setPesos();
			$calculajuros->setPagamentos( ",", "30,60,90,120");
			$acrescimo = $calculajuros->JurosParaAcrescimo( 5);		// juros de 5%
			$juros = $calculajuros->AcrescimoParaJuros( 12.804733041385, 12, 100, 50, false);		// acréscimo de 12.804733041385%
		?>

		<p><?php echo $acrescimo; ?></p>
		<p><?php echo $juros; ?></p><br><br>
		<p><a href="https://github.com/jacknpoe/php_testejuros">Repositório no GitHub</a></p>
	</body>
</html>