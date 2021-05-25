@inject('provider', 'App\Http\Controllers\ServiceQuienesController')

<?php 

$camposQ = $provider->serviceQuienes();

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!--Code-->

<script>

var formsData = [];


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
	var $counter = 0;

	$('.quienes tr').each(function(index, item) {
	    $('td',this).each(function(){
		var $texto= $(this).text();
		$row.push($texto);
		//console.log($texto); 
		//console.log('rows'); 

	    });
	    $row.splice(3,2);
	    $data.push($row);
	    $row = [];
	    //var $tes= 'hóla cómo estás';
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
	console.log(formsData);
	// Output the result
	$('#exporttext').text($data);
    });
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
			      <tr>
				  <td align="center">
				      <b>{{$camposQ[0]['seccion']}}</b>
				  </td>
				  <td align="center" contenteditable="true">
				      {{$camposQ[0]['titulo']}}
				  </td>
				  <td contenteditable="true">
				      {{$camposQ[0]['contenido']}}
				  </td>
				  <td >
				      <img src="{{Storage::url($camposQ[0]['imagen'])}}" class="img-responsive" alt="..." />
				  </td>
				      <td >
					  <input id="quienesimg0" class="form-control-file" type="file" />
				      </td >
			      </tr>
					  <tr>
					      <td align="center">
						  <b>{{$camposQ[1]['seccion']}}</b>
					      </td>
					      <td align="center" contenteditable="true">
						  {{$camposQ[1]['titulo']}}
					      </td>
					      <td contenteditable="true">
						  {{$camposQ[1]['contenido']}}
					      </td>
					      <td >
						  <img src="{{Storage::url($camposQ[0]['imagen'])}}" class="img-responsive" alt="..." />
					      </td>
						  <td align="center">
						      <input id="quienesimg1" class="form-control-file" no-border" type="file" />
						  </td>
					  </tr>
					  @for ($i = 2; $i < count($camposQ); $i++)
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
					  </tr>
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

