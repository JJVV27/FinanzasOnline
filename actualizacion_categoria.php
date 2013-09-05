<?php 
	require_once('server/conexion.php');
	require_once('server/funciones.php');

	$nombre = $_REQUEST['nombre_categoria'];
	$id = $_REQUEST['id'];

	if(isset($nombre) && !empty($nombre) && isset($id) && !empty($id)){

		mysql_real_escape_string($nombre);

		$query = "UPDATE categorias SET nombre_categoria = '$nombre' WHERE id_categoria = '$id'";
		$act_categoria = mysql_query($query, $link);

		if($act_categoria){
			header('location: perfil.php');
		}else{
			echo "<p> No se pudieron actualizar sus datos, intentelo mas tarde </p>
					<a href='perfil.php'> Volver al perfil </a>";
		}
	}else{
		echo "<p> No se pudieron ingresar sus datos, intentelo mas tarde </p>
					<a href='perfil.php'> Volver al perfil </a>";
	}

?>