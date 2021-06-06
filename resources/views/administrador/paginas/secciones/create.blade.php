@extends('administrador.layouts.main')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('title','crear sección')
@section('admin')

<form class="form" action="{{route('secciones.store')}}" method="POST" novalidate>
    @csrf
    <div class="mb-3">
        <label class="form-label" for="titulo">Titulo:</label>
        <input type="text" class="form-control" placeholder="ingrese el titulo de la sección" name="titulo">
    </div>
    <div class="form-group mb-3">
        <label for="contenido">Contenido:</label>
        <input id="contenido" type="hidden" name="contenido">
        <trix-editor class="trix-contenido contenido-trix" input="contenido"></trix-editor>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="id de pagina" value ="{{$pagina->id}}" name="pagina_id" hidden>
    </div>
    <button class="btn btn-danger" type="submit">Guardar</button>
</form>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection