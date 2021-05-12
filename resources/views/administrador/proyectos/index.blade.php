@extends('administrador.layouts.main')
@section('admin')
<h1>Galería</h1>
<table class="table table-striped table-hover">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Título</th>
          <th scope="col">Descripción</th>
          <th scope="col">imagen</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($sliders as $slider)
        <tr>
          <th scope="row">1</th>
          <td>{{$slider->titulo}}</td>
          <td>{{$slider->descripcion}}</td>
          <td><a href="{{asset("storage").'/'.$slider->imagen}}" data-lightbox="roadtrip"><img style="height: 200px; width:300px;" src="{{asset("storage").'/'.$slider->imagen}}" alt=""/></a></td>
        </tr>
        @endforeach
      </tbody>
  </table>
@endsection
