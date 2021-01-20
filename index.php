<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Ping Devices PHP</title>
</head>

<body>
	<main>

	<?php include("logo.php") ?>

	<table id="tabcaditem">
		<tr>
			<th>Devices:</th>
		</tr>
		<tr>
			<td class="botao"><button id="btlistar" onclick="window.location.href='pdphp_listar.php?dev=dev'">Listar</button><button id="btcadastrar" onclick="window.location.href='pdphp_cadastrar.php?dev=dev'">Cadastar</button></td>
		</tr>
	</table><br>
	
	<form name="form" id="form" method="post" action="pdphp_testar.php">

		<table id="tabteste">
			<tr>
				<th colspan="2">Opções de Teste:</th>
			</tr>
			<tr>
				<td class="ce" title="Envia o tamanho do buffer.">Tamanho do Buffer:</td>
				<td class="cd">
					<label>
						<select name="p_buffer" id="p_buffer">
							<option value="8">8 bytes</option>
							<option value="16">16 bytes</option>
							<option value="32" selected>32 bytes</option>
							<option value="64">64 bytes</option>
							<option value="128">128 bytes</option>
							<option value="256">256 bytes</option>
							<option value="512">512 bytes</option>
							<option value="1024">1024 bytes</option>
							<option value="2048">2048 bytes</option>
							<option value="4096">4096 bytes</option>
							<option value="8192">8192 bytes</option>
							<option value="16384">16384 bytes</option>
							<option value="32000">32000 bytes</option>
						</select>
					<label>
				</td>
			</tr>
			<tr>
				<td class="ce" title="Número de requisições de eco a enviar.">Requisições de eco por IP:</td>
				<td class="cd">
					<label>
						<select name="p_num" id="p_num">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4" selected>4</option>
						</select>
					<label>
				</td>
			</tr>
			<tr>
				<td class="ce"title="Tempo limite em milissegundos a aguardar para cada resposta.">Tempo limite (em milissegundos):</td>
				<td class="cd">
					<label>
						<select name="p_tempo" id="p_tempo">
							<option value="100">100</option>
							<option value="200">200</option>
							<option value="300">300</option>
							<option value="400">400</option>
							<option value="500">500</option>
							<option value="600">600</option>
							<option value="700">700</option>
							<option value="800">800</option>
							<option value="900">900</option>
							<option value="1000" selected>1000</option>
							<option value="2000">2000</option>
							<option value="3000">3000</option>
							<option value="4000">4000</option>
							<option value="5000">5000</option>
							<option value="6000">6000</option>
							<option value="7000">7000</option>
							<option value="8000">8000</option>
							<option value="9000">9000</option>
							<option value="10000">10000</option>
						</select>
					</label>
				</td>
			</tr>
			<tr style="display: none;">
				<td title="Tipo de device a ser testado.">Devices:</td>
				<td><input type="radio" name="radio" value="device" checked>Devices</td>
			</tr>
			<tr>
				<td class="botao" colspan="2"><input type="submit" name="enviar" id="enviar" value="Iniciar Teste"></td>
			</tr>
		</table><br>
		

	</form>

	</main>
</body>

</html>