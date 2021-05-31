@inject('provider', 'App\Http\Controllers\ServiceColaboradoresController')

<?php 

$ColabVars = $provider->serviceColaboradores();

?>

<div class="colaboradores container">
    <h2 class="copy-title copy--margin-none">Colaboradores</h2>
    <p class="copy-subtitle">
      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis,
      deleniti.
    </p>
  <div class="colaboradores-box">

	@for ($i = 0; $i < count($ColabVars); $i++)

    <div class="colaboradores-item">
	<a target="_blank" href="http://{{$ColabVars[$i]['link']}}">
	    <img class="colaboradores__img" src="{{Storage::url($ColabVars[$i]['image'])}}" target="_blank" alt="" />
	</a>
    </div>

	@endfor

<!-- Original content
    <div class="colaboradores-item">
      <img class="colaboradores__img" src="{{asset('img/paginas/inicio/logos_colaboradores/Recurso 1.svg')}}" alt="" />
    </div>
    <div class="colaboradores-item">
      <img class="colaboradores__img" src="{{asset('img/paginas/inicio/logos_colaboradores/Recurso 2.svg')}}" alt="" />
    </div>
    <div class="colaboradores-item">
      <img class="colaboradores__img" src="{{asset('img/paginas/inicio/logos_colaboradores/Recurso 3.svg')}}" alt="" />
    </div>
    <div class="colaboradores-item">
      <img class="colaboradores__img" src="{{asset('img/paginas/inicio/logos_colaboradores/Recurso 4.svg')}}" alt="" />
    </div>
    <div class="colaboradores-item">
      <img class="colaboradores__img" src="{{asset('img/paginas/inicio/logos_colaboradores/Recurso 5.svg')}}" alt="" />
    </div>
    <div class="colaboradores-item">
      <img class="colaboradores__img" src="{{asset('img/paginas/inicio/logos_colaboradores/Recurso 6.svg')}}" alt="" />
    </div>
-->

  </div>
</div>
