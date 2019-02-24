
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
	<h1>registro de nuevo cliente</h1>
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
		    <td colspan="2"><center><input type="submit"value="registrar"></center></td>
		  </tr>
		</table>
	</form>
	<label>
		<?php
			include '../conectar.php';
			include 'cliente.entidad.php';
			include 'clientes.model.php';
			if ($_REQUEST) {
				$nom=$_REQUEST['nom'];
				$dni=$_REQUEST['dni'];
				$cor=$_REQUEST['correo'];
				$tel=$_REQUEST['telefono'];
				$dic=$_REQUEST['dic'];

				$b=new cliente();
					$b->__SET('nombres',$nom);
					$b->__SET('dni',$dni);
					$b->__SET('email',$cor);
					$b->__SET('telefono',$tel);
					$b->__SET('direccion',$dic);
				$recl = new clientesModel();
				$regis=$recl->registrar($b);

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