<?php
class area {
	
	private $idArea;
	private $descripcion;
	
	public function __GET($k){
		return $this->$k;
	}
	public function __SET($k,$v){
		return $this->$k=$v;
	}
	
}
?>