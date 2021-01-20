<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Ping Devices PHP</title>

	<?php
	include("device.php");

	if (isset($_GET['id'])) {
		$id_select = $_GET["id"];

		include("connect.php");
		$dados = mysqli_query($link, "SELECT * FROM tb_" . "$device WHERE $dev" . "_id = '$id_select'");
		$linha = mysqli_fetch_array($dados);

		$id = $linha["$dev" . "_id"];
		$item = $linha["$dev" . "_item"];
		$ip = $linha["$dev" . "_ip"];
		$critico = $linha["$dev" . "_critico"];
		$status = $linha["$dev" . "_status"];

		mysqli_close($link);
	
	} else {

		if (isset($_POST['id'])) {
			$id = $_POST['id'];
			$item = $_POST['item'];
			$ip = $_POST['ip'];
			$critico = $_POST['critico'];
			$status = $_POST['status'];

			$long = ip2long($ip);

			if ($long == -1 || $long === FALSE) {
				echo "<script language=\"javascript\">window.alert('Você não digitou um IP válido.') </script>";
			} else {
				$query = "UPDATE tb_" . "$device SET $dev" . "_id = '$id', $dev" . "_item = '$item', $dev" . "_ip = '$ip', $dev" . "_critico = '$critico', $dev" . "_status = '$status' WHERE $dev" . "_id = '$id'";

				include("connect.php");
				mysqli_query($link, $query)
					or die("Falha ao editar dados");

				echo "<script language=\"javascript\">window.alert('Dados Alterados com Sucesso.') </script>";

				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=pdphp_listar.php?dev=$dev'>";

				mysqli_close($link);
			}
		} else {
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=pdphp_listar.php?dev=$dev'>";
		}
	}
	?>
</head>

<body>
	<main>

	<?php include("logo.php") ?>

	<form name="form" id="form" method="post" action=pdphp_editar.php?dev=<?php echo $dev ?>>

		<table id="tabeditar">
			<tr>							
				<th colspan="2">Editar <?php echo $device ?></th>
			</tr>
			<tr>
				<td class="ce">ID:</td>
				<td class="cd"><input name="id" id="id" type="hidden" value=<?php echo $id ?>>
					<input name="idshow" id="idshow" type="text" disabled value=<?php echo $id ?>>
				</td>
			</tr>
			<tr>
				<td class="ce">Item:</td>
				<td class="cd"><input name="item" id="item" type="text" maxlength="20" value=<?php echo $item ?>></td>
			</tr>
			<tr>
				<td class="ce">IP:</td>
				<td class="cd"><input name="ip" id="ip" type="text" maxlength="20" value=<?php echo $ip ?>></td>
			</tr>
			<tr>
				<td class="ce">Criticidade:</td>
				<td class="cd">
					<label>
						<select name="critico" id="critico">
							<?php
							switch ($critico) {
								case "Alta":
									echo ("<option value='Alta' selected>Alta</option>
										<option value='Média'>Média</option>
										<option value='Baixa'>Baixa</option>");
									break;
								case "Média":
									echo ("<option value='Alta'>Alta</option>
										<option value='Média' selected>Média</option>
										<option value='Baixa'>Baixa</option>");
									break;
								case "Baixa":
									echo ("<option value='Alta'>Alta</option>
										<option value='Média'>Média</option>
										<option value='Baixa' selected>Baixa</option>");
									break;
							}
							?>
						</select>
					<label>
				</td>
			</tr>
			<tr>
				<td class="ce">Status:</td>
				<td class="cd">
					<label>
						<select name="status" id="status">
							<?php
							if ($status == "ON") {
								echo ("<option value='ON' selected>ON</option>");
								echo ("<option value='OFF'>OFF</option>");
							} else {
								echo ("<option value='ON'>ON</option>");
								echo ("<option value='OFF' selected>OFF</option>");
							}
							?>
						</select>
					<label>
				</td>
			</tr>
			<tr>
				<td class="botao" colspan="2"><input type="submit" name="enviar" id="enviar" value="Enviar"></span></td>
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