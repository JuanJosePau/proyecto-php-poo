<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" method="post">
		<input type="text" name="id" id="id">
		<input type="submit" value="Consultar">
	</form>
</body>
</html>
<?php 
	include "../conectar.php";
	include "venta.entidad.php";
	include "ventas.model.php";

	if ($_REQUEST) {
		$id = $_POST['id'];
		
		$run = new ventasModel();
		$get = $run->factura($id);
		
		if ($get) {
			echo "<hr> Ventas Get";		
			echo '<table border=1><tr>
			<td>idVenta</td>
					<td>fecVenta</td>
					<td>idCliente</td>
					<td>idVen</td>
					</tr>';
					
					echo "<tr>";
					echo '<td>';
					echo $get[0]->idVenta;
					echo '</td>';
					
					echo '<td>';
					echo $get[0]->fecVenta;
					echo '</td>';
					
					echo '<td>';
					echo $get[0]->nombres;
					echo '</td>';
					
					echo '<td>';
					echo $get[0]->pv_nombres;
					echo '</td>';
					echo "</tr>";	
					
					echo '</table>';
					
					echo "<hr> Detalle Ventas Get";
					echo '<table border=1><tr>
					<td>idDetalle</td>
					<td>idProducto</td>
					<td>cantidad</td>
					<td>precio</td>
					<td>total</td>
					</tr>';
					$c = 0;
					$p = 0;
					$subtotal = 0;
					$igv = 0;
					$total = 0;
					foreach ($get as $run) {	
						echo "<tr>";
						echo '<td>';
						echo $run-> __GET('idDetalle');
						echo '</td>';
						
						echo '<td>';
						echo $run-> __GET('denominacion');
						echo '</td>';
						
						echo '<td>';
						$c = $run-> __GET('cantidad');
						echo $run-> __GET('cantidad');
						echo '</td>';
						
						echo '<td>';
						$p = $run-> __GET('precio');
						echo $run-> __GET('precio');
						echo '</td>';
						echo '<td>';
						echo $total = $c * $p;
						
						$subtotal += $total;
						$igv = $subtotal * 0.18;
						$tot = $igv + $subtotal;
						echo '</td>';
						echo "</tr>";	
					}
					echo " <tr><td colspan='3'></td><td>Subtotal</td><td>$subtotal</td></tr>
					<tr><td colspan='3'></td><td>IGV</td><td>$igv</td></tr>
					<tr><td colspan='3'></td><td>Total</td><td>$tot</td></tr>
					</table>";		
			}else{
				echo "El ID ha consultar no EXISTE.";
			}
		}
	?>