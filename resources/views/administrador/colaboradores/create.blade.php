@extends('administrador.layouts.main')
@section('title','Nuevo colaborador')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('admin')
<div class="d-flex justify-content-between align-items-center">  
    <h5 class="text-danger m-3">Nuevo colaborador</h5>
    <a href="{{route('colaborador.index')}}" class="btn btn-outline-danger">Volver</a>
</div>
<form action="{{route('colaborador.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" placeholder="Ingresa el nombre" name="name".>
    </div>
    <div class="mb-3">
        <label for="link" class="form-label">Sitio web</label>
        <input type="text" class="form-control" placeholder="Ingresa el sitio web" name="link".>

    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Imagen</label>
        <input class="form-control" type="file" name="image" >
    </div>
    <button type="submit" class="btn btn-success">Agregar</button>
</form>
@endsection
