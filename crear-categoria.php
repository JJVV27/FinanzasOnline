<?php 
	require_once('server/conexion.php');
	require_once('server/funciones.php');
	
	$nombre = $_REQUEST['nombre_categoria']; 

	if(isset($nombre) && !empty($nombre)){

		mysql_escape_string($nombre);

		if(crear_categoria($nombre)){
			header('location: perfil.php');
		}else{
			echo "El registro no se pudo hacer, por favor intentelo nuevamente mas tarde <a href='perfil.php'> Volver al perfil </a>";
		}
	
	}else{
		echo "Hubo un error en la insercion de sus datos, por favor vuelva a intentarlo! <a href='perfil.php'> Volver al perfil </a>";
	}	
 ?>