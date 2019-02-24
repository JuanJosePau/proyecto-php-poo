<?php
class administradorModel extends conectar{
	
	public function listar(){
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM administrador ORDER BY idAdmin");
			$stm->execute();
			
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$admin= new administrador();
				$admin->__SET('idAdmin',$r->idAdmin);
				$admin->__SET('nombres',$r->nombres);
				$admin->__SET('dni',$r->dni);
				$admin->__SET('email',$r->email);
				$admin->__SET('telefono',$r->telefono);
				$admin->__SET('direccion',$r->direccion);
				$admin->__SET('password',$r->password);
				$result[]=$admin;
			}
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function obtener($id){
		try{
			$stm = $this->pdo->prepare("SELECT * FROM administrador WHERE idAdmin = ?");
			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if (empty($r)) {
				return false;
			}else{
				$admin= new administrador();
				$admin->__SET('idAdmin',$r->idAdmin);
				$admin->__SET('nombres',$r->nombres);
				$admin->__SET('dni',$r->dni);
				$admin->__SET('email',$r->email);
				$admin->__SET('telefono',$r->telefono);
				$admin->__SET('direccion',$r->direccion);
				$admin->__SET('password',$r->password);
				return $admin;
			}	
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function eliminar($id){
		try{
			$stm=$this->pdo->prepare("DELETE FROM administrador WHERE idAdmin = ?");
			$stm->execute(array($id));
			return $stm->rowcount();
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function actualizar(administrador $data){
		try{
			$sql = "UPDATE administrador SET 
				nombres = ?,
				dni	= ?,
				email	= ?,
				telefono	= ?,
				direccion	= ?,
				password	= ?
				WHERE idAdmin=?";
			$act=$this->pdo->prepare($sql)->execute(
				array(
					$data-> __GET('nombres'),
					$data-> __GET('dni'),
					$data-> __GET('email'),
					$data-> __GET('telefono'),
					$data-> __GET('direccion'),
					$data-> __GET('password'),
					$data-> __GET('idAdmin')
				)
			);
			return $act;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function registrar(administrador $data){
		try{
			$sql = "INSERT INTO administrador (nombres,dni,email,telefono,direccion,password) VALUES(?,?,?,?,?,?)";
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