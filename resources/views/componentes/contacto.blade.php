
@inject('provider', 'App\Http\Controllers\ServiceContactosController')

<?php 

$ContactosPrincipal = $provider->serviceContactos();
$ContactosWP =[];

foreach ($ContactosPrincipal as $Contacto) {
    if (strpos($Contacto['name'], 'WP') !== false) {
        array_push($ContactosWP, $Contacto);
    }
}

?>

<div class="contactos">
    <img id="btn-wsp" class="contacto" src="{{asset('img/WhatsApp.png')}}" alt="">
    <div class="contactos-wsp" id="wsp-modal">
      <div class="contactos-container">


	@foreach ($ContactosWP as $Contacto)

	    <a class="wsp-num" title="Click para chatear"  href="https://api.whatsapp.com/send?phone=={{ $Contacto['movil_phone']}}&text=Me%20gustaría%20hablar%20con%20alguien" target="_blank" rel="noopener"><i class="fab fa-whatsapp"></i>{{ str_replace("WP","",$Contacto['name'])}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>

	@endforeach

	    <a class="wsp-num" title="Click para chatear"  target="_blank" rel="noopener">&zwnj;&zwnj;&zwnj;&zwnj;</a>

<!--
	<a class="wsp-num wsp-num--active" title="Click para chatear"  href="https://api.whatsapp.com/send?phone=593995952466&text=Me%20gustaría%20hablar%20con%20alguien" target="_blank" rel="noopener"><i class="fab fa-whatsapp"></i> Quito</a>
	<a class="wsp-num" title="Click para chatear"  href="https://api.whatsapp.com/send?phone==593984668316&text=Me%20gustaría%20hablar%20con%20alguien" target="_blank" rel="noopener"><i class="fab fa-whatsapp"></i> Lago Agrio</a>
	<a class="wsp-num" title="Click para chatear"  href="https://api.whatsapp.com/send?phone==593958980029&text=Me%20gustaría%20hablar%20con%20alguien" target="_blank" rel="noopener"><i class="fab fa-whatsapp"></i> Tulcán</a>
-->
      </div>
    </div>
</div>
