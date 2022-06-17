<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Actualizar Sede</title>

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

        @include('partials.menu-admin')

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="page-header">



                                <h2 class="pageheader-title">Asignación de Zonas</h2>



                                    <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Administración</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Asignación de Zonas</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="ecommerce-widget">

                <div class="row">
        <div class="col-xl-9 col-lg-8 col-md-11 col-sm-12 col-2">
            <div class="card">
                <h5 class="card-header">Listado de Enfermeros   </h5>
                <div class="card-body">
                <div class="container">
  <div class="row">
    <div class="col-12">
        <?php
            $enfermeros = DB::table('users')
            ->select('users.id AS id_enfermero', 'users.name', 'users.apellido', 'zonas.nombreZona')
            ->join('zonas', 'zonas.id', '=', 'users.id_zona')
            ->where('rol', '=' , 'enfermero')
            ->get();
        ?>

    @if ($enfermeros->count())
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Nombre y Apellido</th>
            <th scope="col">Sede Actual</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($enfermeros as $enfermero)
        <tr>
            <td>{{ $enfermero->name}} {{ $enfermero->apellido}}</td>

            <td>{{ $enfermero->nombreZona}}</td>

            <td>
                <form action="{{ route('form-actualizar-sede.actualizarSede', ['id_enfermero'=>$enfermero->id_enfermero]) }}" method="GET">
                    <button type="submit" class="btn btn-info"><i class="fa-solid fa-pen-clip"></i>Actualizar Sede</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
      </table>
    @else
      <td><span class="badge-dot badge-brand mr-1"></span> No hay enfermeros en el sistema</td>
    @endif
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



@if (session('sede-actualizada') == 'ok')
    <script>
        Swal.fire(
        'Sede actualizada!',
    )
    </script>
@endif

</html>
