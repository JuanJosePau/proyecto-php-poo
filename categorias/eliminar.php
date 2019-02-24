
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eliminar id categoria</title>
</head>
	<h1>eliminar registro de categoria</h1>
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
			include 'categoria.entidad.php';
			include 'categorias.model.php';
			if ($_REQUEST) {
				$idcategoria=$_REQUEST['id'];

				$elar = new categoriasModel();
				$categoria3 = $elar->eliminar($idcategoria);

				if ($categoria3==0){
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
