<head>
    <meta charset="UTF-8">
    <link href="{{ asset('../css/navbar.css') }}" rel="stylesheet">
</head>
<a class="registro-inicio" href="/">inicio</a>
@auth
<a class="registro-inicio" href="/home">Home</a>
<form action="/logout" method="POST">
    @csrf
    <a class="registro-inicio" href="#" onclick="this.closest('form').submit()">Cerrar Sesion</a>
</form>
@else
<a class="registro-inicio" href="/login">Iniciar Sesion</a>
<a class="registro-inicio" href="/register">Registrarse</a>
@endauth
