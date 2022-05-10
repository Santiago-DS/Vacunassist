<a href="/">inicio</a>
@auth
<a href="/dashboard">dashboard</a>
<form action="/logout" method="POST">
    @csrf
    <a href="#" onclick="this.closest('form').submit()">Salir</a>
</form>
@else
<a href="/login">Login</a>
<a href="/register">Registrarse</a>
@endauth
