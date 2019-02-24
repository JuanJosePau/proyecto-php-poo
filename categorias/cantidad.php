<?php
	include '../conectar.php';
	include 'categoria.entidad.php';
    include 'categorias.model.php';

	$obj = new categoriasModel();
	$count = $obj->cantidad();
	echo "cantidad de registros : ". $count; 

?>