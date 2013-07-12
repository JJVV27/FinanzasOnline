<?php 
	require_once('server/conexion.php');
	require_once('server/funciones.php');
		if (!isset($_SESSION['estaautenticado']) && $_SESSION['estaautenticado'] == FALSE) {
		header('Location: index.php');
		exit();
	}
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FinanzasOnline | Evelyn Del Pezo</title>
	<link rel="stylesheet" type="text/css" href="css/libs/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/libs/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/libs/bootstrap-responsive.min.css" />
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,700|Oleo+Script|Alef:700|Merriweather+Sans:700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/estilos.css" />
	<link rel='stylesheet' href='js/libs/fancybox/jquery.fancybox-1.3.4.css' />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<script src="js/libs/prefixfree.min.js"></script>
	<script src="js/libs/jquery-1.7.2.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src='js/libs/fancybox/jquery.fancybox-1.3.4.pack.js'></script>
	<script src="js/controlador.js"></script>
	<script>
		$(function() {
		    $( "#fn-edit" ).datepicker({
		    	dateFormat: 'yy/mm/dd',
		    	changeMonth: true,
  			    changeYear: true
		    });
		  });
	</script>
</head>
<body>
	<header>
		<?php 
		$general_link = "general.php";
		$perfil_link = "#";
		include('includes/menu-app.php'); ?>
	</header>
	<section class="row-fluid" id="perfil-titulo">
		<div class="container">
			<div class="center span11">
				<h2>Bienvenido(a) <span><?php echo ucfirst(recuperar($nombre_usuario))." ".ucfirst(recuperar($apellido_usuario)); ?></span></h2>
			</div>
		</div>
	</section>
	<section class="row-fluid sombra-titulo"></section>
	<section class="row-fluid sombra-dos-titulo"></section>
	<section class="container">
		<div class="center span11">
			<section id="info-cont" class="span5" >
				<div id="info-usuario">
					<figure id="img-usuario">
						<?php 
							if(cargar_foto()==""){
								echo "<img src='img/usuarios/fou-1122-avatar.jpg' alt='Avatar' id='img-perfil-usuario' />";
							}else{
								echo "<img src='".cargar_foto()."' id='img-perfil-usuario' />";
							}					
						?>
						<figcaption>
							<a class="edit" href="#cambio-imagen-perfil" id="cambio-img-perfil"><span class="nav-color">Cambiar imagen</span></a>
						</figcaption>
					</figure>
					<div id="info-content">
						<h3>Mi información <a class="edit" href="#cambio-perfil"><span>(Editar)</span></a></h3>
						<ul>
							<li><span class="campo-info">Nombre</span><span class="resp-info"><?php echo ucfirst(recuperar($nombre_usuario))." ".ucfirst(recuperar($apellido_usuario)); ?></span></li>
							<?php
								if(recuperar_fecha($fecha_nac)=="30 de Noviembre de -0001"){
									echo "<li><span class='campo-info'>Fecha de nacimiento</span><span class='resp-info'></span></li>"; 
								}else{
									echo "<li><span class='campo-info'>Fecha de nacimiento</span><span class='resp-info'>".recuperar_fecha($fecha_nac)."</span></li>";
								}
							?>
							<li><span class="campo-info">País</span><span class="resp-info"><?php echo ucfirst(recuperar($pais)); ?></span></li>
							<li><span class="campo-info">Patrimonio</span><span class="resp-info">$<?php echo recuperar($patrimonio); ?></span></li>
						</ul>
					</div>
				</div>
			<!-- Fancy box-->
			<div class="contenedor">
				<div id="cambio-perfil">
					<form action="actualizacion-perfil.php" method="POST"  name="form1" id="form-editar">
						<fieldset>
							<legend>Edita los datos de tu perfil</legend>
							<p>
								<label for="nombre-edit">Nombre: </label>
								<?php echo "<input type='text' name='nombre-perfil' id='nombre-edit' value='".recuperar($nombre_usuario)."' required/>";?>
							</p>
							<p>
								<label for="nombre-edit">Apellido: </label>
								<?php echo "<input type='text' name='apellido-perfil' id='apellido-edit' value='".recuperar($apellido_usuario)."' required/>";?>
							</p>
							<p>
								<label for="fn-edit">Fecha de nacimiento: </label>
								<?php echo "<input type='text' name='fn-perfil' id='fn-edit' value='".recuperar($fecha_nac)."' />";?>
							</p>
							<p>
								<label for="pais-edit">País: </label>
								<?php echo "<input type='text' name='pais-perfil' id='pais-edit' value='".recuperar($pais)."' />";?>
							</p>
							<p>
								<label for="patrimonio-edit">Patrimonio: </label>
								<?php echo "<input type='text' name='patrimonio-perfil' id='patrimonio-edit' value='$".recuperar($patrimonio)."' required/>";?>
							</p>
							<p class="btn-act">
								<input type="submit" name="button" id="button-act" value="Actualizar" />
							</p>
								<input type="hidden" name="MM_insert" value="form1" />
						</fieldset>
					</form>
				</div>
			</div>
			<div class="contenedor">
				<div id="cambio-imagen-perfil">
					<form action="subir_img.php" method="post" id="form-cambiar-imagen" enctype="multipart/form-data">
						<fieldset>
							<legend>Agrega una imagen a tu perfil</legend>
							<p>
								<label for="fleImagen">Imagen:</label>
								<input type="file" name="fleImagen" id="fleImagen" />
							</p>
								<label for="txtNombre">Nombre:</label>
								<input type="text" name="txtNombre" id="txtNombre" />
							<p>
								<label for="txtDescripcion">Descripción:</label>
								<textarea name="txtDescripcion" id="txtDescripcion" cols="45" rows="5"></textarea>
							</p>
							<p class="btn-act">
									<input type="submit" name="button" id="button-act" value="Actualizar" />
							</p>
						</fieldset>
					</form>
				</div>
			</div>
			<div class="contenedor">
				<div id="actualizar-imagen-perfil">
					<form action="actualizar_img.php" method="post" id="form-cambiar-imagen" enctype="multipart/form-data">
						<fieldset>
							<legend>Cambia la imagen de tu perfil</legend>
							<p>
								<label for="fleImagen">Imagen:</label>
								<input type="file" name="fleImagen" id="fleImagen" />
							</p>
								<label for="txtNombre">Nombre:</label>
								<input type="text" name="txtNombre" id="txtNombre" />
							<p>
								<label for="txtDescripcion">Descripción:</label>
								<textarea name="txtDescripcion" id="txtDescripcion" cols="45" rows="5"></textarea>
							</p>
							<p class="btn-act">
									<input type="submit" name="button" id="button-act" value="Actualizar" />
							</p>
						</fieldset>
					</form>
				</div>
			</div>
			</section>
			<section id="configuracion-content" class="span6">
				<div id="configuracion">
					<form action="" method="post">
						<fieldset>
							<span class="cg-perfil"><legend>Configuraciones generales</legend></span>
							<p><label for="moneda">Moneda</label> 
								<select id="moneda">
									<option>USD</option>
									<option>Euro</option>
								</select>
							</p>
							<p>
								<label for="email-perfil">Email</label> 
								<input id="email-perfil" type="text" placeholder="correo@gmail.com" />
							</p>
							<p>
								<label for="patrimonio-perfil">Patrimonio</label> 
								<input id="patrimonio-perfil" type="text" placeholder="$68.070" />
							</p>
							<p>
								<label for="sueldo-perfil">Sueldo</label> 
								<input id="sueldo-perfil" type="text" placeholder="$3,500" />
							</p>
							<p>
								<label for="egresos-perfil">Egresos fijos</label> 
									<select  id="egresos-perfil" class="select-editable">
										<optgroup label="Egresos fijos">
											<option>Servicios básicos</option>
											<option>Celular</option>
											<option>Direct Tv</option>
											<option>Internet</option>
										</optgroup>
									</select>
									<span class="editar-cg">Editar egresos fijos</span>
							</p>
							<p>
								<label for="categorias-perfil">Categorías</label> 
									<select id="categorias-perfil" class="select-editable">
										<optgroup label="Tus categorías" selected>
											<option>Comida</option>
											<option>Entretenimiento</option>
											<option>Educación</option>
										</optgroup>
									</select>
									<span class="editar-cg">Editar categorías</span>	 
							</p>
							<p>
								<label for="patrimonio-perfil">Recibir alertas</label>
								<div class="btns"> 
									<div class="btn-group">
										<button class="btn btn-large btn-return">Si</button>
										<button class="btn btn-large btn-return">No</button>
									</div>	
								</div>
							</p>
							<p>
								<button class="cambiar-btn"><span>Cambiar</span></button>
							</p>
						</fieldset>
					</form>
				</div>			
			</section>
		</div>
	</section>
	<?php include('includes/footer-app.html'); ?>
</body>
</html>