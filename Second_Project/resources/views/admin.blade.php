<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina Administrador</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script type="text/javascript"
        src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/cliente.css">    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">

    <?php

        $dataPoints = array(
            array("label"=> "Cantidad de Clientes Registrados: ", "y"=> 10),
            array("label"=> "Cantidad de Productos Vendidos: ", "y"=> 5),
            array("label"=> "Monto total de Ventas: $", "y"=> 42),
        );
        
    ?>
    <script>
        //this is gonna fill the chart with information
        window.onload = function () {
        
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            title:{
                text: "Estadisticas del Administrador"
            },
            subtitles: [{
                text: "Usuarios de la tienda en ONlINE"
            }],
            data: [{
                type: "pie",
                showInLegend: "true",
                legendText: "{label}",
                indexLabelFontSize: 16,
                indexLabel: "{label} - #percent%",
                yValueFormatString: "฿#,##0",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
    
        }
    </script>

</head>
<body>

    <header>
        <nav>
            <div class="nav-wrapper">
            <a href="#" class="brand-logo">Pagina Administrador</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="productos.php">Productos</a></li>
                <li><a href="/categoria">Categorias</a></li>
                <li><a href="cerrar.php">Cerrar Sesión</a></li>
            </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <div id="chartContainer" style="height: 450px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </div>

</body>
</html>