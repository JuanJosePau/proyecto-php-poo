<html>
<head>
<meta charset="utf-8">
</head>
	<h1>Obtener datos de tabla productos</h1>
	<form action="" method="post">
		<select name="select">
			<option value="cantidad">Cantidad</option>
			<option value="promedio">Promedio</option>
			<option value="minimo">Minimo</option>
			<option value="maximo">Maximo</option>
			<option value="pre-max">Detalles-Pre-Max</option>
			<option value="pre-min">Detalles-Pre-Min</option>						
		</select>
		<input type="submit" name="button" value="Mostrar">

	</form> 
	<label> 
		<table border="1">
<?php
	include '../conectar.php';
	include 'producto.entidad.php';
	include 'productos.model.php';
	
	if(isset($_REQUEST['button'])){

		$mostrar=$_REQUEST['select'];

		$prod = new productosModel();
		$cantidad = $prod->cantidad();

		$pro = new productosModel();
		$promedio = $pro->promedio();
		
		$min = new productosModel();
		$minimo = $min->preMin();
		
		$max = new productosModel();
		$maximo = $max->preMax();
		
		$premax = new productosModel();
		$pre_max = $premax->regisPreMax();
		
		$premin = new productosModel();
		$pre_min = $premin->regisPreMin();

		switch ($mostrar) {
			case 'cantidad':
				echo'<tr><td>cantidad de productos: </td></tr>';
				echo'<tr><td>'.$cantidad.'</td></tr>';
				break;
			case 'promedio':
				echo'<tr><td>promedio de precios: </td></tr>';
				echo'<tr><td>'.$promedio.'</td></tr>';
				break;
			case 'minimo':
				echo'<tr><td>precio minimo: </td></tr>';
				echo'<tr><td>'.$minimo.'</td></tr>';
				break;
			case 'maximo':
				echo'<tr><td>precio maximo: </td></tr>';
				echo'<tr><td>'.$maximo.'</td></tr>';
				break;
			case 'pre-max':
				echo'<tr><td colspan="7">registro de precio maximo: </td></tr>';
				echo '<tr>';
					echo '<td>idProducto</td>';
					echo '<td>denominacion</td>';
					echo '<td>precio</td>';
					echo '<td>cantidad</td>';
					echo '<td>fecVen</td>';
					echo '<td>idCategoria</td>';
					echo '<td>idProveedor</td>';
				echo '</tr>';

				foreach ($pre_max as $key) {
					echo '<tr>';
						echo '<td>';
							echo $key-> __GET('idProducto');
						echo '</td>';
							
						echo '<td>';
							echo $key-> __GET('denominacion');
						echo '</td>';
							
						echo '<td>';
							echo $key-> __GET('precio');
						echo '</td>';
						
						echo '<td>';
							echo $key-> __GET('cantidad');
						echo '</td>';
							
						echo '<td>';
							echo $key-> __GET('fecVen');
						echo '</td>';
						
						echo '<td>';
							echo $key-> __GET('idCategoria');
						echo '</td>';
						
						echo '<td>';
							echo $key-> __GET('idProveedor');
						echo '</td>';
					echo '</tr>';
				}
				break;
			case 'pre-min':
				echo'<tr><td colspan="7">registro de precio maximo: </td></tr>';
				echo '<tr>';
					echo '<td>idProducto</td>';
					echo '<td>denominacion</td>';
					echo '<td>precio</td>';
					echo '<td>cantidad</td>';
					echo '<td>fecVen</td>';
					echo '<td>idCategoria</td>';
					echo '<td>idProveedor</td>';
				echo '</tr>';

				foreach ($pre_min as $key) {
					echo '<tr>';
						echo '<td>';
						echo $key-> __GET('idProducto');
						echo '</td>';
							
						echo '<td>';
						echo $key-> __GET('denominacion');
						echo '</td>';
							
						echo '<td>';
						echo $key-> __GET('precio');
						echo '</td>';
						
						echo '<td>';
						echo $key-> __GET('cantidad');
						echo '</td>';
							
						echo '<td>';
						echo $key-> __GET('fecVen');
						echo '</td>';
						
						echo '<td>';
						echo $key-> __GET('idCategoria');
						
						echo '<td>';
						echo $key-> __GET('idProveedor');
						echo '</td>';
					echo '</tr>';
				}
				break;
		}
			
	}
?>
			
		</table>	  
	</label> 	
<body>
</body>
</html>