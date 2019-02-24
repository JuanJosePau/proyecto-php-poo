<?php
class areasModel extends conectar{
	
	public function listar(){
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM areas ORDER BY idArea");
			$stm->execute();
			
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$area= new area();
				$area->__SET('idArea',$r->idArea);
				$area->__SET('descripcion',$r->descripcion);
				$result[]=$area;
			}
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function obtener($id){
		try{
			$stm=$this->pdo->prepare("SELECT * FROM areas WHERE idArea = ?");
			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if (empty($r)) {
				return false;
			}else{
				$area= new area();
				$area->__SET('idArea',$r->idArea);
				$area->__SET('descripcion',$r->descripcion);
				return $area;
			}
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function eliminar($id){
		try{
			$stm=$this->pdo->prepare("DELETE FROM areas WHERE idArea = ?");
			$stm->execute(array($id));
			return $stm->rowcount();
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function actualizar(area $data){
		try{
			$sql = "UPDATE areas SET descripcion = ? WHERE idArea=?";
			$act=$this->pdo->prepare($sql)->execute(
				array(
					$data-> __GET('descripcion'),
					$data-> __GET('idArea'))
			);
			return $act;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function registrar(area $data){
		try{
			$sql = "INSERT INTO areas (descripcion) VALUES(?)";
			$reg=$this->pdo->prepare($sql)->execute(
				array($data-> __GET('descripcion'))
			);
			return $reg;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	
	public function obtenerCantidad(){
		$sql = "SELECT COUNT(*) total FROM areas";
		$count=$this->pdo->prepare($sql);
		$count->execute();
		$total = $count->fetchColumn();
		echo 'Numero de total de registros:' .'<b>'.$total.'</b>';
	}	

}
?>