
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eliminar id venta</title>
</head>
	<h1>eliminar registro de venta</h1>
	<form action="" method="post">
		<table border="1">
		  <tr>
		    <td>ingresar id a eliminar</td>
		    <td><input type="number" name="id"></td>
		  </tr>
		  <tr>
		    <td colspan="2"><center><input type="submit" value="eliminar"></center></td>
		  </tr>
		</table>
	</form>
	<label>
		<?php
			include '../conectar.php';
			include 'detalleVenta.entidad.php';
			include 'detalleVentas.model.php';
			if ($_REQUEST) {
				$idventa=$_REQUEST['id'];

				$elar = new detalleVentasModel();
				$venta3 = $elar->eliminar($idventa);

				if ($venta3==0){
					echo 'el registro NO existe';
				}else{
					echo 'el registro fue eliminado';
				}
			}
		?>
	</label>
<body>
</body>
</html>
