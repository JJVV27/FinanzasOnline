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
		$perfil_link = "#";
		include('includes/menu-app.php'); ?>
	</header>
	<section class="row-fluid" id="perfil-titulo">
		<div class="container">
			<div class="center span11">
				<h2>Bienvenido(a) <span>Evelyn Del Pezo</span></h2>
			</div>
		</div>
	</section>
	<section class="row-fluid sombra-titulo"></section>
	<section class="row-fluid sombra-dos-titulo"></section>
	<section class="container">
		<div class="center span11">
			<section id="info-cont" class="span5" >
				<div id="info-usuario">
					<figure id="img-usuario">
						<img src="img/img.jpg" alt="imagen de perfil del usuario" />
						<figcaption>
							<span>Cambiar imagen</span>
						</figcaption>
					</figure>
					<div id="info-content">
						<h3>Mi información <span>(Editar)</span></h3>
						<ul>
							<li><span class="campo-info">Nombre</span><span class="resp-info">Evelyn Del Pezo</span></li>
							<li><span class="campo-info">Fecha de nacimiento</span><span class="resp-info">19 de Septiembre de 1983</span></li>
							<li><span class="campo-info">País</span><span class="resp-info">Ecuador</span></li>
							<li><span class="campo-info">Patrimonio</span><span class="resp-info">$68,740</span></li>
						</ul>
					</div>
				</div>
			</section>
			<section id="configuracion-content" class="span6">
				<div id="configuracion">
					<form action="" method="post">
						<fieldset>
							<span class="cg-perfil"><legend>Configuraciones generales</legend></span>
							<p><label for="moneda">Moneda</label> 
								<select id="moneda">
									<option>USD</option>
									<option>Euro</option>
								</select>
							</p>
							<p>
								<label for="email-perfil">Email</label> 
								<input id="email-perfil" type="text" placeholder="correo@gmail.com" />
							</p>
							<p>
								<label for="patrimonio-perfil">Patrimonio</label> 
								<input id="patrimonio-perfil" type="text" placeholder="$68.070" />
							</p>
							<p>
								<label for="sueldo-perfil">Sueldo</label> 
								<input id="sueldo-perfil" type="text" placeholder="$3,500" />
							</p>
							<p>
								<label for="egresos-perfil">Egresos fijos</label> 
									<select  id="egresos-perfil" class="select-editable">
										<optgroup label="Egresos fijos">
											<option>Servicios básicos</option>
											<option>Celular</option>
											<option>Direct Tv</option>
											<option>Internet</option>
										</optgroup>
									</select>
									<span class="editar-cg">Editar egresos fijos</span>
							</p>
							<p>
								<label for="categorias-perfil">Categorías</label> 
									<select id="categorias-perfil" class="select-editable">
										<optgroup label="Tus categorías" selected>
											<option>Comida</option>
											<option>Entretenimiento</option>
											<option>Educación</option>
										</optgroup>
									</select>
									<span class="editar-cg">Editar categorías</span>	 
							</p>
							<p>
								<label for="patrimonio-perfil">Recibir alertas</label>
								<div class="btns"> 
									<div class="btn-group">
										<button class="btn btn-large btn-return">Si</button>
										<button class="btn btn-large btn-return">No</button>
									</div>	
								</div>
							</p>
							<p>
								<button class="cambiar-btn"><span>Cambiar</span></button>
							</p>
						</fieldset>
					</form>
				</div>			
			</section>
		</div>
	</section>
	<?php include('includes/footer-app.html'); ?>
</body>
</html>