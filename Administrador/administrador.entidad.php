<?php
class administrador {
	
	private $idAdmin;
	private $nombres;
	private $dni;
	private $email;
	private $telefono;
	private $direccion;
	private $password;
	
	public function __GET($k){
		return $this->$k;
	}
	public function __SET($k,$v){
		return $this->$k=$v;
	}
	
}
?>