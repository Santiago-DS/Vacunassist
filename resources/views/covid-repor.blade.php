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

$etiquetas = ['Total','Solicitados', 'Aplicados'];
$datosVentas = [25,15,8];
$datosVentas1 = [10,4,3];
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
            
 
        *,*:after,*:before{
      box-sizing: border-box;
    }
    
    html{
      box-sizing: inherit;
      background: linear-gradient(to left, #E8FFF9 , #eef2f3);
    }
    body{
      margin: 2% auto;
      font-family: Verdana;
    }
    .select-css {
      display: block;
      font-size: 16px;
      font-family: 'Verdana', sans-serif;
      font-weight: 400;
      color: #444;
      line-height: 1.3;
      padding: .4em 1.4em .3em .8em;
      width: 300px;
      max-width: 100%; 
      box-sizing: border-box;
      border: 1px solid #aaa;
      box-shadow: 0 1px 0 1px rgba(0,0,0,.03);
      border-radius: .3em;
      -moz-appearance: none;
      -webkit-appearance: none;
      appearance: none;
      background-color: #fff;
      background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
        linear-gradient(to bottom, #ffffff 0%,#f7f7f7 100%);
      background-repeat: no-repeat, repeat;
      background-position: right .7em top 50%, 0 0;
      background-size: .65em auto, 100%;
      
    cursor: pointer;
    }
    .select-css::-ms-expand {
      display: none;
    }
    .select-css:hover {
      border-color: #888;
    }
    .select-css:focus {
      border-color: #aaa;
      box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
      box-shadow: 0 0 0 3px -moz-mac-focusring;
      color: #222; 
      outline: none;
    }
    .select-css option {
      font-weight:normal;
    }
    
    
    .classOfElementToColor:hover {background-color:red; color:black}
    
    .select-css option[selected] {
        background-color: orange;
    }
    
    
    /* OTROS ESTILOS*/
    .styled-select { width: 240px; height: 34px; overflow: hidden; background: url(new_arrow.png) no-repeat right #ddd; border: 1px solid #ccc; }
    
     
    
    .sidebar-box select{
    display:block;
    padding: 5px 10px;
    height:42px;
    margin:10px auto;
    min-width: 225px;
    -webkit-appearance: none;
    height: 34px;
    /* background-color: #ffffff; */
    background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
        linear-gradient(to bottom, #ffffff 0%,#f7f7f7 100%);
      background-repeat: no-repeat, repeat;
      background-position: right .7em top 50%, 0 0;
      background-size: .65em auto, 100%;
      
    }
    
    .contenedor{
        background: #f5f0f0;
        padding: 20px;
        margin-left: 35%;
        width: 30%;
        border-radius: 30px;
    }
    
    .inputs{
        padding: 15px;
    }
    
    
    
    .b{
        padding: 20px;
        margin-left: 30%;
    }
    .cont{
            text-align: center;
            padding:15px;
        }
        .derecha{
            margin-left: 250px;
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
                                <h2 class="pageheader-title">Reportes - Vacunas aplicadas Covid</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Reportes</li>
                                            <li class="breadcrumb-item active" aria-current="page">Reportes - Vacunas aplicadas Covid</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cont">
                    <a class="btn btn-info ml-lg-3" target="_blank" href="{{ route('emitir-reporte-zona') }}">Generar Reporte</a>
                    </div> 
                    <div class="form-group">
                        <label for="inputUserName">Ver por zona</label>
                        <select class="select-css"  name="zona" id="select2" onchange="cambiarNombre()">
                            <option>Selecciona una opción</option>
                            <option value="">Todos</option>
                                <?php $zonas = DB::table('zonas')->distinct()->get(); ?>
                                @foreach ($zonas as $zona)
                                  <option id="p" value ="{{ $zona->id }}"> {{ $zona->nombreZona }}</option>
                                @endforeach
                          </select>
                    </div>
                    <div class="ecommerce-widget">
                        <div class="row justify-content">
                        <div class="row col-3">
                            <canvas id="grafica"></canvas>
                        </div>
                            
                    </div>

                            <div class="derecha">
                                <div class="f">
                                <h3 id="prueba"></h1>
                                <div class="row col-5">
                                <canvas id="grafica2"></canvas>
                                <canvas id="grafica3"></canvas>
                                </div>
                        </div>
                      
                        </div>
                    </div>
                    <script>
                        function cambiarNombre()
                        {
                        var seleccion=document.getElementById('select2');
                        document.getElementById('prueba').innerHTML= 'Zona:' + seleccion.options[seleccion.selectedIndex].text;
                        if (seleccion.options[seleccion.selectedIndex].value == 1) {
                        const $grafica2 = document.querySelector("#grafica2");
                        const etiquetas = ['Total','Soliticados','Aplicados'];
                        const datosVentas2020 = {
                            label: "Ventas por mes",
                            // Pasar los datos igualmente desde PHP
                            data: <?php echo json_encode($datosVentas) ?>,
                            backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                         'rgba(54, 162, 567, 0.2)',
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
                        new Chart($grafica2, {
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
                    }else
                    if (seleccion.options[seleccion.selectedIndex].value == 2) {
                        const $grafica3 = document.querySelector("#grafica3");
                        const etiquetas = ['Totalgg','Soliticadosgg','Aplicadosgg'];
                        const datosVentas2020 = {
                            label: "Ventas por mes",
                            // Pasar los datos igualmente desde PHP
                            data: <?php echo json_encode($datosVentas1) ?>,
                            backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                         'rgba(54, 162, 567, 0.2)',
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
                        new Chart($grafica3, {
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
                    }
                        
                    }

                        
                    </script>
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