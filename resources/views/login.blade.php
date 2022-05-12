<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
    @include('partials.nav')
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" method="POST">
                    @csrf
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input name="email" type="email" autofous value="{{ old('email') }}" class="login__input" placeholder="Email">
                    </div>
                    @error('email')<span class="error">{{ $message }}</span>@enderror
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" name='password' class="login__input" placeholder="Password">
                    </div>
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                    <button type="submit" class="button login__submit">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>				
                </form>
                <div class="social-login">
                    <h3>log in via</h3>
                    <div class="social-icons">
                        <a href="#" class="social-login__icon fab fa-instagram"></a>
                        <a href="#" class="social-login__icon fab fa-facebook"></a>
                        <a href="#" class="social-login__icon fab fa-twitter"></a>
                    </div>
                </div>
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