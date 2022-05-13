<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
	<link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>
    @include('partials.nav')
    <div class="container">
        <div class="screen_register">
            <div class="screen__content">
                <form action="{{ route('register') }}" class="login" method="POST">
                    @csrf
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" name="email" class="login__input" placeholder="Correo">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" name='password' class="login__input" placeholder="Contraseña">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="text" name='nombre' class="login__input" placeholder="Nombre">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="text" name='apellido' class="login__input" placeholder="Apellido">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="text" name='direccion' class="login__input" placeholder="Dirección">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="text" name='telefono' class="login__input" placeholder="Teléfono">
                    </div>
                    <label>Tiene dosis de covid aplicada?<br>
                        <input type="checkbox" id="cbox1" value="first_checkbox"> 
                        ningna</label><br>
                        <input type="checkbox" id="cbox1" value="first_checkbox"> 
                        1 dosis</label><br>
                        <input type="checkbox" id="cbox2" value="second_checkbox">
                         <label for="cbox2">2 dosis</label>	
                    <button type="submit" class="button register_submit">
                        <span class="button__text">Registrarse</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>			
                </form>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>
</body>
</html>




<!-- 

    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" name="email" class="login__input" placeholder="Correo">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" name='password' class="login__input" placeholder="Contraseña">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="text" name='nombre' class="login__input" placeholder="Nombre">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="text" name='apellido' class="login__input" placeholder="Apellido">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="text" name='direccion' class="login__input" placeholder="Dirección">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="text" name='telefono' class="login__input" placeholder="Teléfono">
                    </div>
                    <button type="submit" class="button login__submit">
                        <span class="button__text">Registrarse</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>				
                

                -->
                