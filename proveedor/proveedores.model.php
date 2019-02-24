<?php

class proveedoresModel extends conectar{
	
	public function listar(){
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM proveedores ORDER BY idProveedor");
			$stm->execute();
			
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$proveedor= new proveedor();
				$proveedor->__SET('idProveedor',$r->idProveedor);
				$proveedor->__SET('denominacion',$r->denominacion);
				$proveedor->__SET('direccion',$r->direccion);
				$proveedor->__SET('telefono',$r->telefono);
				$result[]=$proveedor;
			}
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function obtener($id){
		try{
			$stm=$this->pdo->prepare("SELECT * FROM proveedores WHERE idProveedor = ?");
			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if (empty($r)) {
				return false;
			}else{
				$proveedor = new proveedor();
				$proveedor->__SET('idProveedor',$r->idProveedor);
				$proveedor->__SET('denominacion',$r->denominacion);
				$proveedor->__SET('direccion',$r->direccion);
				$proveedor->__SET('telefono',$r->telefono);
				return $proveedor;
			}
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function eliminar($id){
		try{
			$stm=$this->pdo->prepare("DELETE FROM proveedores WHERE idProveedor = ?");
			$stm->execute(array($id));
			return $stm->rowcount();
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function actualizar(proveedor $data){
		try{
			$sql = "UPDATE proveedores SET denominacion = ?, direccion = ?, telefono = ? WHERE idProveedor=?";
			$act=$this->pdo->prepare($sql)->execute(
				array(
					$data-> __GET('denominacion'),
					$data-> __GET('direccion'),
					$data-> __GET('telefono'),
					$data-> __GET('idProveedor'))
			);
			return $act;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function registrar(proveedor $data){
		try{
			$sql = "INSERT INTO proveedores (denominacion, telefono, direccion) VALUES(?, ?, ?)";
			$reg=$this->pdo->prepare($sql)->execute(
				array($data-> __GET('denominacion'),
						$data-> __GET('telefono'),
						$data-> __GET('direccion')
					)
			);
			return $reg;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function cantidad(){
			try{
				$sql="SELECT count(*) FROM proveedores";
				$contar = $this->pdo->prepare($sql);
				$contar->execute();
				$cant=$contar->fetchColumn();
				return $cant;
			}catch(Exception $e){
				die($e->getMessage());
			}
	}

}		

?>