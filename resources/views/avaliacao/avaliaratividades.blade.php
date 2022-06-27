@extends('layouts.avaliacao')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Atividades avaliadas</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Atividades avaliadas</li>
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
                                                <th scope="col"># </th>
                                                <th scope="col">Usuario</th>
                                                <th scope="col">Prontuario</th>
                                                <th scope="col">Feedback</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Atividade</th>
                                                <th scope="col">Mais</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($viewData['avaliacoes'] as $avaliacoes)
                                                <tr>
                                                    <th scope="row">{{$avaliacoes->id_horas}}</th>
                                                    <td><a href="" class="nav-profile">
                                                      <img src="{{ asset('/storage/'.$avaliacoes->photo) }}" width="36" alt="Profile"
                                                          class="rounded-circle">
                                                  </a>
                                                  </td>
                                                    <td>{{$avaliacoes->prontuario}}</td>
                                                    <td>{{$avaliacoes->feedback}}</td>
                                                    @if($avaliacoes->id_status == "2") 
                                                    <td><span class="badge bg-success">Aprovado</span></td>
                                                    @else
                                                    <td><span class="badge bg-danger">Rejeitado</span></td>
                                                    @endif
                                                    <td><a href="#" class="text-primary">{{$avaliacoes->name}}</a></td>
                                                    <td>
                                                        <div class="filter-mais">
                                                            <a class="icon-mais" href="#" data-bs-toggle="dropdown"><i
                                                                    class="bi bi-search"></i></a>
                                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                <li><a class="dropdown-item" href="{{route('avaliacao.editar', ['id'=>$avaliacoes->id])}}">Editar</a></li>
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
