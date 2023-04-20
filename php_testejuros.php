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

			$resultado = '';
			$quantidade = '0';
			$tipo = "simples";
			$periodo = '30';
			$pesos = '';
			$pagamentos = '';
			$calculo = 'jurosparaacrescimo';
			$valor = '0';

			if( isset( $_POST[ 'calcular']))
			{
				$quantidade = $_POST['quantidade'];
				$tipo =  $_POST['tipo'];
				$periodo = $_POST['periodo'];
				$pesos = trim( $_POST[ 'pesos']);
				$pagamentos = trim( $_POST[ 'pagamentos']);
				$calculo = $_POST['calculo'];
				$valor = $_POST['valor'];

				require_once( 'CalculaJuros.php');
				$calculajuros = new \jacknpoe\CalculaJuros( (int)$quantidade, ( $tipo === "composto"), (int)$periodo);
				$calculajuros->setPesos( ",", $pesos);
				$calculajuros->setPagamentos( ",", $pagamentos);
				if( $calculo === "jurosparaacrescimo")
				{
					$resultado = $calculajuros->JurosParaAcrescimo( floatval($valor));
				}
				else
				{
					$resultado = $calculajuros->AcrescimoParaJuros( floatval($valor), 14, 100, 50, false);
				}

			}
		?>
		<h1>Juros para Acréscimo / Acréscimo para Juros<br></h1>

		<form action="php_testejuros.php" method="POST" style="border: 0px">
			<p>Quantidade: <input type="text" name="quantidade" value="<?php echo $quantidade; ?>" style="width: 50px"></p>
			<p>Tipo: <input type="radio" name="tipo" value="simples" <?php if( $tipo === "simples") echo "checked"; ?>>simples
				     <input type="radio" name="tipo" value="composto" <?php if( $tipo === "composto") echo "checked"; ?>>composto</p>
			<p>Período: <input type="text" name="periodo" value="<?php echo $periodo; ?>" style="width: 50px"> dias (período sobre o qual o juros incide, normalmente 30 dias)</p>
			<p>Pesos: <input type="text" name="pesos" value="<?php echo $pesos; ?>" style="width: 200px"> (pesos separados por vírgula, para parcelas iguais deixe vazio ou 1,1,1,1...)</p> 
			<p>Pagamentos: <input type="text" name="pagamentos" value="<?php echo $pagamentos; ?>" style="width: 200px"> (prazos de pagamento separados por vírgula, para 30,60,90,120... deixar vazio)</p> 
			<p>Cálculo: <input type="radio" name="calculo" value="jurosparaacrescimo"<?php if( $calculo === "jurosparaacrescimo") echo "checked"; ?>>juros para acréscimo
				        <input type="radio" name="calculo" value="acrescimoparajuros"<?php if( $calculo === "acrescimoparajuros") echo "checked"; ?>>acréscimo para juros</p>
			<p>Valor: <input type="text" name="valor" value="<?php echo $valor; ?>" style="width: 100px">%</p>
			<p><input type="submit" name="calcular" value="Calcular"></p>
		</form>

		<br>Resultado: <?php echo $resultado; ?>%<br><br>
		<p><a href="https://github.com/jacknpoe/php_testejuros">Repositório no GitHub</a></p>
	</body>
</html>