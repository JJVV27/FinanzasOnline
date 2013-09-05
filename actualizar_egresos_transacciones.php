<?php 
	require_once('server/funciones.php');

	$concepto = $_REQUEST['descripcion_egreso'];
	$monto = $_REQUEST['monto_egreso'];
	$id_egreso = $_REQUEST['id_egreso'];

	if(isset($concepto) && !empty($concepto) && isset($monto) && !empty($monto) && isset($id_egreso) && !empty($id_egreso)){

		mysql_escape_string($concepto);
		mysql_escape_string($monto);
		mysql_escape_string($id_egreso);

		//echo $concepto." ".$monto;

	if(actualizarEI($id_egreso, $concepto, $monto, 'egresos', 'id_egreso')){
			header('location: transacciones.php');
		}else{
			echo "Hubo un error en la insercion de datos en nuestra base de datos, por favor intentelo nuevamente en un momento. <a href='transacciones.php>Volver a transacciones </a>'";
		}

	}else{
		echo "Hubo un error en el ingreso de sus datos, por favor verifique haber ingresado los mismos correctamente y vuelva a intentarlo <a href='transacciones.php> Volver a transacciones </a>'";
	}


 ?>