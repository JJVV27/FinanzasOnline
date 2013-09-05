<?php 
	require_once('server/conexion.php');
	require_once('server/funciones.php');

	$concepto = $_REQUEST['concepto'];
	$monto = $_REQUEST['monto'];
	$pago = $_REQUEST['pago'];
	$id = $_REQUEST['id'];

	if(isset($concepto) && !empty($concepto) && isset($monto) && !empty($monto) && isset($pago) && !empty($pago) && isset($id) && !empty($id)){

		mysql_real_escape_string($concepto);
		mysql_real_escape_string($monto);
		mysql_real_escape_string($pago);

		$query = "UPDATE egresos_fijos SET concepto = '$concepto', monto = '$monto', fecha_pago = '$pago' WHERE id_egreso = '$id'";

		$act_egreso = mysql_query($query, $link);

		if($act_egreso){
			header('location: perfil.php');
		}else{
			echo "<p> No se pudieron actualizar sus datos, intentelo mas tarde </p>
					<a href='perfil.php'> Volver al perfil </a>";
		}
	}else{
		echo "<p> No se pudieron ingresar sus datos, intentelo mas tarde </p>
					<a href='perfil.php'> Volver al perfil </a>";
	}

?>