<?php 
	require_once('server/funciones.php');
	
	$id_categoria = $_REQUEST['id_categoria'];
	$monto_presupuesto = $_REQUEST['monto_presupuesto'];

	if(isset($id_categoria) && !empty($id_categoria) && isset($monto_presupuesto) && !empty($monto_presupuesto)){

		mysql_real_escape_string($is_categoria);
		mysql_real_escape_string($monto_presupuesto);

		if(agregarPresupuesto($id_categoria, $monto_presupuesto)){
			header('location: general.php');
		}else{
			echo "Error al ingresar los datos en nuestra base de datos <a href='general.php>Volver al estado general</a>'";
		}
	}else{
		echo "Hubo un error con los datos que ingreso por favor asegurese de ingresarlos correctamente. <a href='general.php>Volver al estado general</a>'";
	}
	

 ?>