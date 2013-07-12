<?php 
	require_once('server/conexion.php');
	require_once('server/funciones.php');

	$nombre_usuario = $_REQUEST['nombre-perfil'];
	$apellido_usuario = $_REQUEST['apellido-perfil'];
	$fecha_nacimiento_usuario = $_REQUEST['fn-perfil'];
	$pais_usuario = $_REQUEST['pais-perfil'];
	$patrimonio_usuario = $_REQUEST['patrimonio-perfil'];

	
	
	if(actualizar_datos($nombre_usuario, $apellido_usuario, $fecha_nacimiento_usuario, $pais_usuario, $patrimonio_usuario)){
		header('location: perfil.php');
	}else{
		echo "<p> No se pudieron actualizar sus datos, intentelo mas tarde </p>
		<a href='perfil.php'> Volver al perfil </a>";
	}
?>