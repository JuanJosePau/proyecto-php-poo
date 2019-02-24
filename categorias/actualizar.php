
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
	<h1>modificar registro de Categoria</h1>
	<form action="" method="post">
		<table border="1">
		  <tr>
		    <td>id a modificar: </td>
		    <td><input type="number" name="id"></td>
		  </tr>
		  <tr>
		    <td>denominacion: </td>
		    <td><input type="text" name="denominacion" ></td>
		  </tr>
		  <tr>
		    <td colspan="2"><center><input type="submit" value="actualizar"></center></td>
		  </tr>
		</table>
	</form>
	<label>
		<?php
			include '../conectar.php';
			include 'categoria.entidad.php';
			include 'categorias.model.php';
			
			if ($_REQUEST) {
				$id=$_REQUEST['id'];
				$denominacion=$_REQUEST['denominacion'];
				

				$ad=new categoria();
					$ad->__SET('denominacion',$denominacion);
					$ad->__SET('idCategoria',$id);
				
				$read = new categoriasModel();
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