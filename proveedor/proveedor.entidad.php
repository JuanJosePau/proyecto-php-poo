<?php
class proveedor {
	
	private $idProveedor;
	private $denominacion;
	private $direccion;
	private $telefono;
	
	public function __GET($k){
		return $this->$k;
	}
	public function __SET($k,$v){
		return $this->$k=$v;
	}
	
}
?>