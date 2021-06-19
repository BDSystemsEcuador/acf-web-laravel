@extends('administrador.layouts.main')
@section('title','Nuevo proyecto')

@section('admin')
<div class="d-flex justify-content-between align-items-center">  
    <h5 class="text-danger m-3">Nueva imagen</h5>
    <a href="" class="btn btn-outline-danger">Volver</a>
</div>
<form action="{{route('imagen.store',$section)}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
        <label for="image" class="form-label">Imagen</label>
        <input class="form-control" type="file" name="image" value="">
    </div>
    <button type="submit" class="btn btn-success">Agregar</button>
</form>
@endsection
