<?php 
	require_once('server/funciones.php');

	$id_ingreso = $_REQUEST['id_ingreso'];

	if(isset($id_ingreso) && !empty($id_ingreso)){

		mysql_escape_string($id_ingreso);

		//echo $concepto." ".$monto;

	if(eliminar_registro($id_ingreso, 'id_ingreso', 'ingresos')){
			header('location: transacciones.php');
		}else{
			echo "Hubo un error en la insercion de datos en nuestra base de datos, por favor intentelo nuevamente en un momento. <a href='transacciones.php>Volver a transacciones </a>'";
		}

	}else{
		echo "Hubo un error en el ingreso de sus datos, por favor verifique haber ingresado los mismos correctamente y vuelva a intentarlo <a href='transacciones.php> Volver a transacciones </a>'";
	}


 ?>