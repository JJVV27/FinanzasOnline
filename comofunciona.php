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
		$comofunciona_link = "#";
		$login_link = "login.php";
		include('includes/menu.php'); ?>
	</header>
	<section class="container">
		<div class="center span11">
			<div class="top-cf">
				<div class="row-fluid">
					<div id="titulo-cf" class="span9">
						<h2>Tu vida financiera, toda en un solo lugar</h2>
						<p>FinanzasOnline te permite manejar tu patrimonio desde un solo lugar. Crea presupuestos, monitorea tus ingresos, y mucho más totalmente gratis. <span class="mostrar-video">Mira este video explicativo</span></p>
					</div>
					<div id="empieza" class="span3">
						<a href="registro.php"><div class="btn-general" id="btn-empieza"><span>Empieza ya!</span></div></a>
					</div>
				</div>
				<div class="video">		
					<video controls poster="img/logo.png">
						   <source src="video/motion.ogv" type="video/ogg" />
						   <source src="video/motion.mp4" type="video/mp4" />    
						   <object type="application/x-shockwave-flash" width="360" height="240" data="player.swf?file=archivo.mp4">
						      <param name="movie" value="player.swf?file=archivo.mp4" />
						      <a href="video/motion.mp4">Descarga la película</a>
						   </object>
					</video>
				</div>
			</div>
			<section id="funciones" class="row-fluid">
				<div class="funciones row-fluid">
					<article>
						<h3>Hace tu vida mas simple</h3>
						<p>En FinanzasOnline pensamos que el dinero es para disfrutarlo, por eso nos encargamos de simplificar su economia personal.  <a class="underline" href="registro.php">Registrarse</a> toma menos de 5 minutos. Inmediatamente podra ingresar y manejar sus finanzas de manera sencilla.</p>
					</article>
					<figure>
							<img src="img/vida-simple.png" alt="Haz tu vida mas simple" />
					</figure>
				</div>
				<div class="funciones row-fluid">
					<article class="articulo-derecha">
						<h3>Total control, en todo momento</h3>
						<p>Monitorea tu estado financiero en todo momento, y desde cualquier lugar del mundo. Revisa tus gastos, ingresos, tendencias, y graficos estadisticos desde cualquier dispositivo con conexion a internet.</p>
					</article>
					<figure class="derecha-img">
						<img src="img/total-control.png" alt="Total control, en todo momento" />
					</figure>
				</div>
				<div class="funciones row-fluid">
					<article>
						<h3>Ayudamos a planificar tu futuro y cumplir tus metas</h3>
						<p>En FinanzasOnline pensamos que el dinero es para disfrutarlo, por eso nos encargamos de simplificar su economia personal.  Registrarse toma menos de 5 minutos. Inmediatamente podra ingresar y manejar sus finanzas de manera sencilla.</p>
					</article>
					<figure>
						<img src="img/planificar-futuro.png" alt="Planificamos tu futuro y te ayudamos a cumplie tus metas" />
					</figure>
				</div>
				<div class="funciones row-fluid">
					<article class="articulo-derecha">
						<h3>Seguro y confiable</h3>
						<p>En FinanzasOnline pensamos que el dinero es para disfrutarlo, por eso nos encargamos de simplificar su economia personal.  Registrarse toma menos de 5 minutos. Inmediatamente podra ingresar y manejar sus finanzas de manera sencilla.</p>
					</article>
					<figure class="derecha-img">
						<img src="img/seguro-confiable.png" alt="Seguridad y confiabilidad" />
					</figure>
				</div>
			</section>
		</div>
	</section>
	<?php include('includes/footer.html'); ?>
</body>
</html>