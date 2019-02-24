
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
		    <td>fecVenta: </td>
		    <td><input type="date" name="fec" ></td>
			</tr>
		  <tr>
		    <td>idCliente: </td>
		    <td><input type="text" name="cliente" ></td>
			</tr>
		  <tr>
		    <td>idVen: </td>
			    <td><input type="text" name="ven" ></td>
		  </tr>						
		  <tr>
		    <td colspan="2"><center><input type="submit" value="actualizar"></center></td>
		  </tr>
		</table>
	</form>
	<label>
		<?php
			include '../conectar.php';
			include 'venta.entidad.php';
			include 'ventas.model.php';
			
			if ($_REQUEST) {
				$id=$_REQUEST['id'];
				$fec=$_REQUEST['fec'];
				$cliente=$_REQUEST['cliente'];
				$ven=$_REQUEST['ven'];

				$ad = new venta();
					$ad->__SET('fecVenta',$fec);
					$ad->__SET('idCliente',$cliente);
					$ad->__SET('idVen',$ven);
					$ad->__SET('idVenta',$id);
				
				$read = new ventasModel();
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