<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
	<?php 
		include "../conectar.php";
		include "venta.entidad.php";
		include "ventas.model.php";
		include '../clientes/cliente.entidad.php';
		include '../clientes/clientes.model.php';
		include '../perventas/perVentas.entidad.php';
		include '../perventas/perVentas.model.php';	
		include '../detalleventas/detalleVenta.entidad.php';
	    include '../detalleventas/detalleVentas.model.php';	
	    include '../productos/producto.entidad.php';
	    include '../productos/productos.model.php';	
	    
	    $id = $_GET['id'];

        $ventas = new ventasModel();
		$listv = $ventas->obtener($id);

		$cliente = new clientesModel();
		$listc = $cliente->listar();

        $perventas = new perVentasModel();
		$listp = $perventas->listar();

        $detalle = new detalleVentasModel();
		$listd = $detalle->obtenerList($id);				
		
        $producto = new productosModel();
		$listpro = $producto->listar();				

		echo "<form action='confirm.php' method='post'>
				<label>idVenta <input type='text' name='idVenta' id='idVenta' value='".$listv->__GET('idVenta')."'></label>
				<label>fecVenta <input type='text' name='fecVenta' id='fecVenta' value='".$listv->__GET('fecVenta')."'></label>
				<select name='idCliente'>
						<option value=''>Seleccione el idCliente</option>";
						foreach ($listc as $key) {
							echo "<option value=".$key->__GET('nombres').">";
								echo $key->__GET('nombres');
						} 
				echo" </select>
				<select name='idVen'>
						<option value=''>Seleccione el idCliente</option>";
						foreach ($listp as $key) {
							echo "<option value=".$key->__GET('nombres').">";
								echo $key->__GET('nombres');
						} 
				echo" </select><br><br>";
					foreach ($listd as $d) {
						echo "<label>idDetalle <input type='text' name='idDetalle' id='idDetalle' value='".$d->__GET('idDetalle')."' style='width:100px'></label>
						<label>idVenta <input type='text' name='idVenta' id='idVenta' value='".$d->__GET('idVenta')."' style='width:100px'></label>
							<select name='idProducto'>
								<option value=''>Seleccione el idProducto</option>";
								foreach ($listpro as $pro) {
									echo "<option value=".$pro->__GET('denominacion').">";
										echo $pro->__GET('denominacion');
								} 
							echo" </select>
						<label>Cantidad <input type='text' name='cantidad' id='cantidad' value='".$d->__GET('cantidad')."' style='width:100px'></label>
						<label>Precio <input type='text' name='precio' id='precio' value='".$d->__GET('precio')."' style='width:100px'></label><br>";
					}		
				echo "<input type='submit' value='Actualizar'>

		</form>";

	 ?>

    <script>
    	function update(id){
    		var msg = confirm('¿Desea actualizar los Cambios?')
    		if (msg) {
    			location.href='confirm.php?up='+id
				return false
    		}else{
				location.href='actualizarDatos.php?up='+id
			}
			return false
    	}
    </script>
</body>
</html>