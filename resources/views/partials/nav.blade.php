<head>
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/maicons.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<header>

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="/"><span class="text-primary">Vacun</span>Assist</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            @auth
            <li class="nav-item active">
              <a class="btn btn-primary ml-lg-3" href="/home">Home</a>
            </li>
            @else
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="/login">Login</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="/register">Register</a>
            </li>
            @endauth
            @auth
            <form action="/logout" method="POST">
                @csrf
                <a class="btn btn-danger ml-lg-3" href="#" onclick="this.closest('form').submit()">Cerrar Sesion</a>
            </form>
            @endauth
          </ul>
        </div> 
      </div>
    </nav>
  </header>