<?php
include '../conectar.php';
include '../clientes/cliente.entidad.php';
include '../clientes/clientes.model.php';
include '../perventas/perVentas.entidad.php';
include '../perventas/perVentas.model.php';
include '../productos/producto.entidad.php';
include '../productos/productos.model.php';

$clientes = new clientesModel();	
$list = $clientes->listar();

$perventas = new perVentasModel();
$listar = $perventas->listar();

$productos = new productosModel();
$listarPro = $productos->listar();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>registrar area</title>
</head>
	<h1>registro una nueva venta</h1>
	<form action="" method="post">
	    <table>
	        <tr>
	            <td>fecVenta: </td>
	            <td><input type="text" name="fec" value="<?php echo date("Y-m-d"); ?>"></td>
	        </tr>
	        <tr>
				<td>idCliente: </td>
				<td>
					<select name="idCliente">
						<option value="">Seleccione el idCliente</option>
						<?php foreach ($list as $key) { ?>
							<option value="<?php echo $key->__GET('idCliente'); ?>">
								<?php echo $key->__GET('nombres');?>
							</option>
						<?php } ?>	
					</select>
				</td>	 
	        </tr>
	        <tr>
	            <td>idVen: </td>
	            <td>
					<select name="idVen">
						<option value="">Seleccione el idVen</option>
						<?php foreach ($listar as $key) { ?>
							<option value="<?php echo $key->__GET('idVen'); ?>">
								<?php echo $key->__GET('nombres');?>
							</option>
						<?php } ?>	
					</select>
				</td>
	        </tr>
	    </table> 
	    <br>
	    <table> 
	        <tr>
                <td>idProducto: </td>
                <td>Cantidad: </td>
                <td>Precio: </td>
            </tr>
            <tr>
                <td>
					<select name="idProducto">
						<option value="">Seleccione el idProducto</option>
						<?php foreach ($listarPro as $key) { ?>
							<option value="<?php echo $key->__GET('idProducto'); ?>">
								<?php echo $key->__GET('denominacion');?>
							</option>
						<?php } ?>	
					</select>
				</td>
                <td><input type="text" name="cantidad" ></td>
                <td><input type="text" name="precio" ></td>
            </tr>
            <tr>
                <td>
					<select name="idProducto2">
						<option value="">Seleccione el idProducto</option>
						<?php foreach ($listarPro as $key) { ?>
							<option value="<?php echo $key->__GET('idProducto'); ?>">
								<?php echo $key->__GET('denominacion');?>
							</option>
						<?php } ?>	
					</select>
				</td>
                <td><input type="text" name="cantidad2" ></td>
                <td><input type="text" name="precio2" ></td>
            </tr>
            <tr>
                <td>
					<select name="idProducto3">
						<option value="">Seleccione el idProducto</option>
						<?php foreach ($listarPro as $key) { ?>
							<option value="<?php echo $key->__GET('idProducto'); ?>">
								<?php echo $key->__GET('denominacion');?>
							</option>
						<?php } ?>	
					</select>
				</td>
                <td><input type="text" name="cantidad3" ></td>
                <td><input type="text" name="precio3" ></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" name="dos" value="registrar"></td>
            </tr>
	    </table>
	</form>

<label>
    <?php
	    include 'venta.entidad.php';
	    include 'ventas.model.php';
	    include '../detalleventas/detalleVenta.entidad.php';
	    include '../detalleventas/detalleVentas.model.php';

	    $regis = null;

	    if ($_REQUEST) {
	        $fec=$_POST['fec'];
	        $idCliente=$_POST['idCliente'];
	        $idVen=$_POST['idVen'];

		    $idpro = $_POST['idProducto'];
		    $cantidad = $_POST['cantidad'];
		    $precio = $_POST['precio'];

		    $idpro2 = $_POST['idProducto2'];
		    $cantidad2 = $_POST['cantidad2'];
		    $precio2 = $_POST['precio2'];

		    $idpro3 = $_POST['idProducto3'];
		    $cantidad3 = $_POST['cantidad3'];
			$precio3 = $_POST['precio3'];
			
	        $a = new venta();
	        $a->__SET('fecVenta',$fec);
	        $a->__SET('idCliente',$idCliente);
	        $a->__SET('idVen',$idVen);

			if ($idpro != $idpro2 && $idpro != $idpro3 && $idpro2 != $idpro3) {
				$reg = new ventasModel();
				$id = $reg->ultimoRegistro($a);
				echo "el ultimo registo es  : " .$id;
				
				$filaUno = array($id, $idpro, $cantidad, $precio);
				$filaDos = array($id, $idpro2, $cantidad2, $precio2);
				$filaTres = array($id, $idpro3, $cantidad3, $precio3);
				
				$obj = array($filaUno, $filaDos, $filaTres);
				$noe = null;
				for ($i = 0; $i < count($obj); $i++){
					$new = new detalleVenta();
					$new->__SET('idVenta', $obj[$i][0]);
					$new->__SET('idProducto', $obj[$i][1]);
					$new->__SET('cantidad', $obj[$i][2]);
					$new->__SET('precio', $obj[$i][3]);
					
					$pau = new detalleVentasModel();
					$noe = $pau->registrar($new);
				}
				
				if ($noe == 0) {
					echo 'el registro NO ingreso correctamente';
				} else {
					echo "<br>";
					echo 'tambien se ha sido registrado en DETALLEVENTA';
				}
				
			}else{
				echo "Los valores coinciden... INTENTELO DE NUEVO !";
			}
		}
			
	?>
</label>
</body>
</html>    

