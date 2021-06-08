@extends('administrador.layouts.main')
@section('admin')
<div class="d-flex justify-content-between align-items-center">  
  <h5 class="text-danger m-3">Menú Principal</h5>
  <a class="btn btn-danger text-light" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Agregar Categoría
  </a>
  <a class="btn btn-danger text-light" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Agregar Página
  </a>
</div>

<div class="collapse row" id="collapseExample">
  <div class="card card-body col-12">
    <div class="" id="nuevo" >
      <div class="">
          <form action="{{route('categorias.store')}}" method="POST">
              @csrf
              <div class="form-group mb-3">
                  <label for="title" class="form-label">Titulo</label>
                  <input class="form-control" type="text" name="title">
              </div>
              <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
              </div>
          </form>
      </div>
      </div>
      </div>
</div>

<div class="row">
@foreach ($categories as $category)
<div class="card col-12">
  <div class="d-flex justify-content-between align-items-center">

    <h5 class="card-header"><a href="">{{$category->title}}</a> </h5>
    <a href="{{route('paginas.create')}}" class="btn btn-primary">Agregar Páginas</a>
  </div>
    @foreach ($category->pages as $page)
        
    <div class="card-body border my-2">
      <h5 class="card-title">{{$page->title}}</h5>
      <p class="card-text">{{$page->description}}</p>
      <a href="#" class="btn btn-primary">Ver</a>
      <a href="#" class="btn btn-primary">Editar</a>
    </div>
    @endforeach
    
</div>
@endforeach

@endsection
