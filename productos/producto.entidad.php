<?php
	class producto {

		private $idProducto;
		private $denominacion;
		private $precio;
		private $cantidad;
		private $fecVen;
		private $idCategoria;
		private $idProveedor;

		//sirve para obtener (recuperar o acceder) el valor ya asignado a un atributo
		public function __GET($k){
			return $this->$k;
		}
		//sirve para asignar un valor inicial a un atributo
		public function __SET($k,$v){
			return $this->$k=$v;
		}

	}
?>					
