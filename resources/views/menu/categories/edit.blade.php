@extends('administrador.layouts.main')
@section('admin')

<form action="{{route('categorias.update',$category->id)}}" method="POST" class="form">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
      <label  class="form-label" for="title">Título</label>
      <input  class="form-control" type="text" name="title" value="{{$category->title}}">
    </div>
    <div class="form-group mb-3">
      <button class="btn btn-danger text-light d-block" type="submit">Agregar</button>
    </div>
</form>
@endsection
