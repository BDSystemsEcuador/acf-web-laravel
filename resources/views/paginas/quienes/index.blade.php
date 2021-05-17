
@inject('provider', 'App\Http\Controllers\ServiceQuienesController')

<?php 

$Superior_1=$provider::findSlug('Superior_1');
$Superior_2=$provider::findSlug('Superior_2');
$Intermedia_1=$provider::findSlug('Intermedia_1');
$Intermedia_2=$provider::findSlug('Intermedia_2');
$Intermedia_3=$provider::findSlug('Intermedia_3');

?>

@extends('layouts.main')
@section('title','Alas de Colibrí')
@section('body')
<div class="container">
    <div class="quienes">
      <h1 class="copy-title">{{$Superior_1['titulo']}}</h1>
      <p>
	{{$Superior_1['contenido']}}
      </p>
      <h1 class="copy-title">{{$Superior_2['titulo']}}</h1>
      <div class="quienes-flex">
	<img src="{{Storage::url($Superior_1['imagen'])}}" class="quienes__logo" alt="..." />
	<p class="quienes-flex__info">
	    {{$Superior_2['contenido']}}
	</p>
      </div>
      <p class="quienes__txt"></p>
      <div class="quienes-box">
	<div class="quienes__item">
	  <img src="{{Storage::url($Intermedia_1['imagen'])}}" class="quienes__img" alt="..." />
	  <div class="quienes__item-info">
	    <h3 class="quienes__item-title">{{$Intermedia_1['titulo']}}</h3>
	    <p class="quienes__item-txt">
	    {{$Intermedia_1['contenido']}}
	    </p>
	  </div>
	</div>
	<div class="quienes__item">
	  <div class="quienes__item-info">
	    <h3 class="quienes__item-title">{{$Intermedia_2['titulo']}}</h3>
	    <p class="quienes__item-txt">
	    {{$Intermedia_2['contenido']}}
	    </p>
	  </div>
	  <img src="{{Storage::url($Intermedia_2['imagen'])}}" class="quienes__img" alt="..." />
	</div>
	<div class="quienes__item">
	  <img src="{{Storage::url($Intermedia_3['imagen'])}}" class="quienes__img" alt="..." />
	  <div class="quienes__item-info">
	    <h3 class="quienes__item-title">{{$Intermedia_3['titulo']}}</h3>
	    <p class="quienes__item-txt">
		{{$Intermedia_3['contenido']}}
	    </p>
	  </div>
	</div>
      </div>
    </div>
  </div>


@endsection
