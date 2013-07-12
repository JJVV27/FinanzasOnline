<?php  
	$title = '';
	include('conexion.php');
	//include('configuracion.php');
		error_reporting(E_ALL ^ E_NOTICE);
		session_start();
	
	$usuario = 'usuario';
	$nombre_usuario = 'nombre_usuario';
	$apellido_usuario = 'apellido_usuario';
	$email = 'email_usuario';
	$patrimonio = 'patrimonio';
	$fecha_nac = 'fecha_nac';
	$pais = 'pais';
	$moneda = 'moneda';
	$sueldo = 'sueldo';

	$ruta_imagen = 'ruta_imagen';
	$nombre_imagen = 'nombre_imageb';
	$descripcion_imagen = 'descripcion_imagen';

function login($pUsuario, $pPassword) {
		global $link;

		$seleccion = mysql_query("SELECT * FROM informacion_usuario WHERE usuario = '$pUsuario'",$link);
	
			$datos_usuario = mysql_fetch_assoc($seleccion);
			$usuario = $datos_usuario['usuario'];
			$password = $datos_usuario['password'];

	
        if (($pUsuario == $usuario and $pPassword == $password)) {
            session_start();
            $_SESSION['Id'] = $datos_usuario['id_usuario'];
            $_SESSION['Usuario'] = $datos_usuario['usuario'];
            $_SESSION['Nombre'] = $datos_usuario['nombre_usuario'];
			$_SESSION['Apellido'] = $datos_usuario['apellido_usuario'];
			$_SESSION['Mail'] = $datos_usuario['email_usuario'];
			$_SESSION['Patrimonio'] = $datos_usuario['patrimonio'];
			$_SESSION['FechaNacimiento'] = $datos_usuario['fecha_nac'];
			$_SESSION['Pais'] = $datos_usuario['pais'];
			$_SESSION['Moneda'] = $datos_usuario['moneda'];
			$_SESSION['Sueldo'] = $datos_usuario['sueldo'];
			$_SESSION['estaautenticado'] = TRUE;
            if($pSeguirLogueado){
                $datoCookie = md5($millave.$datos_usuario['id_usuario']);
                setcookie('misitio_cookie', $datoCookie, time() + (60 * 60 * 24 * 30)); //cookie valida por 1 mes
            }
            return TRUE;
        }
    
}

function subir_foto($pRuta, $pNombreImagen, $pDescripcionImagen){
		global $link;
		session_start();
		$pUsuario = $_SESSION['Id'];
		
		if($subida_imagenes = mysql_query("INSERT INTO imagenes (id_usuario, ruta_imagen, nombre_imagen, descripcion_imagen) 
										   VALUES ('{$pUsuario}','{$pRuta}','{$pNombreImagen}','{$pDescripcionImagen}')", $link) or die(mysql_error())){
											return TRUE;
											exit();
										}
										RETURN FALSE;
}

function act_foto($pRuta, $pNombreImagen, $pDescripcionImagen){
		global $link;
		session_start();
		$pUsuario = $_SESSION['Id'];
		
		if($subida_imagenes = mysql_query("UPDATE imagenes SET ruta_imagen = '$pRuta', nombre_imagen = '$pNombreImagen', descripcion_imagen = '$pDescripcionImagen' 
										   WHERE id_usuario = '$pUsuario'", $link) or die(mysql_error())){
											return TRUE;
											exit();
										}
										RETURN FALSE;
}

function cargar_foto(){
		global $link;	
		$pUsuario = $_SESSION['Id'];
		$recuperacion_datos = mysql_query("SELECT * FROM imagenes WHERE id_usuario = '$pUsuario'", $link) or die(mysql_error());
		$datos = mysql_fetch_assoc($recuperacion_datos);
		if($datos['ruta_imagen'] == ""){
			return 'img/usuarios/fou-1122-avatar.jpg';
		}else{
			return $datos['ruta_imagen'];	
		}
			
}

function recuperar($parametro){	
		global $link;
		$pUsuario = $_SESSION['Usuario'];
		$recuperacion_datos = mysql_query("SELECT * FROM informacion_usuario WHERE usuario = '$pUsuario'", $link) or die(mysql_error());
		$datos = mysql_fetch_assoc($recuperacion_datos);
		return $datos[$parametro];
}

function recuperar_fecha($parametro){	
		global $link;
		$pUsuario = $_SESSION['Usuario'];
		$recuperacion_datos = mysql_query("SELECT * FROM informacion_usuario WHERE usuario = '$pUsuario'", $link) or die(mysql_error());
		$datos = mysql_fetch_assoc($recuperacion_datos);
		$fecha = date_create($datos['fecha_nac']);
		$mes_array = array('Jan' => 'Enero', 'Feb' => 'Febrero', 'Mar' => 'Marzo', 'Apr' => 'Abril', 'May' => 'Mayo', 'Jun' => 'Junio', 'Jul' => 'Julio', 'Aug' => 'Agosto', 'Sep' => 'Septiembre', 'Oct' => 'Octubre', 'Nov' => 'Noviembre', 'Dec' => 'Diciembre' );
		$mesFinal = 'Julio';
		$dia = date_format($fecha, "d");
		$mes = date_format($fecha, "M");
		$anio = date_format($fecha, "Y");
		$fecha_mostrar = $dia.' de '.$mes_array[$mes].' de '.$anio;
		return $fecha_mostrar;
}

function actualizar_datos($pnombre_usuario, $papellido_usuario, $pfecha_nacimiento, $ppais_usuario, $ppatrimonio_usuario){
		global $link;
		session_start();
		$pUsuario = $_SESSION['Usuario'];
		if($actualizacion_datos = mysql_query("UPDATE informacion_usuario SET nombre_usuario = '$pnombre_usuario', apellido_usuario = '$papellido_usuario', fecha_nac = '$pfecha_nacimiento',
										pais = '$ppais_usuario', patrimonio = '$ppatrimonio_usuario'	
										WHERE usuario = '$pUsuario'", $link) or die(mysql_error())){
											return TRUE;
											exit();
										}
										RETURN FALSE;
}

function logout() {
	session_start();
	$_SESSION['estaautenticado'] = FALSE;
	session_destroy();
	setcookie('misitio_cookie', '', time() - 1);
}


?>