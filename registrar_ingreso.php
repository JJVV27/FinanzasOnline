<?php 
	
	require_once('server/funciones.php');

	$concepto = $_REQUEST['descripcion_ingreso'];
	$monto = $_REQUEST['monto_ingreso'];

	if(isset($concepto) && !empty($concepto) && isset($monto) && !empty($monto)){

		mysql_escape_string($concepto);
		mysql_escape_string($monto);

		//echo $concepto." ".$monto;

	if(registroIngreso($concepto, $monto)){
			header('location: transacciones.php');
		}else{
			echo "Hubo un error en la insercion de datos en nuestra base de datos, por favor intentelo nuevamente en un momento. <a href='transacciones.php>Volver a transacciones </a>'";
		}

	}else{
		echo "Hubo un error en el ingreso de sus datos, por favor verifique haber ingresado los mismos correctamente y vuelva a intentarlo <a href='transacciones.php> Volver a transacciones </a>'";
	}
	
 ?>