<link href="{{ URL::asset('css/horas.css') }}" rel="stylesheet">
@extends('layouts.app')
@section('content')
@if(count($viewData["horas"]) > 0)
<h1> Suas horas complementares </h1>
<div class="row">
@foreach ($viewData["horas"] as $hora)
<div class="card" style="width: 22rem;">
  <div class="card-body">
    <h5 class="card-title">{{$hora->getName()}}</h5>
    <p class="card-text">{{$hora->getInformacoes()}}</p>
    <p class="card-text">Status: </p>
    <a href="#" class="btn btn-primary">Editar</a>
    <a href="#" class="btn btn-primary">Deletar</a>
  </div>
</div>
@endforeach -->
@else
<h1>Você ainda nao tem horas complementares cadastrada. <a href="{{ route('horas_complementares.cadastrar') }}">Clique aqui para cadastrar</a></h1>
@endif
@endsection
