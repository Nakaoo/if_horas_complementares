@extends('layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Feedback</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.html">Home</a></li>
                    <li class="breadcrumb-item active">Feedback</li>
                </ol>
            </nav>
        </div>
        <div class="section">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Feedback da atividade</h5>

                            <form>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Atividade:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$viewData["hora"]->name}}"
                                            disabled />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Feedback:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" style="height: 100px" value="{{$viewData["hora"]->feedback}}" disabled></textarea>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="inputTime" class="col-sm-2 col-form-label">Carga horaria concedida:</label>
                                    <div class="col-sm-10">
                                        <input type="number" value="{{$viewData["hora"]->carga_horaria}}" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Status:</label>
                                    <div class="col-sm-10">
                                        @if($viewData["hora"]->id_status == "2")
                                        <input type="text" class="form-control" value="Aprovado" disabled />
                                        @else
                                        <input type="text" class="form-control" value="Rejeitado" disabled />
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
