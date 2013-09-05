<?php 
	require_once('server/conexion.php');
	require_once('server/funciones.php');

	$id = $_REQUEST['id'];

	if(eliminar_registro($id, 'id_categoria', 'categorias')){
		header('location: perfil.php');
	}else{
		echo "<p> No se pudieron actualizar sus datos, intentelo mas tarde </p>
					<a href='perfil.php'> Volver al perfil </a>";
	}

?>