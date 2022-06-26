@extends('layouts.avaliacao')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Atividades Pendentes</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home_avaliador.html">Home</a></li>
                    <li class="breadcrumb-item active">Avaliar atividades</li>
                </ol>
            </nav>
        </div>

        <div class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body"><br>
                                    <div class="dataTable-search navbar">
                                        <form class="row g-3">
                                            <div class="col-auto">
                                                <input type="search" class="form-control" id="search"
                                                    placeholder="Procurar...">
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-success mb-3">Procurar</button>
                                            </div>
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
                                            @foreach ($viewData['atividades'] as $atividade)
                                                <tr>
                                                    <th scope="row">{{$atividade->data_atividade}}</th>
                                                    <td>{{$atividade->prontuario}}</td>
                                                    <td>{{$atividade->informacoes}}</td>
                                                    <td><a href="#" class="text-primary">{{$atividade->name}}</a></td>
                                                    <td><span class="badge bg-warning">Pendente</span></td>
                                                    <td>
                                                        <div class="filter-mais">
                                                            <a class="icon-mais" href="#" data-bs-toggle="dropdown"><i
                                                                    class="bi bi-search"></i></a>
                                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                <li><a class="dropdown-item"
                                                                        href="{{route('avaliacao.avaliar', ['id'=>$atividade->id_horas]) }}}}">Avaliar</a></li>
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
