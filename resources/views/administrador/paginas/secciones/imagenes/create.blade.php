@extends('administrador.layouts.main')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('title','nueva imagen')
@section('admin')

<form class="form" action="{{route('imagenes.store')}}" method="POST" novalidate enctype="multipart/form-data">
    @csrf
    <label for="imagen"></label>
    <input type="file" name="imagen">
    <input type="text" name="seccion_id" value="{{$seccion->id}}" hidden>
    <button class="btn btn-danger" type="submit">Guardar</button>
</form>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection