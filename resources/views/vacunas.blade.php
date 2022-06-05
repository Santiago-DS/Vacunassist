<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ver Turnos</title>

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
                                <h2 class="pageheader-title">Gestión de Vacunas <button type="submit" class="btn btn-success">
                                   Agregar Vacuna</button></h2>
                                
                                    
                                   
                                    <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Gestion de vacunas</li>
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
                <h5 class="card-header">Listado de vacunas </h5>
                <div class="card-body">
                <div class="container">
  <div class="row">
    <div class="col-12">
        <?php
            $id_usuario=auth()->id();
            $turnos = DB::table('vacunas')
            ->get();
        ?>

    @if ($turnos->count())
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Vacuna</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($turnos as $turno)
        <tr>
            <td>{{ $turno->nombreVacuna}}</td>
            

            <td>
                
                    <button type="submit" class="btn btn-info">
                        <i class="fa-solid fa-pen-clip"></i>Editar</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="far fa-trash-alt"></i>Eliminar</button>
                
            </td>
        </tr>
        @endforeach
        </tbody>
      </table>
      @else
      <td><span class="badge-dot badge-brand mr-1"></span> No hay turnos para mostrar</td>
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
    @if (session('eliminar') == 'ok')
    <script>
        Swal.fire(
        'Cancelado!',
        'El turno se cancelo correctamente.',
        'success'
    )
    </script>
@endif
    <script>

        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
  title: '¿Está seguro de cancelar el turno?',
  text: "el turno se cancelara definitivamente",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Aceptar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
    this.submit();
  }
})
        });
    </script>
@if (session('solicitar') == 'ok')
    <script>
        Swal.fire(
        'Turno exitoso!',
        'Se generó el turno correctamente.',
        'success'
    )
    </script>
@endif

@if (session('ninguna') == 'ok')
    <script>
        Swal.fire(
        'Turno exitoso!',
        'Se generó el turno correctamente para la primer dosis de covid.',
        'success'
    )
    </script>
@endif

@if (session('una_dosis') == 'ok')
    <script>
        Swal.fire(
        'Turno exitoso!',
        'Se generó el turno correctamente para la segunda dosis de covid.',
        'success'
    )
    </script>
@endif
</html>