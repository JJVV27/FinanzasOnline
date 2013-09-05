<?php 
	require_once('server/funciones.php');

	$id_presupuesto = $_REQUEST['id_presupuesto'];

	if(isset($id_presupuesto) && !empty($id_presupuesto)){

		mysql_real_escape_string($id_presupuesto);

		if(eliminar_registro($id_presupuesto, 'id_presupuesto', 'presupuestos')){
			header('location: general.php');
		}else{
			echo "No se pude eliminar el presupuesto, vuelva a intentarlo mas tarde. <a href='general.php'> Volver al estado general</a>";
		}
	}

 ?>