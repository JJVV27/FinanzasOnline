<?php  
	$title = '';
	include('conexion.php');
	//include('configuracion.php');
		error_reporting(E_ALL ^ E_NOTICE  ^ E_WARNING);
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
	$alerta = 'recibir_alerta';

	$ruta_imagen = 'ruta_imagen';
	$nombre_imagen = 'nombre_imageb';
	$descripcion_imagen = 'descripcion_imagen';

	$concepto = 'concepto';
	$monto = 'monto';
	$fecha_pago = 'fecha_pago';

	$simboloMoneda = "$";

	if(recuperar($moneda, 'informacion_usuario') == "Euro"){
		$simboloMoneda = "€";
	}else{
		$simboloMoneda = "$";
	}

	$pat = 	recuperar($patrimonio, 'informacion_usuario');
	$sueldo_usuario = recuperar($sueldo, 'informacion_usuario');
	$totalDebito =	totalPagado('egresos');
	$totalIngresos = totalIngresos('ingresos');

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

$idUsuario = $_SESSION['Id'];

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

function actualizar_configuracion($ppatrimonio_usuario, $psueldo_usuario, $pmoneda_usuario, $pemail_usuario){
		global $link;
		//session_start();
		$pUsuario = $_SESSION['Usuario'];
		if($actualizacion_datos = mysql_query("UPDATE informacion_usuario SET patrimonio = '$ppatrimonio_usuario', sueldo = '$psueldo_usuario', moneda = '$pmoneda_usuario', email_usuario = '$pemail_usuario'
										WHERE usuario = '$pUsuario'", $link) or die(mysql_error())){
											return TRUE;
											exit();
										}
										RETURN FALSE;
}

function actualizarEI($pId_egreso, $pConcepto, $pMonto, $tbl, $pEi){
	global $link;
	session_start();

	if($actualizacion_egresos = mysql_query("UPDATE $tbl SET concepto = '$pConcepto', monto = '$pMonto'
										WHERE $pEi = '$pId_egreso'", $link) or die(mysql_error())){
											return TRUE;
											exit();
	}
		RETURN FALSE;

}

function actualizarEgresoE($pId_egreso, $pConcepto, $pMonto, $pEstado){
	global $link;
	session_start();

	if($actualizacion_egresos = mysql_query("UPDATE egresos SET concepto = '$pConcepto', monto = '$pMonto', estado = '$pEstado'
										WHERE id_egreso = '$pId_egreso'", $link) or die(mysql_error())){
											return TRUE;
											exit();
	}
		RETURN FALSE;

}

function agregar_egreso($pConcepto, $pMonto, $pPago){
	global $link;
	
	$pUsuario = $_SESSION['Id'];
	if($a_egreso = mysql_query("INSERT INTO egresos_fijos (id_usuario, concepto, monto, fecha_pago) 
										   VALUES ('$pUsuario','{$pConcepto}','{$pMonto}','{$pPago}')", $link) or die(mysql_error())){
											return TRUE;
											exit();
										}
										RETURN FALSE;
}

function agregarPresupuesto($pCategoria, $pMonto){
	global $link;	
	$pUsuario = $_SESSION['Id'];

	if($presupuesto = mysql_query("INSERT INTO presupuestos (id_usuario, id_categoria, monto) 
										   VALUES ('$pUsuario','{$pCategoria}','{$pMonto}')", $link) or die(mysql_error())){
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

function crear_categoria($pNombre){
	global $link;
	session_start();
	$pUsuario = $_SESSION['Id'];
	if($a_egreso = mysql_query("INSERT INTO categorias (id_usuario, nombre_categoria) 
										   VALUES ('$pUsuario','{$pNombre}')", $link) or die(mysql_error())){
											return TRUE;
											exit();
										}
										RETURN FALSE;
}


function eliminar_registro($id, $campo, $tbl){
		global $link;
		if($eliminar = mysql_query("DELETE FROM $tbl WHERE $campo = '$id'", $link) or die(mysql_error())){
			return TRUE;
			exit();
		}
			return FALSE;
			
}

/*function enviar_alerta_email($dia, $concepto, $monto){
	global $link;

	$email = recuperar('email_usuario', 'informacion_usuario');
	$nombre = recuperar('nombre_usuario', 'informacion_usuario');
	$apellido = recuperar('apellido_usuario', 'informacion_usuario');
	$asunto = "Alerta de pago de su factura de: ".$concepto."!";
	$mensaje = "Sr.(a): ".ucfirst($nombre)." ".ucfirst($apellido)." \n
				Le recordamos que el pago por ".$concepto.", con el monto de: ".$monto." esta por expirar en 3 días \n
				 Saludos,
				 \n Finanzas Online.";
	mail($email, $asunto, $mensaje);	

}*/

function gastosCategoria($id_categoria, $monto_categoria){
	global $link;

	$totalPagos = 0;
	$porcentaje = 0;

	if($pagos_categoria = mysql_query("SELECT * FROM egresos WHERE id_categoria = '$id_categoria'", $link) or die(mysql_error())){

		while($presupuesto=mysql_fetch_assoc($pagos_categoria)){
			$monto_pago = $presupuesto['monto'];

			$totalPagos = $totalPagos + $monto_pago;

		}	
		$porcentaje = ($totalPagos/$monto_categoria) * 100;
		$porcentaje = round($porcentaje);
		return $porcentaje;
	}
}

function gastosCategoriaT($id_categoria, $monto_categoria, $mes){
	global $link;

	$fecha_actual = getDate();
	$dia_actual = $fecha_actual['mday'];

	$totalPagos = 0;
	$porcentaje = 0;

	if($pagos_categoria = mysql_query("SELECT * FROM egresos WHERE id_categoria = '$id_categoria'", $link) or die(mysql_error())){

		while($presupuesto=mysql_fetch_assoc($pagos_categoria)){
			$monto_pago = $presupuesto['monto'];
			$estado = $presupuesto['estado'];

			$fecha_pago = $presupuesto['fecha_egreso'];
			$fecha = date_create($fecha_pago);
        	$mes_pago = date_format($fecha, "m");
        	$mes_pago = substr($mes_pago, 1);
		
			if($mes_pago == $mes){
				if($estado == 1){
					$totalPagos = $totalPagos + $monto_pago;
				}
			}

		}	
		$porcentaje = ($totalPagos/$monto_categoria) * 100;
		$porcentaje = round($porcentaje);
		return $porcentaje;
	}
}

function logout() {
	session_start();
	$_SESSION['estaautenticado'] = FALSE;
	session_destroy();
	setcookie('misitio_cookie', '', time() - 1);
}

function patrimonioAct(){
	global $pat, $totalDebito, $totalIngresos;
	
	$pat = $pat - $totalDebito + $totalIngresos;

	return $pat;
}

function recuperar($parametro, $tabla){	
		global $link;
		$pUsuario = $_SESSION['Usuario'];
		$recuperacion_datos = mysql_query("SELECT * FROM $tabla WHERE usuario = '$pUsuario'", $link) or die(mysql_error());
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

function registroIngreso($pConcepto, $pMonto){
	global $link;
	$pUsuario = $_SESSION['Id'];

	$registro = "INSERT INTO ingresos (id_usuario, monto, concepto) VALUES ('$pUsuario', '{$pMonto}', '{$pConcepto}')";

	if($resgistro_ingreso = mysql_query($registro, $link) or die (mysql_error())){
		return TRUE;
		exit();
	}
		return FALSE;
	
}

function registroEgreso($pConcepto, $pMonto, $pCategoria, $pEstado){
	global $link;
	$pUsuario = $_SESSION['Id'];

	$registro = "INSERT INTO egresos (id_usuario, id_categoria, concepto, monto, estado) VALUES ('$pUsuario', '{$pCategoria}', '{$pConcepto}', '{$pMonto}', '{$pEstado}')";

	if($resgistro_egreso = mysql_query($registro, $link) or die (mysql_error())){
		return TRUE;
		exit();
	}
		return FALSE;
	
}

function saludFinanciera(){
	global $totalIngresos, $totalDebito, $sueldo_usuario;

	$salud = $totalIngresos + $sueldo_usuario - $totalDebito;

	return $salud;
}

function saludIngresos(){
	global $totalIngresos, $totalDebito, $sueldo_usuario;

	$total_porcentual = $totalIngresos + $sueldo_usuario + $totalDebito;
	$total_ingresos = $totalIngresos + $sueldo_usuario;
	$porcentaje = ($total_ingresos/$total_porcentual) *100;
	$porcentaje = round($porcentaje);

	return $porcentaje;
}

function saludEgresos(){
	global $totalIngresos, $totalDebito, $sueldo_usuario;

	$total_porcentual = $totalIngresos + $sueldo_usuario + $totalDebito;
	$porcentaje = ($totalDebito/$total_porcentual) *100;
	$porcentaje = round($porcentaje);
	
	return $porcentaje;
}

function totalIngresos($tbl){
	global $link, $sueldo_usuario;
	$pUsuario = $_SESSION['Id'];

	$fecha_actual = getDate();
	$dia_actual = $fecha_actual['mday'];

	$deudas = mysql_query("SELECT * FROM $tbl WHERE id_usuario = '$pUsuario'", $link) or die(mysql_error());
	$totalIngresos = 0;

	while($deuda = mysql_fetch_assoc($deudas)){
		$monto = $deuda['monto'];

		$totalIngresos = $totalIngresos + $monto;
	}

	if($dia_actual == 1){
		$totalIngresos = $totalIngresos + $sueldo_usuario;
	}

	return $totalIngresos;	
}

function totalDeuda($tbl){
	global $link;
	$pUsuario = $_SESSION['Id'];

	$fecha_actual = getDate();
	$dia_actual = $fecha_actual['mday'];

	$deudas = mysql_query("SELECT * FROM $tbl WHERE id_usuario = '$pUsuario'", $link) or die(mysql_error());
	$deudas_fijas = mysql_query("SELECT * FROM egresos_fijos WHERE id_usuario = '$pUsuario'", $link) or die(mysql_error());
	$totalDeuda = 0;

	while($deuda = mysql_fetch_assoc($deudas)){
		$monto = $deuda['monto'];
		$estado = $deuda['estado'];
		
		if($estado == 0){
			$totalDeuda = $totalDeuda + $monto;
		}
	}

	while($deuda_fija = mysql_fetch_assoc($deudas_fijas)){
		$dia = $deuda_fija['fecha_pago'];
		$monto_fijo = $deuda_fija['monto'];

		if($dia_actual < $dia){
			$totalDeuda = $totalDeuda + $monto_fijo;
		}
	}
	return $totalDeuda;	
}

function totalPagado($tbl){
	global $link;
	$pUsuario = $_SESSION['Id'];

	$fecha_actual = getDate();
	$dia_actual = $fecha_actual['mday'];

	$totalPagado = 0;

	$deudas = mysql_query("SELECT * FROM $tbl WHERE id_usuario = '$pUsuario'", $link) or die(mysql_error());
	$deudas_fijas = mysql_query("SELECT * FROM egresos_fijos WHERE id_usuario = '$pUsuario'", $link) or die(mysql_error());

	while($deuda = mysql_fetch_assoc($deudas)){
		$monto = $deuda['monto'];
		$estado = $deuda['estado'];
		
		if($estado == 1){
			$totalPagado = $totalPagado + $monto;
		}
	}

	while($deuda_fija = mysql_fetch_assoc($deudas_fijas)){
		$dia = $deuda_fija['fecha_pago'];
		$monto_fijo = $deuda_fija['monto'];

		if($dia_actual >= $dia){
			$totalPagado = $totalPagado + $monto_fijo;
		}
	}

	return $totalPagado;	
}

function totalPagadoMes($tbl, $mes){
	global $link;
	$pUsuario = $_SESSION['Id'];

	$fecha_actual = getDate();
	$dia_actual = $fecha_actual['mday'];

	$totalPagado = 0;

	$deudas = mysql_query("SELECT * FROM $tbl WHERE id_usuario = '$pUsuario'", $link) or die(mysql_error());
	
	while($deuda = mysql_fetch_assoc($deudas)){
		$monto = $deuda['monto'];
		$estado = $deuda['estado'];

		$fecha_pago = $deuda['fecha_egreso'];
		$fecha = date_create($fecha_pago);
        $mes_pago = date_format($fecha, "m");
        $mes_pago = substr($mes_pago, 1);
		
		if($mes_pago == $mes){
			if($estado == 1){
				$totalPagado = $totalPagado + $monto;
			}
		}
	}

	return $totalPagado;	
}

function totalPagadoMesEf($mes){
	global $link;
	$pUsuario = $_SESSION['Id'];

	$fecha_actual = getDate();
	$dia_actual = $fecha_actual['mday'];
	$mes_actual = $fecha_actual['mon'];

	$totalPagadoEf = 0;

	$deudas_fijas = mysql_query("SELECT * FROM egresos_fijos WHERE id_usuario = '$pUsuario'", $link) or die(mysql_error());
	

	while($deuda_fija = mysql_fetch_assoc($deudas_fijas)){
		$dia = $deuda_fija['fecha_pago'];
		$monto_fijo = $deuda_fija['monto'];

		if($mes_actual == $mes){
			if($dia_actual >= $dia){
				$totalPagadoEf = $totalPagadoEf + $monto_fijo;
			}
		}elseif($mes_actual > $mes){
			$totalPagadoEf = $totalPagadoEf + $monto_fijo;
		}
	}

	return $totalPagadoEf;	
}
?>