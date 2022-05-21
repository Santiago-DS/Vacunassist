<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
</head>

@include('partials.nav')

<body>

    <section class="vh-100" style="background-color: rgb(158, 209, 168);">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-6">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-8">
                  <div class="row justify-content-center">
                    <div class="col-md-10">
                      <p class="text-center h1 fw-bold mb-11 mx-1 mx-md-12 mt-4">Ingresá</p>
                      <form class="mx-1 mx-md-4" method="POST">
                        @csrf
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <label class="form-label">Correo</label>
                            <input name="email" type="email" autofous value="{{ old('email') }}" class="form-control">
                            @error('email')<small style="color: red" class="error">*{{ $message }}</small>@enderror
                          </div>
                        </div>


                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <label class="form-label">Contraseña</label>
                            <input type="password" name='password' class="form-control">
                            @error('password')<small style="color: red" class="error">*{{ $message }}</small>@enderror
                          </div>
                        </div>


                        <div class="d-flex justify-content-left mx-0 mb-3 mb-lg-4">
                          <button type="submit" class="btn btn-primary btn-lg">Iniciar Sesión</button>
                        </div>

                      </form>

                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
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
