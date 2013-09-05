<?php 
	
	require_once('server/funciones.php');

	$concepto = $_REQUEST['descripcion_egreso'];
	$monto = $_REQUEST['monto_egreso'];
	$categoria = $_REQUEST['id_categoria'];
	$estado = $_REQUEST['estado'];

	if(isset($concepto) && !empty($concepto) && isset($monto) && !empty($monto) && isset($categoria) && !empty($categoria) && isset($estado)){

		mysql_escape_string($concepto);
		mysql_escape_string($monto);
		mysql_escape_string($categoria);
		mysql_real_escape_string($estado);

		//echo $concepto." ".$monto." ".$categoria." ".$estado;

	if(registroEgreso($concepto, $monto, $categoria, $estado)){
			header('location: transacciones.php');
		}else{
			echo "Hubo un error en la insercion de datos en nuestra base de datos, por favor intentelo nuevamente en un momento. <a href='transacciones.php>Volver a transacciones </a>'";
		}

	}else{
		echo "Hubo un error en el ingreso de sus datos, por favor verifique haber ingresado los mismos correctamente y vuelva a intentarlo <a href='transacciones.php> Volver a transacciones </a>'";
	}
	
 ?>