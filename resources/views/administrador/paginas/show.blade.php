@extends('layouts.main')
@section('title','Alas de Colibrí')
@section('body')
<div class="container">
	<div class="quienes">
		<br>
      <h1 class="copy-title">{{$pagina->titulo}}</h1>

      @foreach ($secciones as $seccion)
      <h1 class="copy-title">{{$seccion->titulo}}</h1>

      {!!$seccion->contenido!!}
      <div class="imagenes-box">
          @foreach ($seccion->imagenes as $imagen)
          <img class="" src="{{asset("storage").'/'.$imagen->imagen}}" alt="Card image cap" style="max-height:150px;object-fit:contain;">
          @endforeach
        </div>
        @endforeach
  
	
      </div>
    </div>

@endsection
