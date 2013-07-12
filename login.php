<?php 
	include('server/funciones.php');
	$title = 'Incio de sesión';
	include('includes/head.php'); 
?>
    <script>
    $(document).ready(function () {
            var theme = getDemoTheme()
            $('#btn-ingresar').on('click', function () {
                $('#formulario-login').jqxValidator('validate');
                if(!($('#formulario-login').jqxValidator('validate'))){
                	return false;
                }
            });
            $('.text-input').jqxInput({ theme: theme });
            // initialize validator.
            $('#formulario-login').jqxValidator({
                hintType: 'label',
                animationDuration: 1,
             rules: [
                    { input: '#usuario', message: 'Tu nombre de usuario es necesario', action: 'keyup, blur', rule: 'required' },
                    { input: '#password', message: 'Tu contraseña es necesaria', action: 'keyup, blur', rule: 'required' }], theme: theme
            });
        });
	</script>
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
				<form action="logueo.php" id="formulario-login" method="post">
					<fieldset>
						<p><label for="usuario">Usuario</label></p>
						<p><input id="usuario" type="text" placeholder="Ingresa tu nombre de usuario" name="usuario" /></p>
						<p><label for="password">Contraseña</label></p>
						<p><input id="password" type="password" placeholder="Ingresa tu contraseña" name="password" /></p>
						<p><button class="btn-general" id="btn-ingresar"><span>Ingresar</span></button> <span class="o-contrasenia"><a href="#">¿Olvidaste tu contraseña?</a></span></p>
					</fieldset>
				</form>
			</section>
		</div>
	</section>
	<?php include('includes/footer-dos.html'); ?>
</body>
</html>