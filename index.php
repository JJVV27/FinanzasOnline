<?php	
	include('server/conexion.php');
	include('server/funciones.php');
	if (isset($_SESSION['estaautenticado']) && $_SESSION['estaautenticado'] == TRUE) {
		header('Location: perfil.php');
		exit();
	}
?>

<?php 
	$title = 'Administracion financiera personal';
	include('includes/head.php'); 
?>
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
				<p class="titulo-principal">Ahora es muy sencillo saber lo que está pasando con su dinero, mantenga bajo control sus finanzas en todo momento.</p>
				<p class="subtitulo">Empiece hoy mismo a administrar su economía personal, se sorprendera al ver resultados rápidamente y ver como su calidad de vida mejora.  </p>
				<p class="subtitulo">Utilice FinanzasOnline como herramienta de apoyo, es totalmente gratis y puede accederse desde cualquier lugar con conexión a internet.</p>
			</section>
			<section id="caracteristicas" class="row-fluid">
				<div class="caracteristicas span4">
					<figure class="icon web"></figure>
					<article>
						<h4 class="titulo-caracteristica">Web</h4>
						Todos los beneficios de internet como plataforma de desarrollo para la aplicación: su información almacenada de manera segura, puede ser accedida desde cualquier parte del mundo, y a cualquier hora, actualizaciones constantes... <a href="comofunciona.php"> Leer más </a>
					</article>
				</div>
				<div class="caracteristicas span4">
						<figure class="icon seguridad"></figure>
					<article>
						<h4 class="titulo-caracteristica">Seguridad</h4>
						No solo obtendrá un respaldo de toda su información, sino que además estara segura en la nube. Nadie mas que usted tendrá acceso a su cuenta...<a href="comofunciona.php"> Leer más </a>
					</article>
				</div>
				<div class="caracteristicas span4">
						<figure class="icon grafico"></figure>
					<article>
						<h4 class="titulo-caracteristica">Gráficos</h4>
						A veces es mas fácil visualizar los datos que leerlos, es por eso que FinanzasOnline ofrece una variedad de gráficos en su interfaz que le permitiran entender mejor su progreso financiero.<a href="comofunciona.php"> Leer más </a>
					</article>
				</div>
			</section>
		</div>
	</section>
<?php include('includes/footer.html'); ?> <!--Incluyo footer que sera usado en otras paginas -->
</body>
</html>