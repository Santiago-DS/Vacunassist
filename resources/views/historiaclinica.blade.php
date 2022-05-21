<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ver Historia Clinica</title>

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
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <div class="page-header">
                                    <h2 class="pageheader-title">Historia Clínica</h2>
                                    <div class="page-breadcrumb">

                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Mis Vacunas</li>
                                            </ol>
                                        </nav>
                                            <br>
                                            <a class="btn btn-warning ml-lg-3" href="/formhistoriaclinica">Agregar</a>
                                            <a class="btn btn-danger ml-lg-3" target="_blank" href="{{ route('emitir-certificado') }}">Emitir Certificado</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="ecommerce-widget">

                <div class="row">
                    <div class="col-xl-5 col-lg-12 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Mis vacunas</h5>
                <div class="card-body">
                <div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha de vacunación</th>
          </tr>
        </thead>
        <tbody>
        <?php
            $id_usuario=auth()->id();
            $historiasclinica = DB::table('historiaclinica')->distinct()->join('vacunas', 'vacunas.id', '=', 'historiaclinica.id_vacuna')->where('id_paciente', $id_usuario)->get();
        ?>
        @foreach ($historiasclinica as $historiaclinica)
          <tr>
            <th scope="row">{{ $historiaclinica->nombreVacuna }}</th>
             <?php $date = date_create($historiaclinica->fecha)


             ?>
            <td><?php echo date_format($date,"d/m/Y") ?></td>
          </tr>
        @endforeach
        </tbody>
      </table>
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
