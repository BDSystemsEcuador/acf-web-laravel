@inject('provider', 'App\Http\Controllers\ServiceQuienesController')

<?php 

$camposQ = $provider->serviceQuienes();
$noImageSection= $provider::findSlug('Superior_2');

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

var colabSectionButtonsEdit = 0;
var contactSectionButtonsEdit = 0;


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

	$idDataQuienes=[].concat.apply([], $idDataQuienes);
	$idDataQuienes = arrslugify($idDataQuienes);
	SaveApi(formsData,$idDataQuienes);
	// Output the result
	$('#exporttext').text($data);

	setTimeout(function(){

	    location.reload();

	}, 750);
    });

    //Colaboradores section

    $("#newColaborador").click(function(){
	//alert('holamundo');
	colaboradorPost = true;
	$(".newColaboradorCuadro").show();
	$("#newColaborador").hide();
	colabSectionButtonsEdit++;
	$(".stateColaborators").show();
    });


    $("#cancelNewColaborator").click(function(){
	//alert('holamundo');
	colaboradorPost = false;
	$(".newColaboradorCuadro").hide();
	$("#newColaborador").show();
	colabSectionButtonsEdit--;
	if (colabSectionButtonsEdit ==0) $(".stateColaborators").hide();
	// colabSectionButtonsEdit ==0 ? $(".stateColaborators").hide() : ;
    });

    $(".editableColaborador").click(function(){
	//alert('holamundo');
	colaboradorUpdate = true;
	$(this).hide();
	$(this).siblings('.cuadro_content_colab').hide();
	$(this).siblings('.editableColaboradorButtons').show();
	$(this).siblings('.cancelEditableColaborator').show();
	$(this).siblings('.deletableColaborador').hide();
	$(this).siblings('.editableColaboradorButtons').addClass( "changedColaboratorButtons" );
	colabSectionButtonsEdit++;
	$(".stateColaborators").show();
    });


    $(".cancelEditableColaborator").click(function(){
	//alert('holamundo');
	$(this).hide();
	$(this).siblings('.cuadro_content_colab').show();
	$(this).siblings('.editableColaboradorButtons').hide();
	$(this).siblings('.deletableColaborador').show();
	$(this).siblings('.editableColaborador').show();
	$(this).siblings('.editableColaboradorButtons').removeClass( "changedColaboratorButtons" );
	colabSectionButtonsEdit--;
	if (colabSectionButtonsEdit ==0) $(".stateColaborators").hide();
    });

    $(".deletableColaborador").click(function(){
	colaboradorDelete=true;
	$(this).siblings('.editableColaborador').toggle();
	$(this).toggleClass('deletableColaboradorSelected');
	$(this).siblings('.editableColaboradorButtons').toggleClass( "deletedColaboratorButtons" );
	if ($(this).siblings('.editableColaborador').is(":visible")) {
	colabSectionButtonsEdit--;
	if (colabSectionButtonsEdit ==0) $(".stateColaborators").hide();
	} else {
	    colabSectionButtonsEdit++;
	    $(".stateColaborators").show();
	}
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

	setTimeout(function(){

	    location.reload();

	}, 750);

    });

    //Colaboradores section fin

    //Contactos section

    $("#newContacto").click(function(){
	//alert('holamundo');
	contactoPost = true;
	$(".newContactoCuadro").show();
	$("#newContacto").hide();
	contactSectionButtonsEdit++;
	$(".stateContacts").show();
    });


    $("#cancelNewContacto").click(function(){
	//alert('holamundo');
	contactoPost = false;
	$(".newContactoCuadro").hide();
	$("#newContacto").show();
	contactSectionButtonsEdit--;
	if (contactSectionButtonsEdit ==0) $(".stateContacts").hide();
    });

    $(".editableContacto").click(function(){
	//alert('holamundo');
	contactoUpdate = true;
	$(this).hide();
	$(this).siblings('.cuandro_content_contacto').hide();
	$(this).siblings('.editableContactoButtons').show();
	$(this).siblings('.tickOptionsContactsUpdate').show();
	$(this).siblings('.cancelEditableContacto').show();
	$(this).siblings('.deletableContacto').hide();
	$(this).siblings('.editableContactoButtons').addClass( "changedContactoButtons" );
	$(this).siblings('.tickOptionsContactsUpdate').addClass( "changedtickOptionsContactsUpdate" );
	contactSectionButtonsEdit++;
	$(".stateContacts").show();
    });


    $(".cancelEditableContacto").click(function(){
	//alert('holamundo');
	$(this).hide();
	$(this).siblings('.editableContactoButtons').hide();
	$(this).siblings('.cuandro_content_contacto').show();
	$(this).siblings('.tickOptionsContactsUpdate').hide();
	$(this).siblings('.deletableContacto').show();
	$(this).siblings('.editableContacto').show();
	$(this).siblings('.editableContactoButtons').removeClass( "changedContactoButtons" );
	$(this).siblings('.tickOptionsContactsUpdate').removeClass( "changedtickOptionsContactsUpdate" );
	contactSectionButtonsEdit--;
	if (contactSectionButtonsEdit ==0) $(".stateContacts").hide();
    });

    $(".deletableContacto").click(function(){
	contactoDelete=true;
	$(this).siblings('.editableContacto').toggle();
	$(this).toggleClass('deletableContactoSelected');
	$(this).siblings('.editableContactoButtons').toggleClass( "deletedContactoButtons" );
	if ($(this).siblings('.editableContacto').is(":visible")) {
	contactSectionButtonsEdit--;
	if (contactSectionButtonsEdit ==0) $(".stateContacts").hide();
	} else {
	    contactSectionButtonsEdit++;
	    $(".stateContacts").show();
	}
    });

    $("#saveContacto").click(function(){

	var $headers = ['id','name','movil_phone','telephone','e_mail'];
	var $data = [];
	var $counter = 0;

	if (contactoPost) {

	    var $row = [];
	    var $isWS = $('input[name="isWS"]:checked').val();

	    $('.newContactoPost input').each(function(index, item) {
		var $texto= $(this).val();
		$row.push($texto);
		//console.log('WS VAL "'+$isWS+'"'); 
	    });

	    $ContcForm = new FormData();
	    $ContcForm.append($headers[1],$row[0]+$isWS);
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
	    var $roWasp = [];


	    $('.changedtickOptionsContactsUpdate').each(function(index, item) {
		var $texto= $('input:checked',this).val();
		console.log('WS VAL "'+$texto+'"'); 
		$roWasp.push($texto);
	    });

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

		$rows.forEach(function($element,i) {

		    $ContcForm = new FormData();
		    $ContcForm.append($headers[1],$element[1]+$roWasp[i]);
		    $ContcForm.append($headers[2],$element[2]);
		    $ContcForm.append($headers[3],$element[3]);
		    $ContcForm.append($headers[4],$element[4]);

		    SaveApiContactoUpdate($ContcForm,$element[0]);

		})

	    }

	}

	setTimeout(function(){

	    location.reload();

	}, 750);

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

function SaveApi(lis,ids){

	var noImageIndex= ids.indexOf("{{$noImageSection['id']}}") ;

	for (i=0 ; i<lis.length; i++) {

	if (i!=noImageIndex){
	var photo = document.getElementById('quienesimg'+ids[i]).files[0];
	lis[i].append("photo", photo);
	}

	lis[i].append("_method", "PUT");
	var id = ids[i];
	console.log(id); 

	this.sendRequest(lis[i],id);
	}


	// Timeout case
	//const ctrl = new AbortController()    // timeout
	//setTimeout(() => ctrl.abort(), 5000);

    //return lis
}

//Service Closure

    async function sendRequest(apiObject,id) {
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
		      <table id="quientable"class="quienes quienTable">
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
						  <input id="quienesimg{{$camposQ[$i]['id']}}" class="form-control-file" type="file" />
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
					      <td align="center" readonly>
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




<style type="text/css" media="screen">

table.quienTable {
	background: #f5f5f5;
	border-collapse: separate;
	box-shadow: inset 0 1px 0 #fff;
	font-size: 1.2em;
	line-height: 24px;
	margin: 30px auto;
	text-align: left;
	width: 800px;
	overflow: auto;
}	

.quienTable th {
	border-left: 1px solid #555;
	border-right: 1px solid #777;
	border-top: 1px solid #555;
	border-bottom: 1px solid #333;
	box-shadow: inset 0 1px 0 #999;
	color: #fff;
  font-weight: bold;
	padding: 10px 15px;
	position: relative;
	text-shadow: 0 1px 0 #000;	
}

.quienTable th:after {
	background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
	content: '';
	display: block;
	height: 25%;
	left: 0;
	margin: 1px 0 0 0;
	position: absolute;
	top: 25%;
	width: 100%;
}

 .quienTable th:first-child {
	border-left: 1px solid #777;	
	box-shadow: inset 1px 1px 0 #999;
}

 .quienTable th:last-child {
	box-shadow: inset -1px 1px 0 #999;
}

 .quienTable td {
	border-right: 1px solid #fff;
	border-left: 1px solid #e8e8e8;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #e8e8e8;
	padding: 10px 15px;
	position: relative;
	transition: all 300ms;
}

 .quienTable td:first-child {
	box-shadow: inset 1px 0 0 #fff;
}	

 .quienTable td:last-child {
	border-right: 1px solid #e8e8e8;
	box-shadow: inset -1px 0 0 #fff;
}	

.quienTable tr:last-of-type td {
	box-shadow: inset 0 -1px 0 #fff; 
}

.quienTable tr:last-of-type td:first-child {
	box-shadow: inset 1px -1px 0 #fff;
}	

.quienTable tr:last-of-type td:last-child {
	box-shadow: inset -1px -1px 0 #fff;
}	

.quienTable tbody:hover td {
	color: transparent;
	text-shadow: 0 0 3px #aaa;
}

.quienTable tbody:hover tr:hover td {
	color: #444;
	text-shadow: 0 1px 0 #fff;
}

</style>

