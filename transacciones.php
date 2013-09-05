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
    <link rel='stylesheet' href='css/libs/jquery.dataTables.css' /> 
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <script src="js/libs/prefixfree.min.js"></script>
    <script src="js/libs/jquery-1.7.2.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 
    <script src='js/libs/fancybox/jquery.fancybox-1.3.4.pack.js'></script>
    <script src='js/libs/jquery.dataTables.js'></script>
    <script src="js/controlador.js"></script> 

    <script type="text/javascript">

    $(document).ready(function(){
      $('#miTabla').dataTable({
        "oLanguage": {
            "sUrl": "js/libs/de_DE.txt"
        }
       });
    });
    </script>

</head>
<body>
    <header>
        <?php 
            require_once('server/funciones.php');

            $general_link = "general.php";
            $perfil_link = "perfil.php";
            include('includes/menu-app.php'); 
        ?>
    </header>
    <section class="row-fluid app-titulo">
        <div class="container">
            <div class="app-general-titulos center span11">
                <h2 class="titulo-app">Transacciones</h2>
                <h3 class="subt-app">Actualiza y revisa registros</h3>
                <ul id="nav">
                  <li><a href="general.php">General</a></li>
                  <li><a class="current-tab" href="#">Transacciones</a></li>
                  <li><a href="tendencias.php">Tendencias de gastos</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="row-fluid sombra-titulo"></section>
    <section class="row-fluid sombra-dos-titulo"></section>
      <section class="container">
          <section class="row-fluid">
            <section id="transacciones" class="center span10">
                <div id="transacciones-top">
                    <div id="transacciones-to">
                      <div id="total-cash" class="top-tr">
                          <span class="total-tr strong">Total Cash</span>
                          <span class="total-tr green strong"><?php echo $simboloMoneda." ".patrimonioAct();?></span>
                      </div>
                      <div id="total-pagar" class="top-tr">
                          <span class="total-tr strong">Total a pagar</span>
                          <span class="total-tr red strong"><?php echo $simboloMoneda." ".totalDeuda('egresos'); ?></span>
                        </div>
                    </div>
                    <div id="agregar-tr">
                      <a class="btn edit" href="#agregar-ingreso-popup"><i class="icon-plus"></i> Agregar ingreso</a>
                      <a class="btn edit" href="#agregar-egreso-popup"><i class="icon-plus"></i> Agregar egreso</a>
                    </div>
                </div>
              </section>
                <!-- fancybox! -->
                <div class="contenedor">
                  <div id="agregar-ingreso-popup" class="row">
                    <div class="form-pop-up span5">
                      <form action="registrar_ingreso.php" method="POST"  name="form1" class="form-editar">
                        <fieldset>
                          <legend>Registra un ingreso</legend>
                          <p>
                            <label for="descripcion-in-tr">Descripción </label>
                            <?php echo "<input type='text' name='descripcion_ingreso' id='descripcion-in-tr' placeholder='Descripción del ingreso' required/>";?>
                          </p>
                          <p>
                            <label for="monto-in-tr">Monto <?php echo "(".$simboloMoneda."):"; ?></label>
                            <?php echo "<input type='text' name='monto_ingreso' id='monto-in-tr' class='moneda input' placeholder='Monto del ingreso' required/>";?>
                          </p>
                          <p class="btn-act">
                            <input type="submit" name="button" id="button-act" value="Registrar" />
                          </p>
                        </fieldset>
                      </form>
                    </div>
                  </div>
                  <!-- Fancybox! -->
                  <div id="agregar-egreso-popup" class="row">
                    <div class="form-pop-up form-pop  span5">
                      <form action="registrar-egreso.php" method="POST"  name="form1" class="form-editar">
                        <fieldset>
                          <legend>Registra un egreso</legend>
                          <p>
                            <label for="descripcion-tr">Descripción:</label>
                            <?php echo "<input type='text' name='descripcion_egreso' id='descripcion-tr' placeholder='Describe el egreso' required/>";?>
                          </p>
                          <p>
                            <label for="select-categoria-tr">Categoría: </label>
                            <select  name='id_categoria' id="select-categoria-tr" class="select-categoria">
                              <optgroup label="Categorías">
                                <?php 
                                  $seleccionar_categoria = mysql_query("SELECT * FROM categorias WHERE id_usuario = '$idUsuario'");
                                  while($categoria = mysql_fetch_assoc($seleccionar_categoria)){
                                    $c = $categoria['nombre_categoria'];
                                    $i = $categoria['id_categoria'];
                                    echo "<option value='".$i."'>".$c."</option>"; 
                                  }                     
                                ?>
                                
                              </optgroup>
                            </select>
                            <!--<?php //echo "<input type='text' name='apellido-perfil' id='apellido-edit' ' required/>";?>-->
                          </p>
                          <p>
                            <label for="monto-tr">Monto <?php echo "(".$simboloMoneda."):"; ?></label>
                            <?php echo "<input type='text' name='monto_egreso' id='monto-tr' class='moneda input' placeholder='Monto del egreso' required/>";?>
                          </p>
                          <p>
                            <label>Estado del pago:</label>
                            <input type="radio" value="1" name="estado" class="radio-tr" checked /> <span class="label-tr"> Valor cancelado </span>
                            <input type="radio" value="0" name="estado" class="radio-tr radio-tr-right" /> <span class="label-tr"> Valor en deuda </span>
                          </p>    
                          <p class="btn-act">
                            <input type="hidden" id="input-hidden" />
                            <input type="submit" name="button" id="button-act" value="Registrar" />
                          </p>
                        </fieldset>
                      </form>
                    </div>
                  </div>
                </div>
          </section>  
              <section id="tbl-transacciones">
                <div class="row-fluid">
                  <div id="tbl-resgistros-tr" class="center span11">
                    <table id="miTabla" class="tablesorter">
                      <thead>
                        <tr>
                            <td class="tbl-fecha">Fecha</td>
                            <td class="tbl-descripcion">Descripción</td>
                            <td class="tbl-categoria">Categoría</td>
                            <td class="tbl-monto">Monto</td>
                            <td class="tbl-ee">Editar/Eliminar</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $fecha_act = getdate();
                            $mes_act = $fecha_act['mon'];
                            $dia_act = $fecha_act['mday'];
                            $anio_act = $fecha_act['year'];
                            echo "  <tr>
                                      <td class='registro_fecha tbl-fecha-contenido strong'>01/".$mes_act."/".$anio_act."</td>
                                      <td class='tbl-descripcion-contenido strong'>Sueldo </td>
                                      <td class='tbl-categoria-contenido strong'> - </td>
                                      <td class='tbl-monto-contenido strong'>".$simboloMoneda.recuperar($sueldo, 'informacion_usuario')."</td>
                                      <td class='tbl-ee-contenido strong'> - </td>
                                    </tr>
                            ";

                            $seleccionar_egresos_fijos = mysql_query("SELECT * FROM egresos_fijos WHERE id_usuario = '$idUsuario'");
                              while($egreso_fijo = mysql_fetch_assoc($seleccionar_egresos_fijos)){
                                $dia_pago = $egreso_fijo['fecha_pago'];
                                if($dia_pago <= 9){
                                  $dia_pago = "0".$dia_pago;
                                }
                                $fecha_egreso_fijo = $dia_pago."/".$mes_act."/".$anio_act;
                                $descripcion_egreso_fijo = $egreso_fijo['concepto'];
                                $monto_egreso_fijo = $egreso_fijo['monto'];
                                $estado_egreso_fijo = $egreso_fijo['estado'];

                                if($dia_pago > $dia_act){
                                    echo "<tr>
                                            <td class='registro_fecha tbl-fecha-contenido strong'>".$fecha_egreso_fijo."</td>
                                            <td class='tbl-descripcion-contenido strong'>".$descripcion_egreso_fijo."</td>
                                            <td class='tbl-categoria-contenido strong'> - </td>
                                            <td class='tbl-monto-contenido tbl-deuda  strong'>".$simboloMoneda.$monto_egreso_fijo."</td>
                                            <td class='tbl-ee-contenido strong'> - </td>
                                          </tr>";
                                }else{
                                  echo "<tr class='tbl-cancelados'>
                                            <td class='registro_fecha tbl-fecha-contenido strong'>".$fecha_egreso_fijo."</td>
                                            <td class='tbl-descripcion-contenido strong'>".$descripcion_egreso_fijo."</td>
                                            <td class='tbl-categoria-contenido strong'> - </td>
                                            <td class='tbl-monto-contenido strong'>".$simboloMoneda.$monto_egreso_fijo."</td>
                                            <td class='tbl-ee-contenido strong'> - </td>
                                          </tr>";
                                }
                              }

                            $seleccionar_registros = mysql_query("SELECT * FROM egresos WHERE id_usuario = '$idUsuario'");
                              while($registros = mysql_fetch_assoc($seleccionar_registros)){
                                $f = $registros['fecha_egreso'];
                                $fecha_registro = date_create($f);
                                $dia_registro = date_format($fecha_registro, "d");
                                $mes_registro = date_format($fecha_registro, "m");
                                $anio_registro = date_format($fecha_registro, "Y");
                                $mostrar_fecha_registro = $dia_registro."/".$mes_registro."/".$anio_registro;
                                $c = $registros['concepto'];
                                $m = $registros['monto'];
                                $id_categoria = $registros['id_categoria'];
                                $estado_registro = $registros['estado'];

                                $id_egresos = $registros['id_egreso'];

                                $cat = mysql_query("SELECT * FROM categorias WHERE id_categoria = '$id_categoria'");
                                $ctg = mysql_fetch_assoc($cat);
                                
                                if($estado_registro == 1){
                                      echo "<tr class='tbl-cancelados'>
                                              <td class='registro_fecha tbl-fecha-contenido'>".$mostrar_fecha_registro."</td>
                                              <td class='tbl-descripcion-contenido'>".$c."</td>
                                              <td class='tbl-categoria-contenido'>".$ctg['nombre_categoria']."</td>
                                              <td class='tbl-monto-contenido'>".$simboloMoneda.$m."</td>
                                              <td class='tbl-ee-contenido'><a href='#popupWindow".$id_egresos."' class='btn edit'>Editar</a> <a href='#popupWindowEliminar".$id_egresos."' class='btn edit'>Eliminar</a></td>
                                            </tr>
                                          <div class='contenedor'>
                                             <div id='popupWindow".$id_egresos."'>
                                                <form method='post' action='actualizar_egresos_transacciones.php' class='form-edt-tr' />
                                                  <filedset>  
                                                    <legend class='strong'>Edita el egreso</legend>
                                                    <p>
                                                      <label class='strong'> Descripción: </label><input type='text' value='".$c."' name='descripcion_egreso' required />
                                                    </p>
                                                    <p>
                                                      <label class='strong'>Monto(".$simboloMoneda."): </label><input type='text' value='".$m."' name='monto_egreso' required />
                                                    </p>
                                                    <p>
                                                      <input type='hidden' value='".$id_egresos."' name='id_egreso' />
                                                      <button class='btn'>Guardar</button>
                                                    </p>
                                                  </fieldset>
                                                </form>
                                              </div>
                                           </div>

                                           <div class='contenedor'>
                                             <div id='popupWindowEliminar".$id_egresos."'>
                                                <form method='post' action='eliminar_egreso_transacciones.php' class='form-edt-tr' />
                                                  <filedset>  
                                                    <legend class='strong'>Eliminar egreso</legend>
                                                    <p>
                                                      <label> Está seguro que quiere eliminar:  <span class='strong'>".$c."</span>? </label>
                                                    </p>
                                                    <p>
                                                      <input type='hidden' value='".$id_egresos."' name='id_egreso' />
                                                      <button class='btn button-elmn'>Eliminar</button>
                                                    </p>
                                                  </fieldset>
                                                </form>
                                              </div>
                                           </div>"; 
                                }else{
                                    echo "<tr>
                                          <td class='registro_fecha tbl-fecha-contenido'>".$mostrar_fecha_registro."</td>
                                          <td class='tbl-descripcion-contenido'>".$c."</td>
                                          <td class='tbl-categoria-contenido'>".$ctg['nombre_categoria']."</td>
                                          <td class='tbl-monto-contenido tbl-deuda'>".$simboloMoneda.$m."</td>
                                          <td class='tbl-ee-contenido'><a href='#popupWindow".$id_egresos."' class='btn edit'>Editar</a> <a href='#popupWindowEliminar".$id_egresos."' class='btn edit'>Eliminar</a></td>
                                        </tr>

                                           <div class='contenedor'>
                                             <div id='popupWindow".$id_egresos."'>
                                                <form method='post' action='actualizar_deudas_transacciones.php' class='form-edt-tr' />
                                                  <filedset>  
                                                    <legend class='strong'>Edita el egreso</legend>
                                                    <p>
                                                      <label class='strong'> Descripción: </label><input type='text' value='".$c."' name='descripcion_egreso' required />
                                                    </p>
                                                    <p>
                                                      <label class='strong'>Monto(".$simboloMoneda."): </label><input type='text' value='".$m."' name='monto_egreso' required />
                                                    </p>
                                                    <p>
                                                      <label>Estado del pago:</label>
                                                      <input type='radio' value='1' name='estado' class='radio-tr' /> <span class='label-tr'> Valor cancelado </span>
                                                      <input type='radio' value='0' name='estado' class='radio-tr radio-tr-right' checked  /> <span class='label-tr'> Valor en deuda </span>
                                                    </p>  
                                                    <p>
                                                      <input type='hidden' value='".$id_egresos."' name='id_egreso' />
                                                      <button class='btn'>Guardar</button>
                                                    </p>
                                                  </fieldset>
                                                </form>
                                              </div>
                                           </div>

                                           <div class='contenedor'>
                                             <div id='popupWindowEliminar".$id_egresos."'>
                                                <form method='post' action='eliminar_egreso_transacciones.php' class='form-edt-tr' />
                                                  <filedset>  
                                                    <legend class='strong'>Eliminar egreso</legend>
                                                    <p>
                                                      <label> Está seguro que quiere eliminar:  <span class='strong'>".$c."</span>? </label>
                                                    </p>
                                                    <p>
                                                      <input type='hidden' value='".$id_egresos."' name='id_egreso' />
                                                      <button class='btn button-elmn'>Eliminar</button>
                                                    </p>
                                                  </fieldset>
                                                </form>
                                              </div>
                                           </div>"; 
                                }
                            }

                            $seleccionar_registros_ingresos = mysql_query("SELECT * FROM ingresos WHERE id_usuario = '$idUsuario'");
                              while($registros_ingresos = mysql_fetch_assoc($seleccionar_registros_ingresos)){
                                $fecha = $registros_ingresos['fecha_ingreso'];
                                $fecha_registro_ingreso = date_create($fecha);
                                $dia_registro_ingreso = date_format($fecha_registro_ingreso, "d");
                                $mes_registro_ingreso = date_format($fecha_registro_ingreso, "m");
                                $anio_registro_ingreso = date_format($fecha_registro_ingreso, "Y");
                                $mostrar_fecha_registro_ingreso = $dia_registro_ingreso."/".$mes_registro_ingreso."/".$anio_registro_ingreso;
                                $c_i = $registros_ingresos['concepto'];
                                $m_i = $registros_ingresos['monto'];

                                $id_ingresos = $registros_ingresos['id_ingreso'];

                                echo "<tr>
                                        <td class='registro_fecha tbl-fecha-contenido'>".$mostrar_fecha_registro_ingreso."</td>
                                        <td class='tbl-descripcion-contenido'>".$c_i."</td>
                                        <td class='tbl-categoria-contenido'> - </td>
                                        <td class='tbl-monto-contenido tbl-monto-ingreso'>".$simboloMoneda.$m_i."</td>
                                        <td class='tbl-ee-contenido'><a href='#popupWindowIngresos".$id_ingresos."' class='btn edit'>Editar</a> <a href='#popupWindowEliminarIngresos".$id_ingresos."' class='btn edit'>Eliminar</a></td>
                                    </tr>

                                     <div class='contenedor'>
                                             <div id='popupWindowIngresos".$id_ingresos."'>
                                                <form method='post' action='actualizar_ingresos_transacciones.php' class='form-edt-tr' />
                                                  <filedset>  
                                                    <legend class='strong'>Edita el ingreso</legend>
                                                    <p>
                                                      <label class='strong'> Descripción: </label><input type='text' value='".$c_i."' name='descripcion_ingreso' required />
                                                    </p>
                                                    <p>
                                                      <label class='strong'>Monto(".$simboloMoneda."): </label><input type='text' value='".$m_i."' name='monto_ingreso' required />
                                                    </p>
                                                    <p>
                                                      <input type='hidden' value='".$id_ingresos."' name='id_ingreso' />
                                                      <button class='btn'>Guardar</button>
                                                    </p>
                                                  </fieldset>
                                                </form>
                                              </div>
                                           </div>

                                           <div class='contenedor'>
                                             <div id='popupWindowEliminarIngresos".$id_ingresos."'>
                                                <form method='post' action='eliminar_ingreso_transacciones.php' class='form-edt-tr' />
                                                  <filedset>  
                                                    <legend class='strong'>Eliminar Ingresos</legend>
                                                    <p>
                                                      <label> Está seguro que quiere eliminar:  <span class='strong'>".$c_i."</span>? </label>
                                                    </p>
                                                    <p>
                                                      <input type='hidden' value='".$id_ingresos."' name='id_ingreso' />
                                                      <button class='btn button-elmn'>Eliminar</button>
                                                    </p>
                                                  </fieldset>
                                                </form>
                                              </div>
                                           </div>"; 
                              }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  </div>
              </section>
              <section id="legenda-tbl" class="center span11">
                <h3> Indicaciones para leer la tabla de transacciones</h3>
                <p>
                  * Los registros en <span class='strong'>negrita</span> indican egresos o ingresos fijos.
                </p>
                <p>
                  * <span class='cancelados'>Los registros en color mas claro ya han sido cancelados, y se ven directamente reflejados en el patrimonio.</span>
                </p>
                <p>
                  * Los montos en <span class='verde'>verde</span> indican ingresos, y se acreditan directamente al patrimonio.
                </p>
                <p>
                  * Los montos en <span class='rojo'>rojo</span> indican que aún no han sido pagados. Se suman al total a pagar.
                </p>
              </section>
              <section id="no-soporte">
                <h4>No hay soporte para esta resolución</h4>
                <p>Por favor utilice la version web.</p>
              </section>

        </section>
    <?php include('includes/footer-app.html'); ?>
</body>
</html>
