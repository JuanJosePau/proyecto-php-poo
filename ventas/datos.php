<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
    <link href="estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php 
	include "../conectar.php";
	include "venta.entidad.php";
	include "ventas.model.php";
	include '../detalleventas/detalleVenta.entidad.php';
    include '../detalleventas/detalleVentas.model.php';	
    
    if ($_GET) {
        $id = $_GET['id'];
        eliminarFactura($id);
        mostrarListado();
        echo "la Factura numero $id se a eliminado";
    }else{
        mostrarListado();
    }
    
    function eliminarFactura($id){
        $listVen = new ventasModel();
        $listDe = new detalleVentasModel();
        $deleteVen = $listVen->eliminar($id);
        $deleteDe = $listDe->delete($id);
    }

    function mostrarListado(){
        $listVen = new ventasModel();
        $showVen = $listVen->listar();
        
        echo "<table>
                <thead>
                    <tr>
                        <td>idVenta</td> <td>fecVenta</td> <td>idCliente</td> <td>idVen</td> <td>Eliminar</td> <td>Actualizar</td>
                    </tr>";
            foreach ($showVen as $run) {	
                echo "<tr>
                        <td>";
                            $id = $run-> __GET('idVenta');
                            echo $run-> __GET('idVenta');
                            echo "<br><span class='mas' onclick='toggle($id)'>&#43;</span>
                        </td>
                        <td>".$run-> __GET('fecVenta')."</td>
                        <td>".$run-> __GET('idCliente')."</td>
                        <td>".$run-> __GET('idVen')."</td>
                        <td><button onclick='alert($id)'>Eliminar</button></td>
                        <td><button onclick='redireccioname($id)'>Actualizar</button></td>
                    </tr>
                </thead>
                
                <tbody class='e$id' id='hide'>
                <tr>
                    <td rowspan='4'></td> <td>idDetalle</td> <td>idVenta</td> <td>idProducto</td> <td>cantidad</td> <td>precio</td>
                </tr>";
                $listDe = new detalleVentasModel();
                $showDe = $listDe->obtenerList($id);
                    foreach ($showDe as $run) {
                        echo "<tr>
                                <td>".$run-> __GET('idDetalle')."</td>
                                <td>".$run-> __GET('idVenta')."</td>
                                <td>".$run-> __GET('idProducto')."</td>
                                <td>".$run-> __GET('cantidad')."</td>
                                <td>".$run-> __GET('precio')."</td>      
                            </tr>";	
                    }
            echo "</tbody>";
        } 
        echo "</table>";
    }       
?>

    <script src="../js/jquery-1.3.1.min.js"></script>
    <script>

        function toggle(id){
            var e = $('.e'+id)
            e.toggle()
            console.log(e)
            /* var d = document.getElementById('e'+id)
            if (d.style.display  == 'none') {
                d.style.display  = 'block'
                d.style.float = 'rigth'
            }else{
                d.style.display  = 'none'
            } */

        }

        function alert(id){
            var msg = confirm("¿Desea eliminar este registro ?");
            if(msg){
                location.href='datos.php?id='+id ;
            }
        }

        function redireccioname(id){
            location.href='actualizarDatos.php?id='+id
        }
    </script>
</body>
</html>    