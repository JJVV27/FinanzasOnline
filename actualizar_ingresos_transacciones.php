<?php 
	require_once('server/funciones.php');

	$concepto = $_REQUEST['descripcion_ingreso'];
	$monto = $_REQUEST['monto_ingreso'];
	$id_ingreso = $_REQUEST['id_ingreso'];

	if(isset($concepto) && !empty($concepto) && isset($monto) && !empty($monto) && isset($id_ingreso) && !empty($id_ingreso)){

		mysql_escape_string($concepto);
		mysql_escape_string($monto);
		mysql_escape_string($id_ingreso);

		//echo $concepto." ".$monto;

	if(actualizarEI($id_ingreso, $concepto, $monto, 'ingresos', 'id_ingreso')){
			header('location: transacciones.php');
		}else{
			echo "Hubo un error en la insercion de datos en nuestra base de datos, por favor intentelo nuevamente en un momento. <a href='transacciones.php>Volver a transacciones </a>'";
		}

	}else{
		echo "Hubo un error en el ingreso de sus datos, por favor verifique haber ingresado los mismos correctamente y vuelva a intentarlo <a href='transacciones.php> Volver a transacciones </a>'";
	}


 ?>