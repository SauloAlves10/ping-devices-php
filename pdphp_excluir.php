<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ping Devices PHP</title>

	<?php include("device.php") ?>
</head>

<body>

	<?php
	if (isset($_GET['id'])) {
		$id = $_GET["id"];

		include("connect.php");
		$excluir = mysqli_query($link, "DELETE FROM tb_" . "$device WHERE $dev" . "_id = '$id'");

		if (!$excluir) {
			echo "<script language=\"javascript\">window.alert('Erro ao excluir os dados.') </script>";
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=pdphp_listar.php?dev=$dev'>";
		} else {
			echo "<script language=\"javascript\">window.alert('Registro excluído com sucesso.') </script>";
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=pdphp_listar.php?dev=$dev'>";
		}
		mysqli_close($link);
	
	} else {
		
		echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=pdphp_listar.php?dev=$dev'>";
	}
	?>

</body>

</html>