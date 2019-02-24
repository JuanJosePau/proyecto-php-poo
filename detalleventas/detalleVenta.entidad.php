<?php
	class detalleVenta {
		
		private $idDetalle;
		private $idVenta;
		private $idProducto;
		private $cantidad;	
		private $precio;
		
		public function __GET($k){
			return $this->$k;
		}
		public function __SET($k,$v){
			return $this->$k=$v;
		}
		
	}

 
?>