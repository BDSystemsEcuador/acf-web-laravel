

@inject('provider', 'App\Http\Controllers\ServiceContactosController')

<?php 

$camposCon = $provider->serviceContactos();

?>

<!--Code-->

<style type="text/css" media="screen">

.insideCuadro, .cuadro-box {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}
 .cuadro-box {
     flex: 3 1 calc(var(--modifier) * 999);
     height: calc(282px + 5vw);
     overflow: hidden;
 }
 .cuadro-box img {
     max-width: 100%;
     min-height: 100%;
     width: auto;
     height: auto;
     object-fit: cover;
     object-position: 50% 50%;
 }
 .insideCuadro {
     --modifier: calc(70ch - 100%);
     border: 2px solid #f2f2f2;
     border-radius: 8px;
     overflow: hidden;
 }
 .cuadro-content {
     padding: 16px 32px;
     flex: 4 1 calc(var(--modifier) * 999);
 }

 .cuadro-title {
     margin: 0;
     font-size: clamp(1.4em, 2.1vw, 2.1em);
     font-family: "Roboto Slab", Helvetica, Arial, sans-serif;
     text-transform: none;
 }
 .cuadro-title a {
     text-decoration: none;
     color: inherit;
 }

 .cuadro-save {
     display: flex;
     align-items: center;
     padding: 6px 14px 6px 12px;
     border-radius: 4px;
     border: 2px solid currentColor;
     color: var(--primary);
     background: none;
     cursor: pointer;
     font-weight: bold;
 }

 .deletableContactoSelected {
     color: var(--lightgrey);
 }

 .cuadro-input {
     display: flex;
     width: 40%;
     align-items: center;
     padding: 6px 14px 6px 12px;
     border-radius: 4px;
     border: 2px solid currentColor;
     color: var(--primary);
     background: none;
     cursor: pointer;
     font-weight: bold;
 }


 .cuadro-input-text {
     display: flex;
     width: 100%;
     align-items: center;
     padding: 6px 14px 6px 12px;
     border-radius: 4px;
     border: 2px solid currentColor;
     color: var(--primary);
     background: none;
     cursor: pointer;
     font-weight: bold;
 }


 /* Body Layout */
 #contentCuadro {
     box-sizing: border-box;
 }
 #contentCuadro {
     --primary: #e05d26;
     --grey: #454545;
     --lightgrey: #666;
     color: var(--grey);
     line-height: 1.55;
     display: flex;
     justify-content: center;
     flex-wrap: wrap;
     font-family: "Roboto", Helvetica, Arial, sans-serif;
 }
 .bigCuadro {
     width: clamp(320px, 65%, 65%);
     padding: 24px;
 }
 .smallCuadro {
     width: clamp(320px, 33%, 480px);
     padding: 24px;
 }

 .example_b {
     color: #fff !important;
     text-transform: uppercase;
     text-decoration: none;
     background: #60a3bc;
     padding: 14px;
     margin: 20px;
     display: inline-block;
     border-radius: 50px;
     border: none;
     transition: all 0.4s ease 0s;
     float:left;
 }
.example_b:hover {
	background: #434343;
	letter-spacing: 1px;
	-webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
	-moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
	box-shadow: 5px 40px -10px rgba(0,0,0,0.57);
	transition: all 0.4s ease 0s;
}

 .example_b a {
     text-decoration:none;
 }

 .newContactoCuadro {
     display:none;
 }

 .editableContactoButtons{
     display:none;
 }


</style>

<div class="container-fluid">

    <div class="row" id="contentCuadro"> 

	<!-- repeated elements -->

	@for ($i = 0; $i < count($camposCon); $i++)

	<div class="smallCuadro">
	    <article class="insideCuadro">

		<div class="cuadro-content">

		    <h1 class="cuadro-title"><a href="#">{{ $camposCon[$i]['name']}}</a></h1>

		    <p class="cuadro-desc">{{$camposCon[$i]['movil_phone']}}</p>
		    <p class="cuadro-desc">{{$camposCon[$i]['telephone']}}</p>
		    <p class="cuadro-desc">{{$camposCon[$i]['e_mail']}}</p>

		    <button class="cuadro-save editableContacto" type="button">
			Editar
		    </button>
		    <button class="cuadro-save deletableContacto" type="button">
			Eliminar
		    </button>

		    <div class="editableContactoButtons">

			<input  style='display:none' name="idContacto" type="text" id="" value="{{$camposCon[$i]['id']}}" readonly/>

			<input class="cuadro-input-text" type="text" id="" value="{{$camposCon[$i]['name']}}" placeholder="Nombre"/>
			<input class="cuadro-input-text" type="text" id="" value="{{$camposCon[$i]['movil_phone']}}" placeholder="Celular"/>
			<input class="cuadro-input-text" type="text" id="" value="{{$camposCon[$i]['telephone']}}" placeholder="Teléfono-fijo"/>
			<input class="cuadro-input-text" type="text" id="" value="{{$camposCon[$i]['e_mail']}}" placeholder="E-mail"/>

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

		    <input class="cuadro-input-text" type="text" id="linkInput" placeholder="Nombre"/>
		    <input class="cuadro-input-text" type="text" id="linkInput" placeholder="Celular"/>
		    <input class="cuadro-input-text" type="text" id="linkInput" placeholder="Teléfono fijo"/>
		    <input class="cuadro-input-text" type="text" id="linkInput" placeholder="E-mail"/>

		    <br/>
		    <button id="cancelNewContacto" type="button">
			Cancelar nuevo
		    </button>

		</div>

	    </article>


	</div>

	<!-- fin new elements -->

	<div class="buttonsContacto">

	    <div class="button_cont" id="saveContacto" align="center"><a class="example_b" href="#" onclick="return false;" >Guardar cambios</a></div>

	    <div class="button_cont" id="newContacto" align="center"><a class="example_b" href="#" onclick="return false;" >Nuevo contacto</a></div>

	    <div class="button_cont" align="center"><a class="example_b" href="#" onclick="location.reload()" >Cancelar</a></div>
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

