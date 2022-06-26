@extends('layouts.avaliacao')

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
        <div class="col-lg-12">
          <div class="row">

            <div class="col-xxl-6 col-md-6">
              <div class="card info-card revenue-card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li><a class="dropdown-item" href="usuario_avaliado.html">Ver todas</a></li>
                  </ul>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Atividades avaliadas <span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-check-circle text-success"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$viewData['atividades_avaliadas']}}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-6 col-md-6">
              <div class="card info-card sales-card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li><a class="dropdown-item" href="usuario_pendente.html">Avaliar atividades</a></li>
                  </ul>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Atividades pendentes <span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-info-circle text-primary"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$viewData['atividades_pendentes']->count()}}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Atividades Pendentes: </h5>
                  <div class="dataTable-search navbar">
                    <form class="form-inline">
                      <input class="form-control mr-sm-2" type="search" placeholder="Procurar..." aria-label="Search">
                    </form>
                  </div>
                  <table class="table table-borderless datatable">
                    <thead class="bg-light">
                      <tr>
                        <th scope="col">Data </th>
                        <th scope="col">Prontuario</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Atividade</th>
                        <th scope="col">Status</th>
                        <th scope="col">Mais</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($viewData["atividades_pendentes"] as $hora)
                      <tr>
                        <th scope="row">{{$hora -> getDataAtividade()}}</th>
                        <td>{{$hora -> getProntuario()}}</td>
                        <td>{{$hora -> getInformacoes()}}</td>
                        <td><a href="{{ route('avaliacao.avaliar', ['id'=>$hora->getId()]) }}" class="text-primary">Atividade {{$hora -> getId()}}</a></td>
                        <td><span class="badge bg-warning">Pendente</span></td>
                        <td>
                          <div class="filter-mais">
                            <a class="icon-mais" href="#" data-bs-toggle="dropdown"><i class="bi bi-search"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                              <li><a class="dropdown-item" href="{{route('avaliacao.avaliar', ['id'=>$hora->getId()])}}">Avaliar</a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   </main>

@endsection
