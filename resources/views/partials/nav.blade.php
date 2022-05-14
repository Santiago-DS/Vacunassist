<head>
    <meta charset="UTF-8">
    <link href="{{ asset('../css/navbar.css') }}" rel="stylesheet">
</head>
<a class="btn" href="/">inicio</a>
@auth
<a class="btn" href="/home">Home</a>
<form action="/logout" method="POST">
    @csrf
    <a class="btn" href="#" onclick="this.closest('form').submit()">Cerrar Sesion</a>
</form>
@else
<a class="btn" href="/login">Iniciar Sesion</a>
<a class="btn" href="/register">Registrarse</a>
@endauth
