<?php
include("device.php");

if (getenv("REQUEST_METHOD") == "POST") {

	$item = $_POST['item'];
	$ip = $_POST['ip'];
	$critico = $_POST['critico'];
	$status = $_POST['status'];

	$long = ip2long($ip);

	if ($long == -1 || $long === FALSE) {
		echo "<script language=\"javascript\">window.alert('Você não digitou um IP válido.') </script>";
		echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=pdphp_cadastrar.php?dev=" . "$dev'>";
	} else {
		if ($item and $ip and $critico and $status) {
			$query = "INSERT INTO tb_" . "$device VALUES (NULL, '$item', '$ip', '$critico', '$status')";
			include("connect.php");
			mysqli_query($link, $query)
				or die("Falha ao cadastrar dados");
			echo "<script language=\"javascript\">window.alert('Dados cadastrados com sucesso.') </script>";
		} else {
			echo "<script language=\"javascript\">window.alert('Você não preencheu o campo Item.') </script>";
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=pdphp_cadastrar.php?dev=" . "$dev'>";
		}
		mysqli_close($link);
	}
}
?>

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

	<form name="form" id="form" method="post" action=<?php echo "pdphp_cadastrar.php?dev=$dev" ?>>
		<table id="tabcadastrar">
			<th colspan="2">Cadastrar <?php echo $device ?></th>
			<tr>
				<td class="ce">Item:</td>
				<td class="cd"><input name="item" id="item" type="text" maxlength="20" placeholder="Novo Device"></td>
			</tr>
			<tr>
				<td class="ce">IP:</td>
				<td class="cd"><input name="ip" id="ip" type="text" maxlength="15" placeholder="192.168.0.1"></td>
			</tr>
			<tr>
				<td class="ce">Criticidade:</td>
				<td class="cd">
					<label>
						<select name="critico" id="critico">
							<option value="Alta">Alta</option>
							<option value="Média">Média</option>
							<option value="Baixa">Baixa</option>
						</select>
					<label>
				</td>
			</tr>
			<tr>
				<td class="ce">Status:</td>
				<td class="cd">
					<label>
						<select name="status" id="status">
							<option value="ON">ON</option>
							<option value="OFF">OFF</option>
						</select>
					<label>
				</td>
			</tr>
			<tr>
				<td class="botao" colspan="2"><input type="submit" name="enviar" id="enviar" value="Enviar"></td>
			</tr>
		</table>		
		
	</form><br>

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