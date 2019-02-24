<?php
	class venta {
		
		private $idVenta;
		private $fecVenta;
		private $idCliente;
		private $idVen;	
		
		public function __GET($k){
			return $this->$k;
		}
		public function __SET($k,$v){
			return $this->$k=$v;
		}
		
	}
?>