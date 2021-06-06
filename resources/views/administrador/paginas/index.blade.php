@extends('administrador.layouts.main')
@section('title','Nueva página')
@section('admin')
<div class="d-flex justify-content-between align-items-center">
    <h1 class="text-center">Páginas</h1>
    <a class="btn btn-danger" href="{{route('paginas.create')}}">Nueva</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($paginas as $pagina)
        <tr >
            <td>{{$pagina->titulo}}</td>
            <td>
            @if ($pagina->estado =='1')
                Activa
            @endif 
            @if ($pagina->estado =='0')
                Inactiva
            @endif 
            </td>
            <td>
                <a href="">Ver</a>
                <a href="">Editar</a>
                <a href="{{route('secciones.index',$pagina->id)}}">Secciones</a>
                <a href="">Eliminar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection