<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- CSS -->
<link rel="stylesheet" href="../assets/css/maicons.css">
<link rel="stylesheet" href="../assets/css/bootstrap.css">
<link rel="stylesheet" href="../assets/css/theme.css">
<body>
    <section style="background-color: rgb(158, 209, 168); padding-top:2%;">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-4">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Completa tu Información</p>

                    <form action="{{ route('turno-automatico-registro') }}" class="mx-1 mx-md-4" method="POST">
                        @csrf

                          <div>

                          
                            <label>¿Cúantas dosis tenés de la vacuna contra el COVID?</label><br><br>
                            <input type="checkbox" id="uno" name="ninguna" onclick="javascript:seleccionar();">
                            <label for="uno">Ninguna</label><br><br>

                         
                            <input type="checkbox" id="dos" name="una_dosis" onclick="javascript:seleccionar();"">
                            <label for="dos">1 Dosis</label>
                            <?php $mytime = Carbon\Carbon::now(); ?>
                            <p>Fecha de Aplicacion</p>
                            <input type="date" max=<?php echo $mytime->toDateString();?> name="fecha_primera">

                            <br><br>
                            <input type="checkbox" id="tres" name="dos_dosis" onclick="javascript:seleccionar();">
                            <label for="tres">2 Dosis</label>
                            <p>Fechas de Aplicacion</p>
                            <input type="date" min='2020-01-01' max=<?php echo $mytime->toDateString();?> name="fecha_primera_dos">
                            <input type="date" min='2020-01-01' max=<?php echo $mytime->toDateString();?> name="fecha_segunda">

                            <!-- <input type="checkbox" name="una_dosis" value="2"><br><br>
                            <label>Fecha de aplicación de la primera dosis</label>
                            <input type="date" name="fecha_primera" value="2"><br><br> -->


                            <br><br>
                            <button type="submit" class="btn btn-primary btn-lg"> Aceptar </button>
                          </div>
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
      </section>
</body>
</html>
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script>
  function seleccionar() {
    $("#uno").on('change', function(ev){
      ev.preventDefault();
     
      $("#uno").prop("checked", true);
      $("#dos").prop("checked", false);
      $("#tres").prop("checked", false);

    });

    $("#dos").on('change', function(ev){
      ev.preventDefault();
     
      $("#dos").prop("checked", true);
      $("#uno").prop("checked", false);
      $("#tres").prop("checked", false);

    });

    $("#tres").on('change', function(ev){
      ev.preventDefault();
     
      $("#tres").prop("checked", true);
      $("#uno").prop("checked", false);
      $("#dos").prop("checked", false);

    });
  }
</script>
