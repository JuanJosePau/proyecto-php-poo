
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
	<h1>modificar registro de area</h1>
	<form action="" method="post">
		<table border="1">
		  <tr>
		    <td>id a modificar: </td>
		    <td><input type="number" name="id" min="0" max="500"></td>
		  </tr>
		  <tr>
		    <td>descripcion: </td>
		    <td><input type="text" name="desc" ></td>
		  </tr>
		  <tr>
		    <td colspan="2"><center><input type="submit" value="actualizar"></center></td>
		  </tr>
		</table>
	</form>
	<label>
		<?php
			include '../conectar.php';
			include 'area.entidad.php';
			include 'areas.model.php';
			if ($_REQUEST) {
				$id=$_REQUEST['id'];
				$nom=$_REQUEST['desc'];
				

				$ad=new area();
					$ad->__SET('descripcion',$nom);
					$ad->__SET('idArea',$id);
				
				$read = new areasModel();
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