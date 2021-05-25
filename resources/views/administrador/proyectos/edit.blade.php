@extends('administrador.layouts.main')
@section('title','Editar proyecto')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('admin')
<div class="d-flex justify-content-between align-items-center">  
    <h5 class="text-danger m-3">Editar proyecto</h5>
    <a href="{{route('proyectos.index')}}" class="btn btn-outline-danger">Volver</a>
</div>
<form action="{{route('proyectos.update',$proyecto->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control @error('titulo')
        is-invalid
    @enderror" placeholder="Ingresa el título" name="titulo" value="{{old('titulo',$proyecto->titulo)}}">
    @error('titulo')
    <span class="invalid-feedback d-block">
        <strong>{{$message}}</strong>
    </span>
@enderror
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Mini descripción</label>
        <textarea class="form-control @error('mini_descripcion')
        is-invalid
    @enderror" name="mini_descripcion" rows="3">{{old('mini_descripcion',$proyecto->mini_descripcion)}}</textarea>
    @error('mini_descripcion')
    <span class="invalid-feedback d-block">
        <strong>{{$message}}</strong>
    </span>
@enderror
    </div>
    <div class="form-group mb-3">
        <label for="descripcion">Descripción</label>
        <input class="@error('descripcion')
        is-invalid
    @enderror" id="descripcion" type="hidden" name="descripcion" value="{{old('descripcion')}}">
        <trix-editor class="trix-contenido contenido-trix " input="descripcion">{!!$proyecto->descripcion!!}</trix-editor>
        @error('descripcion')
            <span class="invalid-feedback d-block">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <a href="{{asset("storage").'/'.$proyecto->imagen}}" data-lightbox="roadtrip"><img style="height: 100px; width:auto;" src="{{asset("storage").'/'.$proyecto->imagen}}" alt=""/></a>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input class="form-control @error('imagen')
            is-invalid            
        @enderror" type="file" name="imagen" value="{{old('imagen',$proyecto->imagen)}}">
        @error('imagen')
                <span class="invalid-feedback d-block">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-success">Agregar</button>
</form>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection