<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <title>@yield('title', 'Horas Complementares')</title>
</head>

<body>
  <!-- header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        </div>
        @guest
        <a class="nav-link active" href="{{ route('login') }}">Login</a>
        <a class="nav-link active" href="{{ route('register') }}">Register</a>
        @else
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" href="{{ route('horas_complementares.cadastrar') }}" )>Cadastrar horas</a>
          <a class="nav-link active" href="{{ route('horas_complementares.todasHoras') }}">Ver horas</a>
        <form id="logout" action="{{ route('logout') }}" method="POST">
          <a role="button" class="nav-link active" onclick="document.getElementById('logout').submit();">Logout</a>
          @csrf
        </form>
        @endguest
        <div class="vr bg-white mx-2 d-none d-lg-block"></div>
      </div>
    </div>
  </nav>

  <header class="masthead bg-primary text-white text-center py-4">
    <div class="container d-flex align-items-center flex-column">
      <h2>@yield('subtitle', 'IF Horas Complementares')</h2>
    </div>
  </header>
  <!-- header -->

  <div class="container my-4">
    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
</body>

</html>