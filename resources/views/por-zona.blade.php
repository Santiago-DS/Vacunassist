<?php
$turnosporzona = DB::table('turnos')
->select('zonas.nombreZona', (DB::raw('count(id_zona) as cantidad')))
->rightjoin('zonas', 'zonas.id', '=', 'turnos.id_zona', 'estado', '=','aplicado')
->groupBy('zonas.id','zonas.nombreZona')->get();

$json=json_decode($turnosporzona);
$textos = array();
$valores = array();
for ( $contador = 0; $contador < ($turnosporzona->count()); $contador = $contador + 1 ) {
    array_push($textos, $json[$contador]->nombreZona);
    array_push($valores, $json[$contador]->cantidad);
}

$etiquetas = $textos;
$datosVentas = $valores;
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>home</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/libs/css/style.css">
        <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
        <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
        <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
        <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
        <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    </head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js">
        
    </script>

    <body>

        <div class="dashboard-main-wrapper">

            <div class="dashboard-header">
                <nav class="fixed-top">
                    @include('partials.nav')
                </nav>
            </div>

        @include('partials.menu-admin')

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Reportes</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Reportes</li>
                                            <li class="breadcrumb-item active" aria-current="page">Por Zona</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ecommerce-widget">
                        <div class="row justify-content-center">
                        <div class="row col-6">
                            <canvas id="grafica"></canvas>
                        </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        // Obtener una referencia al elemento canvas del DOM
                        const $grafica = document.querySelector("#grafica");
                        // Pasaamos las etiquetas desde PHP
                        const etiquetas = <?php echo json_encode($etiquetas) ?>;
                        // Podemos tener varios conjuntos de datos. Comencemos con uno
                        const datosVentas2020 = {
                            label: "Ventas por mes",
                            // Pasar los datos igualmente desde PHP
                            data: <?php echo json_encode($datosVentas) ?>,
                            backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                         'rgba(54, 162, 235, 0.2)',
                                         'rgba(255, 206, 86, 0.2)',
                                         'rgba(75, 192, 192, 0.2)',
                                         'rgba(153, 102, 255, 0.2)',
                                         'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                            };
                        new Chart($grafica, {
                            type: 'doughnut', // Tipo de gráfica
                            data: {
                                labels: etiquetas,
                                datasets: [
                                    datosVentas2020,
                                    // Aquí más datos...
                                ]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }],
                                },
                            }
                        });
                    </script>
                    
</html>