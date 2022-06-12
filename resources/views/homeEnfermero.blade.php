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

        @include('partials.menu-enfermero')

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Gestión de Turnos</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Ver Turnos Pendientes</li>
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
                <?php $mytime = Carbon\Carbon::now()->format('Y-m-d');
                $mytimev = Carbon\Carbon::now()->format('d/m/Y');
                $zonaEnfermero = auth()->user()->id_zona;
                $nombreZona = DB::table('zonas')->select('nombreZona')->where('id', $zonaEnfermero)->first();
                ?>
                <h5 class="card-header">Turnos Pendientes - Fecha: <?php echo $mytimev ?>  - Zona: <?php  echo $nombreZona->nombreZona ?> </h5>
                <div class="card-body">
                <div class="container">
  <div class="row">
    <div class="col-12">
        <?php
            $id_usuario=auth()->id();
            $zonaEnfermero = auth()->user()->id_zona;
            $turnos = DB::table('turnos')
            ->select('turnos.id AS id_turno' , 'turnos.id_vacuna' , 'turnos.id_paciente AS id_paciente',
            'turnos.fecha' , 'turnos.id_zona' , 'vacunas.nombreVacuna' ,'turnos.id'
            , 'zonas.nombreZona' , 'users.name' , 'users.apellido' , 'users.fecha_nacimiento', 'users.documento')
            ->join('vacunas', 'vacunas.id', '=', 'turnos.id_vacuna')
            ->join('zonas', 'zonas.id', '=', 'turnos.id_zona')
            ->join('users', 'users.id', '=', 'turnos.id_paciente')
            ->where('turnos.id_zona' , $zonaEnfermero)
            ->where('fecha', strval($mytime))
            ->where('estado' , 'pendiente')
            ->get();
        ?>

    @if ($turnos->count())
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Nombre del Paciente</th>
            <th scope="col">Edad</th>
            <th scope="col">Vacuna</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($turnos as $turno)
        <tr>
            <td style="cursor: pointer" alt="ver detalle" onclick="datosPaciente('{{ $turno->id_paciente }}', '{{ $turno->name }}')">{{ $turno->name}} {{ $turno->apellido}}</td>
            <td>{{ Carbon\Carbon::parse($turno->fecha_nacimiento)->age; }}</td>
            <td>{{ $turno->nombreVacuna}}</td>
            <td>

                <form style="display: inline-block" action=" {{ route('registrar-aplicacion.registrarAplicacion',
                    ['id_turno'=>$turno->id_turno, 'id_paciente'=>$turno->id_paciente,
                    'id_vacuna'=>$turno->id_vacuna]) }}" method="GET" class="confirmar-presencia">

                    <button  type="submit" class="btn btn-success"><i class="fas fa-check">
                        </i> Confirmar</a>
                    </button>

                </form>

                <form style="display: inline-block" action="{{ route('registrar-ausencia.registrarAusencia',
                        ['id_turno'=>$turno->id_turno])
                        }}" method="GET" class="ausencia">

                    <button type="submit" class="btn btn-info"><i class="fas fa-frown"></i> Ausente</button>

                </form>





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

@if (session('segundoturno') == 'ok')
    <script>
        Swal.fire(
        'Turno automatico exitoso!',
        'Se generó el turno correctamente para la segunda dosis de covid .',
        'El turno ha sido confirmado, se cargo correctamente el lote y el laboratorio .',
        'success'
    )
    </script>
@endif

@if (session('cargalotelab') == 'ok')
    <script>
        Swal.fire(
        'El turno ha sido confirmado, se cargo correctamente el lote y el laboratorio .',
    )
    </script>
@endif


<script>

    $('.confirmar-presencia').submit(function(e){
        e.preventDefault();
        Swal.fire({
title: '¿Esta seguro de que desea registrar esta vacuna como aplicada?',
text: "Esta acción no puede deshacerse.",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Continuar',
cancelButtonText: 'Cancelar'
}).then((result) => {
if (result.isConfirmed) {
this.submit();
}
})
    });
</script>


<!-- HASTA ACA ESTA BIEN -->
<script>

    $('.ausencia').submit(function(e){
        e.preventDefault();
        Swal.fire({
title: '¿Esta seguro de que desea registrar este turno como ausente?',
text: "Esta acción no puede deshacerse.",
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




</html>

