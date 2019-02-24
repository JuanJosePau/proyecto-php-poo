<?php
class clientesModel extends conectar{
	
	public function listar(){
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM clientes ORDER BY idCliente");
			$stm->execute();
			
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$cliente= new cliente();
				$cliente->__SET('idCliente',$r->idCliente);
				$cliente->__SET('nombres',$r->nombres);
				$cliente->__SET('dni',$r->dni);
				$cliente->__SET('email',$r->email);
				$cliente->__SET('telefono',$r->telefono);
				$cliente->__SET('direccion',$r->direccion);
				$result[]=$cliente;
			}
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function obtener($id){
		try{
			$stm=$this->pdo->prepare("SELECT * FROM clientes WHERE idCliente = ?");
			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if (empty($r)) {
				return false;
			}else{
				$cliente= new cliente();
				$cliente->__SET('idCliente',$r->idCliente);
				$cliente->__SET('nombres',$r->nombres);
				$cliente->__SET('dni',$r->dni);
				$cliente->__SET('email',$r->email);
				$cliente->__SET('telefono',$r->telefono);
				$cliente->__SET('direccion',$r->direccion);
				return $cliente;
			}	
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function eliminar($id){
		try{
			$stm=$this->pdo->prepare("DELETE FROM clientes WHERE idCliente = ?");
			$stm->execute(array($id));
			return $stm->rowcount();
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function actualizar(cliente $data){
		try{
			$sql = "UPDATE clientes SET 
				nombres = ?,
				dni	= ?,
				email	= ?,
				telefono	= ?,
				direccion	= ?
				WHERE idCliente = ?";
			$act=$this->pdo->prepare($sql)->execute(
				array(
					$data-> __GET('nombres'),
					$data-> __GET('dni'),
					$data-> __GET('email'),
					$data-> __GET('telefono'),
					$data-> __GET('direccion'),
					$data-> __GET('idCliente')
				)
			);
			return $act;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function registrar(cliente $data){
		try{
			$sql = "INSERT INTO clientes (nombres,dni,email,telefono,direccion) VALUES(?,?,?,?,?)";
			$reg=$this->pdo->prepare($sql)->execute(
				array(
					$data-> __GET('nombres'),
					$data-> __GET('dni'),
					$data-> __GET('email'),
					$data-> __GET('telefono'),
					$data-> __GET('direccion')
				)
			);
			return $reg;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
}
?>