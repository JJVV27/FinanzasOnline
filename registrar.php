<?php
require_once('server/conexion.php');


	$nombre = $_REQUEST ['nombre'];
	$apellido = $_REQUEST ['apellido'];
	$usuario = $_REQUEST['usuario'];
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	$password = md5($password);
	$repassword = $_REQUEST['repassword'];
	$repassword = md5($repassword);

	if (isset($usuario) && !empty($usuario) && isset($password) && !empty($password) && isset($nombre) && !empty($nombre) && isset($email) && !empty($email) && isset($repassword) && !empty($repassword) && $repassword == $password){
		
		$insertar = mysql_query("INSERT INTO informacion_usuario (usuario, password, nombre_usuario, apellido_usuario, email_usuario) VALUES ('{$usuario}','{$password}','{$nombre}','{$apellido}','{$email}')",$link);

	if(!$insertar){
		die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
	}
		header('location: registro-ok.php');
	}else{
		header('location: registro-mal.php');
	}
		mysql_close($link);

?>