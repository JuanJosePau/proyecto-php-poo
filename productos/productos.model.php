<?php
//Hereda la conexion de conectar,php
class productosModel extends conectar{

	public function listar(){
		try{
			$result = array();//creamos un un array
			//primeramente hacemos la consulta listando todos los registros en orden por el idProducto
			$sql = "SELECT * FROM productos ORDER BY idProducto";
			//preparamos la consulta, hacemos la conexion con el atributo eredado y enseguida lo guardamos en una variable. 
			$stm = $this->pdo->prepare($sql);
			$stm->execute();//y lo ejecutamos.
			//recorremos la variable $stm y lo traemos en forma de objeto y lo guardamos en la variable $r.
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
			//creamos una instancia de la clase producto.		
				$product = new producto();
				$product->__SET('idProducto',$r->idProducto);
				$product->__SET('denominacion',$r->denominacion);
				$product->__SET('precio',$r->precio);
				$product->__SET('cantidad',$r->cantidad);
				$product->__SET('fecVen',$r->fecVen);
				$product->__SET('idCategoria',$r->idCategoria);
				$product->__SET('idProveedor',$r->idProveedor);
			//el resultado almacenado en $product lo pasamos a una array	
				$result[] = $product;
			}
			return $result;//enseguida lo retornaremos
		}catch(Exception $e){
			//en caso de que aya algun inconveniente nos mostrara en pamntalla
			//el tipo de error que tendremos.
			die($e->getMessage());
		}
	}

	public function obtener($id){
		try{//en este caso pasaremos una parametro que seria el id a mostrar
			$stm=$this->pdo->prepare("SELECT * FROM productos WHERE idProducto = ?");
			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if (empty($r)) {
				return false;
			}else{
				$product= new producto();
				$product->__SET('idProducto',$r->idProducto);
				$product->__SET('denominacion',$r->denominacion);
				$product->__SET('precio',$r->precio);
				$product->__SET('cantidad',$r->cantidad);
				$product->__SET('fecVen',$r->fecVen);
				$product->__SET('idCategoria',$r->idCategoria);
				$product->__SET('idProveedor',$r->idProveedor);
				return $product;
			}
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function eliminar($id){
		try{//en este caso pasaremos un parametro el cual sera el id a elegir para eliminarlo.
			$stm=$this->pdo->prepare("DELETE FROM productos WHERE idProducto = ?");
			$stm->execute(array($id));
			return $stm->rowcount();
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function actualizar(producto $data){
		try{//en este caso actualizara todos los campos seleccionados
			$sql = "UPDATE productos SET
				denominacion = ?,
				precio	= ?,
				cantidad	= ?,
				fecVen	= ?,
				idCategoria	= ?,
				idProveedor	= ?
				WHERE idProducto=?";
			$act=$this->pdo->prepare($sql)->execute(
				array(
					$data-> __GET('denominacion'),
					$data-> __GET('precio'),
					$data-> __GET('cantidad'),
					$data-> __GET('fecVen'),
					$data-> __GET('idCategoria'),
					$data-> __GET('idProveedor'),
					$data-> __GET('idProducto')
				)
			);
			return $act;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function registrar(producto $data){
		try{//la siguiente consulta se encargara de registrar mas registros  a nuestra base de datos.
			$sql = "INSERT INTO productos (denominacion,precio,cantidad,fecVen,idCategoria,idProveedor) VALUES(?,?,?,?,?,?)";
			$reg=$this->pdo->prepare($sql)->execute(
				array(
					$data-> __GET('denominacion'),
					$data-> __GET('precio'),
					$data-> __GET('cantidad'),
					$data-> __GET('fecVen'),
					$data-> __GET('idCategoria'),
					$data-> __GET('idProveedor')
				)
			);
			return $reg;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function cantidad(){
		try{//la funcion (COUNT) nos muestra la cantidad de regiwstros que tenemos en nuetra tabla seleccionada.
			$sql="SELECT count(*) FROM productos";
			$contar = $this->pdo->prepare($sql);
			$contar->execute();
			//FetchColumn Devuelve una única columna de la fila siguiente de un conjunto de resultados.
			$cant=$contar->fetchColumn();
			return $cant;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function promedio(){
		try{//la funcion (AVG) devuelve el promedio del campo precio
			$sql="SELECT avg(precio) FROM productos";
			$promedio = $this->pdo->prepare($sql);
			$promedio->execute();
			$result=$promedio->fetchColumn();
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function preMax(){
		try{//la funcion (MAX) nos debuelve el precio mas alto.
			$sql="SELECT max(precio) FROM productos";
			$max = $this->pdo->prepare($sql);
			$max->execute();
			$result=$max->fetchColumn();
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function preMin(){
		try{//la funcion(MIN) el precio minimo
			$sql="SELECT min(precio) FROM productos";
			$min = $this->pdo->prepare($sql);
			$min->execute();
			$result=$min->fetchColumn();
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function regisPreMax(){
		try{//creamos un nuevo objeto
			$max = new productosModel();
			//y accedemos al metodo preMax(), enseguida lo guardamos en una variable
			$maximo = $max->preMax();

			$sql="SELECT * FROM productos WHERE precio = ".$maximo."";
			$max = $this->pdo->prepare($sql);
			$max->execute();
			foreach($max->fetchAll(PDO::FETCH_OBJ) as $r){
				$product= new producto();
				$product->__SET('idProducto',$r->idProducto);
				$product->__SET('denominacion',$r->denominacion);
				$product->__SET('precio',$r->precio);
				$product->__SET('cantidad',$r->cantidad);
				$product->__SET('fecVen',$r->fecVen);
				$product->__SET('idCategoria',$r->idCategoria);
				$product->__SET('idProveedor',$r->idProveedor);
				$result[]=$product;
			}
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function regisPreMin(){
		try{//creamos un nuevo objeto
			$min = new productosModel();
			// y accedemos al metodo preMin().
			$minimo = $min->preMin();

			$sql="SELECT * FROM productos WHERE precio = ".$minimo."";
			$min = $this->pdo->prepare($sql);
			$min->execute();

			foreach($min->fetchAll(PDO::FETCH_OBJ) as $r){
				$product= new producto();
				$product->__SET('idProducto',$r->idProducto);
				$product->__SET('denominacion',$r->denominacion);
				$product->__SET('precio',$r->precio);
				$product->__SET('cantidad',$r->cantidad);
				$product->__SET('fecVen',$r->fecVen);
				$product->__SET('idCategoria',$r->idCategoria);
				$product->__SET('idProveedor',$r->idProveedor);
				$result[]=$product;
			}
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function listarRelacionada(){
		try{/*INNER JOIN se utiliza para relacionar varias tablas.
				Nos permitirá obtener un listado de los campos que tienen coincidencias en ambas tablas.*/
			/*seleccionamos lo que se mostrara en pantalla y alos campos que tengan los mismos nombre le agregaremos un alias
			para distinguirlos, agregaremos un prefijo a cada tabla para poder distinguirlos
			nos mostrara los registros que tengan la misma similutud de idCategoria o idProveedor*/				
			$sql = "SELECT p.idProducto, p.denominacion AS pdenominacion, p.precio, p.cantidad, p.fecVen, 
							c.denominacion AS cdenominacion,
							pro.denominacion AS provedenominacion, pro.telefono, pro.direccion
						FROM productos p INNER JOIN categorias c On p.idCategoria = c.idCategoria 
										INNER JOIN proveedores pro On p.idProveedor = pro.idProveedor";
			$query = $this->pdo->prepare($sql);
			$query->execute();

			foreach($query->fetchAll(PDO::FETCH_OBJ) as $r){
				$product= new producto();
				$product->__SET('idProducto',$r->idProducto);
				$product->__SET('pdenominacion',$r->pdenominacion);
				$product->__SET('precio',$r->precio);
				$product->__SET('cantidad',$r->cantidad);
				$product->__SET('fecVen',$r->fecVen);
				$product->__SET('cdenominacion',$r->cdenominacion);					
				$product->__SET('provedenominacion',$r->provedenominacion);
				$product->__SET('telefono',$r->telefono);
				$product->__SET('direccion',$r->direccion);
				$result[]=$product;
			}
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}		
}
?>
