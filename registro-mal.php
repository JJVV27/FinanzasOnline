<?php 
	include('server/funciones.php');
	$title = 'Registro incorrecto';
	include('includes/head.php'); 
?>
<body>
<?php 
		$index_link = "index.php"; 
		$acercade_link = "acercade.php";
		$comofunciona_link = "comofunciona.php";
		$login_link = "login.php";
		include('includes/menu.php'); ?>
	<section  class='error ingreso-incorrecto'>
		<p class='error-logueo'>Su registro no pudo hacerse, porfavor ingrese correctamente los datos.</p>
		<a href='index.php'> volver al inicio </a>
	</section>
</body>
</html>
