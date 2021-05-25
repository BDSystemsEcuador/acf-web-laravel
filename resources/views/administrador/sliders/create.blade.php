@extends('administrador.layouts.main')
@section('title','Agregar a Galería')
@section('admin')
<div class="d-flex justify-content-between align-items-center">  
    <h5 class="text-danger m-3">Galería</h5>
    <a href="/admin/sliders" class="btn btn-outline-danger">Volver</a>
</div>
<form action="{{route('sliders.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" placeholder="Ingresa el título" name="titulo" >
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" name="descripcion" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen</label>
        <input class="form-control" type="file" name="imagen">
    </div>
    <button type="submit" class="btn btn-success w-100">Agregar</button>
</form>
@endsection

