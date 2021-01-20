<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Ping Devices PHP</title>

	<?php include("device.php") ?>

	<script language="Javascript">
		function decision(message, url) {
			if (confirm(message)) location.href = url;
		}
	</script>
</head>

<body>
	<main>

	<?php include("logo.php") ?>

	<div class="adicionar">
		<a href="pdphp_cadastrar.php?dev=<?php echo "$dev" ?>"><img src="images/add.png"> Adicionar <?php echo "$device" ?></a>
	</div>

	<table id="tablistar">
		<thead>
			<tr>
				<th class="id">ID</th>
				<th class="item">Item</th>
				<th class="ip">IP</th>
				<th class="criticidade">Criticidade</th>
				<th class="status">Status</th>
				<th class="editarexcluir"></th>
			</tr>
		<thead>
		<tbody>
			<?php
			include("connect.php");
			$query = mysqli_query($link, "SELECT * FROM tb_" . "$device");
			$linha = mysqli_num_rows($query);

			if ($linha == 0) {
				echo "
					<tr>
						<td style='text-align:center' colspan='6'>Nenhum item registrado</td>
					</tr>
				";
			} else {
				while ($linha = mysqli_fetch_array($query)) {
					$id = $linha["$dev" . "_id"];
					$item = $linha["$dev" . "_item"];
					$ip = $linha["$dev" . "_ip"];
					$critico = $linha["$dev" . "_critico"];
					$status = $linha["$dev" . "_status"];

					switch ($critico) {
						case "Alta":
							$bgcolor = "#FF0000";
							$fontcolor = "#FFFFFF";
							break;
						case "Média":
							$bgcolor = "#FFFF00";
							$fontcolor = "#000000";
							break;
						case "Baixa";
							$bgcolor = "#CCFFCC";
							$fontcolor = "#000000";
							break;
						default:
							$bgcolor = "#FFFFFF";
							$fontcolor = "#000000";
					}

					echo "
						<tr>
							<td>$id</td>
							<td>$item</td>
							<td style='text-align:center'><a href='http://$ip' target='_blank'>$ip</a></td>
							<td style='text-align:center; background-color:$bgcolor'><font color='$fontcolor'>$critico</font></td>
							<td style='text-align:center'>$status</td>
							<td style='text-align:center'><a href=\"pdphp_editar.php?id=" . $id . "&dev=" . $dev . "\"><img src='images/edit_icon.jpg'> Editar</a> | <a href=\"javascript:decision('Tem certeza que deseja excluir o item $item?','pdphp_excluir.php?id=" . $id . "&dev=" . $dev . "')\"><img src='images/delete_icon.gif'> Excluir</a></td>
						</tr>
					";
				}
			}
			?>
		</tbody>
	</table><br>

	<div class="voltar">
		<button onclick="window.location.href='index.php?dev=dev'"><< voltar</button>
	</div>
	
	</main>
</body>

</html>