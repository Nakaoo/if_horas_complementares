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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
  crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- CSS  -->
  <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>

<body>
      <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="{{ route('home.index') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('/img/if2.png') }}" alt="">
        <span>Horas Complementares</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{ route('register') }}">Cadastre-se</a></li>
          <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  <!-- Fim Header -->

    @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-8 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="assets/img/if2.png" alt="">
              <span>Horas Complementares</span>
            </a>
            <p>Instituto Federal de Educa????o, Ci??ncia e Tecnologia de S??o Paulo, <br>refer??ncia no ensino de Guarulhos.</p>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Endere??o</h4>
            <p>
              Av. Salgado Filho, 3501  <br>
              Centro, Guarulhos - SP, 07115-000
               <br><br>
              <strong>Telefone:</strong> (11) 2304-4250<br>
              <strong>E-mail:</strong> gru@ifsp.edu.br<br>
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- Fim Footer -->


  <!-- Vendor JS Files -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.1.1/tinymce.min.js" integrity="sha512-CKoBC+Fujntth+ZnjyUY7X5KLPNNyMH9Ynh7YURnI6shOTkNkOO/CnmDGEHZtXcyTQtJSqRk7wp9WvnQ1HLtwA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
