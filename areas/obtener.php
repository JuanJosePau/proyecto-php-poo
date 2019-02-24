<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>obtener area</title>
</head>
	<h1>obtener un registro de area</h1>
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
			include 'area.entidad.php';
			include 'areas.model.php';
			if ($_REQUEST) {
				$id=$_REQUEST['id'];

				$obar = new areasModel();
				$area2 = $obar->obtener($id);

				if (!$area2) {
					echo "sin resultados";
				}else{
					echo '<table border=1>';
						echo '<tr>';
							echo '<td>';
								echo "idArea";
							echo '<td>';
							echo '<td>';
								echo $area2-> __GET('idArea');
							echo '</td>';
						echo '</tr>';
						echo '<tr>';
							echo '<td>';
								echo "descripcion";
							echo '<td>';
							echo '<td>';
								echo $area2-> __GET('descripcion');
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