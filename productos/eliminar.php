
<html>
<head>
<meta charset="utf-8">
<title>eliminar id clientes</title>
</head>
	<h1>eliminar registro de producto</h1>
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
			include 'producto.entidad.php';
			include 'productos.model.php';
			if ($_REQUEST) {
				$id=$_REQUEST['id'];

				$obj = new productosModel();
				$cliente = $obj->eliminar($id);

				if ($cliente==0){
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
