@extends('administrador.layouts.main')

@section('title','Nueva página')
@section('admin')
<h1 class="text-center">Crear una nueva página</h1>
<form class="form mb-4" action="{{route('paginas.store')}}" method="POST" novalidate>
    @csrf
    <div class="mb-3">
        <label class="form-label" for="titulo">Nombre:</label>
        <input type="text" class="form-control" placeholder="ingrese el nombre de la página" name="titulo">
    </div>
    <div class="mb-3">
        <label class="form-label" for="estado">Estado:</label>
        <select name="estado" id="" class="form-control">
            <option value="true" class="form-control">Activa</option>
            <option value="false" class="form-control">Inactiva</option>
        </select>
    </div>

    <button class="btn btn-danger" type="submit">Listo</button>
</form>

@endsection
