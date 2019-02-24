
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>registrar area</title>
</head>
	<h1>registro una nueva venta</h1>
	<form action="" method="post">
		<table border="1">
		  <tr>
		    <td>idVenta: </td>
		    <td><input type="text" name="idven" ></td>
			</tr>
		  <tr>
		    <td>idCliente: </td>
		    <td><input type="text" name="idpro" ></td>
			</tr>
		  <tr>
		    <td>Cantidad: </td>
		    <td><input type="text" name="cantidad" ></td>
			</tr>
			<tr>
		    <td>Precio: </td>
		    <td><input type="text" name="precio" ></td>
		  </tr>						
		  <tr>
		    <td colspan="2"><center>
		    	<input type="submit" value="registrar">
		    </center></td>
		  </tr>
		</table>
	</form>
	<label>
		<?php
			include '../conectar.php';
			include 'detalleVenta.entidad.php';
			include 'detalleVentas.model.php';
			if ($_REQUEST) {
				$idven=$_REQUEST['idven'];
				$idpro=$_REQUEST['idpro'];
				$cantidad=$_REQUEST['cantidad'];
				$precio=$_REQUEST['precio'];

				$a = new detalleVenta();
					$a->__SET('idVenta',$idven);
					$a->__SET('idProducto',$idpro);
					$a->__SET('cantidad',$cantidad);
					$a->__SET('precio',$precio);

				$reg = new detalleVentasModel();
					$regis = $reg->registrar($a);

				if ($regis==0){
					echo 'el registro NO ingreso correctamente';
				}else{
					
					echo 'se ha sido registrado';
				}
			}
		?>
	</label>
<body>
</body>
</html>