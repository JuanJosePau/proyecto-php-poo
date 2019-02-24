<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

	include '../conectar.php';
	include 'detalleVenta.entidad.php';
	include 'detalleVentas.model.php';     

	$reg = new detalleVentasModel();
	$resultado = $reg->listarRelacionada();

	echo "<hr>";
	echo "<b>listarRelacionada</b>";
	echo "<hr>";	

	echo '<table border=1>
	<tr><td>idDetalle</td>
	<td>Denominacion</td>
	<td>fecha Venta</td>
	<td>Precio</td>
	<td>Cantidad</td>
	<td>fecVenta</td></tr>';

	foreach ($resultado as $result) {					
			echo '<tr>';
				echo '<td>';
					echo $result-> __GET('idDetalle');
				echo '</td>';
				echo '<td>';
					echo $result-> __GET('denominacion');
				echo '</td>';
				echo '<td>';
					echo $result-> __GET('fecVen');
				echo '</td>';
				echo '<td>';
					echo $result-> __GET('precio');
				echo '</td>';
				echo '<td>';
					echo $result-> __GET('cantidad');
				echo '</td>';
				echo '<td>';
					echo $result-> __GET('fecVenta');
				echo '</td>';
			echo '</tr>';								
	}
		echo '</table>';

		echo "<hr>";
		echo "<b>listarRelacionadaDos</b>";
		echo "<hr>";	

	$Dos = new detalleVentasModel();
	$resultadoDos = $Dos->listarRelacionadaDos();

	echo '<table border=1>
	<tr><td>idDetalle</td>
	<td>Denominacion</td>
	<td>fecha Venta</td>
	<td>Precio</td>
	<td>Cantidad</td>
	<td>fecVenta</td>
	<td>C Denominacion</td>
	<td>Proveedor</td></tr>';	

	foreach ($resultadoDos as $result) {					
			echo '<tr>';
				echo '<td>';
					echo $result-> __GET('idDetalle');
				echo '</td>';
				echo '<td>';
					echo $result-> __GET('denominacion');
				echo '</td>';
				echo '<td>';
					echo $result-> __GET('fecVen');
				echo '</td>';
				echo '<td>';
					echo $result-> __GET('precio');
				echo '</td>';
				echo '<td>';
					echo $result-> __GET('cantidad');
				echo '</td>';
				echo '<td>';
					echo $result-> __GET('fecVenta');
				echo '</td>';
				echo '<td>';
					echo $result-> __GET('cdenominacion');
				echo '</td>';	
				echo '<td>';
					echo $result-> __GET('prodenominacion');
				echo '</td>';																
			echo '</tr>';								
	}
		echo '</table>';	

		echo "<hr>";
		echo "<b>groupBy</b>";
		echo "<hr>";	

	$group = new detalleVentasModel();
	$groupby = $group->groupBy();

	echo '<table border=1>
	<tr><td>Denominacion</td>
	<td>Cantidad</td>	
	<td>Pprecio</td>
	<td>Promedioprecio</td></tr>';
	
	foreach ($groupby as $result) {					
			echo '<tr>';
				echo '<td>';
					echo $result-> __GET('cdenominacion');
				echo '</td>'; 
				echo '<td>';
					echo $result-> __GET('prodenominacion');
				echo '</td>';								
				echo '<td>';
					echo $result-> __GET('pprecio');
				echo '</td>';	
				echo '<td>';
					echo $result-> __GET('promprecio');
				echo '</td>';															
			echo '</tr>';								
	}
		echo '</table>';	 																				
?>
</body>
</html>
