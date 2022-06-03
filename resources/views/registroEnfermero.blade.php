<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <title>Home</title>
</head>


<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->

        <div class="dashboard-header">
            <nav class="fixed-top">
                @include('partials.nav')
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
            @if (auth()->user()->rol =='paciente')
                @include('partials.menu')
            @else
                @include('partials.menu-enfermero')
            @endif

        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        
                    </div>
                    <div class="container rounded bg-white mt-5 mb-5">
                        <div class="row">
                            <div class="col-md-3 border-right">
                                
                            </div>
                            <div class="col-md-5 border-right">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-center">Registrar Enfermero</h4>
                                    </div>
                                    <form action="{{ route('registroEnfermero') }}" class="mx-1 mx-md-4" method="POST">
                                    @csrf
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label class="labels">Nombre</label>
                                            <input type="text" name="name" class="form-control">
                                            @error('name')<small style="color: red" class="error">*{{ $message }}</small>@enderror

                                        </div>


                                        <div class="col-md-12"><label class="labels">Apellido</label><input type="text" name="apellido" class="form-control">
                                            @error('apellido')<small style="color: red" class="error">*{{ $message }}</small>@enderror

                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12"><label class="labels">Teléfono</label><input type="text" name="telefono"  class="form-control">
                                            @error('telefono')<small style="color: red" class="error">*{{ $message }}</small>@enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12"><label class="labels">Dirección</label><input type="text" name="direccion"  class="form-control">
                                            @error('direccion')<small style="color: red" class="error">*{{ $message }}</small>@enderror

                                        </div>

                                        <div class="col-md-12">
                                            <br>
                                            <label class="labels">Fecha de Nacimiento</label>
                                            <input type="date" name="fecha_nacimiento"  class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <br>
                                            <label class="labels">Email</label>
                                            <input type="email" name="email"  class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputUserName">Seleccione una zona</label>
                                            <select class="select-css"  name="zona">
                                                <option disabled>Selecciona una opción</option>
                                                    <?php $zonas = DB::table('zonas')->distinct()->get(); ?>
                                                    @foreach ($zonas as $zona)
                                                      <option value ="{{ $zona->id }}"> {{ $zona->nombreZona }}</option>
                                                    @endforeach
                                              </select>
                                        </div>
                                        <div class="col-md-12">
                                            <br>
                                            <label class="labels">DNI</label>
                                            <input type="text" class="form-control" name="documento">
                                        </div>

                                    </div>
                                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Guardar</button></div>
                                </div>
                            </div>
                        </form>
                        @if (session('editar') == 'ok')
    <script>
        Swal.fire(
        'Se guardaron los cambios!',
        'Se actualizó su perfil.',
        'success'
    )
    </script>
@endif



@if (session('editar') == 'no')
<script>
    Swal.fire(
    '¡Error!',
    'El DNI ya se encuentra en uso',
    'error'
)
</script>
@endif



                        </div>
                    </div>
                    </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->

                </div>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>


    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
</body>
</html>
