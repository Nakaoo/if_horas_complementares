@extends('layouts.app')
@section('content')

<form method="POST" action="{{ route('horas_complementares.editarPut', ['id'=> $viewData['hora']->getId()]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Atividade</label>
        <input name="name" type="text" class="form-control" aria-describedby="name" placeholder="Entre com a sua atividade" value="{{$viewData['hora']->getName()}}">
    </div>
    <div class="form-group">
        <label for="data_atividade">Data da atividade</label>
        <input name="data_atividade" type="date" min="01-01-2020" max="31-12-2030" placeholder="dd-mm-yyyy" class="form-control" id="data_atividade" value="{{$viewData['hora']->getDataAtividade()}}">
    </div>
    <div class="form-group">
        <label for="carga_horaria">Carga Horaria</label>
        <input name="carga_horaria" type="number" step=".01" class="form-control" id="carga_horaria" placeholder="Insira a quantidade de horas" value="{{$viewData['hora']->getCargaHoraria()}}">
    </div>
    <div class="form-group">
        <label for="categoria">Categoria da atividade</label>
       <select class="form-control" name="id_categoria" value="{{$viewData['hora']->getIdCategoria()}}">
           @foreach ($viewData["categorias"] as $categoria)
           @if ($viewData['hora']->getIdCategoria() == $categoria -> getId())
           <option value="{{$categoria -> getId()}}" selected>{{$categoria -> getName()}}</option>
           @else
           <option value="{{$categoria -> getId()}}">{{$categoria -> getName()}}</option>
           @endif
           @endforeach
       </select>
    </div>
    <div class="form-group">
        <h5>Arquivo</h5>
        <a href="{{ asset('/storage/'.$viewData['hora']->getArquivo()) }}"><img src="{{ URL::asset('images/pdf.png') }} " /></a>
        <input name="arquivo" type="file" class="form-control" id="arquivo" style="display:none;">
        <br/>
        <p>Arquivo: {{$viewData['hora']->getArquivo()}}</p>
        <label for="arquivo">Clique aqui para alterar</label>
    </div>
    <div class="form-group">
        <label for="informacoes">Informações</label><br/>
        <textarea id="informacoes" name="informacoes" rows="4" cols="50">
            {{$viewData['hora']->getInformacoes()}}
        </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
