@extends('administrador.layouts.main')
@section('admin')
<div class="d-flex justify-content-between align-items-center">  
  <h5 class="text-danger m-3">Páginas</h5>
  <div class="">
      <a href="{{route('categorias.create')}}" class="btn btn-danger text-light">Nueva Categoría</a>
      <a href="{{route('paginas.create')}}" class="btn btn-danger text-light">Nueva Página</a>
    </div>

</div>

<div class="row" >
@foreach ($pages as $page)
@if ($page->category === null)
    <a href="{{route('paginas.show',$page->id)}}">{{$page->title}}</a><br>
@endif
@endforeach
@foreach ($categories as $category)
@if (count($category->pages)>0)
<div class="card">
    <div class="card-header">
        <span>Categoria: {{$category->title}}</span>
    </div>
    <div class="card-body">
        <ol>
        @foreach ($category->pages as $page)
        <li>
            <a href="{{route('paginas.show',$page->id)}}">{{$page->title}}</a><br>
        </li>
        @endforeach
    </ol>
        
    </div>
</div>
@endif
@endforeach

<div class="col-12">
    <h5 class="text-danger m-3">Categorías sin páginas</h5>
    <ul>
        @foreach ($categories as $category)
        @if (count($category->pages) === 0)
        <li>{{$category->title}}</li>
        @endif
        @endforeach
    </ul>

</div>
</div>

  @endsection
  