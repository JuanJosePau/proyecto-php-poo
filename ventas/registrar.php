
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>registrar area</title>
</head>
	<h1>registro una nueva venta</h1>
	<form action="registrar.php" method="post">
		<table border="1">
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
		    <td colspan="2"><center>
		    	<input type="submit" value="registrar">
		    </center></td>
		  </tr>
		</table>
	</form>
	<label>
	<?php
		include '../conectar.php';
		include 'venta.entidad.php';
		include 'ventas.model.php';

		if ($_REQUEST) {
			$fec=$_POST['fec'];
			$cliente=$_POST['cliente'];
			$ven=$_POST['ven'];

			$a = new venta();
				$a->__SET('fecVenta',$fec);
				$a->__SET('idCliente',$cliente);
				$a->__SET('idVen',$ven);

			$reg = new ventasModel();
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