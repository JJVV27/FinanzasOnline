<?php
	include('server/funciones.php');

	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	//$seguirLogueado = $_POST['seguirLogueado'];
	$passwordMD5 = md5($password);

	/*if($seguirLogueado == 'on'){
		$seguirLogueado = TRUE;
	}
	else{
		$seguirLogueado = FALSE;
	}*/

	if (login($usuario, $passwordMD5)) {
		header('Location: perfil.php');
		exit();
	}else{
		header('Location: loginerror.php');
		exit();
	}
?>