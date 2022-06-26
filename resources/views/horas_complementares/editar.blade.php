@extends('layouts.app')
@section('content')
<main>
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Atividade </h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('horas_complementares.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item">Atividade</li>
            </ol>
          </nav>
        </div>

        <div class="section">
          <div class="row">
            <div class="col-lg-9">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Insira as informações</h5>
                  <form method="POST" action="{{ route('horas_complementares.editarPut', ['id'=> $viewData['hora']->getId()]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">Atividade</label>
                      <div class="col-sm-10">
                        <input type="text" value="{{$viewData['hora']->getName()}}" name="name" class="form-control" placeholder="Entre com a sua atividade"/>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="inputDate" class="col-sm-2 col-form-label">Data da atividade</label>
                      <div class="col-sm-10">
                        <input type="date" value="{{$viewData['hora']->getDataAtividade()}}" name="data_atividade" placeholder="dd-mm-yyyy" class="form-control">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="inputTime" class="col-sm-2 col-form-label">Carga Horaria</label>
                      <div class="col-sm-10">
                        <input type="number" name="carga_horaria" class="form-control" value="{{$viewData['hora']->getCargaHoraria()}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="categoria" class="col-sm-2 col-form-label">Categoria da atividade</label>
                      <div class="col-sm-10">
                        <select class="form-select" name="id_categoria">
                            @foreach ($viewData["categorias"] as $categoria)
                            @if ($viewData['hora']->getIdCategoria() == $categoria -> getId())
                            <option value="{{$categoria -> getId()}}" selected>{{$categoria -> getName()}}</option>
                            @else
                            <option value="{{$categoria -> getId()}}">{{$categoria -> getName()}}</option>
                            @endif
                            @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="informacoes" class="col-sm-2 col-form-label">Descrição da Atividade</label>
                      <div class="col-sm-10">
                        <textarea name="informacoes" class="form-control" style="height: 100px">
                            {{$viewData['hora']->getInformacoes()}}
                        </textarea>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputNumber" class="col-sm-2 col-form-label">Arquivo</label>
                      <div class="col-sm-10">
                        <a target="_blank" href="{{ asset('/storage/'.$viewData['hora']->getArquivo()) }}"><img src="{{ URL::asset('img/pdf.png') }} " /></a>
                        <input name="arquivo" type="file" class="form-control" id="arquivo" style="display:none;">
                        <br/>
                        <p>Arquivo: {{$viewData['hora']->getArquivo()}}</p>
                        <label for="arquivo">Clique aqui para alterar</label>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Editar</label>
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">Editar atividade</button>
                      </div>
                    </div>
                  </form>
                   </div>
@endsection
