
 <script type="text/javascript">
 $(document).ready(function(){
            
            var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
            var fecha = new Date();
            var anio = fecha.getFullYear();
            mes= 4;

            $( "#slider" ).slider({
              range: "max",
              min: 1,
              max: 12,
              value: mes,
              slide: function( event, ui ) {
                var mes_seleccionado = ui.value;
                mes_selec = mes_seleccionado - 1;
                $( "#mes-mostrado" ).text(meses[mes_selec]);
                $("#mes-mostrado").append(', ' + anio);
                 $('#contenido-ajax').load('tendencias/'+ meses[mes_selec]+ '.php');

            }
        });
        var valor = $( "#slider" ).slider("value");
        valor = valor - 1;
        $( "#mes-mostrado" ).text( meses[valor]);
        $("#mes-mostrado").append('/' + anio);  
 });                            
    </script>         
<?php   require_once('../server/funciones.php'); 
        $mes_actual = 4; 
        $totalPagadoMes = totalPagadoMesEf($mes_actual) + totalPagadoMes('egresos', $mes_actual);
        $totalCat = totalPagadoMes('egresos', $mes_actual);

?>    
<section id="tendencias-top">
        <h3>Tus gastos <span class="pagos-mes total-pagos-mes">(<?php echo $simboloMoneda.$totalPagadoMes; ?>)</span></h3>
                    <div class="data-tendencias-top">
                        <span class="pagos-mes"><strong>Egresos</strong> <?php echo $simboloMoneda.totalPagadoMes('egresos', $mes_actual); ?></span>
                        <span class="pagos-mes"><strong>Egresos fijos</strong> <?php echo $simboloMoneda.totalPagadoMesEf($mes_actual); ?></span>
                        <span class="right" id='mes-mostrado'></span>
                    </div>
                </section>
                <section id="content-tendencias">
                    <div class="container">
                        <div id="grafico-estadistico" class="span7">
                            <h4>Gráfico detalle de gastos por categoria mensual</h4>
                             <?php 
                                $grafico = mysql_query("SELECT * FROM categorias WHERE id_usuario = '$idUsuario'");
                                        $color_bar = array("1", "2", "3", "4", "5", "6", "7", "8");
                                        $color_picker = 0;
                                        while($graf = mysql_fetch_assoc($grafico)){
                                            
                                            $id_categoria= $graf["id_categoria"];
                                            $nombre_categoria= $graf["nombre_categoria"];

                                            switch ($color_bar[$color_picker]) {
                                             case '1':
                                                    $color = "#ff00";
                                                    break;
                                                
                                                case '2':
                                                    $color = "#e23702";
                                                    break;
                                                case '3':
                                                    $color = "#edb801";
                                                    break;
                                                case '4':
                                                    $color = "#350095";
                                                    break;
                                                case '5':
                                                    $color = "#888";
                                                    break;
                                                case '6':
                                                    $color = "#950066";
                                                    break;
                                                case '7':
                                                    $color = "#438801";
                                                    break;
                                                case '8':
                                                    $color = "#002f47";
                                                    break;
                                            }

                                           $gasto_porcentual = gastosCategoriaT($id_categoria, $totalCat, $mes_actual);

                                            echo "<label><strong> ".$nombre_categoria."</strong> </label>
                                                  <div class='progress'> 
                                                    <div class='bar' style='width:".$gasto_porcentual."%; background: ".$color."'>".$gasto_porcentual."% </div>
                                                  </div>
                                                  ";

                                            $color_picker ++;
                                            
                                        } 
                                              
                                     ?>
                        </div>
                        <div class="offset1 span4" id="tabla-gastos-tendencias">
                            <h4>Tabla de detalle de gastos mensuales</h4>
                            <table>
                                <thead>
                                    <tr class="cabecera">
                                        <td>Gasto</td>
                                        <td class='data-center'>Monto(<?php echo $simboloMoneda; ?>)</td>
                                    </tr>
                                </thead>
                                <tbody id="tbl-contenido-tendencias">
                                    <?php 
                                        $gastos = mysql_query("SELECT * FROM egresos WHERE id_usuario = '$idUsuario'");
                                        while($gasto = mysql_fetch_assoc($gastos)){
                                            $concepto_tendencia = $gasto["concepto"];
                                            $monto_tendencia = $gasto["monto"];
                                            $estado = $gasto['estado'];

                                            $fecha_tendencia = $gasto["fecha_egreso"];
                                            $fecha = date_create($fecha_tendencia);
                                            $mes_tendencia = date_format($fecha, "m");
                                            $mes_tendencia = substr($mes_tendencia, 1);

                                           // <td> ".$monto_tendencia."</td>
                                            if($mes_tendencia == $mes_actual && $estado == 1){
                                                echo "  <tr>
                                                            <td class='data-border-rg'> ".$concepto_tendencia."</td>
                                                            <td class='data-center'> ".$monto_tendencia."</td>
                                                        </tr>";
                                            }
                                            
                                        }       
                                     ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
               <!-- <section id="reporte">
                    <div class='container'>
                        <div class="span12">
                            <div id="descarga-reporte">
                                <a href="#"><h4>Descargar reporte del mes <span></span></h4></a> 
                            </div>
                        </div>
                    </div>
                </section>-->