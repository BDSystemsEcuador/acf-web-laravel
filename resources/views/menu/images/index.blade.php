@extends('administrador.layouts.main')
@section('admin')
<div class="d-flex justify-content-between align-items-center">  
  <h5 class="text-danger m-3">Imagenes</h5>
  <a href="{{route('imagen.create',$sectionImage)}}" class="btn btn-danger text-light">Nuevo</a>
</div>

<div class="row" >

@foreach ($images as $image)
<div class="card col-md-3">
  <div class="card-body">
    <h6 class="text-center fw-bold">{{$image->title}}</h6>
  </div>
  <img class="card-img-top" src="{{asset("storage").'/'.$image->image}}" alt="Card image cap" style="max-height:150px;object-fit:contain;">
</div>
@endforeach
</div>
<div class="d-flex justify-content-end">  
</div>

  @endsection