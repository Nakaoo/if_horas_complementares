@extends('layouts.home')

@section('content')

<main>
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo2 d-flex align-items-center w-auto">
                  <img src="{{ asset('/img/if.png') }}" alt="">
                  <span class="d-none d-lg-block">IFSP</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Crie a sua conta aqui</h5>
                    <p class="text-center small">Insira seus dados pessoais para criar uma conta</p>
                  </div>

                  <form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation">
                  @csrf
                    <div class="col-12">
                      <label for="name" class="form-label">Seu nome</label>
                      <input type="text" name="name" class="form-control" id="name" required>
                      <div class="invalid-feedback">Por favor, insira seu nome!</div>
                    </div>

                    <div class="col-12">
                      <label for="email" class="form-label">Seu email</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="col-12">
                      <label for="prontuario" class="form-label">Seu prontu??rio</label>
                      <div class="input-group has-validation">
                        <input type="prontuario" name="prontuario" class="form-control" id="prontuario" required>
                        <div class="invalid-feedback">Por favor, insira seu prontu??rio!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="id_curso" class="form-label">Curso</label>
                        <select class="form-select" aria-label="Default select example" id="id_curso" name="id_curso">
                          <option value="1">An??lise e desenvolvimento de sistemas</option>
                          <option value="2">Engenharia de Automa????o</option>
                          <option value="3">Tecnol??go em Automa????o Industrial</option>
                          <option value="4">Licenciatura em matem??tica</option>
                        </select>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Senha</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="col-12">
                      <label for="password-confirmation" class="form-label">Confirme sua senha</label>
                      <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="col-12">
                      <button class="btn btn-success w-100" type="submit">{{ __('Criar uma conta') }}</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">J?? tem uma conta? <a href="login.html">Conecte-se</a></p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
