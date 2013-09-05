<?php
	require_once('server/conexion.php');
	require_once('server/funciones.php');

	$nombre_img = $_POST['txtNombre'];
	$descripcion_img = $_POST['txtDescripcion'];
	
		$tamanio = 	$_FILES['fleImagen']['size'];
		$tipo 	 = 	$_FILES['fleImagen']['type'];
		$archivo = 	$_FILES['fleImagen']['name'];
		$prefijo = 	substr (md5 (uniqid (rand ())),0,6);
		
		switch($tipo){
			case 'image/jpg':
				$formato = 'jpg';
			break;
			case 'image/png':
				$formato = 'png';
			break;
			case 'image/gif':
				$formato = 'gif';
			break;
		}
		
		$ruta = "img/usuarios/".$prefijo."_".$archivo;
	
	if($archivo !=""){	
		if($tipo=="image/jpeg"){
			if($tamanio <= 1048576){
				if (copy ($_FILES['fleImagen']['tmp_name'],$ruta)) {
					if(act_foto($ruta, $nombre_img, $descripcion_img)){
						header('location: perfil.php');
					}else{
						echo "Nose pudo subir la foto!";
					}
				} else{
					echo"Hubo un error en la copia de su archivo";
				}
			}else{
				echo "La imagen es mas pesada de lo permitido, peso maximo 1mb";
			}
		}else{
			echo "Su imagen no es un archivo de imagen valido, solo jpg, png, o gif son aceptados";
		}
	}else{
		echo "No se a podido cargar ningun archivo";
	}
?>