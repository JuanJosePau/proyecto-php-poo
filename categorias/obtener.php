<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>obtener categoria</title>
</head>
	<h1>obtener un registro de categoria</h1>
	<form action="" method="post">
		<table border="1">
		  <tr>
		    <td>ingrese id que desea visualizar: </td>
		    <td><input type="number" name="id"></td>
		  </tr>
		  <tr>
		    <td colspan="2"><center><input type="submit" value="obtener"></center></td>
		  </tr>
		</table>
	</form>
	<label>
		<?php
			include '../conectar.php';
			include 'categoria.entidad.php';
			include 'categorias.model.php';
			if ($_REQUEST) {
				$id=$_REQUEST['id'];

				$obar = new categoriasModel();
				$categoria = $obar->obtener($id);
				if (!$categoria) {
					echo "sin resultados";
				}else{
					echo '<table border=1>';
						echo '<tr>';
							echo '<td>';
								echo' IdCategoria ';
							echo '</td>';
							echo '<td>';
								echo $categoria-> __GET('idCategoria');
							echo '</td>';
						echo '</tr>';
					
						echo '<tr>';
							echo '<td>';
								echo' Denominacion ';
							echo '</td>';
							echo '<td>';
								echo $categoria-> __GET('denominacion');
							echo '</td>';
						echo '</tr>';
					echo '</table>';
				}
			}
		?>
	</label>
<body>
</body>
</html>