
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
	<h1>modificar registro de personal de ventas</h1>
	<form action="" method="post">
		<table border="1">
		  <tr>
		    <td>id a modificar: </td>
		    <td><input type="number" name="id" min="0" max="500"></td>
		  </tr>
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
		    <td colspan="2"><center><input type="submit"  value="actualizar"></center></td>
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
				$nom=$_REQUEST['nom'];
				$dni=$_REQUEST['dni'];
				$cor=$_REQUEST['correo'];
				$tel=$_REQUEST['telefono'];
				$dic=$_REQUEST['dic'];
				$con=$_REQUEST['contra'];

				$ad=new perVentas();
					$ad->__SET('nombres',$nom);
					$ad->__SET('dni',$dni);
					$ad->__SET('email',$cor);
					$ad->__SET('telefono',$tel);
					$ad->__SET('direccion',$dic);
					$ad->__SET('password',$con);
					$ad->__SET('idVen',$id);
				
				$read = new perVentasModel();
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