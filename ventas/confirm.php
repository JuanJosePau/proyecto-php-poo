	<?php 
		include "../conectar.php";
		include "venta.entidad.php";
		include "ventas.model.php";
		include '../clientes/cliente.entidad.php';
		include '../clientes/clientes.model.php';
		include '../perventas/perVentas.entidad.php';
		include '../perventas/perVentas.model.php';	
		include '../detalleventas/detalleVenta.entidad.php';
	    include '../detalleventas/detalleVentas.model.php';
	    include '../productos/producto.entidad.php';
	    include '../productos/productos.model.php';		


        	$idVenta = $_POST['idVenta'];
        	$fecVenta = $_POST['fecVenta'];
        	$idCliente = $_POST['idCliente'];
        	$idVen = $_POST['idVen'];
        	$idDetalle = $_POST['idDetalle'];
        	$idVenta = $_POST['idVenta'];
        	$idProducto = $_POST['idProducto'];
        	$cantidad = $_POST['cantidad'];
        	$precio = $_POST['precio'];


        	$a = new venta();
				$a->__SET('idVenta',$idVenta);
				$a->__SET('fecVenta',$fecVenta);
	        $update1 = new ventasModel();
			$update1->actualizar($a);
		

	        $b = new cliente();
				$b->__SET('nombres',$idCliente);
			$update2 = new clientesModel();
	        $update2->actualizar($b); 
		    
		    $c = new perVentas();
				$c->__SET('nombres',$idVen);
	        $update3 = new perVentasModel();
			$update3->actualizar($c);

			$d = new detalleVenta();
				$d->__SET('idDetalle',$idDetalle);
				$d->__SET('idVenta',$idVenta);
				$d->__SET('cantidad',$cantidad);
				$d->__SET('precio',$precio);
	        $update4 = new detalleVentasModel();
			$update4->actualizar($d);

			$e = new producto();
				$e->__SET('denominacion',$idProducto);
	        $update5 = new productosModel();
			$update5->actualizar($e);
    ?>    
