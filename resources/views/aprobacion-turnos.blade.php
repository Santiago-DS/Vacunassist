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
        <h5 class="card-header">Turnos Fiebre Amarilla pendientes de aprobación:</h5>
        <div class="card-body">
        <div class="container">
<div class="row">
<div class="col-12">
<?php

    $turnos = DB::table('turnos')
    ->select('turnos.id AS id_turno' , 'turnos.id_vacuna' , 'turnos.id_paciente AS id_paciente',
    'turnos.fecha' , 'turnos.id_zona' , 'vacunas.nombreVacuna' ,'turnos.id'
    , 'zonas.nombreZona' , 'users.name' , 'users.apellido' , 'users.fecha_nacimiento'
    , 'users.documento' , 'users.telefono')
    ->join('vacunas', 'vacunas.id', '=', 'turnos.id_vacuna')
    ->join('zonas', 'zonas.id', '=', 'turnos.id_zona')
    ->join('users', 'users.id', '=', 'turnos.id_paciente')
    ->where('turnos.id_vacuna' , '2')
    ->where('turnos.estado' , 'aprobacion')
    ->get();
?>

@if ($turnos->count())
<table class="table table-bordered">
<thead>
  <tr>
    <th scope="col">Nombre del Paciente</th>
    <th scope="col">Edad</th>
    <th scope="col">Documento</th>
    <th scope="col">Teléfono</th>
    <th scope="col">Vacuna</th>
    <th scope="col">Acciones</th>
  </tr>
</thead>
<tbody>
@foreach ($turnos as $turno)
<tr>
    <td style="cursor: pointer" alt="ver detalle" onclick="datosPaciente('{{ $turno->id_paciente }}', '{{ $turno->name }}')">{{ $turno->name}} {{ $turno->apellido}}</td>
    <td>{{ Carbon\Carbon::parse($turno->fecha_nacimiento)->age; }}</td>
    <td>{{ $turno->documento}}</td>
    <td>{{ $turno->telefono}}</td>
    <td>{{ $turno->nombreVacuna}}</td>
    <td>

        <form style="display: inline-block" action=" {{ route('confirmar-turno.confirmarTurno',
            ['id_turno'=>$turno->id_turno]) }}" method="GET" class="confirmar-turno">
            <button  type="submit" class="btn btn-success"><i class="fas fa-check">
                </i> Confirmar</a>
            </button>
        </form>

        <form style="display: inline-block" action="{{ route('denegar-turno.denegarTurno',
                ['id_turno'=>$turno->id_turno])
                }}" method="GET" class="denegar-turno">

            <button type="submit" class="btn btn-danger"><i class="fas fa-ban"></i> Rechazar</button>

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
</body>

<script>

    $('.confirmar-turno').submit(function(e){
        e.preventDefault();
        Swal.fire({
title: '¿Está seguro de confirmar este turno?',
text: "El turno será confirmado y aparecerá como pendiente en el la vista del paciente.",
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

@if (session('confirmar-turno') == 'ok')
<script>
    Swal.fire(
    'Turno confirmado!'
)
</script>
@endif




<script>

    $('.denegar-turno').submit(function(e){
        e.preventDefault();
        Swal.fire({
title: '¿Está seguro de rechazar este turno?',
text: "El turno será rechazado.",
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

@if (session('denegar-turno') == 'ok')
<script>
    Swal.fire(
    'Turno rechazado!'
)
</script>
@endif

