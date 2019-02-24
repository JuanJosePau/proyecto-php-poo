
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>registrar Proveedor</title>
</head>
	<h1>registro un nuevo Proveedor</h1>
	<form action="" method="post">
		<table border="1">
		  <tr>
		    <td>Denominacion: </td>
		    <td><input type="text" name="denominacion" ></td>
		  </tr>
		  <tr>
		    <td>Telefono: </td>
		    <td><input type="text" name="telefono" ></td>
		  </tr>
		  <tr>
		    <td>Direccion: </td>
		    <td><input type="text" name="direccion" ></td>
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
			include 'proveedor.entidad.php';
			include 'proveedores.model.php';
			if ($_REQUEST) {
				$denominacion=$_REQUEST['denominacion'];
				$telefono=$_REQUEST['telefono'];
				$direccion=$_REQUEST['direccion'];

				$a=new proveedor();
					$a->__SET('denominacion',$denominacion);
					$a->__SET('telefono',$telefono);
					$a->__SET('direccion',$direccion);

					
				$reg = new proveedoresModel();
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