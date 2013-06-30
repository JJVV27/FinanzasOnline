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
	<section class="container">
		<div class="center span11">
			<div id="titulo-contacto">
				<h2>Contacta Finanzas Online</h2>
				<h3>Si tienes alguna duda o sugerencia no dudes en usar el formulario para hacernosla llegar,
te responderemos lo antes posible</h3>
			</div>
			<section id="form-contacto">
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
									<label for="email">Email</label>
								</div>
								<div class="fr-pc right">
									<input id="email" type="email" required placeholder="Ingresa tu correo electrónico">
								</div>
							</div>
						</p>
						<p><label for="asunto">Asunto</label></p>
						<p>
							<div class="select">
								<select>
									<option>Elije un asunto</option>
									<option>Soporte tecnico</option>
									<option>Pregunta general, sugerencia</option>
									<option>Informacion comercial</option>
									<option>Queja o reclamo</option>
								</select>
							</div>
						</p>
						<p><label for="comentario">Comentario</label></p>
						<p><textarea id="usuario" required type="text"></textarea></p>
						<p><button class="btn-general" id="btn-enviar"><span>Enviar</span></button></p>
					</fieldset>
				</form>
			</section>
		</div>
	</section>
	<?php include('includes/footer-dos.html'); ?>
</body>
</html>