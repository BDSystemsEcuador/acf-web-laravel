@extends('administrador.layouts.main')
@section('admin')
<div class="d-flex justify-content-between align-items-center">  
  <h5 class="text-danger m-3">Galería</h5>
  <a href="{{route('sliders.create')}}" class="btn btn-danger text-light">Nuevo</a>
</div>
<div class="row" >

@foreach ($sliders as $slider)
<div class="card col-md-3">
  <img class="card-img-top" src="{{asset("storage").'/'.$slider->imagen}}" alt="Card image cap" style="max-height:150px;object-fit:contain;">
  <div class="card-body">
    <h6 class="text-center fw-bold">{{$slider->titulo}}</h6>
    <p class="text-dark">{{$slider->descripcion}}</p>
  </div>
  <div class="card-footer d-flex justify-content-center">
    <a href="{{route('sliders.edit',$slider->id)}}" class="btn btn-outline-dark d-block mx-2">Editar</a>
    <a onclick="document.getElementById('{{$slider->id}}-delete').submit();" class="btn btn-outline-dark d-block mx-2">Eliminar</a>
    <form id="{{$slider->id}}-delete" action="{{route('sliders.destroy',$slider->id)}}" method="POST">
      @method('delete')
      @csrf
    </form>
  </div>
</div>
@endforeach
</div>
<div class="d-flex justify-content-end">  
  {{$sliders->links()}}
</div>
{{-- <div class="table-responsive">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">Imagen</th>
        <th scope="col">Título</th>
        <th scope="col">Descripción</th>
        <th scope="col">Editar / Eliminar</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($sliders as $slider)
      <tr>
        <td><a href="{{asset("storage").'/'.$slider->imagen}}" data-lightbox="roadtrip"><img style="height: 100px; width:auto;" src="{{asset("storage").'/'.$slider->imagen}}" alt=""/></a></td>
        <td>{{$slider->titulo}}</td>
        <td style="height: 100px; overflow:hidden;">{{$slider->descripcion}}</td>
        <td>{{$slider->created_at}}</td>
        <td>
          <a href="{{route('sliders.edit',$slider->id)}}" class="btn btn-warning">Editar</a>
          <a onclick="document.getElementById('{{$slider->id}}-delete').submit();" class="btn btn-danger">Eliminar</a>
          <form id="{{$slider->id}}-delete" action="{{route('sliders.destroy',$slider->id)}}" method="POST">
            @method('delete')
            @csrf
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div> --}}
  @endsection
  