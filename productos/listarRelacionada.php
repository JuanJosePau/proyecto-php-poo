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
                    include 'producto.entidad.php';
                    include 'productos.model.php';
                    //Creamos un objeto  
                    $reg = new productosModel();
                    //y accedemos al metodo productosModel(),
                    // enseguida lo guardamos en una variable
                    $resultado = $reg->listarRelacionada();

                    echo "<hr>";
 					echo "<b>listarRelacionada</b>";
 					echo "<hr>";	

					echo '<table border=1>
					<tr><td>idProducto</td>
					<td>PDenominacion</td>
					<td>Precio</td>
					<td>Cantidad</td>
					<td>fecha Venta</td>
                    <td>CDenominacion</td>
                    <td>Provedenominacion</td>
                    <td>Telefono</td>
                    <td>Direccion</td></tr>';
                    //recorremos la variable resultado
                    foreach ($resultado as $result) {					
							echo '<tr>';
                                echo '<td>';
                                //mostramos en pantallacada elemento que va recorriendo
									echo $result-> __GET('idProducto');
								echo '</td>';
								echo '<td>';
									echo $result-> __GET('pdenominacion');
								echo '</td>';
                                echo '<td>';
                                    echo $result-> __GET('precio');
                                echo '</td>';
                                echo '<td>';
                                    echo $result-> __GET('cantidad');
                                echo '</td>';
								echo '<td>';
									echo $result-> __GET('fecVen');
								echo '</td>';
								echo '<td>';
									echo $result-> __GET('cdenominacion');
                                echo '</td>';
                                echo '<td>';
                                    echo $result-> __GET('provedenominacion');
                                echo '</td>';
                                echo '<td>';
                                    echo $result-> __GET('telefono');
                                echo '</td>';
                                echo '<td>';
                                    echo $result-> __GET('direccion');
                                echo '</td>';
							echo '</tr>';								
					}
 						echo '</table>';
                ?>
    </table>
</body>
</html>
