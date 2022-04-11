@extends('layouts.app')
@section('content')
<div class="row">
@foreach ($viewData["horas"] as $hora)
<div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <div class="card-body text-center">
        <a href="" class="btn bg-primary text-white">{{ $hora->getName() }}</a>
      </div>
  @endforeach -->
</div>
@endsection
