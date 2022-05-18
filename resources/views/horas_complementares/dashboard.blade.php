@extends('layouts.app')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>

    <div class="section dashboard">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Carga horária necessária:<span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-info-circle text-primary"></i>
                    </div>
                    <div class="ps-3">
                        {{$viewData['horasNecessarias']}}
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Carga horária cumprida: <span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-check-circle text-success"></i>
                    </div>
                    <div class="ps-3">
                        {{$viewData['carga_cumprida']}}
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Atividades cadastradas: <span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                       <i class="bi bi-exclamation-circle text-warning"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$viewData['contagem']}}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Minhas Atividades: </h5>
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Atividade</th>
                        <th scope="col">Status</th>
                        <th scope="col">Deletar</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($viewData["horas"] as $hora)
                      <tr>
                        <th scope="row">{{$hora -> getDataAtividade()}}</th>
                        <td>{{$hora -> getInformacoes()}}</td>
                        <td><a href="{{ route('horas_complementares.editar', ['id'=>$hora->getId()]) }}" class="text-primary">{{$hora -> getName()}}</a></td>
                        <td><span class="badge bg-success"></span></td>
                        <td> <form action="{{ route('horas_complementares.deletar', $hora->getId())}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                Deletar
                            </button>
                         </form></td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Atividades recentes</h5>
              <div class="activity">
                <div class="activity-item d-flex">
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">

                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-size">
            <div class="card-body">
              <h1 class="card-title">Cadastrar horas</h1>

              <div class="add">
                <a href="{{route('horas_complementares.cadastrar') }}">
                  <center><button class="add-btn"></i>Adicionar</button></center>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
