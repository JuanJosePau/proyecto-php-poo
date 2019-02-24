<?php
class conectar{
	//creamos un atributo
	protected $pdo;

	public function __construct(){
		try{
			$this->pdo = new PDO('mysql:host=localhost;dbname=bdmuebles','root','');
			//PDO::ATTR_ERRMODE: Reporte de errores.
			//PDO::ERRMODE_EXCEPTION: Emite excepciones
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}catch(Exception $e){
			//en caso de que aya algun inconveniente nos mostrara en pamntalla
			//el tipo de error que tendremos.
			die($e->getMessage());
		}
	}
}
?>