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
                    include 'venta.entidad.php';
                    include 'ventas.model.php';
                    $result = array();
                    $reg = new ventasModel();
                    $inner = $reg->listarRelacionada();

                    echo '<table border=1><tr><td>idVenta</td><td>FecVenta</td><td>idCliente</td>
                                                <td>idVen</td><td>CNombre</td><td>PNombre</td></tr>';
                    foreach ($inner as $key) {
                        echo '<tr>';

                        echo '<td>';
                        echo $key-> __GET('idVenta');
                        echo '</td>';
						
                    	echo '<td>';
                        echo $key-> __GET('fecVenta');
						echo '</td>';
                        
						echo '<td>';
                        echo $key-> __GET('idCliente');
						echo '</td>';
                
                        echo '<td>';
						echo $key-> __GET('idVen');
                        echo '</td>';

                        echo '<td>';
                        echo $key-> __GET('cnombre');
						echo '</td>';
                
                        echo '<td>';
						echo $key-> __GET('pnombre');
                        echo '</td>';
                        echo '</tr>';
                    }
                        echo '</table>';
                        
                        
                        ?>
</body>
</html>
