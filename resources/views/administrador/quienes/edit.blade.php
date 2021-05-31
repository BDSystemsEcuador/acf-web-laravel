@inject('provider', 'App\Http\Controllers\ServiceQuienesController')

<?php 

$camposQ = $provider->serviceQuienes();

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!--Code-->

<script>

var formsData = [];
var colaboradorPost = false;
var colaboradorDelete = false;
var colaboradorUpdate = false;

var contactoPost = false;
var contactoDelete = false;
var contactoUpdate = false;

$(document).ready(function(){

    /*Debug Function
    $("#editabletag").click(function(){
	alert('holamundo');
    });
     */

    $("#editabletag").click(function(){
	alert('holamundo');
    });

    $('#exportboton').click(function () {


	//var $rows = $('#quientable').find('tr:not(:hidden)').text();


	var $row = [];
	var $headers = [];
	var $data = [];
	var $idDataQuienes = [];
	var $counter = 0;

	$('.quienes tr').each(function(index, item) {
	    $('td',this).each(function(){
		var $texto= $(this).text();
		$row.push($texto);
		//console.log($texto); 
		//console.log('rows'); 

	    });
	    $row.splice(3,2);
	    $idDataQuienes.push($row.splice(3,1));
	    $data.push($row);
	    $row = [];
	    //console.log(slugify($tes));
	});

	$headers = $data.splice(0,1); 
	$headers=[].concat.apply([], $headers);
	$headers = arrslugify($headers);

	//console.log($headers);
	//console.log($data);


	for(i=0 ; i<$data.length; i++){

	    formsData[i] = new FormData();

	    for(y=0 ; y<$headers.length; y++){
		//console.log($data[i]);
		formsData[i].append($headers[y],$data[i][y]);	
	    }

	    /* Debug formsData
	    for (var value of formsData[i].values()) {
		console.log(value);
	    }
	     */

	}

	SaveApi(formsData);
	//$idDataQuienes = arrslugify($idDataQuienes);
	//console.log($idDataQuienes);
	// Output the result
	$('#exporttext').text($data);
	location.reload();

    });

    //Colaboradores section

    $("#newColaborador").click(function(){
	//alert('holamundo');
	colaboradorPost = true;
	$(".newColaboradorCuadro").show();
	$("#newColaborador").hide();
    });


    $("#cancelNewColaborator").click(function(){
	//alert('holamundo');
	colaboradorPost = false;
	$(".newColaboradorCuadro").hide();
	$("#newColaborador").show();
    });

    $(".editableColaborador").click(function(){
	//alert('holamundo');
	colaboradorUpdate = true;
	$(this).hide();
	$(this).siblings('.editableColaboradorButtons').show();
	$(this).siblings('.cancelEditableColaborator').show();
	$(this).siblings('.deletableColaborador').hide();
	$(this).siblings('.editableColaboradorButtons').addClass( "changedColaboratorButtons" );
    });


    $(".cancelEditableColaborator").click(function(){
	//alert('holamundo');
	$(this).hide();
	$(this).siblings('.editableColaboradorButtons').hide();
	$(this).siblings('.deletableColaborador').show();
	$(this).siblings('.editableColaborador').show();
	$(this).siblings('.editableColaboradorButtons').removeClass( "changedColaboratorButtons" );
    });

    $(".deletableColaborador").click(function(){
	colaboradorDelete=true;
	$(this).siblings('.editableColaborador').toggle();
	$(this).toggleClass('deletableColaboradorSelected');
	$(this).siblings('.editableColaboradorButtons').toggleClass( "deletedColaboratorButtons" );
    });

    $("#saveColaborators").click(function(){

	var $headers = ['id','name','link'];
	var $data = [];
	var $counter = 0;

	if (colaboradorPost) {

	var $row = [];

	$('.newColaboradorPost input').each(function(index, item) {
	var $texto= $(this).val();
	$row.push($texto);
	//console.log($texto); 
	});

	$row.splice(2,2); 
	console.log($row); 
	//$headers=[].concat.apply([], $headers);
	//$headers = arrslugify($headers);

	$ColabForm = new FormData();
	$ColabForm.append($headers[1],$row[0]);
	$ColabForm.append($headers[2],$row[1]);

	SaveApiColaboratorPost($ColabForm,"{{route('colaborador.store')}}");

	}

	if (colaboradorDelete) {

	var $row = [];

	    $('.deletedColaboratorButtons input[name="idColaborator"]').each(function(index, item) {
		var $texto= $(this).val();
		$row.push($texto);
	    });

	    if ($row.length>0){

		$row.forEach(function($element) {
		    var $URL ="{{route('colaborador.store')}}/"+$element ;
		    SaveApiColaboratorDelete($URL);

		})
	    }


	}

	if (colaboradorUpdate) {

	    var $row = [];
	    var $rows = [];

	    $('.changedColaboratorButtons').each(function(index, item) {
		$('input',this).each(function(){
		    var $texto= $(this).val();
		    $row.push($texto);
		    //console.log($texto); 
		});

		$row.splice(3,2);
		$rows.push($row);
		$row = [];
	    });

	    if ($rows.length>0){

		$rows.forEach(function($element) {

		    $ColabForm = new FormData();
		    $ColabForm.append($headers[0],$element[0]);
		    $ColabForm.append($headers[1],$element[1]);
		    $ColabForm.append($headers[2],$element[2]);

		    var $photo = document.getElementById('colaboradorUpdateImage:'+$element[0]).files[0];
		    $ColabForm.append("image",$photo);

		    SaveApiColaboratorUpdate($ColabForm,$element[0]);

		})

	    }

	}

	location.reload();

    });

    //Colaboradores section fin

    //Contactos section

    $("#newContacto").click(function(){
	//alert('holamundo');
	contactoPost = true;
	$(".newContactoCuadro").show();
	$("#newContacto").hide();
    });


    $("#cancelNewContacto").click(function(){
	//alert('holamundo');
	contactoPost = false;
	$(".newContactoCuadro").hide();
	$("#newContacto").show();
    });

    $(".editableContacto").click(function(){
	//alert('holamundo');
	contactoUpdate = true;
	$(this).hide();
	$(this).siblings('.editableContactoButtons').show();
	$(this).siblings('.cancelEditableContacto').show();
	$(this).siblings('.deletableContacto').hide();
	$(this).siblings('.editableContactoButtons').addClass( "changedContactoButtons" );
    });


    $(".cancelEditableContacto").click(function(){
	//alert('holamundo');
	$(this).hide();
	$(this).siblings('.editableContactoButtons').hide();
	$(this).siblings('.deletableContacto').show();
	$(this).siblings('.editableContacto').show();
	$(this).siblings('.editableContactoButtons').removeClass( "changedContactoButtons" );
    });

    $(".deletableContacto").click(function(){
	contactoDelete=true;
	$(this).siblings('.editableContacto').toggle();
	$(this).toggleClass('deletableContactoSelected');
	$(this).siblings('.editableContactoButtons').toggleClass( "deletedContactoButtons" );
    });

    $("#saveContacto").click(function(){

	var $headers = ['id','name','movil_phone','telephone','e_mail'];
	var $data = [];
	var $counter = 0;

	if (contactoPost) {

	    var $row = [];

	    $('.newContactoPost input').each(function(index, item) {
		var $texto= $(this).val();
		$row.push($texto);
		//console.log($texto); 
	    });
console.log($row); 

	    $ContcForm = new FormData();
	    $ContcForm.append($headers[1],$row[0]);
	    $ContcForm.append($headers[2],$row[1]);
	    $ContcForm.append($headers[3],$row[2]);
	    $ContcForm.append($headers[4],$row[3]);

	    SaveApiContactoPost($ContcForm,"{{route('contacto.store')}}");

	}

	if (contactoDelete) {

	var $row = [];

	$('.deletedContactoButtons input[name="idContacto"]').each(function(index, item) {
	var $texto= $(this).val();
	$row.push($texto);
	});

	if ($row.length>0){

	    $row.forEach(function($element) {
		var $URL ="{{route('contacto.store')}}/"+$element ;
		SaveApiContactoDelete($URL);

	    })
	}


	}

	if (contactoUpdate) {

	    var $row = [];
	    var $rows = [];

	    $('.changedContactoButtons').each(function(index, item) {
		$('input',this).each(function(){
		    var $texto= $(this).val();
		    $row.push($texto);
		    //console.log($texto); 
		});

		$rows.push($row);
		$row = [];
	    });

	    if ($rows.length>0){

		$rows.forEach(function($element) {

		    $ContcForm = new FormData();
		    $ContcForm.append($headers[1],$element[1]);
		    $ContcForm.append($headers[2],$element[2]);
		    $ContcForm.append($headers[3],$element[3]);
		    $ContcForm.append($headers[4],$element[4]);

		    SaveApiContactoUpdate($ContcForm,$element[0]);

		})

	    }

	}


    });

    //Contactos section fin

});

//slugify function

const slugify = str => {
  const map = {
    '-' : ' ',
    '-' : '_',
    'a' : 'á|à|ã|â|ä|À|Á|Ã|Â|Ä',
    'e' : 'é|è|ê|ë|É|È|Ê|Ë',
    'i' : 'í|ì|î|ï|Í|Ì|Î|Ï',
    'o' : 'ó|ò|ô|õ|ö|Ó|Ò|Ô|Õ|Ö',
    'u' : 'ú|ù|û|ü|Ú|Ù|Û|Ü',
    'c' : 'ç|Ç',
    'n' : 'ñ|Ñ'
  };

  for (var pattern in map) {
    str = str.replace(new RegExp(map[pattern], 'g'), pattern);
  }

  return str;
}


//slug wrapper


const arrslugify = lis => {
    
  for (i=0 ; i<lis.length; i++) {
    lis[i] = slugify(lis[i].toLowerCase()); 
      lis[i]=lis[i].replace(/\n/g, '');
      lis[i]=lis[i].replace(/\t/g, '');
      lis[i]=lis[i].replace(/\s/g, '');

  }
    return lis
}


//Service wrapper

function SaveApi(lis){

	for (i=0 ; i<lis.length; i++) {
	var photo = document.getElementById('quienesimg'+i).files[0];
	//console.log(photo);
	lis[i].append("photo", photo);
	lis[i].append("_method", "PUT");
	var id = i+1;
	console.log(id); 

	this.sendRequest(lis[i],id);
	}

	const ctrl = new AbortController()    // timeout
	setTimeout(() => ctrl.abort(), 5000);


    //return lis
}

//Service Closure

    async function sendRequest(apiObject,id) {
	    //console.log(apiObject); 
	try {
	    let r = await fetch("{{route('quienes_somos.store')}}/"+id, 
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

<!--Code fin -->

  {{-- route('quienes_somos.update',$quienes_somo->"5")--}}
  <div class="container-fluid">
      <div class="row">
	  <div class="col-md-12">

	      <div class="panel panel-default panel-table">
		  <div class="panel-body">
		      <table id="quientable"class="table table-striped table-bordered table-list quienes">
			  <thead>
			      <tr style='font-weight:bold'>
				  <td>
				      Sección
				  </td>
				  <td id="editabletag">
				      Título
				  </td>
				  <td>
				      Contenído
				  </td>
				  <td>
				      Imagen actual
				  </td>
				  <td>
				      Imagen
				  </td>
			      </tr> 
			  </thead>
			  <tbody>
			      @for ($i = 0; $i < count($camposQ); $i++)
				      @if ($camposQ[$i]['seccion']!=="Superior_2")
					  <tr>
					      <td align="center">
						  <b>{{$camposQ[$i]['seccion']}}</b>
					      </td contenteditable="true">
					      <td align="center" contenteditable="true">
							 {{$camposQ[$i]['titulo']}}
					      </td>
					      <td contenteditable="true">
								   {{$camposQ[$i]['contenido']}}
					      </td>
					      <td >
						  <img src="{{Storage::url($camposQ[$i]['imagen'])}}" class="img-responsive" alt="..." />
					      </td>
					      <td align="center">
						  <input id="quienesimg{{$i}}" class="form-control-file" type="file" />
					      </td>
					      <td style='display:none'  contenteditable="true">
								   {{$camposQ[$i]['id']}}
					      </td>
					  </tr>
				      @else
				      <tr>
					  <td align="center">
					      <b>{{$camposQ[$i]['seccion']}}</b>
					  </td contenteditable="true">
					  <td align="center" contenteditable="true">
					      {{$camposQ[$i]['titulo']}}
					  </td>
					  <td contenteditable="true">
					      {{$camposQ[$i]['contenido']}}
					  </td>
					  <td >
					  </td>
					  <td align="center">
					      <input id="quienesimg{{$i}}" type=file readonly />
					  </td>
					      <td style='display:none' contenteditable="true">
								   {{$camposQ[$i]['id']}}
					      </td>
				      </tr>
				      @endif
			      @endfor
			  </tbody>
		      </table>
		  </div>
		  <button id="exportboton" class="btn btn-primary">Guardar</button>
			      <!-- debug section
		  <p id="exporttext"></p>
			 -->
	      </div>
	  </div>
      </div>
  </div>
</div>

