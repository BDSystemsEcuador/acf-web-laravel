@extends('administrador.layouts.main')
@section('admin')
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Inicio
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body p-3 row">
          <div class="col-md-2">
            <a href="{{route('sliders.index')}}" class="btn btn-outline-primary d-block py-3">Galería</a>
          </div>
          <div class="col-md-2">
            <a href="{{route('proyectos.index')}}" class="btn btn-outline-primary d-block py-3">Proyectos</a>
          </div>
          <div class="col-md-2">
            <a href="{{route('paginas.index')}}" class="btn btn-outline-primary d-block py-3">Páginas</a>
          </div>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Quiénes Somos
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
	  @component('administrador.quienes.edit')
	      @slot('title')
	          Password validation failure
	      @endslot
	  @endcomponent
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Colaborator_section" aria-expanded="false" aria-controls="collapseTwo">
          Colaboradores
        </button>
      </h2>
      <div id="Colaborator_section" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
<div>
	  @component('administrador.layouts.colaboradores')
	      @slot('title')
	          Password validation failure
	      @endslot
	  @endcomponent
</div>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Contacts_section" aria-expanded="false" aria-controls="collapseTwo">
          Contactos
        </button>
      </h2>
      <div id="Contacts_section" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
<div>
	  @component('administrador.layouts.contactos')
	  @endcomponent
</div>
        </div>
      </div>
    </div>
    {{-- <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Donaciones
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
        </div>
      </div>
    </div> --}}
  </div>
  @if(session('message'))
<script>
swal({
  title: "{{session('message')}}",
  icon: "success",
  showConfirmButton: false,
  timer: 1500,
});

</script>
@endif
@endsection
