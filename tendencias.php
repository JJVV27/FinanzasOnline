<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinanzasOnline | Estado General</title>
    <link rel="stylesheet" type="text/css" href="css/libs/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/libs/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/libs/bootstrap-responsive.min.css" />
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,700|Oleo+Script|Alef:700|Merriweather+Sans:700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <script src="js/libs/prefixfree.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="js/controlador.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {  
            
            var contenido = $("#contenido-ajax").html();

            if($.trim( $('#contenido-ajax').text() ).length === 0){
                $('#contenido-ajax').load('tendencias/mes_act.php');
            }

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
                <h2 class="titulo-app">Tendencias de gastos</h2>
                <h3 class="subt-app">Revisa la distribucion de tus gastos</h3>
                <ul id="nav">
                  <li><a href="general.php">General</a></li>
                  <li><a href="transacciones.php">Transacciones</a></li>
                  <li><a class="current-tab" href="#">Tendencias de gastos</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="row-fluid sombra-titulo"></section>
    <section class="row-fluid sombra-dos-titulo"></section>
    
    <section class="row-fluid">
        <section  class="container">
            <section id="contenido-ajax">

            </section>
            <section id="slider-content" class="span12">
                <div id="meses">
                    <span class="primer-mes">Enero</span>
                    <span class="febrero">Febrero</span>
                    <span class="marzo">Marzo</span>
                    <span class="abril">Abril</span>
                    <span class="mayo">Mayo</span>
                    <span class="junio">Junio</span>
                    <span class="julio">Julio</span>
                    <span class="agosto">Agosto</span>
                    <span class="sept">Septiembre</span>
                    <span class="oct">Octubre</span>
                    <span class="nov">Noviembre</span>
                    <span class="dic">Diciembre</span>
                </div>
                <div id="slider"></div>
            </section>
        </section>
    </section>
    <?php include('includes/footer-app.html'); ?>
</body>
</html>