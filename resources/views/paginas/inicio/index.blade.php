@extends('layouts.main')
@section('title','Alas de Colibrí')
@section('body')
<div class="inicio" id="inicioid">
    <section>
      <div
        id="carouselAlasDeColibri"
        class="carousel slide"
        data-bs-ride="carousel">

        @if (count($sliders)>0)
        <div class="carousel-indicators">
            @if ($sliders[0])
                <button
                type="button"
                data-bs-target="#carouselAlasDeColibri"
                data-bs-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="Slide 1"
            ></button>
            @for ($i=1;$i<count($sliders);$i++)
                <button
                type="button"
                data-bs-target="#carouselAlasDeColibri"
                data-bs-slide-to="{{$i}}"
                aria-label="Slide {{$i+1}}"
                ></button>
            @endfor
            @endif
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{asset('storage').'/'.$sliders[0]->imagen}}" class="d-block w-100 carousel__img" alt="..." />
              <div class="carousel-caption d-md-block">
                <h5>{{$sliders[0]->titulo}}</h5>
                <p>
                  {{$sliders[0]->descripcion}}
                </p>
              </div>
            </div>
            @for ($i=1;$i<count($sliders);$i++)
            <div class="carousel-item">
              <img src="{{asset("storage").'/'.$sliders[$i]->imagen}}" class="d-block w-100 carousel__img" alt="..." />
              <div class="carousel-caption d-md-block">
                <h5>{{$sliders[$i]->titulo}}</h5>
                <p>
                  {{$sliders[$i]->descripcion}}
                </p>
              </div>
            </div>
            @endfor

          </div>
        @endif

        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselAlasDeColibri"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselAlasDeColibri"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
    <!-- Donaciones -->
    @component('paginas.proyecto.index')@endcomponent
</div>


@endsection
