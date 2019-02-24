
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>registrar personal de ventas</title>
</head>
	<h1>registro de nuevo personal de ventas</h1>
	<form action="" method="post">
		<table border="1">
		  <tr>
		    <td>nombres: </td>
		    <td><input type="text" name="nom" ></td>
		  </tr>
		  <tr>
		    <td>dni: </td>
		    <td><input type="text" name="dni" ></td>
		  </tr>
		  <tr>
		    <td>email: </td>
		    <td><input type="email" name="correo" ></td>
		  </tr>
		  <tr>
		    <td>telefono: </td>
		    <td><input type="text" name="telefono" ></td>
		  </tr>
		  <tr>
		    <td>direccion: </td>
		    <td><input type="text" name="dic" ></td>
		  </tr>
		  <tr>
		    <td>password: </td>
		    <td><input type="password" name="contra" ></td>
		  </tr>
		  <tr>
		    <td colspan="2"><center><input type="submit" value="registrar"></center></td>
		  </tr>
		</table>
	</form>
	<label>
		<?php
			include '../conectar.php';
			include 'perVentas.entidad.php';
			include 'perVentas.model.php';
			if ($_REQUEST) {
				$nom=$_REQUEST['nom'];
				$dni=$_REQUEST['dni'];
				$cor=$_REQUEST['correo'];
				$tel=$_REQUEST['telefono'];
				$dic=$_REQUEST['dic'];
				$con=$_REQUEST['contra'];

				$pv=new perVentas();
					$pv-> __SET('nombres',$nom);
					$pv-> __SET('dni',$dni);
					$pv-> __SET('email',$cor);
					$pv-> __SET('telefono',$tel);
					$pv-> __SET('direccion',$dic);
					$pv-> __SET('password',$con);
				$repe = new perVentasModel();
				$regis=$repe-> registrar($pv);

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