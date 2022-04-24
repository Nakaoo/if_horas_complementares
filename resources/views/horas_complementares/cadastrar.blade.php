@extends('layouts.app')
@section('content')

<form method="POST" action="{{route ('horas_complementares.cadastrarPost')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Atividade</label>
        <input name="name" type="text" class="form-control" aria-describedby="name" placeholder="Entre com a sua atividade">
    </div>
    <div class="form-group">
        <label for="data_atividade">Data da atividade</label>
        <input name="data_atividade" type="date" min="01-01-1999" max="31-12-2099" placeholder="dd-mm-yyyy" class="form-control" id="data_atividade">
    </div>
    <div class="form-group">
        <label for="carga_horaria">Carga Horaria</label>
        <input name="carga_horaria" type="number" step=".01" class="form-control" id="carga_horaria" placeholder="Insira a quantidade de horas">
    </div>
    <div class="form-group">
        <label for="categoria">Categoria da atividade</label>
       <select class="form-control" name="id_categoria">
           @foreach ($viewData["categorias"] as $categoria)
           <option value="{{$categoria -> getId()}}">{{$categoria -> getName()}}</option>
           @endforeach
       </select>
    </div>
    <div class="form-group">
        <label for="file">Arquivo</label>
        <input name="arquivo" type="file" class="form-control" id="arquivo">
    </div>
    <div class="form-group">
        <label for="informacoes">Informações</label><br/>
        <textarea id="informacoes" name="informacoes" rows="4" cols="50">
        </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
