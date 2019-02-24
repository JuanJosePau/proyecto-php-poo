
<html>
<head>
<meta charset="utf-8">
</head>
	<h1>registrar un nuevo Producto </h1>
	<form action="" method="post">
		<table border="0">
		  <tr>
		    <td>denominacion: </td>
		    <td><input type="text" name="den" ></td>
		  </tr>
		  <tr>
		    <td>precio: </td>
		    <td><input type="number" name="pre" min="0" max="1000000" step="0.01"></td>
		  </tr>
		  <tr>
		    <td>cantidad: </td>
		    <td><input type="number" name="can" min="0" max="1000"></td>
		  </tr>
		  <tr>
		    <td>fecha de vencimiento: </td>
		    <td><input type="date" name="fec" ></td>
		  </tr>
		  <tr>
		    <td>id categoria: </td>
		    <td><input type="number" name="idc" min="0" max="500"></td>
		  </tr>
		  <tr>
		    <td>id proveedor: </td>
		    <td><input type="number" name="idp" min="0" max="500"></td>
		  </tr>
		  <tr>
		    <td colspan="2"><center><input type="submit" value="registrar"></center></td>
		  </tr>
		</table>
	</form>
	<label>
	<?php
		include '../conectar.php';
		include 'producto.entidad.php';
		include 'productos.model.php';
		if ($_REQUEST) {
			//introducimos el valor de cada input en una variable
			$den=$_REQUEST['den'];
			$pre=$_REQUEST['pre'];
			$can=$_REQUEST['can'];
			$fec=$_REQUEST['fec'];
			$idc=$_REQUEST['idc'];
			$idp=$_REQUEST['idp'];
			//creamos un objeto
			$b=new producto();
			//el valor que se ingresara por los inputs
			//se guardaran en el campo correspondiente
				$b->__SET('denominacion',$den);
				$b->__SET('precio',$pre);
				$b->__SET('cantidad',$can);
				$b->__SET('fecVen',$fec);
				$b->__SET('idCategoria',$idc);
				$b->__SET('idProveedor',$idp);
				
			$recl = new productosModel();
			$regis=$recl->registrar($b);

			if ($regis==0){
				echo 'el registro NO ingreso correctamente';
			}else{
				
				echo 'se ha sido registrado';
			}
		}
	?>
	</label>
<body b>
</body>
</html>