
<html>
<head>
<meta charset="utf-8">
</head>
	<h1>modificar registro de producto</h1>
	<form action="" method="post">
		<table border="0">
		  <tr>
		    <td>id a modificar: </td>
		    <td><input type="number" name="id"></td>
		  </tr>
		  <tr>
		    <td>denominacion: </td>
		    <td><input type="text" name="den" ></td>
		  </tr>
		  <tr>
		    <td>precio: </td>
		    <td><input type="number" name="pre"></td>
		  </tr>
		  <tr>
		    <td>cantidad: </td>
		    <td><input type="number" name="can"></td>
		  </tr>
		  <tr>
		    <td>fecha de vencimiento: </td>
		    <td><input type="date" name="fec" ></td>
		  </tr>
		  <tr>
		    <td>id categoria: </td>
		    <td><input type="number" name="idc"></td>
		  </tr>
		  <tr>
		    <td>id proveedor: </td>
		    <td><input type="number" name="idp"></td>
		  </tr>
		  <tr>
		    <td colspan="2"><center><input type="submit" value="actualizar"></center></td>
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
			$id=$_REQUEST['id'];
			$den=$_REQUEST['den'];
			$pre=$_REQUEST['pre'];
			$can=$_REQUEST['can'];
			$fec=$_REQUEST['fec'];
			$idc=$_REQUEST['idc'];
			$idp=$_REQUEST['idp'];
			//creamos un objeto	
			$ad=new producto();
			//el valor que se ingresara por los inputs
			//se guardaran en el campo correspondiente				
				$ad->__SET('denominacion',$den);
				$ad->__SET('precio',$pre);
				$ad->__SET('cantidad',$can);
				$ad->__SET('fecVen',$fec);
				$ad->__SET('idCategoria',$idc);
				$ad->__SET('idProveedor',$idp);
				$ad->__SET('idProducto',$id);
			
			$actualizar = new productosModel();
			$regis=$actualizar->actualizar($ad);

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