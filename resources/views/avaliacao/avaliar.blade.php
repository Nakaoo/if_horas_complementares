@extends('layouts.avaliacao')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Avaliar atividade</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home_avaliador.html">Home</a></li>
          <li class="breadcrumb-item"><a href="usuario_pendente.html">Atividades Pendentes</a></li>
          <li class="breadcrumb-item">Avaliar atividade</li>
        </ol>
      </nav>
    </div>

    <div class="section">
      <div class="row">
        <div class="col-lg-9">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Informações da atividade</h5>

              <form>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Atividade:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$viewData['hora']->getName()}}" disabled />
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label" >Data da atividade: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$viewData['hora']->getDataAtividade()}}" onfocus="(this.type='date')" disabled>

                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputTime" class="col-sm-2 col-form-label" >Carga Horaria:</label>
                  <div class="col-sm-10">
                    <input type="number" name="carga_horaria" class="form-control" value="{{$viewData['hora']->getCargaHoraria()}}" disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="categoria" class="col-sm-2 col-form-label">Categoria da atividade:</label>
                  <div class="col-sm-10">
                    <p>{{$viewData["nomeCategoria"]}}</p>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Descrição da Atividade:</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" placeholder="Trabalho para obter..." disabled ></textarea>
                  </div>
                </div>
                <!--
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Arquivo</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>-->
              </form>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Avaliar atividade</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" method="POST" action="{{route ('avaliacao.avaliacaoPost')}}" enctype="multipart/form-data">
                @csrf

                <div class="col-md-12">

                <div class="row mb-3">

                <input name="id_horas" type="hidden" value="{{$viewData['hora']->getId()}}" />

                <label for="inputFeedback" class="col-sm-2 col-form-label">Feedback:</label>
                  <div class="col-sm-10">
                    <textarea name="feedback" class="form-control" style="height: 100px"></textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputCarga" class="col-sm-2 col-form-label" >Carga horaria concedida:</label>
                  <div class="col-sm-10">
                    <input name="carga_horaria" type="number" value="{{$viewData['hora']->getCargaHoraria()}}" class="form-control">
                  </div>
                </div>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="id_status" id="gridRadios1" value="2" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Aprovado
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="id_status" id="gridRadios2" value="3">
                      <label class="form-check-label" for="gridRadios2">
                        Rejeitado
                      </label>
                    </div>
                  </div>
                </fieldset>

                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-success">Enviar</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>
      </div>
    </div>
  </div>


@endsection
