<?php
	include '../conectar.php';
	include 'venta.entidad.php';
    include 'ventas.model.php';

	$obj = new ventasModel();
	$count = $obj->cantidad();
	echo "cantidad de registros : ". $count; 

?>