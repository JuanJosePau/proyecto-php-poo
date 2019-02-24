
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eliminar id administrador</title>
</head>
	<h1>eliminar registro de administrador</h1>
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
			include 'administrador.entidad.php';
			include 'administrador.model.php';
			if ($_REQUEST) {
				$id=$_REQUEST['id'];

				$elar = new administradorModel();
				$admin = $elar->eliminar($id);
				echo $admin.'<br>';

				if ($admin==0){
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
