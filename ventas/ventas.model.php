<?php
class ventasModel extends conectar{
	
	public function listar(){
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM ventas ORDER BY idVenta");
			$stm->execute();
			
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$venta = new venta();
				$venta->__SET('idVenta',$r->idVenta);
				$venta->__SET('fecVenta',$r->fecVenta);
				$venta->__SET('idCliente',$r->idCliente);
				$venta->__SET('idVen',$r->idVen);
				$result[]=$venta;
			}
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function obtener($id){
		try{
			$stm = $this->pdo->prepare("SELECT * FROM ventas WHERE idVenta = ?");
			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if (empty($r)) {
				return false;
			}else{
				$venta = new venta();
				$venta->__SET('idVenta',$r->idVenta);
				$venta->__SET('fecVenta',$r->fecVenta);
				$venta->__SET('idCliente',$r->idCliente);
				$venta->__SET('idVen',$r->idVen);			
				return $venta;
			}
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function eliminar($id){
		try{
			$stm = $this->pdo->prepare("DELETE FROM ventas WHERE idVenta = ?");
			$stm->execute(array($id));
			return $stm->rowcount();
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	
	public function actualizar(venta $data){
		try{
			$sql = "UPDATE ventas SET fecVenta = ?, idCliente = ?, idVen = ? WHERE idVenta = ?";
			$act = $this->pdo->prepare($sql)->execute(
				array(
					$data-> __GET('fecVenta'),
					$data-> __GET('idCliente'),
					$data-> __GET('idVen'),
					$data-> __GET('idVenta'))
			);
			return $act;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function registrar(venta $data){
		try{
			$sql = "INSERT INTO ventas (fecVenta, idCliente, idVen) VALUES(?, ?, ?)";
			$reg = $this->pdo->prepare($sql)->execute(
				array($data-> __GET('fecVenta'),
						$data-> __GET('idCliente'),
						$data-> __GET('idVen')
				)
			);
			return $reg;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function cantidad(){
			try{
				$sql = "SELECT count(*) FROM ventas";
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
			$sql = "SELECT v.idVenta, v.fecVenta, v.idCliente, v.idVen,
							 c.nombres AS cnombre, 
							p.nombres AS pnombre
						FROM ventas v INNER JOIN clientes c On v.idCliente = c.idCliente 
										INNER JOIN perventas p On v.idVen = p.idVen";
			$query = $this->pdo->prepare($sql);
			$query->execute();

			foreach($query->fetchAll(PDO::FETCH_OBJ) as $r){
				$venta = new venta();
				$venta->__SET('idVenta',$r->idVenta);
				$venta->__SET('fecVenta',$r->fecVenta);
				$venta->__SET('idCliente',$r->idCliente);
				$venta->__SET('idVen',$r->idVen);
				$venta->__SET('cnombre',$r->cnombre);
				$venta->__SET('pnombre',$r->pnombre);				
				$result[]=$venta;
			}
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}	
	
	public function ultimoRegistro(venta $data){
		try{
			$result = $this->registrar($data);
            return $result = $this->pdo->lastInsertId();
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function ultimoId(){
        try{
            $query = "SELECT MAX(idVenta) AS id FROM ventas";
            $result = $this->pdo->prepare($query);
            $result->execute();
            $run = $result->fetch(PDO::FETCH_ASSOC);
            return $run['id'];
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function factura($id){
		try{
			$sql = "SELECT v.idVenta, v.fecVenta,
							pv.nombres AS pv_nombres,
							d.idDetalle, d.cantidad, d.precio,
							c.nombres, p.denominacion
					FROM ventas v INNER JOIN detalleventas d On v.idVenta = d.idVenta
									INNER JOIN clientes c On v.idCliente = c.idCliente
									INNER JOIN productos p On d.idProducto = p.idProducto
									INNER JOIN perventas pv On v.idVen = pv.idVen
					 WHERE v.idVenta = ?";
			$query = $this->pdo->prepare($sql);
			$query->execute(array($id));
			$result = array();
			foreach($query->fetchAll(PDO::FETCH_OBJ) as $r){
				$venta = new venta();
				$venta->__SET('idVenta',$r->idVenta);
				$venta->__SET('fecVenta',$r->fecVenta);
				$venta->__SET('nombres',$r->nombres);
				$venta->__SET('pv_nombres',$r->pv_nombres);
				$venta->__SET('idDetalle',$r->idDetalle);
				$venta->__SET('denominacion',$r->denominacion);
				$venta->__SET('cantidad',$r->cantidad);
				$venta->__SET('precio',$r->precio);				
				$result[]=$venta;
			}
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}	


}		

?>