    @extends('layouts.home')

    @section('content')
        <section id="hero"
            class="hero register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo2 d-flex align-items-center w-auto">
                                <img src="assets/img/if.png" alt="">
                                <span class="d-none d-lg-block">IFSP</span>
                            </a>
                        </div>

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Redefinir senha</h5>
                                    <p class="text-center small">Insira o endereço de E-mail cadastrado para recuperar a
                                        senha</p>
                                </div>

                                <form class="row g-3 needs-validation" method="POST" action="{{ route('password.email') }}" >
                                @csrf
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-success w-100" type="submit">Enviar link de redefinição de
                                            senha</button>
                                    </div>
                                    <div class="col-12">

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    @endsection
