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
		$login_link = "#";
		include('includes/menu.php'); ?>
	</header>
	<section class="container">
		<div class="center span11">
			<section id="form-login">
				<form action="#" method="post">
					<fieldset>
						<p><label for="usuario">Usuario</label></p>
						<p><input id="usuario" type="text" placeholder="Ingresa tu nombre de usuario" /></p>
						<p><label for="usuario">Contraseña</label></p>
						<p><input id="usuario" type="text" placeholder="Ingresa tu contraseña" /></p>
						<p><button class="btn-general" id="btn-ingresar"><span>Ingresar</span></button> <span class="o-contrasenia"><a href="#">¿Olvidaste tu contraseña?</a></span></p>
					</fieldset>
				</form>
			</section>
		</div>
	</section>
	<?php include('includes/footer-dos.html'); ?>
</body>
</html>