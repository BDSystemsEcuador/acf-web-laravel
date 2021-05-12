@extends('administrador.layouts.main')
@section('title','Agregar a Galería')
@section('admin')
<h1>Editar galería</h1>
<form action="{{route('sliders.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" placeholder="Ingresa el título" name="titulo" value="{{$slider->titulo}}" required>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" name="descripcion" rows="3" required>{{$slider->descripcion}}</textarea>
    </div>
    <a href="{{asset("storage").'/'.$slider->imagen}}" data-lightbox="roadtrip"><img style="height: 100px; width:auto;" src="{{asset("storage").'/'.$slider->imagen}}" alt=""/></a>
    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen</label>
        <input class="form-control" type="file" name="imagen">
    </div>
    <button type="submit" class="btn btn-success">Agregar</button>
</form>
@endsection
