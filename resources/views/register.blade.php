<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.nav')
<body>
    <section style="background-color: rgb(158, 209, 168); padding-top:2%;">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-4">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registrate</p>
      
                    <form action="{{ route('register') }}" class="mx-1 mx-md-4" method="POST">
                        @csrf
                        <div class="d-flex flex-row align-items-center mb-2">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <label class="form-label">Nombre</label>
                            <input type="text" name='nombre' class="form-control"/>
                            @error('nombre') <small style="color: red" >*{{ $message }}</small> @enderror
                          </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-2">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label">Apellido</label>
                                <input type="text" name='apellido' class="form-control"/>
                                @error('apellido') <small style="color: red" >*{{ $message }}</small> @enderror

                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-2">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                              <label class="form-label">Correo</label>
                              <input type="email" name="email" class="form-control"/> 
                              @error('email') <small style="color: red" >*{{ $message }}</small> @enderror
   
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-2">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                              <label class="form-label">Dirección</label>
                              <input type="text" name='direccion' class="form-control"/>
                              @error('direccion') <small style="color: red" >*{{ $message }}</small> @enderror

                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-2">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                              <label class="form-label">Teléfono</label>
                              <input type="text" name='telefono' class="form-control"/>                           
                              @error('telefono') <small style="color: red" >*{{ $message }}</small> @enderror
  
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-3">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                              <label class="form-label">Contraseña</label>
                              <input type="password" name='password' class="form-control"/> 
                              @error('password') <small style="color: red" >*{{ $message }}</small> @enderror
 
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-3">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <label class="form-label">Repetir Contraseña</label>
                            <input name='password-confirm' type="password" class="form-control"/> 
                            @error('password-confirm') <small style="color: red" >*{{ $message }}</small> @enderror
 
                          </div>
                      </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                          <button type="submit" class="btn btn-primary btn-lg">Registrarse</button>
                        </div>
                    </div>
                    
                    <div class="col-md-10 col-lg-6 col-xl-7 f-flex align-items-center order-1 order-lg-2">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid">
                    <div class="d-flex flex-row align-items-right mb-2">

                      </div>
                        <div class="f-flex align-items-center mb-2">
                          <i class="fas fa-user fa-lg me-1 fa-fw"></i>
                          <div class="form-outline mb-4" style="margin-right: 70%">
                            <label class="form-label">Fecha de Nacimiento</label>
                            <input type="date" name='fecha_nacimiento' class="form-control"/> 
                            @error('fecha_nacimiento') <small style="color: red" >*{{ $message }}</small> @enderror
 
                        </div>
                        <div class="f-flex align-items-center mb-2">
                          <i class="fas fa-user fa-lg me-1 fa-fw"></i>
                          <div class="form-outline mb-0" style="margin-right: 70%">
                            <label class="form-label">Documento</label>
                            <input type="text" name='documento' class="form-control"/>  
                            @error('documento') <small style="color: red" >*{{ $message }}</small> @enderror

                          </div>
                          <div>
                            <br><br>
                            <label>¿Cúantas dosis tenés de la vacuna contra el COVID?</label><br><br>
                            <input type="checkbox" id="cbox1" value="first_checkbox"> Ningna</label><br><br>
                            <input type="checkbox" id="cbox1" value="first_checkbox"> 1 Dosis</label><br><br>
                            <input type="checkbox" id="cbox1" value="first_checkbox"> 2 Dosis</label><br><br>   
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
      </section>
</body>
</html>