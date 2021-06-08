@extends('administrador.layouts.main')
@section('title','Nueva Sección')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('admin')
<div class="d-flex justify-content-between align-items-center">  
    <h5 class="text-danger m-3">Nueva Sección</h5>
    <a href="{{route('secciones.index')}}" class="btn btn-outline-danger">Volver</a>
</div>
<form action="{{route('seccion.store',$page)}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" class="form-control" placeholder="Ingresa el título" name="title">
    </div>

    <div class="form-group mb-3">
        <label for="content">Contenido:</label>
        <input id="content" type="hidden" name="content">
        <trix-editor class="trix-contenido contenido-trix" input="content"></trix-editor>
    </div>


    <button type="submit" class="btn btn-success">Agregar</button>
</form>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection