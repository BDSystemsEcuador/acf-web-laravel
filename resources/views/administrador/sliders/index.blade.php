@extends('administrador.layouts.main')
@section('admin')
<h1>Galería</h1>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Imagen</th>
          <th scope="col">Título</th>
          <th scope="col">Descripción</th>
          <th scope="col">Fecha / Hora</th>
          <th scope="col">Editar / Eliminar</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($sliders as $slider)
        <tr>
            <td><a href="{{asset("storage").'/'.$slider->imagen}}" data-lightbox="roadtrip"><img style="height: 100px; width:auto;" src="{{asset("storage").'/'.$slider->imagen}}" alt=""/></a></td>
            <td>{{$slider->titulo}}</td>
            <td>{{$slider->descripcion}}</td>
            <td>{{$slider->created_at}}</td>
            <td>
                <a href="{{route('sliders.edit',$slider->id)}}" class="btn btn-warning">Editar</a>
            </td>
        </tr>
        @endforeach
      </tbody>
  </table>
@endsection
