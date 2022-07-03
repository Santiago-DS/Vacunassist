<?php


$cantidadDeTurnosTotales =  DB::table('turnos')->select(DB::raw('count(*) as cantidad'))->get();
$cantidadDeTurnosTotalesjson=json_decode($cantidadDeTurnosTotales);

$cantTotal = $cantidadDeTurnosTotalesjson[0]->cantidad;


$turnosporzona = DB::table('turnos')
->select('zonas.nombreZona', (DB::raw('count(id_zona) as cantidad')))
->join('zonas', 'zonas.id', '=', 'turnos.id_zona')->where('estado', '=','aplicado')
->groupBy('zonas.id','zonas.nombreZona')->get();

$json=json_decode($turnosporzona);
$textos = array();
$valores = array();

array_push($textos, 'Turnos Totales');
array_push($valores, $cantTotal);

for ( $contador = 0; $contador < ($turnosporzona->count()); $contador = $contador + 1 ) {
    array_push($textos, $json[$contador]->nombreZona);
    array_push($valores, $json[$contador]->cantidad);
}

$etiquetas = $textos;
$datosVentas = $valores;

$cantidadDeTurnosAplicadosCovid =  DB::table('turnos')->select(DB::raw('count(*) as cantidad'))->where('id_vacuna', '=', 1)->where('estado', '=', 'aplicado')->get();
$cantidadDeTurnosAplicadosCovidjson = json_decode($cantidadDeTurnosAplicadosCovid);

$cantCovid = $cantidadDeTurnosAplicadosCovidjson[0]->cantidad;


$cantidadDeTurnosAplicadosfa =  DB::table('turnos')->select(DB::raw('count(*) as cantidad'))->where('id_vacuna', '=', 2)->where('estado', '=', 'aplicado')->get();
$cantidadDeTurnosAplicadosfajson = json_decode($cantidadDeTurnosAplicadosfa);

$cantFiebreAmarilla = $cantidadDeTurnosAplicadosfajson[0]->cantidad;

$cantidadDeTurnosCancelados =  DB::table('turnos')->select(DB::raw('count(*) as cantidad'))->where('estado', '=', 'cancelado')->get();
$cantidadDeTurnosCanceladosjson = json_decode($cantidadDeTurnosCancelados);

$cantCancelados = $cantidadDeTurnosCanceladosjson[0]->cantidad;


$valores=[$cantTotal,$cantCovid,$cantCancelados,$cantFiebreAmarilla];

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
    <style>
        .cont{
            text-align: center;
        }
        .titulo{
        font-size: xx-large;
        font-size: 18px; 
        color:#06463d; 
        font-family:Cursive;
        text-decoration:underline;
        text-transform:capitalize;
        text-align:center;
        text-indent:25px;
    }
    .sec{
        margin-left: 10px;
        margin-right: 35px;
        padding: 25px;
    }

    .jaja{
  border-radius: 10px;
  border-color: #84F4E9;
}

.ja{
  border-radius: 10px;
  border-color: #F9A8F4;
}
.btn-orange{
  background: #F9A8F4;

}
        </style>

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
                                            <li class="breadcrumb-item active" aria-current="page">Generales</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cont">
                        <a class="btn btn-info pull-right" style="margin-right: 5px;" target="_blank" href="{{ route('emitir-reporte-zona') }}"><i class="fa fa-download"></i>  Generar Reporte</a>
                        </div>
                    
                    <div class="ecommerce-widget">
                        <div class="row justify-content-center">
                            <div class="row col-4">
                                <div class="sec">
                                <h2 style="float: left;" class="titulo"> Vacunas aplicadas Y Cancelados</h2>
                                <canvas style="float: left;" id="myChart" width="300" height="300"></canvas>
                                </div>
                            </div>
                            <div class="row col-4">
                                <div class="sec">
                                <h2 style="float: right;" class="titulo"> Vacunas Aplicadas por zona</h2>
                                 <canvas style="float: right;" id="grafica" width="300" height="300"></canvas>
                            </div>
                            </div>
                        </div>
                    </div>
            <script>
                const ctx = document.getElementById('myChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'doughnut',
                    //doughnut
                    data: {
                        labels: ['Turnos totales','Aplicadas COVID', 'Turnos Cancelados', 'Aplicadas Fiebre Amarilla'],
                        datasets: [{
                            label: '# of Votes',
                            data: <?php echo json_encode($valores) ?>,
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
                        }]
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
            <script type="text/javascript">
                // Obtener una referencia al elemento canvas del DOM
                const $grafica = document.querySelector("#grafica");
                // Pasaamos las etiquetas desde PHP
                const etiquetas = <?php echo json_encode($etiquetas) ?>;
                // Podemos tener varios conjuntos de datos. Comencemos con uno
                const datosVentas2020 = {
                    label: "Cantidad Total",
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
                    type: 'bar', // Tipo de gráfica
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
                                    beginAtZero: false
                                }
                            }],
                        },
                    }
                });
            </script>


</html>