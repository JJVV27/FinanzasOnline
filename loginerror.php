<?php 
	include('server/funciones.php');
	$title = 'Error al iniciar sesión';
	include('includes/head.php'); 
?>
</head>
<body>
<?php 
		$index_link = "index.php"; 
		$acercade_link = "acercade.php";
		$comofunciona_link = "comofunciona.php";
		$login_link = "login.php";
	include('includes/menu.php');
?>
		<section  class="ingreso-incorrecto">
			<p class="error-logueo"> Error de logeo, verifique que haya escrito bien sus datos!</p>
			<a href="index.php"> volver al inicio </a>
		</section>
</body>
</html>