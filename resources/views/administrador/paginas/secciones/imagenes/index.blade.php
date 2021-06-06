@extends('administrador.layouts.main')
@section('title','Nueva página')
@section('admin')
<div class="d-flex justify-content-between align-items-center">
    <h1 class="text-center"> imagenes de la sección {{$seccion->titulo}}</h1>
    <a href="{{route('secciones_imagenes.create',$seccion->id)}}" class="btn btn-danger text-light">Nuevo</a>

</div>
@foreach ($imagenes as $imagen)
<div class="card col-md-3">
    <img class="card-img-top" src="{{asset("storage").'/'.$imagen->imagen}}" alt="Card image cap" style="max-height:150px;object-fit:contain;">
    <div class="card-footer d-flex justify-content-center">
      <a href="" class="btn btn-outline-dark d-block mx-2">Editar</a>
      <a onclick="" class="btn btn-outline-dark d-block mx-2">Eliminar</a>
      <form id="" action="" method="POST">
        @method('delete')
        @csrf
      </form>
    </div>
  </div>
@endforeach


@endsection