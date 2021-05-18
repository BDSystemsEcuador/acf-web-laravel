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
        <input type="text" class="form-control @error('titulo')
            is-invalid
        @enderror" placeholder="Ingresa el título" name="titulo" value="{{old('titulo')}}">
        @error('titulo')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control @error('descripcion')
            is-invalid
        @enderror" name="descripcion" rows="3">{{old('descripcion')}}</textarea>
        @error('descripcion')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen</label>
        <input class="form-control @error('imagen')
            is-invalid            
        @enderror" type="file" name="imagen" value="{{old('imagen')}}">
        @error('imagen')
            <span class="invalid-feedback d-block">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-success w-100">Agregar</button>
</form>
@endsection

