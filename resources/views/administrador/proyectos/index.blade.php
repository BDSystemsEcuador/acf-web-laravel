@extends('administrador.layouts.main')
@section('admin')
<div class="d-flex justify-content-between align-items-center">  
  <h5 class="text-danger m-3">Proyectos</h5>
  <a href="{{route('proyectos.create')}}" class="btn btn-danger text-light">Nuevo</a>
</div>
<div class="row" >

@foreach ($proyectos as $proyecto)
<div class="card col-md-3">
  <div class="card-body">
    <h6 class="text-center fw-bold">{{$proyecto->titulo}}</h6>
  </div>
  <img class="card-img-top" src="{{asset("storage").'/'.$proyecto->imagen}}" alt="Card image cap" style="max-height:150px;object-fit:contain;">
  <div class="card-footer d-flex justify-content-center">
    <a href="{{route('proyectos.edit',$proyecto->id)}}" class="btn btn-outline-dark d-block mx-2">Editar</a>
    <a onclick="document.getElementById('{{$proyecto->id}}-delete').submit();" class="btn btn-outline-dark d-block mx-2">Eliminar</a>
    <form id="{{$proyecto->id}}-delete" action="{{route('proyectos.destroy',$proyecto->id)}}" method="POST">
      @method('delete')
      @csrf
    </form>
  </div>
</div>
@endforeach
</div>
<div class="d-flex justify-content-end">  
  {{$proyectos->links()}}
</div>

  @endsection
  