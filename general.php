<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FinanzasOnline | Estado General</title>
	<link rel="stylesheet" type="text/css" href="css/libs/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/libs/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/libs/bootstrap-responsive.min.css" />
	<link rel="stylesheet" type="text/css" href="css/libs/jqx.base.css" />
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,700|Oleo+Script|Alef:700|Merriweather+Sans:700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<link rel='stylesheet' href='js/libs/fancybox/jquery.fancybox-1.3.4.css' />
	<link rel="stylesheet" type="text/css" href="css/estilos.css" />
	<script src="js/libs/prefixfree.min.js"></script>
	<script src="js/libs/jquery-1.7.2.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src='js/libs/fancybox/jquery.fancybox-1.3.4.pack.js'></script>
	<script src="js/libs/bootstrap.js"></script>
	<script src="js/controlador.js"></script>
</head>
<body>
	<header>
		<?php 
			require_once('server/funciones.php');

			$general_link = "#";
			$perfil_link = "perfil.php";
			include('includes/menu-app.php'); 
		?>
	</header>
	<section class="row-fluid app-titulo">
		<div class="container">
			<div class="app-general-titulos center span11">
				<h2 class="titulo-app">Estado General</h2>
				<h3 class="subt-app">Revisa tu estado general financiero</h3>
				<ul id="nav">
				  <li><a class="current-tab" href="#" data-titulo="Estado General" data-subtitulo="Revisa tu estado general financiero">General</a></li>
				  <li><a href="transacciones.php" data-titulo="Transacciones" data-subtitulo="Actualiza y revisa registros">Transacciones</a></li>
				  <li><a href="tendencias.php" data-titulo="Tendencias de gastos" data-subtitulo="Revisa la distribucion de tus gastos" rel="ajax/tendencias.php">Tendencias de gastos</a></li>
				</ul>
			</div>
		</div>
	</section>
	<section class="row-fluid sombra-titulo"></section>
	<section class="row-fluid sombra-dos-titulo"></section>
	<section class="row-fluid">
		<section class="container">
			<section id="estado-general" class="span4">
				<div id="acordeon-estado">
					<h3>Tu cuenta <!--<div class="icon-app"></div><span class="editar-info-general">Editar</span>--></h3>
					<div>
						<span class="horizontal-alineado pad strong">Patrimonio</span><span class="horizontal-alineado pad derecha strong"><?php echo $simboloMoneda." ".patrimonioAct();?></span>
					</div>
					<h3>Total ingreso fijo</h3>
					<div>
						<span class="horizontal-alineado pad strong">Sueldo</span><span class="horizontal-alineado pad derecha strong"><?php echo $simboloMoneda." ".recuperar($sueldo, 'informacion_usuario');?></span>
					</div>
					<h3>Total egresos fijos</h3>
					<div>
						<?php 
							$seleccionar_egresos = mysql_query("SELECT * FROM egresos_fijos WHERE id_usuario = '$idUsuario'");
							$montoTotal = 0;
							while($egresos = mysql_fetch_assoc($seleccionar_egresos)){
								$monto = $egresos['monto'];
								$concepto = $egresos['concepto'];

								echo "<p> <span class='horizontal-alineado'>".$concepto."</span><span class='horizontal-alineado primer-egreso derecha'>".$simboloMoneda." ".$monto."</span></p>";	

								$montoTotal = $montoTotal + $monto;
							}											
						?>
						<p class="total"><span class="horizontal-alineado strong">Total</span> <span class="horizontal-alineado derecha strong"><?php echo $simboloMoneda." ".$montoTotal; ?></span></p>
					</div>
					<h3>Salud financiera</h3>
					<div>
						<span class="horizontal-alineado pad">Ingresos vs Egresos</span> <span class="horizontal-alineado derecha pad strong"><?php echo saludFinanciera(); ?></span>
						<div id="barra-sf" class="progress">
							<?php echo "<div style='width:".saludIngresos()."%;'class='bar bar-success'>".saludIngresos()."%</div>
							<div style='width:".saludEgresos()."%;' class='bar bar-danger'>".saludEgresos()."%</div>"; ?>
							
						</div>
					</div>
				</div>
			</section>
			<section  id="col-derecha-estado" class="span7">
				<div class="acordeon-estado-derecha">
					<h3>Alertas</h3>
					<div id="alertas-contenedor">
						<?php 
							$fecha_alertas = getdate();
							$dia_alertas = $fecha_alertas['mday'];
							$mes_alertas = $fecha_alertas['mon'];

							$alertas= mysql_query("SELECT * FROM egresos_fijos WHERE id_usuario = '$idUsuario'");
									while($alerta = mysql_fetch_assoc($alertas)){
										$dia_pago_ef = $alerta['fecha_pago'];
										$concepto_alerta = $alerta['concepto'];
										$monto_alerta = $alerta['monto'];

										if(($dia_pago_ef == 1 && $mes_alertas == 1) && ($mes_alertas == 2 || $mes_alertas == 4 || $mes_alertas == 6 || $mes_alertas == 8 || $mes_alertas == 9 || $mes_alertas == 11)){
											$dia_ant_pago_ef = 31;
											$dos_dias_ant_pago_ef = 30;
											$tres_dias_ant_pago_ef = 29;
										}elseif(($dia_pago_ef == 1 && $mes_alertas == 5) && ($mes_alertas == 7 || $mes_alertas == 10 || $mes_alertas == 12)){
											$dia_ant_pago_ef = 30;
											$dos_dias_ant_pago_ef = 29;
											$tres_dias_ant_pago_ef = 28;
										}elseif (($dia_pago_ef == 2 && $mes_alertas == 1) && ($mes_alertas == 2 || $mes_alertas == 4 || $mes_alertas == 6 || $mes_alertas == 8 || $mes_alertas == 9 || $mes_alertas == 11)) {
											$dia_ant_pago_ef = 1;
											$dos_dias_ant_pago_ef = 31;
											$tres_dias_ant_pago_ef = 30;
										}elseif (($dia_pago_ef == 2 && $mes_alertas == 5) && ($mes_alertas == 7 || $mes_alertas == 10 || $mes_alertas == 12)) {
											$dia_ant_pago_ef = 1;
											$dos_dias_ant_pago_ef = 30;
											$tres_dias_ant_pago_ef = 29;
										}elseif (($dia_pago_ef == 3 && $mes_alertas == 1) && ($mes_alertas == 2 || $mes_alertas == 4 || $mes_alertas == 6 || $mes_alertas == 8 || $mes_alertas == 9 || $mes_alertas == 11)) {
											$dia_ant_pago_ef = 2;
											$dos_dias_ant_pago_ef = 1;
											$tres_dias_ant_pago_ef = 31;
										}elseif (($dia_pago_ef == 3 && $mes_alertas == 5) && ($mes_alertas == 7 || $mes_alertas == 10 || $mes_alertas == 12)) {
											$dia_ant_pago_ef = 2;
											$dos_dias_ant_pago_ef = 1;
											$tres_dias_ant_pago_ef = 30;
										}elseif($dia_pago_ef == 1 && $mes_alertas == 3){
											$dia_ant_pago_ef = 28;
											$dos_dias_ant_pago_ef = 27;
											$tres_dias_ant_pago_ef = 26;
										}elseif($dia_pago_ef == 2 && $mes_alertas == 3){
											$dia_ant_pago_ef = 1;
											$dos_dias_ant_pago_ef = 28;
											$tres_dias_ant_pago_ef = 29;
										}elseif($dia_pago_ef == 3 && $mes_alertas == 3){
											$dia_ant_pago_ef = 2;
											$dos_dias_ant_pago_ef = 1;
											$tres_dias_ant_pago_ef = 28;
										}elseif($dia_pago_ef != 1 || $dia_pago_ef != 2 || $dia_pago_ef !=3){
											$dia_ant_pago_ef = $dia_pago_ef - 1;
											$dos_dias_ant_pago_ef = $dia_pago_ef - 2;
											$tres_dias_ant_pago_ef = $dia_pago_ef - 3;
										}


										if($dia_alertas >= $dia_pago_ef){
											echo "<div class='alert alert-error'>
							 						<button type='button' class='close' data-dismiss='alert'>&times;</button>
													<h4>Pago expirado!</h4> <span>El pago de su factura de <strong>".$concepto_alerta."</strong> ha expirado el día <strong>".$dia_pago_ef."</strong> de este mes.</span>
												</div>";
										}if($dia_alertas == $dia_ant_pago_ef || $dia_alertas == $dos_dias_ant_pago_ef || $dia_alertas == $tres_dias_ant_pago_ef){
											echo "<div class='alert alert-block'>
							 						<button type='button' class='close' data-dismiss='alert'>&times;</button>
													<h4>Pago por expirar!</h4> <span>El pago de su factura de <strong>".$concepto_alerta."</strong> va a expirar el día <strong>".$dia_pago_ef."</strong> de este mes.</span>
												</div>";
										}else{
											echo "<div class='alert alert-success'>
							 						<button type='button' class='close' data-dismiss='alert'>&times;</button>
													<h4>Pague</h4> <span>su factura de ".$concepto_alerta." antes del día <strong>".$dia_pago_ef."</strong> de este mes.</span>
												</div>";
										}
										if($dia_pago_ef == $tres_dias_ant_pago_ef){
											enviar_alerta_email($dia_pago_ef, $concepto_alerta, $monto_alerta);
										}
								}
						 ?>
						 <div id="no-alertas"></div>
					</div>
				</div>
				<div class="acordeon-estado-derecha">
					<h3>Mis presupuestos</h3>
					<div id="presupuestos">
						<div id="presupuestos-content">
							<?php 
								$seleccionar_presupuesto = mysql_query("SELECT * FROM presupuestos WHERE id_usuario = '$idUsuario'");
									while($presupuesto = mysql_fetch_assoc($seleccionar_presupuesto)){
										$monto_presupuesto = $presupuesto['monto'];
										$id_cat = $presupuesto['id_categoria'];
										$id_presupuesto = $presupuesto['id_presupuesto'];
										
										$cat = mysql_query("SELECT * FROM categorias WHERE id_categoria = '$id_cat'");
                                		$ctg = mysql_fetch_assoc($cat);

                                		$porcentaje_presupuesto = gastosCategoria($id_cat, $monto_presupuesto);
                                		

                                		if($porcentaje_presupuesto < 60){
                                			$estado_barra = 'bar-success';
                                		}else if($porcentaje_presupuesto < 85){
                                			$estado_barra = 'bar-warning';
                                		}else if($porcentaje_presupuesto >= 85){
                                			$estado_barra = 'bar-danger';
                                		}

									echo "	<div class='presupuesto'> 
												<h4>".$ctg['nombre_categoria']."</h4>
												<div  class='barra-presupuesto progress'>
													<div style='width:".$porcentaje_presupuesto."%;' class='bar ".$estado_barra."'>".$porcentaje_presupuesto."%</div>
												</div>
												<span class='monto-presupuesto'>$".$monto_presupuesto."</span>
												<a href='#eliminar-presupuesto".$id_presupuesto."' class='edit'><span class='close-presupuesto'></span></a>
											</div>

											<div class='contenedor'>
												<div id='eliminar-presupuesto".$id_presupuesto."'>
													<form method='post' action='eliminar_presupuesto.php'>
														<fieldset>
															<legend>Eliminar presupuesto </legend>
															<p>
																<label> Está seguro que desea eliminar este presupuesto? </label>
															</p>
															<p>
																<input type='hidden' name='id_presupuesto' value='".$id_presupuesto."' />
																<button class='button-elmn'>Eliminar</button>
															</p>
														</fieldset>
													</form>
												</div>
											</div>";	

								}	
							 ?>
						</div>
							<div id="agregar-presupuesto" class="btn-group">
								<a href='#agregarpresupuesto' class="edit btn">Nuevo presupuesto</a>
								<a href="tendencias.php" class="btn">Tendencias de gastos</a>
							</div>
					</div>
				</div>
			</section>
		</section>
		<div class="contenedor">
			<div id="agregarpresupuesto">
				<form method="post" action="agregar_presupuesto.php">
					<fieldset>
						<legend>Agrega un presupuesto</legend>
						<p>
							<label class='label-seleccionar-categoria'>Categoría</label>
							<select  class="select-editable" name='id_categoria'>
								<optgroup label="Tus categorías" selected>
									<?php 
										$seleccionar_categoria = mysql_query("SELECT * FROM categorias WHERE id_usuario = '$idUsuario'");
											while($categoria = mysql_fetch_assoc($seleccionar_categoria)){
												$c = $categoria['nombre_categoria'];
												$id_categoria = $categoria['id_categoria'];
												echo "<option value='".$id_categoria."''>".$c."</option>";	
										}											
									?>
								</optgroup>
							</select>
						</p>
						<p>
							<label class="label-monto-presupuesto">Monto(<?php echo $simboloMoneda; ?>)</label>
							<input class="monto-presupuesto" type="text" name="monto_presupuesto" required/>
						</p>
						<p>
							<span class='label-info'>*Los presupuesto se reinician el 1er día de cada mes.</span>
						</p>
						<p>
							<button class="btn-agregar">Agregar presupuesto</button>
						</p>
					</fieldset>
				</form>
			</div>
		</div>
	</section>
	<?php include('includes/footer-app.html'); ?>
</body>
</html>