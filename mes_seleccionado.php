<?php 
	$mes = $_POST['mes_act'];

	if (!empty($mes) && isset($mes)) {
	    $mes_actual_tendencias = $mes;
	}else{
		$fecha_actual_tendencias = getdate();
     	$mes_actual_tendencias = $fecha_actual_tendencias["mon"];
	}
	

	echo json_encode($mes);

 ?>
