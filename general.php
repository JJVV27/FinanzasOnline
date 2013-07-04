<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FinanzasOnline | Estado General</title>
	<link rel="stylesheet" type="text/css" href="css/libs/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/libs/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/libs/bootstrap-responsive.min.css" />
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,700|Oleo+Script|Alef:700|Merriweather+Sans:700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/estilos.css" />
	<script src="js/libs/prefixfree.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="js/libs/jquery.address-1.5.min.js"></script>
	<script src="js/controlador.js"></script>
</head>
<body>
	<header>
		<?php 
		$perfil_link = "perfil.php";
		include('includes/menu-app.php'); ?>
	</header>
	<section class="row-fluid app-titulo">
		<div class="container">
			<div class="app-general-titulos center span11">
				<h2 class="titulo-app">Estado General</h2>
				<h3 class="subt-app">Revisa tu estado general financiero</h3>
				<ul id="nav">
				  <li><a class="current-tab" href="ajax/estado.php" data-titulo="Estado General" data-subtitulo="Revisa tu estado general financiero">General</a></li>
				  <li><a href="ajax/transacciones.php" data-titulo="Transacciones" data-subtitulo="Actualiza y revisa registros">Transacciones</a></li>
				  <li><a href="ajax/tendencias.php" data-titulo="Tendencias de gastos" data-subtitulo="Revisa la distribucion de tus gastos" rel="ajax/tendencias.php">Tendencias de gastos</a></li>
				</ul>
			</div>
		</div>
	</section>
	<section class="row-fluid sombra-titulo"></section>
	<section class="row-fluid sombra-dos-titulo"></section>
	<section class="row-fluid">
		<section class="container">
			<div id="ajax-content" class="center span11"> 

			</div>
		</section>
	</section>
	<?php include('includes/footer-app.html'); ?>
</body>
</html>