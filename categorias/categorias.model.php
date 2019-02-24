<?php
class categoriasModel extends conectar{
	
	public function listar(){
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM categorias ORDER BY idCategoria");
			$stm->execute();
			
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$categoria = new categoria();
				$categoria->__SET('idCategoria',$r->idCategoria);
				$categoria->__SET('Denominacion',$r->denominacion);
				$result[]=$categoria;
			}
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function obtener($id){
		try{
			$stm=$this->pdo->prepare("SELECT * FROM categorias WHERE idCategoria = ?");
			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if (empty($r)) {
				return false;
				}else{
				$categoria = new categoria();
				$categoria->__SET('idCategoria',$r->idCategoria);
				$categoria->__SET('denominacion',$r->denominacion);
				return $categoria;
			}		
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function eliminar($id){
		try{
			$stm = $this->pdo->prepare("DELETE FROM categorias WHERE idCategoria = ?");
			$stm->execute(array($id));
			return $stm->rowcount();
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function actualizar(categoria $data){
		try{
			$sql = "UPDATE categorias SET denominacion = ? WHERE idCategoria=?";
			$act = $this->pdo->prepare($sql)->execute(
				array(
					$data-> __GET('denominacion'),
					$data-> __GET('idCategoria'))
			);
			return $act;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function registrar(categoria $data){
		try{
			$sql = "INSERT INTO categorias (denominacion) VALUES(?)";
			$reg=$this->pdo->prepare($sql)->execute(
				array($data-> __GET('denominacion'))
			);
			return $reg;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function cantidad(){
			try{
				$sql = "SELECT count(*) FROM categorias";
				$contar = $this->pdo->prepare($sql);
				$contar->execute();
				$cant = $contar->fetchColumn();
				return $cant;
			}catch(Exception $e){
				die($e->getMessage());
			}
	}


}		

?>