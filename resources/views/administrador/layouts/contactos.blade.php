

@inject('provider', 'App\Http\Controllers\ServiceContactosController')

<?php 

$camposCon = $provider->serviceContactos();

?>

<!--Code-->

<style type="text/css" media="screen">

 .insideCuadro {
     --modifier: calc(70ch - 100%);
     border: 2px solid #f2f2f2;
     border-radius: 8px;
     overflow: hidden;
 }

 .deletableContactoSelected {
     color: var(--lightgrey);
 }

 .newContactoCuadro {
     display:none;
 }

 .editableContactoButtons{
     display:none;
 }

 .tickOptionsContacts{
     max-width:80%;
     content:center;
     margin:0.5em auto; 
     font: 1em;
     margin-top: -1em;
 }


 .tickOptionsContactsUpdate{
     max-width:80%;
     content:center;
     margin:0.5em auto; 
     font: 0.5em;
 }

</style>

<div class="container-fluid">

    <div class="row" id="contentCuadro"> 

	<!-- repeated elements -->

	@for ($i = 0; $i < count($camposCon); $i++)

	<div class="smallCuadro">
	    <article class="insideCuadro">

		<div class="cuadro-content">


		    <div class='cuandro_content_contacto'>


			<h1 class="cuadro-title"><a href="#">{{ str_replace('WP', '',$camposCon[$i]['name'])}}</a></h1>

			<p class="cuadro-desc">{{$camposCon[$i]['movil_phone']}}</p>
			<p class="cuadro-desc">{{$camposCon[$i]['telephone']}}</p>
			<p class="cuadro-desc">{{$camposCon[$i]['e_mail']}}</p>

    @if (strpos($camposCon[$i]['name'], 'WP') == false) 
			    <span class='colabInputSpan' >Inicio</span>
			    <br/>
    @else 
			    <span class='colabInputSpan' >WhatsApp</span>
			    <br/>

    @endif

		    </div>




		    <button class="cuadro-save editableContacto" type="button">
			Editar
		    </button>
		    <button class="cuadro-save deletableContacto" type="button">
			Eliminar
		    </button>

		    <div class="editableContactoButtons">

			<input  style='display:none' name="idContacto" type="text" id="" value="{{$camposCon[$i]['id']}}" readonly/>

			<input class="cuadro-input-text" type="text" id="" value="{{ str_replace('WP', '',$camposCon[$i]['name'])}}">
			<span class='colabInputSpan' >Nombre</span>
			</input>
			<input class="cuadro-input-text" type="text" id="" value="{{$camposCon[$i]['movil_phone']}}" >
			<span class='colabInputSpan' >Celular</span>
			</input> <input class="cuadro-input-text" type="text" id="" value="{{$camposCon[$i]['telephone']}}">
			<span class='colabInputSpan' >Teléfono fijo</span>
			</input>
			<input class="cuadro-input-text" type="text" id="" value="{{$camposCon[$i]['e_mail']}}">
			<span class='colabInputSpan' >E-mail</span>
			</input>

		    </div>

		    <div class="tickOptionsContactsUpdate" style='display:none'>

@if (strpos($camposCon[$i]['name'], 'WP') == false) 
    
			<input type="radio" name="isWS{{$camposCon[$i]['id']}}" value="" checked> Pagina principal
			</input>

			<br/>
			<input type="radio" name="isWS{{$camposCon[$i]['id']}}" value="WP"> Whatssap
			</input>

@else 

			<input type="radio" name="isWS{{$camposCon[$i]['id']}}" value="" > Pagina principal
			</input>

			<br/>
			<input type="radio" name="isWS{{$camposCon[$i]['id']}}" value="WP" checked> Whatssap
			</input>

@endif
		    </div>


		    <br/>
		    <button class="cancelEditableContacto" type="button" style='display:none'>
			Cancelar edición
		    </button>

		</div>

	    </article>

	</div>
	@endfor

	<!-- fin repeated elements -->

	<!-- new elements -->

	<div class="smallCuadro newContactoCuadro">

	    <article class="insideCuadro">

		<div class="cuadro-content newContactoPost">

		    <h1 class="cuadro-title"><a href="#">Nuevo contacto</a></h1>

		<br/>
		    <input class="cuadro-input-text" type="text" id="linkInput">
		    <span class='colabInputSpan' >Nombre</span>
		    </input>
		    <input class="cuadro-input-text" type="text" id="linkInput">
		    <span class='colabInputSpan' >Celular</span>
		    </input>
		    <input class="cuadro-input-text" type="text" id="linkInput" >
		    <span class='colabInputSpan' >Teléfono fijo</span>
		    </input>
		    <input class="cuadro-input-text" type="text" id="linkInput">
		    <span class='colabInputSpan' >E-mail</span>
		    </input>


		</div>

		<div class="tickOptionsContacts">

		    <input type="radio" name="isWS" value="" checked> Pagina principal
		    </input>

		    <input type="radio" name="isWS" value="WP"> Whatssap
		    </input>
		</div>

		<br/>
		<br/>
		<button id="cancelNewContacto" type="button">
		    Cancelar nuevo
		</button>

	    </article>


	</div>

	<!-- fin new elements -->

	<div class="buttonsContacto">

	    <div class="button_cont" id="newContacto" align="center"><a class="example_b" href="#" onclick="return false;" >Nuevo contacto</a></div>
	    <div class="button_cont stateContacts" style='display:none' id="saveContacto" align="center"><a class="example_b" href="#" onclick="return false;" >Guardar cambios</a></div>
	    <div class="button_cont stateContacts" style='display:none' align="center"><a class="example_b" href="#" onclick="location.reload()" >Cancelar</a></div>
	</div>



    </div>



</div>

    
<script charset="utf-8">

//Service contacto wrapper

function SaveApiContactoPost(lis,link){

	console.log('enviando nuevo contacto');
	this.sendRequestContacto(lis,link);

}


//Service contacto wrapper update

function SaveApiContactoUpdate(lis,id){

	console.log('modificando contacto');
	lis.append("_method", "PUT");
	let link ="{{route('contacto.store')}}/"+id 
	this.sendRequestContacto(lis,link);

}


//Service contacto wrapper delete

async function SaveApiContactoDelete(link){

	try {
	    let r = await fetch(link, 
		{method: "DELETE", 
		    headers: {"X-CSRF-TOKEN": "{{ csrf_token() }}"}
		    //,signal: ctrl.signal
		}); 
	    console.log('HTTP response code:',r.status); 

	} catch (err) {
	    if (err.response) {
		throw("httpError"+
		    `${err.response.statusText} - ${err.response.status}`);
	    } else {
		throw("httpError", "HTTP doesnt response");
	    }
	    throw err;

	}

}

//Service Closure Contacto


    async function sendRequestContacto(apiObject,link) {
	    //console.log(apiObject); 

	try {
	    let r = await fetch(link, 
		{method: "POST", 
		    body: apiObject, 
		    headers: {"X-CSRF-TOKEN": "{{ csrf_token() }}"}
		    //,signal: ctrl.signal
		}); 
	    console.log('HTTP response code:',r.status); 

	} catch (err) {
	    if (err.response) {
		throw("httpError"+
		    `${err.response.statusText} - ${err.response.status}`);
	    } else {
		throw("httpError", "HTTP doesnt response");
	    }
	    throw err;

	}

    }

</script>

