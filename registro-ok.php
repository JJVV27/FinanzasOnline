<?php 
	include('server/funciones.php');
	$title = 'Registro exitoso';
	include('includes/head.php'); 
?>
</head>
<body>
<?php 
		$index_link = "index.php"; 
		$acercade_link = "acercade.php";
		$comofunciona_link = "comofunciona.php";
		$login_link = "login.php";
	include('includes/menu.php'); ?>
	<section  class='error logueo-exitoso'>
		<p class='error-logueo'> Felicidades! Has sido registrado correctamente.</p>
		<a href='index.php'> volver al inicio </a>
	</section>
</body>
</html>
