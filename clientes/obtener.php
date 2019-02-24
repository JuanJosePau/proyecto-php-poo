<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>obtener cliente</title>
</head>
	<h1>obtener un registro de clientes</h1>
	<form action="" method="post">
		<table border="1">
		  <tr>
		    <td>ingrese id que desea visualizar: </td>
		    <td><input type="number" name="id" min="0" max="500" ></td>
		  </tr>
		  <tr>
		    <td colspan="2"><center><input type="submit" value="obtener"></center></td>
		  </tr>
		</table>
	</form>
	<label>
		<?php
			include '../conectar.php';
			include 'cliente.entidad.php';
			include 'clientes.model.php';
			if ($_REQUEST) {
				$id=$_REQUEST['id'];

				$obar = new clientesModel();
				$cli = $obar->obtener($id);

				if (!$cli) {
					echo "sin resultados";
				}else{
					echo '<table border=1>';
						echo '<tr>';
							echo '<td>';
								echo "idCliente";
							echo '<td>';
							echo '<td>';
								echo $cli-> __GET('idCliente');
							echo '</td>';
						echo '</tr>';

						echo '<tr>';
							echo '<td>';
								echo "nombres";
							echo '<td>';
							echo '<td>';
								echo $cli-> __GET('nombres');
							echo '</td>';
						echo '</tr>';

						echo '<tr>';
							echo '<td>';
								echo "dni";
							echo '<td>';
							echo '<td>';
								echo $cli-> __GET('dni');
							echo '</td>';
						echo '</tr>';

						echo '<tr>';
							echo '<td>';
								echo "email";
							echo '<td>';
							echo '<td>';
								echo $cli-> __GET('email');
							echo '</td>';
						echo '</tr>';

						echo '<tr>';
							echo '<td>';
								echo "telefono";
							echo '<td>';
							echo '<td>';
								echo $cli-> __GET('telefono');
							echo '</td>';
						echo '</tr>';

						echo '<tr>';
							echo '<td>';
								echo "direccion";
							echo '<td>';
							echo '<td>';
								echo $cli-> __GET('direccion');
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