<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FinanzasOnline | Administracion financiera personal</title>
	<link rel="stylesheet" type="text/css" href="css/libs/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/libs/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/libs/bootstrap-responsive.min.css" />
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,700|Oleo+Script|Alef:700|Merriweather+Sans:700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/estilos.css" />
	<script src="js/libs/prefixfree.min.js"></script>
	<script src="js/libs/jquery.js"></script>
	<script src="js/controlador.js"></script>
</head>
<body>
	<header>
		<?php 
		$index_link = "index.php"; 
		$acercade_link = "acercade.php";
		$comofunciona_link = "comofunciona.php";
		$login_link = "login.php";
		include('includes/menu.php'); ?>
	</header>
	<section class="container formulario-registro">
		<div class="center span11">
			<div id="titulo-registro">
				<h2>Registrarse es simple y gratis!</h2>
				<h3>Solo llena el formulario y empieza tu camino al exito financiero</h3>
			</div>
			<section id="form-registro">
				<form action="#" method="post">
					<fieldset>
						<p>
							<div class="ib">
								<div class="fr-pc">
									<label for="nombre">Nombre</label>
								</div>
								<div class="fr-pc">
									<input id="nombre" required type="text" autofocus placeholder="Ingresa tu nombre">
								</div>
							</div>
							<div class="ib">
								<div class="fr-pc right">
									<label for="apellidos">Apellidos</label>
								</div>
								<div class="fr-pc right">
									<input id="apellidos" required type="text" placeholder="Ingresa tu apellido">
								</div>
							</div>
						</p>
						<p><label for="usuario">Usuario</label></p>
						<p><input id="usuario" type="text" required placeholder="Ingresa tu nombre de usuario" /></p>
						<p><label for="usuario">Contraseña</label></p>
						<p><input id="usuario" type="text" required placeholder="Ingresa tu contraseña" /></p>
						<p><label for="usuario">E-mail</label></p>
						<p><input id="usuario" type="email" required placeholder="Ingresa tu correo electrónico" /></p>
						<p><button class="btn-general" id="btn-crear"><span>Crear cuenta</span></button></p>
					</fieldset>
				</form>
			</section>
		</div>
	</section>
	<?php include('includes/footer-dos.html'); ?>
</body>
</html>