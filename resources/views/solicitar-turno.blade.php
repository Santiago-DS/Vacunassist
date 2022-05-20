<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Solicitar turno</title>

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
    
    <body>


    <div class="dashboard-main-wrapper">
            <div class="dashboard-header">
                <nav class="fixed-top">
                    @include('partials.nav')  
                </nav>
            </div>
    
        @include('partials.menu')

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">


                            <div class="page-header">
                                <h2 class="pageheader-title">E-commerce Dashboard Template </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">E-Commerce Dashboard Template</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>

                            <div class="card">
                                <h5 class="card-header">Solicitar turno</h5>
                                <div class="card-body">
                                    <form action="{{ route('solicitar-turno') }}" method="POST">
                                        @csrf 
                                        <div class="form-group">
                                            <label for="inputUserName">Seleccione una vacuna</label>
                                            <select class="form-control" aria-label="Default select example" name="vacuna">
                                                    <?php $vacunas = DB::table('vacunas')->distinct()->get(); ?>
                                                    @foreach ($vacunas as $vacuna)
                                                      <option value ="{{ $vacuna->id }}"> {{ $vacuna->nombreVacuna }} </option>
                                                    @endforeach
                                              </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="inputUserName">Zona</label>
                                            <select class="form-control" aria-label="Default select example" name="zona">
                                                    <?php $zonas = DB::table('zonas')->distinct()->get(); ?>
                                                    @foreach ($zonas as $zona)
                                                      <option value ="{{ $zona->id }}"> {{ $zona->nombreZona }}</option>
                                                    @endforeach
                                              </select>
                                            
                                        </div>
                    
                                        <div class="form-group">
                                            <label for="inputRepeatPassword">Fecha del Turno</label>
                                            <input type="date" name="fecha" data-parsley-equalto="#inputPassword" required="" placeholder="Password" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary">Solicitar</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
                </div>
            </div>
            
        </div>
        
        </div>
        
        @include('partials.footer')
        </div>
    </body>

</html>




    
    <!-- ============================================================== -->
    <!-- end basic form -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->