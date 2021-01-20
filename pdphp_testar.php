<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Ping Devices PHP</title>

	<?php
	if (getenv("REQUEST_METHOD") != "POST") {
		echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=apt_opcao.php'>";
	}
	?>
</head>

<body>
	<main>

	<?php
	include("logo.php");

	$ping_n = $_POST["p_num"];
	$ping_b = $_POST["p_buffer"];
	$ping_t = $_POST["p_tempo"];

	$device_tb = $_POST["radio"];
	switch ($device_tb) {
		case "device":
			$device_col = "dev";
	}
	?>

	<table id="tabopcteste">
		<tr>
			<td><strong>Requisições de eco por IP:</strong> <?php echo $ping_n ?></td>
			<td><strong>Tamanho do buffer:</strong> <?php echo $ping_b ?> bytes</td>
			<td><strong>Tempo limite (em milissegundos):</strong> <?php echo $ping_t ?></td>
		</tr>
	</table>

	<div class="timeteste timeini"><strong>Início: </strong><?php echo date('h:i:s A'); ?></div>
	
	<table id="tabtestar">
		<thead>
			<tr>
				<th class="item">Item</th>
				<th class="ip">IP</th>
				<th class="resultado">Resultado do teste de Ping</th>
				<th class="resposta">Resposta</th>
			</tr>
		</thead>
		<tbody>
			<?php
			ini_set('max_execution_time', '2560');
			$string = "SELECT * FROM tb_" . "$device_tb WHERE $device_col" . "_status = 'On'";
			include("connect.php");
			$dados = mysqli_query($link, $string);
			$linha = mysqli_num_rows($dados);

			if ($linha == 0) {
				echo "
					<tr>
						<td style='text-align:center' colspan='4'>Nenhum item registrado</td>
					</tr>
				";
			} else {
				while ($linha = mysqli_fetch_array($dados)) {
					$ip = $linha["$device_col" . "_ip"];
					$item = $linha["$device_col" . "_item"];
					$critico = $linha["$device_col" . "_critico"];

					$saida = "";
					$ping = exec("ping $ip -n $ping_n -l $ping_b -w $ping_t", $saida, $retorno);
					
					if ($retorno == 0) {
						$ping_saida = $saida [ count($saida) - 4] . $saida [ count($saida) - 3];
					} else {
						$ping_saida = $saida [ count($saida) - 2] . $saida [ count($saida) - 1];
					}
					
					$num_i = 3;
					$num_f = $num_i + $ping_n;
					$resultado = "INDISPONÍVEL";
					while ($num_i <= $num_f) {
						if ($retorno == 0) {
							$resultado = "OK";
						}
						$num_i++;
					}

					switch ($critico) {
						case "Alta":
							$bgcolor = "#FF0000";
							$fontcolor = "#FFFFFF";
							break;
						case "Média":
							$bgcolor = "#FFFF00";
							$fontcolor = "#000000";
							break;
						case "Baixa":
							$bgcolor = "#CCFFCC";
							$fontcolor = "#000000";
							break;
						default:
							$bgcolor = "#FFFFFF";
							$fontcolor = "#000000";
					}

					echo "
						<tr>
							<td style='background-color:$bgcolor; color:$fontcolor'>$item</td>
							<td style='text-align:center'><a href='http://$ip' target='_blank'>$ip</a></td>
							<td>$ping_saida</td>
							<td>$resultado</td>
						</tr>
					";
				}
			}

			mysqli_close($link);
			?>
		</tbody>
	</table>

	<div class="timeteste timeend"><strong>Fim:</strong> <?php echo date('h:i:s A'); ?></div><br>

	<div class="voltar">
		<button onclick="goBack()"><< voltar</button>
		<script>
			function goBack() {
			window.history.back();
			}
		</script>
	</div>

	</main>
</body>

</html>