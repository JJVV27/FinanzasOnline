<?php 
	require_once('server/conexion.php');
	require_once('server/funciones.php');

	$mon = $_POST['mon'];
	$email = $_POST['email'];
	$patrimonio = $_POST['patrimonio'];
	$sueldo = $_POST['sueldo'];
	//$alerta = $_POST['alerta'];

		
		if(actualizar_configuracion($patrimonio, $sueldo, $mon, $email)){
			header('location: perfil.php');
		}else{
			echo "<p>Hubo un error en el ingreso de los datos, por favor intentelo nuevamente y si el problema persiste reportelo.</p> <a href='perfil.php'> Volver al perfil </a>";
		}

	
 ?>