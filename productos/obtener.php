<html>
<head>
<meta charset="utf-8">
<title>obtener cliente</title>
</head>
	<h1>obtener un registro de producto</h1>
	<form action="" method="post">
		<table border="1">
		  <tr>
		    <td>ingrese id que desea visualizar: </td>
		    <td><input type="number" name="id" min="0" max="500" ></td>
		  </tr>
		  <tr>
		    <td colspan="2"><center><input type="submit"  value="obtener"></center></td> 
		  </tr>
		</table>
	</form>
	<label>
	<?php
		include '../conectar.php';
		include 'producto.entidad.php';
		include 'productos.model.php';
		if ($_REQUEST) {
			$id=$_REQUEST['id'];

			$obar = new productosModel();
			$cli = $obar->obtener($id);

			if (!$cli) {
				echo "sin resultados";
			}else{
				echo '<table border=1>';
					echo '<tr>';
						echo '<td>';
							echo' IdProducto ';
						echo '</td>';
						echo '<td>';
							echo $cli-> __GET('idProducto');
						echo '</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>';
							echo' Denominacion ';
						echo '</td>';
						echo '<td>';
							echo $cli-> __GET('denominacion');
						echo '</td>';
					echo '</tr>';
					echo '<tr>';	
						echo '<td>';
							echo' Precio ';
						echo '</td>';
						echo '<td>';
							echo $cli-> __GET('precio');
						echo '</td>';
					echo '</tr>';
					echo '<tr>';	
						echo '<td>';
							echo' Cantidad ';
						echo '</td>';
						echo '<td>';
							echo $cli-> __GET('cantidad');
						echo '</td>';
					echo '</tr>';
					echo '<tr>';	
						echo '<td>';
							echo' FecVen ';
						echo '</td>';
						echo '<td>';
							echo $cli-> __GET('fecVen');
						echo '</td>';
					echo '</tr>';
					echo '<tr>';	
						echo '<td>';
							echo' IdCategoria ';
						echo '</td>';
						echo '<td>';
							echo $cli-> __GET('idCategoria');
						echo '</td>';
					echo '</tr>';
					echo '<tr>';		
						echo '<td>';
							echo' IdProveedor ';
						echo '</td>';
						echo '<td>';
							echo $cli-> __GET('idProveedor');
						echo '</td>';
					echo '</tr>';
				echo '</table>';
			}
		}
	?>
	</label>
<body>
</body>
</html>