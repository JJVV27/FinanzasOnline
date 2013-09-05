<?php 
	require_once('server/conexion.php');
	require_once('server/funciones.php');
		if (!isset($_SESSION['estaautenticado']) && $_SESSION['estaautenticado'] == FALSE) {
		header('Location: index.php');
		exit();
	}
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FinanzasOnline | <? echo ucfirst(recuperar($nombre_usuario, 'informacion_usuario'))." ".ucfirst(recuperar($apellido_usuario, 'informacion_usuario'));?></title>
	<link rel="stylesheet" type="text/css" href="css/libs/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/libs/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/libs/bootstrap-responsive.min.css" />
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,700|Oleo+Script|Alef:700|Merriweather+Sans:700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/estilos.css" />
	<link rel='stylesheet' href='js/libs/fancybox/jquery.fancybox-1.3.4.css' />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<script src="js/libs/prefixfree.min.js"></script>
	<script src="js/libs/jquery-1.7.2.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src='js/libs/fancybox/jquery.fancybox-1.3.4.pack.js'></script>
	<script src="js/controlador.js"></script>
	<script>
		$(document).ready(function(){
				$('.editar-ef').on("click", abrirEdicion);
				$('.editar-ct').on("click", abrirEdicionCt);

				$( ".nuevo-egreso" ).on("click", nuevoEgreso);
				$( ".nueva-categoria" ).on("click", nuevaCategoria);
		});

		$(function() {
		    $( "#fn-edit" ).datepicker({
		    	dateFormat: 'yy/mm/dd',
		    	changeMonth: true,
  			    changeYear: true
		    });
		  });

		function abrirEdicion(){
			var ae = $('.tbl-muestra').css('display');

			if(ae == 'none'){
				$('.tbl-muestra').slideDown('slow');
			}else{
				$('.tbl-muestra').slideUp();
			}
		}

		function abrirEdicionCt(){
			var ae = $('.tbl-muestra-ct').css('display');

			if(ae == 'none'){
				$('.tbl-muestra-ct').slideDown('slow');
			}else{
				$('.tbl-muestra-ct').slideUp();
			}
		}

		function nuevoEgreso(){
			var nuevo = $('#nuevo-egreso').css('display');

			if(nuevo == 'none'){
				$('#nuevo-egreso').slideDown('slow');
			}else{
				$('#nuevo-egreso').slideUp('slow');
			}
		}

		function nuevaCategoria(){
			var nuevo = $('#nueva-categoria').css('display');

			if(nuevo == 'none'){
				$('#nueva-categoria').slideDown('slow');
			}else{
				$('#nueva-categoria').slideUp('slow');
			}
		}
		$(".edit").fancybox({
		'titlePosition'		: 'inside',
		'transitionIn'		: 'none',
		'transitionOut'		: 'none'
	});
	</script>
</head>
<body>
	<header>
		<?php 
		$general_link = "general.php";
		$perfil_link = "#";
		include('includes/menu-app.php'); ?>
	</header>
	<section class="row-fluid" id="perfil-titulo">
		<div class="container">
			<div class="center span11">
				<h2>Bienvenido(a) <span><?php echo ucfirst(recuperar($nombre_usuario, 'informacion_usuario'))." ".ucfirst(recuperar($apellido_usuario, 'informacion_usuario')); ?></span></h2>
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
						<?php 
							if(cargar_foto()==""){
								echo "<img src='img/usuarios/fou-1122-avatar.jpg' alt='Avatar' id='img-perfil-usuario' />";
							}else{
								echo "<img src='".cargar_foto()."' id='img-perfil-usuario' />";
							}					
						?>
						<figcaption>
							<a class="edit" href="#cambio-imagen-perfil" id="cambio-img-perfil"><span class="nav-color">Cambiar imagen</span></a>
						</figcaption>
					</figure>
					<div id="info-content">
						<h3>Mi información <a class="edit" href="#cambio-perfil"><span>(Editar)</span></a></h3>
						<ul>
							<li><span class="campo-info">Nombre</span><span class="resp-info"><?php echo ucfirst(recuperar($nombre_usuario, 'informacion_usuario'))." ".ucfirst(recuperar($apellido_usuario, 'informacion_usuario')); ?></span></li>
							<?php
								if(recuperar_fecha($fecha_nac)=="30 de Noviembre de -0001"){
									echo "<li><span class='campo-info'>Fecha de nacimiento</span><span class='resp-info'></span></li>"; 
								}else{
									echo "<li><span class='campo-info'>Fecha de nacimiento</span><span class='resp-info'>".recuperar_fecha($fecha_nac. 'informacion_usuario')."</span></li>";
								}
							?>
							<li><span class="campo-info">País</span><span class="resp-info"><?php echo ucfirst(recuperar($pais, 'informacion_usuario')); ?></span></li>
							<li><span class="campo-info">Patrimonio</span><span class="resp-info"><?php echo $simboloMoneda ." ".recuperar($patrimonio, 'informacion_usuario'); ?></span></li>
						</ul>
					</div>
				</div>
			<!-- Fancy box-->
			<div class="contenedor">
				<div id="cambio-perfil">
					<form action="actualizacion-perfil.php" method="POST"  name="form1" class="form-editar">
						<fieldset>
							<legend>Edita los datos de tu perfil</legend>
							<p>
								<label for="nombre-edit">Nombre: </label>
								<?php echo "<input type='text' name='nombre-perfil' id='nombre-edit' value='".recuperar($nombre_usuario, 'informacion_usuario')."' required/>";?>
							</p>
							<p>
								<label for="nombre-edit">Apellido: </label>
								<?php echo "<input type='text' name='apellido-perfil' id='apellido-edit' value='".recuperar($apellido_usuario, 'informacion_usuario')."' required/>";?>
							</p>
							<p>
								<label for="fn-edit">Fecha de nacimiento: </label>
								<?php echo "<input type='text' name='fn-perfil' id='fn-edit' value='".recuperar($fecha_nac, 'informacion_usuario')."' />";?>
							</p>
							<p>
								<label for="pais-edit">País: </label>
								<?php echo "<input type='text' name='pais-perfil' id='pais-edit' value='".recuperar($pais, 'informacion_usuario')."' />";?>
							</p>
							<p>
								<label for="patrimonio-edit">Patrimonio: </label>
								<?php echo "<input type='text' name='patrimonio-perfil' id='patrimonio-edit' class='moneda input' value='".recuperar($patrimonio, 'informacion_usuario')."' required/>";?>
							</p>
							<p class="btn-act">
								<input type="submit" name="button" id="button-act" value="Actualizar" />
							</p>
								<input type="hidden" name="MM_insert" value="form1" />
						</fieldset>
					</form>
				</div>
			</div>
			<div class="contenedor">
				<div id="cambio-imagen-perfil">
					<form action="subir_img.php" method="post" id="form-cambiar-imagen" enctype="multipart/form-data">
						<fieldset>
							<legend>Agrega una imagen a tu perfil</legend>
							<p>
								<label for="fleImagen">Imagen:</label>
								<input type="file" name="fleImagen" id="fleImagen" />
							</p>
								<label for="txtNombre">Nombre:</label>
								<input type="text" name="txtNombre" id="txtNombre" />
							<p>
								<label for="txtDescripcion">Descripción:</label>
								<textarea name="txtDescripcion" id="txtDescripcion" cols="45" rows="5"></textarea>
							</p>
							<p class="btn-act">
									<input type="submit" name="button" id="button-act" value="Actualizar" />
							</p>
						</fieldset>
					</form>
				</div>
			</div>
			<div class="contenedor">
				<div id="actualizar-imagen-perfil">
					<form action="actualizar_img.php" method="post" id="form-cambiar-imagen" enctype="multipart/form-data">
						<fieldset>
							<legend>Cambia la imagen de tu perfil</legend>
							<p>
								<label for="fleImagen">Imagen:</label>
								<input type="file" name="fleImagen" id="fleImagen" />
							</p>
								<label for="txtNombre">Nombre:</label>
								<input type="text" name="txtNombre" id="txtNombre" />
							<p>
								<label for="txtDescripcion">Descripción:</label>
								<textarea name="txtDescripcion" id="txtDescripcion" cols="45" rows="5"></textarea>
							</p>
							<p class="btn-act">
									<input type="submit" name="button" id="button-act" value="Actualizar" />
							</p>
						</fieldset>
					</form>
				</div>
			</div>
			</section>
			<section id="configuracion-content" class="span6">
				<div id="configuracion">
					<form action="configuracion-perfil.php" method="post">
						<fieldset>
							<span class="cg-perfil"><legend>Configuraciones generales</legend></span>
							<p><label for="moneda">Moneda</label> 
								<select name="mon">
									<?php 
										if(recuperar($moneda, 'informacion_usuario') == "USD"){
											echo "<option id='seleccion-moneda' class='cambio-moneda' value='USD' selected='selected'> USD </option>
												<option id='moneda-restante' class='cambio-moneda' value='Euro'>Euro</option>";
										}else{
											echo "<option id='seleccion-moneda' class='cambio-moneda' value='Euro' selected='selected'> Euro </option>
												<option id='moneda-restante' class='cambio-moneda' value='USD'>USD</option>";
										}
									?>
									
								</select>
							</p>
							<p>
								<label for="email-perfil">Email</label> 
								<span class="input-bg mail-bg"></span><?php echo "<input id='email-perfil' class='input' type='text' name='email' value='".recuperar($email, 'informacion_usuario')."'/>";?>
								
							</p>
							<p>
								<label for="patrimonio-perfil">Patrimonio</label> 
								<span class="input-bg moneda-bg"><? echo $simboloMoneda ?></span><?php echo "<input id='patrimonio-perfil' class='input' type='text' name='patrimonio' value='".recuperar($patrimonio, 'informacion_usuario')."'/>";?>
							</p>
							<p>
								<label for="sueldo-perfil">Sueldo</label> 
								<span class="input-bg moneda-bg"><? echo $simboloMoneda ?></span><?php echo "<input id='sueldo-perfil' class='input' type='text' name='sueldo' value='".recuperar($sueldo, 'informacion_usuario')."'/>";?>
							</p>
							<p>
								<label for="egresos-perfil">Egresos fijos</label> 
									<select  id="egresos-perfil" class="select-editable">
										<optgroup label="Egresos fijos">
											<?php 
												$seleccionar_egresos = mysql_query("SELECT * FROM egresos_fijos WHERE id_usuario = '$idUsuario'");
												while($egresos = mysql_fetch_assoc($seleccionar_egresos)){
													$a = $egresos['concepto'];
													echo "<option>".$a."</option>";	
												}											
											?>
											
										</optgroup>
									</select>
									<span class="editar-cg editar-ef">Editar egresos fijos</span>
									<div class="tbl-muestra">
										<table id="tbl-egresos-fijos">
											<thead>
												<th colspan="4"><span class="tbl-title">Edita tus egresos fijos</span></th>
												<tr>
													<td>Egreso</td>
													<td>Monto ($)</td>
													<td>Día de pago</td>
													<td></td>
												</tr>	
											</thead>
											<tbody>
												<?php 
													$seleccionar_egresos = mysql_query("SELECT * FROM egresos_fijos WHERE id_usuario = '$idUsuario'");
													while($egresos = mysql_fetch_assoc($seleccionar_egresos)){
														$id = $egresos['id_egreso'];
														$concepto = $egresos['concepto'];
														$monto = $egresos['monto'];
														$fecha_pago = $egresos['fecha_pago'];
														echo "<tr> 
																<td> 
																	".$concepto."
																</td>
																<td> 
																	".$monto."
																</td>
																<td> 
																	".$fecha_pago."
																</td>
																<td>
																	<a href='#editar-egreso".$id."' class='edit'><span class='edt-elmn'>Editar</span></a>
																	<a href='#eliminar-egreso".$id."' class='edit'><span class='edt-elmn'>Eliminar</span></a>
																</td>
															<div class='contenedor'>
																<div id='editar-egreso".$id."'>
																	<form action='actualizacion-egresos.php' method='POST'>
																		<fieldset>
																			<legend>Editar egreso</legend>
																			<p>
																				<label class='input-lbl-eg'>Concepto: </label>
																				<input type='text' class='input-eg' name='concepto' value='".$concepto."' required/>
																			</p>
																			<p>
																				<label class='input-lbl-eg'>Monto: </label>
																				<input type='text' class='input-eg' name='monto' value='".$monto."' required/>
																			</p>
																			<p>
																				<label class='input-lbl-eg'>Día de pago: </label>
																				<input type='text' class='input-eg' name='pago' value='".$fecha_pago."' />
																				<input type='hidden' value='".$id."' name='id'/>
																			</p>
																			<p>
																				<button class='button-act-eg'> Actualizar </button>
																			</p>
																		</fieldset>
																	</form>
																</div>
															</div>	

															<div class='contenedor'>
																<div id='eliminar-egreso".$id."'>
																	<form action='eliminar-egresos.php' method='POST' class='config-editar-egresos'>
																		<fieldset>
																			<legend>Esta seguro que desea eliminar este egreso</legend>
																			<p class='btn-act'>
																				<input type='hidden' name='id' value='".$id."' />
																				<button class='button-elmn'> Eliminar </button>
																			</p>
																		</fieldset>
																	</form>
																</div>
															</div>
															</tr>";	
													}											
												?>
											</tbody>	
										</table>
										<form method="post" action="agregar_egreso.php" id="agregar-egreso">
											<fieldset>
												<legend><span class="nuevo-cg nuevo-egreso">+ Nuevo egreso</span></legend>
													<div id="nuevo-egreso">
														<p>
															<label>Concepto</label>
															<input type="text" name="concepto" required />
														</p>
														<p>
															<div class="monto-pago">
																<label>Monto</label>
																<span class="input-bg moneda-bg"><? echo $simboloMoneda ?></span><input class="input-monto" type="text" name="monto" required/>
															</div>
															<div class="monto-pago">
																<label>Día de pago</label>
																<input type="text" name="pago" required/>
															</div>
														</p>
														<p>
															<button class="btn-agregar"> Agregar </button>
														</p>
													</div>
											</fieldset>
										</form>
								</div>
							</p>
							<p>
								<label for="categorias-perfil">Categorías</label> 
									<select id="categorias-perfil" class="select-editable">
										<optgroup label="Tus categorías" selected>
										<?php 
											$seleccionar_categoria = mysql_query("SELECT * FROM categorias WHERE id_usuario = '$idUsuario'");
											while($categoria = mysql_fetch_assoc($seleccionar_categoria)){
												$c = $categoria['nombre_categoria'];
												echo "<option>".$c."</option>";	
											}											
											?>
										</optgroup>
									</select>
									<span class="editar-cg editar-ct">Editar categorías</span>	

									<div class="tbl-muestra-ct">
										<table id="tbl-ctg">
											<thead>
												<th colspan="3"><span class="tbl-title">Edita tus categorías</span></th>
												<tr>
													<td colspan="2">Categoria</td>
													<td></td>
												</tr>	
											</thead>
											<tbody>
												<?php 
													$seleccionar_categoria = mysql_query("SELECT * FROM categorias WHERE id_usuario = '$idUsuario'");
													while($categoria = mysql_fetch_assoc($seleccionar_categoria)){
														$id = $categoria['id_categoria'];
														$nombre = $categoria['nombre_categoria'];

														echo "<tr> 
																<td colspan='2'> 
																	".$nombre."
																</td>
																<td>
																	<a href='#editar-categoria".$id."' class='edit'><span class='edt-elmn'>Editar</span></a>
																	<a href='#eliminar-categoria".$id."' class='edit'><span class='edt-elmn'>Eliminar</span></a>
																</td>
															<div class='contenedor'>
																<div id='editar-categoria".$id."'>
																	<form action='actualizacion_categoria.php' method='POST'>
																		<fieldset>
																			<legend>Editar categoría</legend>
																			<p>
																				<label class='input-lbl-eg'>Nombre: </label>
																				<input type='text' class='input-eg' name='nombre_categoria' value='".$nombre."' required/>
																			</p>
																			<p>
																				<input type='hidden' value='".$id."' name='id'/>
																			</p>
																			<p>
																				<button class='button-act-eg'> Actualizar </button>
																			</p>
																		</fieldset>
																	</form>
																</div>
															</div>	

															<div class='contenedor'>
																<div id='eliminar-categoria".$id."'>
																	<form action='eliminar_categoria.php' method='POST' class='config-editar-egresos'>
																		<fieldset>
																			<legend>Esta seguro que desea eliminar esta categoría</legend>
																			<p class='btn-act'>
																				<input type='hidden' name='id' value='".$id."' />
																				<button class='button-elmn'> Eliminar </button>
																			</p>
																		</fieldset>
																	</form>
																</div>
															</div>
														</tr>";	
													}											
												?>
											</tbody>	
										</table>
										<form method="post" action="crear-categoria.php" id="agregar-categoria-pr">
											<fieldset>
												<legend><span class="nuevo-cg nueva-categoria">+ Crear categoría</span></legend>
													<div id="nueva-categoria">
														<p>
															<label>Nombre categoría</label>
															<input type="text" name="nombre_categoria" required />
														</p>
														<p>
															<button class="btn-agregar"> Agregar </button>
														</p>
													</div>
											</fieldset>
										</form>
								</div> 
							</p>
							<!--<p>
								<label for="patrimonio-perfil">Recibir alertas</label>
								<div class="btns"> 
									<div class="btn-group">
										<?php if(recuperar($alerta, 'informacion_usuario') == 'true'){
													echo "<button class='btn btn-large btn-return btn-alerta btn-default' value='true'>Si</button>
														<button class='btn btn-large btn-return btn-alerta' value='false'>No</button>";
												}else{
													echo "<button class='btn btn-large btn-return btn-alerta' value='true'>Si</button>
														<button class='btn btn-large btn-return btn-alerta btn-default' value='false'>No</button>";
												} 
										?>
										<input type="hidden" id="input-alerta" value="true" name="alerta" />
									</div>	
								</div>
							</p>-->
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