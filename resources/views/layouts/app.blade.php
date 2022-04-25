<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title', 'IFSP Horas Complementares')</title>

    <!-- Icon -->
    <link href="{{ asset('/img/if.png') }}" rel="icon">

    <!-- Fonte -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Bootstrap CSS Arquivos -->
    <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- CSS  -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header2" class="header2 fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('horas_complementares.dashboard') }}" class="logo d-flex align-items-center">
        <img src="assets/img/if2.png" alt="">
        <span class="d-none d-lg-block">Horas complementares</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header2-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"></span>
          </a><!-- Perfil -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
                <form id="logout" action="{{ route('logout') }}" method="POST">
                    <a role="button" class="nav-link active" onclick="document.getElementById('logout').submit();"><span>Sair</span></a>
                    @csrf
                  </form>
            </li>
          </ul>
        </li>
      </ul>
    </nav>

  </header>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="{{ route('horas_complementares.dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('horas_complementares.cadastrar') }}">
          <i class="bi bi-card-list"></i>
          <span>Cadastrar horas</span>
        </a>
      </li>
    </ul>

  </aside>

  @yield('content');

</main>

  <!-- Vendor JS Files -->

  <script script src="{{ asset('/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/tinymce/tinymce.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
