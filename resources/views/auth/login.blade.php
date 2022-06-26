@extends('layouts.home')

@section('content')

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
          <div class="d-flex justify-content-center py-4">
            <a href="index.html" class="logo2 d-flex align-items-center w-auto">
              <img src="{{ asset('/img/if.png') }}" alt="">
              <span class="d-none d-lg-block">IFSP</span>
            </a>
          </div>

          <div class="card mb-3">

            <div class="card-body">

              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Faça login na sua conta</h5>
                <p class="text-center small">Digite seu endereço de E-mail e senha para entrar</p>
              </div>

              <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation">
                @csrf

                <div class="col-12">
                  <label for="email" class="form-label">E-mail</label>
                  <div class="input-group has-validation">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  </div>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="col-12">
                  <label for="password" class="form-label">Senha</label>
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="password">

                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>

                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="rememberMe">Lembre de mim</label>
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-success w-100" type="submit">Login</button>
                </div>
                <div class="col-12">
                  <p class="small mb-0">Esqueceu sua senha? <a href="">Clique aqui</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection
