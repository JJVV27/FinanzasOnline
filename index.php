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
		$index_link = "#"; 
		$acercade_link = "acercade.php";
		$comofunciona_link = "comofunciona.php";
		$login_link = "login.php";
		include('includes/menu.php'); ?> <!--Incluyo el menu que sera usado en otras paginas-->
		<div id="slide" class="row-fluid">
			<div class="container">
				<div class="center span11">
					<div id="texto-banner" class="span6">
						<h2>Administración financiera personal</h2>
						<div class="sub-texto">
							<h3>Monitorea tu economia desde donde sea</h3>	
							<h3>Analiza resultados y planifica tu futuro</h3>
						</div>
					</div>
					<figure id="banner-home" class="span6">
						<img src="img/banner-home.png" alt="Promocion graficos Finanzas Online" />
					</figure>
				</div>
			</div>
		</div>
		<div id="registro" class="row-fluid">
			<div class="container">
				<div id="registro-content">
					<h2>Registrate de manera gratuita</h2>
					<h3>Descubre los beneficios de ahorrar</h3>
				</div>
				<div id="btn-registrarse">
					<a href="registro.php"><span>Registrarse</span></a>
				</div>
			</div>
		</div>
	</header>
	<section class="container">
		<div class="center span11">
			<section id="mensaje-bienvenida">
				<p class="titulo-principal">The path of the righteous man is beset on all sides by the iniquities of the selfish and the tyranny of evil men.</p>
				<p class="subtitulo">Blessed is he who, in the name of charity and good will, shepherds the weak through the valley of darkness, for he is truly his brother's keeper and the finder of lost children. </p>
				<p class="subtitulo">And I will strike down upon thee with great vengeance and furious anger those who would attempt to poison and destroy My brothers.</p>
			</section>
			<section id="caracteristicas" class="row-fluid">
				<div class="caracteristicas span4">
					<figure class="icon web"></figure>
					<article>
						<h4 class="titulo-caracteristica">Web</h4>
						Normally, both your asses would be dead as fucking fried chicken, but you happen to pull this shit while I'm in a transitional period so I don't wanna kill you, I wanna help you. But I can't give you this case. <a href="#"> Leer más </a>
					</article>
				</div>
				<div class="caracteristicas span4">
						<figure class="icon seguridad"></figure>
					<article>
						<h4 class="titulo-caracteristica">Seguridad</h4>
						Normally, both your asses would be dead as fucking fried chicken, but you happen to pull this shit while I'm in a transitional period so I don't wanna kill you, I wanna help you. But I can't give you this case.<a href="#"> Leer más </a>
					</article>
				</div>
				<div class="caracteristicas span4">
						<figure class="icon grafico"></figure>
					<article>
						<h4 class="titulo-caracteristica">Gráficos</h4>
						Normally, both your asses would be dead as fucking fried chicken, but you happen to pull this shit while I'm in a transitional period so I don't wanna kill you, I wanna help you. But I can't give you this case.<a href="#"> Leer más </a>
					</article>
				</div>
			</section>
		</div>
	</section>
<?php include('includes/footer.html'); ?> <!--Incluyo footer que sera usado en otras paginas -->
</body>
</html>