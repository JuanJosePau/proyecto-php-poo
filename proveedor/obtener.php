<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>obtener Proveedor</title>
</head>
	<h1>obtener un registro de Proveedor</h1>
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
			include 'proveedor.entidad.php';
			include 'proveedores.model.php';

			if ($_REQUEST) {
				$id=$_REQUEST['id'];

				$obar = new proveedoresModel();
				$proveedor = $obar->obtener($id);

				if (!$proveedor) {
					echo "sin resultados";
				}else{
					echo '<table border=1>';
						echo '<tr>';
							echo '<td>';
								echo' idProveedor ';
							echo '</td>';
							echo '<td>';
								echo $proveedor-> __GET('idProveedor');
							echo '</td>';
						echo '</tr>';

						echo '<tr>';
							echo '<td>';
								echo' denominacion ';
							echo '</td>';
							echo '<td>';
								echo $proveedor-> __GET('denominacion');
							echo '</td>';
						echo '</tr>';

						echo '<tr>';
							echo '<td>';
								echo' direccion ';
							echo '</td>';
							echo '<td>';
								echo $proveedor-> __GET('direccion');
							echo '</td>';
						echo '</tr>';

						echo '<tr>';
							echo '<td>';
								echo' telefono ';
							echo '</td>';
							echo '<td>';
								echo $proveedor-> __GET('telefono');
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