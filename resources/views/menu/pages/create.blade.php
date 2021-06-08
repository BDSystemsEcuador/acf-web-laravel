@extends('administrador.layouts.main')
@section('admin')
<div class="d-flex justify-content-between align-items-center">  
  <h5 class="text-danger m-3">Crear Página</h5>
  <a class="btn btn-danger text-light" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Nuevo
  </a>
</div>
<section class="section">
  <form action="{{route('paginas.store')}}" method="POST" class="form">
    @csrf
    <div class="form-group mb-3">
      <label  class="form-label" for="title">Título</label>
      <input  class="form-control" type="text" name="title">
    </div>
    <div class="form-group mb-3">
      <label  class="form-label" for="description">Descripción:</label>
      <input  class="form-control" type="text" name="description">
    </div>
    <div class="form-group mb-3">
      <label  class="form-label" for="category_id">Categoría:</label>
      <select name="category_id" id="" class="form-select" >
        <option class="form-control" value="" selected>Menú principal</option>
        @foreach ($categories as $category)
        <option class="form-control" value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group mb-3">
      <button class="btn btn-primary"  type="submit">Guardar y Continuar</button>
    </div>
  </form>
</section>
@endsection
