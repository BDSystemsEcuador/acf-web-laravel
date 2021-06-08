@extends('administrador.layouts.main')
@section('admin')
<div class="d-flex justify-content-between align-items-center">  
  <h5 class="text-danger m-3">Secciones de la página - {{$page->title}}</h5>
  <div class="">
      <a href="{{route('seccion.create',$page->id)}}" class="btn btn-danger text-light">Nueva Sección</a>
    </div>

</div>

<div class="row" >
<div class="col-12">
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Contenido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($page->sections as $section)
            <tr>
                <td>{{$section->title}}</td>
                <td>{!!$section->content!!}</td>
                <td>
                    <a href="">Editar</a>
                    <a href="">Eliminar</a>
                    <a href="{{route('imagenes.show',$section->id)}}">Agregar Imagenes</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

  @endsection
  