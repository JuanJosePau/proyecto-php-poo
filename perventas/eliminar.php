
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eliminar id perventas</title>
</head>
	<h1>eliminar registro de personal de ventas</h1>
	<form action="" method="post">
		<table border="1">
		  <tr>
		    <td>ingresar id a eliminar</td>
		    <td><input type="number" name="id" min="0" max="500"></td>
		  </tr>
		  <tr>
		    <td colspan="2"><center><input type="submit" value="eliminar"></center></td>
		  </tr>
		</table>
	</form>
	<label>
		<?php
			include '../conectar.php';
			include 'perVentas.entidad.php';
			include 'perVentas.model.php';
			if ($_REQUEST) {
				$id=$_REQUEST['id'];

				$elar = new perVentasModel();
				$perv = $elar->eliminar($id);

				if ($perv==0){
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
