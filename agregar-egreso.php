<?php 
	require_once('server/conexion.php');
	require_once('server/funciones.php');
	
	$concepto = $_REQUEST['concepto']; 
	$monto = $_REQUEST['monto'];
	$pago = $_REQUEST['pago'];

	if(isset($concepto) && !empty($concepto) && isset($monto) && !empty($monto) && isset($pago) && !empty($pago)){

		mysql_escape_string($concepto);
		mysql_escape_string($monto);
		mysql_escape_string($pago);

		if(agregar_egreso($concepto, $monto, $pago)){
			header('location: perfil.php');
		}else{
			echo "El registro no se pudo hacer, por favor intentelo nuevamente mas tarde <a href='perfil.php'> Volver al perfil </a>";
		}
	
	}else{
		echo "Hubo un error en la insercion de sus datos, por favor vuelva a intentarlo! <a href='perfil.php'> Volver al perfil </a>";
	}	
 ?>