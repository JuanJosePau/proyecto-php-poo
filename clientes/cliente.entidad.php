<?php
class cliente {
	
	private $idCliente;
	private $nombres;
	private $dni;
	private $email;
	private $telefono;
	private $direccion;
	
	public function __GET($k){
		return $this->$k;
	}
	public function __SET($k,$v){
		return $this->$k=$v;
	}
	
}
?>