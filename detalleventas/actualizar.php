
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
	<h1>modificar registro de venta</h1>
	<form action="" method="post">
		<table border="1">
		  <tr>
		    <td>id a modificar: </td>
		    <td><input type="number" name="id"></td>
		  </tr>
		  <tr>
		    <td>idVenta: </td>
		    <td><input type="number" name="idven" ></td>
			</tr>
		  <tr>
		    <td>idCliente: </td>
		    <td><input type="number" name="idpro" ></td>
			</tr>
		  <tr>
		    <td>Cantidad: </td>
		    <td><input type="number" name="cantidad" ></td>
			</tr>
			<tr>
		    <td>Precio: </td>
		    <td><input type="number" name="precio" ></td>
		  </tr>						
		  <tr>
		    <td colspan="2"><center><input type="submit" value="actualizar"></center></td>
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
			$idven=$_REQUEST['idven'];
			$idpro=$_REQUEST['idpro'];
			$cantidad=$_REQUEST['cantidad'];
			$precio=$_REQUEST['precio'];

			$a = new detalleVenta();
				$a->__SET('idVenta',$idven);
				$a->__SET('idProducto',$idpro);
				$a->__SET('cantidad',$cantidad);
				$a->__SET('precio',$precio);
				$a->__SET('idDetalle',$id);

			$reg = new detalleVentasModel();
			$regis = $reg->actualizar($a);
			
			if ($regis==0){
				echo 'el registro NO ingreso correctamente';
			}else{
				
				echo 'se ha sido actualizado';
			}
		}
	?>
	</label>
<body>
</body>
</html>