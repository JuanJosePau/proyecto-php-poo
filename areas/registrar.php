
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>registrar area</title>
</head>
	<h1>registro de nueva area</h1>
	<form action="" method="post">
		<table border="1">
		  <tr>
		    <td>descripcion: </td>
		    <td><input type="text" name="descripcion" ></td>
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
			include 'area.entidad.php';
			include 'areas.model.php';
			if ($_REQUEST) {
				$descri=$_REQUEST['descripcion'];

				$a=new area();
					$a->__SET('descripcion',$descri);
				$reg = new areasModel();
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