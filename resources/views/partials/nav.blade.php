<a href="/">inicio</a>
@auth
<a href="/home">Home</a>
<form action="/logout" method="POST">
    @csrf
    <a href="#" onclick="this.closest('form').submit()">Salir</a>
</form>
@else
<a href="/login">Login</a>
<a href="/register">Registrarse</a>
@endauth
