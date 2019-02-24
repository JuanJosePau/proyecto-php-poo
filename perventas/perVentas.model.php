<?php
class perVentasModel extends conectar{
	
	public function listar(){
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM perventas ORDER BY idVen");
			$stm->execute();
			
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$perV= new perVentas();
				$perV->__SET('idVen',$r->idVen);
				$perV->__SET('nombres',$r->nombres);
				$perV->__SET('dni',$r->dni);
				$perV->__SET('email',$r->email);
				$perV->__SET('telefono',$r->telefono);
				$perV->__SET('direccion',$r->direccion);
				$perV->__SET('password',$r->password);
				$result[]=$perV;
			}
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function obtener($id){
		try{
			$stm=$this->pdo->prepare("SELECT * FROM perventas WHERE idVen = ?");
			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if (empty($r)) {
				return false;
			}else{
				$perV= new perVentas();
				$perV->__SET('idVen',$r->idVen);
				$perV->__SET('nombres',$r->nombres);
				$perV->__SET('dni',$r->dni);
				$perV->__SET('email',$r->email);
				$perV->__SET('telefono',$r->telefono);
				$perV->__SET('direccion',$r->direccion);
				$perV->__SET('password',$r->password);
				return $perV;
			}	
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function eliminar($id){
		try{
			$stm=$this->pdo->prepare("DELETE FROM perventas WHERE idVen = ?");
			$stm->execute(array($id));
			return $stm->rowcount();
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function actualizar(perVentas $data){
		try{
			$sql = "UPDATE perventas SET 
				nombres = ?,
				dni	= ?,
				email	= ?,
				telefono	= ?,
				direccion	= ?,
				password	= ?
				WHERE idVen = ?";
			$act=$this->pdo->prepare($sql)->execute(
				array(
					$data-> __GET('nombres'),
					$data-> __GET('dni'),
					$data-> __GET('email'),
					$data-> __GET('telefono'),
					$data-> __GET('direccion'),
					$data-> __GET('password'),
					$data-> __GET('idVen')
				)
			);
			return $act;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function registrar(perVentas $data){
		try{
			$sql = "INSERT INTO perventas (nombres,dni,email,telefono,direccion,password) VALUES(?,?,?,?,?,?)";
			$reg=$this->pdo->prepare($sql)->execute(
				array(
					$data-> __GET('nombres'),
					$data-> __GET('dni'),
					$data-> __GET('email'),
					$data-> __GET('telefono'),
					$data-> __GET('direccion'),
					$data-> __GET('password')
				)
			);
			return $reg;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
}
?>