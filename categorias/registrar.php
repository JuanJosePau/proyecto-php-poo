
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>registrar area</title>
</head>
	<h1>registro una nueva Categoria</h1>
	<form action="" method="post">
		<table border="1">
		  <tr>
		    <td>denominacion: </td>
		    <td><input type="text" name="denominacion" ></td>
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
			include 'categoria.entidad.php';
			include 'categorias.model.php';
			if ($_REQUEST) {
				$descri=$_REQUEST['denominacion'];

				$a=new categoria();
					$a->__SET('denominacion',$descri);
				$reg = new categoriasModel();
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