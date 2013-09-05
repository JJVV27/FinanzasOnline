<?php 
	include('server/funciones.php');
	$title = 'Registro usuarios';
	include('includes/head.php'); 
?>
	<script>
    $(document).ready(function () {
            var theme = getDemoTheme()
            $('#btn-crear').on('click', function () {
                $('#formulario-registro').jqxValidator('validate');
                if(!($('#formulario-registro').jqxValidator('validate'))){
                	return false;
                }
            });
            $('.text-input').jqxInput({ theme: theme });
            // initialize validator.
            $('#formulario-registro').jqxValidator({
                hintType: 'label',
                animationDuration: 1,
             rules: [
                    { input: '#nombreInput', message: 'Tu nombre es necesario', action: 'keyup, blur', rule: 'required' },
                    { input: '#nombreInput', message: 'Tu nombre solo puede contener letras', action: 'keyup', rule: 'notNumber' },
                    { input: '#nombreInput', message: 'Tu nombre real debe tener entre 2 y 12 caracteres', action: 'keyup', rule: 'length=2,12' },
                    { input: '#apellidoInput', message: 'Tu apellido es necesario', action: 'keyup, blur', rule: 'required' },
                    { input: '#apellidoInput', message: 'Tu apellido solo puede contener letras', action: 'keyup', rule: 'notNumber' },
                    { input: '#apellidoInput', message: 'Tu apellido debe tener entre 2 y 12 caracteres', action: 'keyup', rule: 'length=2,12' },
                    { input: '#usuarioInput', message: 'Nombre de usuario requerido', action: 'keyup, blur', rule: 'required' },
                    { input: '#usuarioInput', message: 'Tu nombre de usuario debe tener entre 3 y 12 caracteres', action: 'keyup, blur', rule: 'length=3,12' },
                    { input: '#passwordInput', message: 'La contraseña es obligatoria', action: 'keyup, blur', rule: 'required' },
                    { input: '#passwordInput', message: 'Tu contraseña debe tener entre 4 y 12 caracteres', action: 'keyup, blur', rule: 'length=4,12' },
                    { input: '#passwordConfirmInput', message: 'Por favor vuelve a ingresar tu contraseña', action: 'keyup, blur', rule: 'required' },
                    { input: '#passwordConfirmInput', message: 'La contraseña no es igual a la anterior', action: 'keyup, focus', rule: function (input, commit) {
                        // call commit with false, when you are doing server validation and you want to display a validation error on this field. 
                        if (input.val() === $('#passwordInput').val()) {
                            return true;
                        }
                        return false;
                    }
                    },
                    { input: '#emailInput', message: 'Tu correo electronico es necesario para el registro', action: 'keyup, blur', rule: 'required' },
                    { input: '#emailInput', message: 'Formato invalido, debe ser: correo@hosting.com', action: 'keyup', rule: 'email' }], theme: theme
            });
        });
	</script>
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
	<section class="container formulario-registro">
		<div class="center span11">
			<div id="titulo-registro">
				<h2>Registrarse es simple y gratis!</h2>
				<h3>Solo llena el formulario y empieza tu camino al exito financiero</h3>
			</div>
			<section id="form-registro">
				<form action="registrar.php" method="post" id="formulario-registro">
					<fieldset>
						<p>
							<div class="ib">
								<div class="fr-pc">
									<label for="nombreInput">Nombre</label>
								</div>
								<div class="fr-pc">
									<input id="nombreInput" type="text" placeholder="Ingresa tu nombre" name="nombre">
								</div>
							</div>
							<div class="ib">
								<div class="fr-pc right">
									<label for="apellidoInput">Apellidos</label>
								</div>
								<div class="fr-pc right">
									<input id="apellidoInput" type="text" placeholder="Ingresa tu apellido" name="apellido">
								</div>
							</div>
						</p>
						<p><label for="usuarioInput">Usuario</label></p>
						<p><input id="usuarioInput" type="text" placeholder="Ingresa tu nombre de usuario" name="usuario" /></p>
						<p><label for="passwordInput">Contraseña</label></p>
						<p><input id="passwordInput" type="password" placeholder="Ingresa tu contraseña" name="password" /></p>
						<p><label for="passwordConfirmInput">Repita la contraseña</label></p>
						<p><input id="passwordConfirmInput" type="password" placeholder="Ingresa tu contraseña" name="repassword" /></p>
						<p><label for="emailInput">E-mail</label></p>
						<p><input id="emailInput" type="text" placeholder="Ingresa tu correo electrónico" name="email" /></p>
						<p><button class="btn-general" id="btn-crear"><span>Crear cuenta</span></button></p>
					</fieldset>
				</form>
			</section>
		</div>
	</section>
	<?php include('includes/footer-dos.html'); ?>
</body>
</html>