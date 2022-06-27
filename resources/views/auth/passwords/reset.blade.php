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
                                <h5 class="card-title text-center pb-0 fs-4">Resetar de senha</h5>
                                <p class="text-center small">Insira sua nova senha</p>
                            </div>

                            <form method="POST" action="{{ route('password.update') }}" class="row g-3 needs-validation">
                                <input type="hidden" name="token" value="{{ $token }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <label for="password" class="form-label">Senha</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" id="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="password_confirmation" class="form-label">Confirme sua senha</label>
                                    <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
              
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-success w-100" type="submit">Resetar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                        @endsection
