
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eliminar id Proveedor</title>
</head>
	<h1>eliminar registro de Proveedor</h1>
	<form action="" method="post">
		<table border="1">
		  <tr>
		    <td>ingresar id a eliminar</td>
		    <td><input type="number" name="id"></td>
		  </tr>
		  <tr>
		    <td colspan="2"><center><input type="submit"value="eliminar"></center></td>
		  </tr>
		</table>
	</form>
	<label>
		<?php
			include '../conectar.php';
			include 'proveedor.entidad.php';
			include 'proveedores.model.php';

			if ($_REQUEST) {
				$idproveedor=$_REQUEST['id'];

				$proveedor = new proveedoresModel();
				$categoria = $proveedor->eliminar($idproveedor);
				
				if ($categoria == 0){
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
