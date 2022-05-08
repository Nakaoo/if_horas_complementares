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
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" required>

                      @error('email')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                    </div>

                    <div class="col-12">
                      <label for="prontuario" class="form-label">Seu prontuário</label>
                      <div class="input-group has-validation">
                        <input type="prontuario" name="prontuario" class="form-control" id="prontuario" required>
                        <div class="invalid-feedback">Por favor, insira seu prontuário!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="id_curso" class="form-label">Curso</label>
                        <select class="form-select" aria-label="Default select example" id="id_curso" name="id_curso">
                          <option value="ADS">Análise e desenvolvimento de sistemas</option>
                          <option value="ENA">Engenharia de Automação</option>
                          <option value="TEA">Tecnológo em Automação Industrial</option>
                        </select>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Senha</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Por favor, insira sua senha!</div>
                    </div>

                    <div class="col-12">
                      <label for="password-confirm" class="form-label">Confirme sua senha</label>
                      <input type="password" name="password_confirmation" class="form-control" id="password-confirm" required>
                      <div class="invalid-feedback">Por favor, insira sua senha!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-success w-100" type="submit">{{ __('Criar uma conta') }}</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Já tem uma conta? <a href="login.html">Conecte-se</a></p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
