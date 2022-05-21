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
  text-align: center;
  font-size: 14px;
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
  width: 400px;
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
  
        </style>
       
    
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
                                <h2 class="pageheader-title">Gestión de Turnos</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Solicitar Turno</li>
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
                                           
                                            <select class="select-css" name="vacuna">
                                                <option disabled>Selecciona una opción</option>
                                                    <?php 
                                                    $id = auth()->id();
                                                    $vacunasdelusuario = DB::table('turnos')->select('turnos.id_vacuna')->where('id_paciente', $id)->where('estado' , 'pendiente')->get(); 
                                                    $array_vacunasdelusuario = str_split($vacunasdelusuario);
                                                    ?>
                                                    <?php $vacunas = DB::table('vacunas')->whereNotIn('id', $array_vacunasdelusuario)->get()?>
                                                    @foreach ($vacunas as $vacuna)
                                                      <option value ="{{ $vacuna->id }}"> {{ $vacuna->nombreVacuna }} </option>
                                                    @endforeach
                                              </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputUserName">Seleccione una zona</label>
                                            <select class="select-css"  name="zona">
                                                <option disabled>Selecciona una opción</option>
                                                    <?php $zonas = DB::table('zonas')->distinct()->get(); ?>
                                                    @foreach ($zonas as $zona)
                                                      <option value ="{{ $zona->id }}"> {{ $zona->nombreZona }}</option>
                                                    @endforeach
                                              </select>

                                        </div>

                                        <div class="form-group">
                                            <label for="inputRepeatPassword">Fecha del Turno</label>
                                            <?php $mytime = Carbon\Carbon::now(); ?>
                                            <input type="date" name="fecha" data-parsley-equalto="#inputPassword" required="" placeholder="Password" min=<?php echo $mytime->toDateString();?> max="2024-01-01" class="readonly">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
            
                                            </div>
                                        </div>
                                                
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


<script>
    $(".readonly").keydown(function(e){
       e.preventDefault();
   });
   </script>


    <!-- ============================================================== -->
    <!-- end basic form -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
