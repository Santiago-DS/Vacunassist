
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
        <?php
            


            //$zonas = DB::table('zonas')->select('nombreZona')->get();
            
            //$result = json_decode($zonas, true);

            //@foreach 
              //  $flowers = array();
               // ($zonas as $zona)
               // array_push($flowers , $zona->nombreZona);
            //@endforeach
            
            //$array_num = count($zonas);
            //$zonaaas = str_split($zonas);
            
            //$hola = json_decode($zonas);
           
  
            $turnosporzona = DB::table('turnos')
            ->select('zonas.nombreZona', (DB::raw('count(*) as cantidad')))
            ->join('zonas', 'zonas.id', '=', 'turnos.id_zona')
            ->groupBy('zonas.id','zonas.nombreZona')->get();
            
            $etiquetass = ["Cementerio Municipal","Cementerio Municipal","Cementerio Municipal"];

            $json=json_decode($turnosporzona);
            $textos = array();
            $valores = array();
            for ( $contador = 0; $contador < ($turnosporzona->count()); $contador = $contador + 1 ) {
                array_push($textos, $json[$contador]->nombreZona);
                array_push($valores, $json[$contador]->cantidad);
            }

            //array_push($textos, $json[0]->nombreZona);
            //array_push($valores, $json[0]->cantidad);
#Prueba... NÓTESE que NO usamos $Datos, sino $json
        
            //$result = mysqli_query($turnosporzona);
            //$aa = mysqli_fetch_all($result );

            //$array = json_encode( $turnosporzona );
            //$array2 = explode(",", $array);
            //$result = (array) $array;


            //$thearray = get_object_vars( $turnosporzona );
            //$array = json_encode( $turnosporzona );
            //$vect = explode ( $array, 'nombreZona ' );
           // $vect = preg_split ('nombreZona',$array);
           // $porZona = DB::table('zonas')
            //->select('zonas.nombreZona as Zona', 'count()')
            //->join('turnos', 'zonas.id', '=', 'turnos.id_zona')
            //->where('turnos.estado' , 'aplicado')
        ?>



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
                               
                                
                                <?php //echo gettype($array );
                                //var_dump($json[0]->nombreZona);
                                print_r($textos);
                                
                                 ?>
                                 <br>
                                 <?php //echo gettype($array );
                                 //var_dump($json[0]->nombreZona);
                                 print_r($etiquetass);
                                  ?>
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
                    <script>
                        /*
                    Encierro todo en una función asíncrona para poder usar async y await cómodamente
                    https://parzibyte.me/blog
                    */
                    (async () => {
                        // Llamar a nuestra API. Puedes usar cualquier librería para la llamada, yo uso fetch, que viene nativamente en JS
                        const respuestaRaw = await fetch("{{ route('obtenerdatos') }}");
                        
                        
                        // Decodificar como JSON
                        const respuesta = await respuestaRaw.json();
                        // Ahora ya tenemos las etiquetas y datos dentro de "respuesta"
                        // Obtener una referencia al elemento canvas del DOM
                        const $grafica = document.querySelector("#grafica");
                        const etiquetas = respuesta.etiquetas; // <- Aquí estamos pasando el valor traído usando AJAX
                        // Podemos tener varios conjuntos de datos. Comencemos con uno
                        const datosVentas2020 = {
                            label: "Ventas por mes",
                            // Pasar los datos igualmente desde PHP
                            data: respuesta.datos, // <- Aquí estamos pasando el valor traído usando AJAX
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
                            type: 'doughnut', // Tipo de gráfica type: 'polarArea'
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
                    })();
                    </script>

                    <script>
                       // const ctx = document.getElementById('myChart').getContext('2d');
                       // const myChart = new Chart(ctx, {
                       //     type: 'bar',
                           // data: {
                           //     labels: ['Cementerio Municipal', 'Municipalidad', 'Terminal Omnibus'],
                            //     datasets: [{
                            //         label: '# of Votes',
                            //         data: [30, 60, 3],
                            //         backgroundColor: [
                            //             'rgba(255, 99, 132, 0.2)',
                            //             'rgba(54, 162, 235, 0.2)',
                            //             'rgba(255, 206, 86, 0.2)',
                            //             'rgba(75, 192, 192, 0.2)',
                            //             'rgba(153, 102, 255, 0.2)',
                            //             'rgba(255, 159, 64, 0.2)'
                            //         ],
                             //        borderColor: [
                             //            'rgba(255, 99, 132, 1)',
                             //            'rgba(54, 162, 235, 1)',
                              //           'rgba(255, 206, 86, 1)',
                               //          'rgba(75, 192, 192, 1)',
                              //           'rgba(153, 102, 255, 1)',
                                //         'rgba(255, 159, 64, 1)'
                                //     ],
                                   //  borderWidth: 1
                               //  }]
                            // },
                          //   options: {
                          //       scales: {
                          //           y: {
                          //               beginAtZero: true
                          //           }
                          //       }
                          //   }
                      //   });
                        </script>
</html>