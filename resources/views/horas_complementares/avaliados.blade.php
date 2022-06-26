@extends ('layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Atividades avaliadas</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.html">Home</a></li>
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
                                                <th scope="col">Avaliador</th>
                                                <th scope="col">Feedback</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Atividade</th>
                                                <th scope="col">Mais</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($viewData["horas"] as $hora)
                                                    <th scope="row">{{$hora->getId()}}</th>
                                                    @if($hora->photo == null)
                                                    <td><a href="" class="nav-profile">
                                                        <img src= "{{ URL::asset('img/defaultprofile.png') }}" width="45" max-height="36px" alt="Profile" class="rounded-circle">
                                                    </a>
                                                    </td>
                                                    @else
                                                    <td><a href="" class="nav-profile">
                                                        <img src="{{ asset('/storage/'.$hora->photo) }}" alt="Profile"
                                                            class="rounded-circle">
                                                    </a>
                                                    </td>
                                                    @endif
                                                     <td>{{$hora->feedback}}</td>
                                                    @if($hora->id_status == "2") 
                                                    <td><span class="badge bg-success">Aprovado</span></td>
                                                    @else
                                                    <td><span class="badge bg-danger">Rejeitado</span></td>
                                                    @endif
                                                    <td><a href="" class="text-primary">{{$hora->name}}</a></td>
                                                    <td>
                                                        <div class="filter-mais">
                                                            <a class="icon-mais" href="#" data-bs-toggle="dropdown"><i
                                                                    class="bi bi-search"></i></a>
                                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                <li><a class="dropdown-item" href="{{ route('horas_complementares.feedback', ['id'=>$hora->getId()]) }}">Ver avaliação completa</a></li>
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
