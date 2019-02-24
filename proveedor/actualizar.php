
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
	<h1>modificar registro de Proveedor</h1>
	<form action="" method="post">
		<table border="1">
		  <tr>
		    <td>id a modificar: </td>
		    <td><input type="number" name="id"></td>
		  </tr>
		  <tr>
		    <td>Denominacion: </td>
		    <td><input type="text" name="denominacion" ></td>
		  </tr>
		  <tr>
		    <td>Direccion: </td>
		    <td><input type="text" name="direccion" ></td>
		  </tr>
		  <tr>
		    <td>Telefono: </td>
		    <td><input type="text" name="telefono" ></td>
		  </tr>		  		  
		  <tr>
		    <td colspan="2"><center><input type="submit" value="actualizar"></center></td>
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
				$denominacion=$_REQUEST['denominacion'];
				$direccion = $_REQUEST['direccion'];
				$telefono = $_REQUEST['telefono'];

				$ad = new proveedor();
					$ad->__SET('denominacion',$denominacion);
					$ad->__SET('direccion',$direccion);
					$ad->__SET('telefono',$telefono);
					$ad->__SET('idProveedor',$id);
				
				$read = new proveedoresModel();
				$regis=$read->actualizar($ad);

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