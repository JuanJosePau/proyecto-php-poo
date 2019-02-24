<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>obtener venta</title>
</head>
	<h1>obtener un registro de venta</h1>
	<form action="" method="post">
		<table border="1">
		  <tr>
		    <td>ingrese id que desea visualizar: </td>
		    <td><input type="text" name="id"></td>
		  </tr>
		  <tr>
		    <td colspan="2"><center><input type="submit" value="obtener"></center></td>
		  </tr>
		</table>
	</form>
	<label>
<?php
	include '../conectar.php';
	include 'detalleVenta.entidad.php';
	include 'detalleVentas.model.php';
	if ($_REQUEST) {
		$id=$_REQUEST['id'];

		$obar = new detalleVentasModel();
		$venta = $obar->obtener($id);

		if (!$venta) {
			echo "sin resultados";
		}else{
			echo '<table border=1>';
				echo '<tr>';
					echo '<td>';
						echo' idVenta ';
					echo '</td>';
					echo '<td>';
						echo $venta-> __GET('idVenta');
					echo '</td>';
				echo '</tr>';
					
				echo '<tr>';
					echo '<td>';
						echo' idProducto ';
					echo '</td>';
					echo '<td>';
						echo $venta-> __GET('idProducto');
					echo '</td>';
				echo '</tr>';

				echo '<tr>';
					echo '<td>';
						echo' cantidad ';
					echo '</td>';
					echo '<td>';
						echo $venta-> __GET('cantidad');
					echo '</td>';
				echo '</tr>';
				
				echo '<tr>';
					echo '<td>';
						echo' precio ';
					echo '</td>';
					echo '<td>';
						echo $venta-> __GET('precio');
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