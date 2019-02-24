<?php
class detalleVentasModel extends conectar{
	
	public function listar(){
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM detalleventas ORDER BY idDetalle");
			$stm->execute();
			
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$productos = new detalleVenta();
				$productos->__SET('idDetalle',$r->idDetalle);
				$productos->__SET('idVenta',$r->idVenta);
				$productos->__SET('idProducto',$r->idProducto);
				$productos->__SET('cantidad',$r->cantidad);
				$productos->__SET('precio',$r->precio);
				$result[]=$productos;
			}
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function obtenerList($id){
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM detalleventas WHERE idVenta = ?");
			$stm->execute(array($id));
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$productos = new detalleVenta();
				$productos->__SET('idDetalle',$r->idDetalle);
				$productos->__SET('idVenta',$r->idVenta);
				$productos->__SET('idProducto',$r->idProducto);
				$productos->__SET('cantidad',$r->cantidad);
				$productos->__SET('precio',$r->precio);			
				$result[] = $productos;
			}
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function obtener($id){
		try{
			$stm = $this->pdo->prepare("SELECT * FROM detalleventas WHERE idDetalle = ?");
			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if (empty($r)) {
				return false;
			}else{
				$productos = new detalleVenta();
				$productos->__SET('idDetalle',$r->idDetalle);
				$productos->__SET('idVenta',$r->idVenta);
				$productos->__SET('idProducto',$r->idProducto);
				$productos->__SET('cantidad',$r->cantidad);
				$productos->__SET('precio',$r->precio);			
				return $productos;
			}

		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function eliminar($id){
		try{
			$stm = $this->pdo->prepare("DELETE FROM detalleventas WHERE idDetalle = ?");
			$stm->execute(array($id));
			return $stm->rowcount();
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	
	public function actualizar(detalleVenta $data){
		try{
			$sql = "UPDATE detalleventas SET idVenta = ?, idProducto = ?, cantidad = ?, precio = ? WHERE idDetalle = ?";
			$act = $this->pdo->prepare($sql)->execute(
				array(
					$data-> __GET('idVenta'),
					$data-> __GET('idProducto'),
					$data-> __GET('cantidad'),
					$data-> __GET('precio'),
					$data-> __GET('idDetalle'))
			);
			return $act;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function registrar(detalleVenta $data){
		try{
			$sql = "INSERT INTO detalleventas (idVenta, idProducto, cantidad, precio) VALUES(?, ?, ?, ?)";
			$reg = $this->pdo->prepare($sql)->execute(
				array($data-> __GET('idVenta'),
						$data-> __GET('idProducto'),
						$data-> __GET('cantidad'),
						$data-> __GET('precio')
				)
			);
			return $reg;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function cantidad(){
			try{
				$sql = "SELECT count(*) FROM detalleventas";
				$contar = $this->pdo->prepare($sql);
				$contar->execute();
				$cant = $contar->fetchColumn();
				return $cant;
			}catch(Exception $e){
				die($e->getMessage());
			}
	}

	public function listarRelacionada(){
		try{
			$result = array();
			$sql = "SELECT d.idDetalle, p.denominacion, p.fecVen, p.precio,p.cantidad,
							 v.fecVenta
						FROM detalleventas d INNER JOIN ventas v On d.idVenta = v.idVenta 
										INNER JOIN productos p On d.idProducto = p.idProducto";
			$query = $this->pdo->prepare($sql);
			$query->execute();

			foreach($query->fetchAll(PDO::FETCH_OBJ) as $r){
					$productos = new detalleVenta();
					$productos->__SET('idDetalle',$r->idDetalle);
					$productos->__SET('denominacion',$r->denominacion);
					$productos->__SET('fecVen',$r->fecVen);
					$productos->__SET('precio',$r->precio);
					$productos->__SET('cantidad',$r->cantidad);
					$productos->__SET('fecVenta',$r->fecVenta);								
					$result[] = $productos;  
				}
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}		

	public function listarRelacionadaDos(){
		try{
			$result = array();
			$sql = "SELECT d.idDetalle, p.denominacion, p.fecVen, p.precio,p.cantidad,
							 v.fecVenta,
							 c.denominacion AS cdenominacion,
							 pro.denominacion AS prodenominacion
						FROM detalleventas d INNER JOIN ventas v On d.idVenta = v.idVenta 
										INNER JOIN productos p On d.idProducto = p.idProducto
										INNER JOIN categorias c On p.idCategoria = c.idCategoria
										INNER JOIN proveedores pro On pro.idProveedor = p.idProveedor";
			$query = $this->pdo->prepare($sql);
			$query->execute();

			foreach($query->fetchAll(PDO::FETCH_OBJ) as $r){
					$productos = new detalleVenta();
					$productos->__SET('idDetalle',$r->idDetalle);
					$productos->__SET('denominacion',$r->denominacion);
					$productos->__SET('fecVen',$r->fecVen);
					$productos->__SET('precio',$r->precio);
					$productos->__SET('cantidad',$r->cantidad);
					$productos->__SET('fecVenta',$r->fecVenta);	
					$productos->__SET('cdenominacion',$r->cdenominacion);		
					$productos->__SET('prodenominacion',$r->prodenominacion);							
					$result[] = $productos;  
				}
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}	

	public function groupBy(){
		try{
			$result = array();
			/* BROUP BY Combina los registros con valores idénticos, en la lista de campos especificados, en un único registro:
			la funcion (COUNT) cuenta cuantas similitudes hay 
			la funcion (SUM) suma el precio
			la funcion (AVG) devuelve el promedio del campo precio*/
			$sql = "SELECT  count(p.cantidad) as prodenominacion, p.denominacion AS cdenominacion, sum(p.precio) AS pprecio, avg(p.precio) AS promprecio
					FROM productos p 
					INNER JOIN categorias c ON p.idCategoria = c.idCategoria
					GROUP BY cdenominacion";
			$query = $this->pdo->prepare($sql);
			$query->execute();

			foreach($query->fetchAll(PDO::FETCH_OBJ) as $r){
					$productos = new detalleVenta();
					$productos->__SET('cdenominacion',$r->cdenominacion);		
					$productos->__SET('prodenominacion',$r->prodenominacion);
					$productos->__SET('pprecio',$r->pprecio);
					$productos->__SET('promprecio',$r->promprecio);
					$result[] = $productos;  
				}
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}	

	public function delete($id){
		try{
			$stm = $this->pdo->prepare("DELETE FROM detalleventas WHERE idVenta = ?");
			$stm->execute(array($id));
			return $stm->rowcount();
		}catch(Exception $e){
			die($e->getMessage());
		}
	}		
}		

?>