@extends('administrador.layouts.main')
@section('title','Editar proyecto')
@section('admin')
<div class="d-flex justify-content-between align-items-center">  
    <h5 class="text-danger m-3">Editar proyecto</h5>
    <a href="{{route('proyectos.index')}}" class="btn btn-outline-danger">Volver</a>
</div>
<form action="{{route('proyectos.update',$proyecto->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" placeholder="Ingresa el título" name="titulo" value="{{$proyecto->titulo}}" >
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Mini descripción</label>
        <textarea class="form-control" name="mini_descripcion" rows="3">{{$proyecto->mini_descripcion}}</textarea>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" name="descripcion" rows="3">{{$proyecto->descripcion}}</textarea>
    </div>
    <div class="mb-3">
        <a href="{{asset("storage").'/'.$proyecto->imagen}}" data-lightbox="roadtrip"><img style="height: 100px; width:auto;" src="{{asset("storage").'/'.$proyecto->imagen}}" alt=""/></a>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input class="form-control" type="file" name="imagen">
        </div>
    </div>
    <button type="submit" class="btn btn-success">Agregar</button>
</form>
@endsection
