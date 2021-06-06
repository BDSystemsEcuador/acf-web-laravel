@extends('administrador.layouts.main')
@section('title','Nueva página')
@section('admin')
<div class="d-flex justify-content-between align-items-center">
    <h1 class="text-center">Secciones de {{$pagina->titulo}}</h1>
    <a class="btn btn-danger" href="{{route('secciones.create',$pagina->id)}}">Nueva</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Contenido</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($secciones as $seccion)
        @if ($seccion->pagina_id ==$pagina->id)
        <tr >
            <td>{{$seccion->titulo}}</td>
            <td>
                {{$seccion->contenido}}
            </td>
            <td>
                <a href="{{route('secciones_imagenes.index',$seccion->id)}}">Imagenes</a>
                <a href="">Editar</a>
                <a href="">Eliminar</a>
            </td>
        </tr>
        @endif
        @endforeach

    </tbody>
</table>


@endsection