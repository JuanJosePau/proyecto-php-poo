<?php
	include '../conectar.php';
	include 'areas.model.php';
	include 'area.entidad.php';


	$obj = new areasModel();
	$count = $obj->obtenerCantidad();
	echo $count;
?>