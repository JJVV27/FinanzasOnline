<?php 
	require_once('server/funciones.php');

	$id_egreso = $_REQUEST['id_egreso'];

	if(isset($id_egreso) && !empty($id_egreso)){

		mysql_escape_string($id_egreso);

		//echo $concepto." ".$monto;

	if(eliminar_registro($id_egreso, 'id_egreso', 'egresos')){
			header('location: transacciones.php');
		}else{
			echo "Hubo un error en la insercion de datos en nuestra base de datos, por favor intentelo nuevamente en un momento. <a href='transacciones.php>Volver a transacciones </a>'";
		}

	}else{
		echo "Hubo un error en el ingreso de sus datos, por favor verifique haber ingresado los mismos correctamente y vuelva a intentarlo <a href='transacciones.php> Volver a transacciones </a>'";
	}


 ?>