@extends(Auth::user()->funcao == "avaliador" ? 'layouts.avaliacao' : 'layouts.app');

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Perfil</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home_avaliador.html">Home</a></li>
          <li class="breadcrumb-item active">Perfil</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{ asset('/storage/'.Auth::user()->getImagem()) }}" alt="Profile" class="rounded-circle">
              <h2>{{Auth::user()->getName()}}</h2>
              @if(Auth::user()->funcao == "avaliador")
              <h3>Avaliador</h3>
              @else
              <h3>Aluno</h3>
              @endif
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Visão geral</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Perfil</button>
                </li>


                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Mudar senha</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Detalhes de perfil</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nome completo</div>
                    <div class="col-lg-9 col-md-8">{{Auth::user()->getName()}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">E-mail</div>
                    <div class="col-lg-9 col-md-8">{{Auth::user()->email}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Prontuário</div>
                    <div class="col-lg-9 col-md-8">{{Auth::user()->prontuario}}</div>
                  </div>
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" action="{{route ('auth.editarFoto', ['id'=> Auth::user()->getId()])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Imagem de perfil</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="{{ asset('/storage/'.Auth::user()->getImagem()) }}" alt="Profile">
                        <div class="pt-2">
                          <div id="teste">
                          <label class="btn btn-primary btn-sm"  title="Atualizar a foto de perfil"><input class="inputfile" name="photo" type="file"/><i class="bi bi-upload"></i></label>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="text-center">
                      <button type="submit" class="btn btn-success">Salvar alterações</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                  <form method="POST" action="{{route ('auth.deletarFoto', ['id'=> Auth::user()->getId()])}}}}" enctype="multipart/form-data">
                    @method("PUT")
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" title="Remover a foto de perfil"><i class="bi bi-trash"></i></a>
                    </form>

                </div>


                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="POST" action="{{route ('auth.editarPassword', ['id'=> Auth::user()->getId()])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Senha atual</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="password" class="form-control" name="senhaAtual">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nova Senha</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="password" class="form-control" name="senhaNova">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Digite novamente a nova senha</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="password" class="form-control" name="confirmacaoSenha">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-success">Mudar senha</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

@endsection

