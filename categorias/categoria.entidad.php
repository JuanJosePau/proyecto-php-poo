<?php
class categoria {
	
	private $idCategoria;
	private $denominacion;
	
	public function __GET($k){
		return $this->$k;
	}
	public function __SET($k,$v){
		return $this->$k=$v;
	}
	
}
?>