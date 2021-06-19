@extends('administrador.layouts.main')
@section('title','Editar Colaborador')
@section('admin')
<div class="d-flex justify-content-between align-items-center">  
    <h5 class="text-danger m-3">Colaborador</h5>
    <a href="{{route('colaborador.index')}}" class="btn btn-outline-danger">Volver</a>
</div>
<form action="{{route('colaborador.update',$colaborador->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" placeholder="Ingresa el nombre" name="name" value="{{$colaborador->name}}" required>
    </div>
    <div class="mb-3">
        <label for="link" class="form-label">Sitio Web</label>
        <input type="text" class="form-control" placeholder="Ingresa el sitio web" name="link" value="{{$colaborador->link}}" required>
    </div>
    <a href="{{asset("storage").'/'.$colaborador->image}}" data-lightbox="roadtrip"><img style="height: 100px; width:auto;" src="{{asset("storage").'/'.$colaborador->image}}" alt=""/></a>
    <div class="mb-3">
        <label for="image" class="form-label">Imagen</label>
        <input class="form-control" type="file" name="image">
    </div>
    <button type="submit" class="btn btn-success w-100">Editar</button>
</form>
@endsection
