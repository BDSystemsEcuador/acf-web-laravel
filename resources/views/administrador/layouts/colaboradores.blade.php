@inject('provider', 'App\Http\Controllers\ServiceQuienesController')

<?php 

$camposQ = $provider->serviceQuienes();

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

 .newColaboradorCuadro {
     display:none;
 }

 .editableColaboradorButtons{
     display:none;
 }

</style>

<div class="container-fluid">
    

    <!-- repeated elements -->


    <div class="row" id="contentCuadro"> 

	<div class="smallCuadro">
	    <article class="insideCuadro">
		<div class="cuadro-box">
		    <img src="#"  width="1500" height="1368" alt="">
		</div>
		<div class="cuadro-content">

		    <h1 class="cuadro-title"><a href="#">Nombre</a></h1>

		    <p class="cuadro-desc">direccion</p>

		    <button id="editableColaborador"class="cuadro-save" type="button">
			Editar
		    </button>

			<div class="editableColaboradorButtons">

			    <input class="cuadro-input-text" type="text" id="" placeholder="Nombre"/>

			    <input class="cuadro-input-text" type="text" id="" placeholder="Dirección web"/>

			    <label class="cuadro-input" >Imagen
				<input type="file" accept="image/*" id="" name="file" style="display:none" />
			    </label>

			</div>

		</div>

	    </article>

		</div>

		<!-- fin repeated elements -->

		<!-- new elements -->

		<div class="smallCuadro newColaboradorCuadro">
		    <article class="insideCuadro">
			<div class="cuadro-box" id="id-cuadro-box">
			</div>
			<div class="cuadro-content">

			    <h1 class="cuadro-title"><a href="#">Nuevo</a></h1>

			    <input class="cuadro-input-text" type="text" id="linkInput" placeholder="Nombre"/>

			    <input class="cuadro-input-text" type="text" id="linkInput" placeholder="Dirección web"/>

			    <label class="cuadro-input" >Imagen
				<input type="file" accept="image/*" id="fileColaboradorInput" name="file" style="display:none" />
			    </label>

		    </article>


			</div>

			<!-- fin new elements -->

			<div class="buttonsColaborador">

			    <div class="button_cont" id="editableColaborador" align="center"><a class="example_b" href="#" onclick="return false;" >Guardar cambios</a></div>

			    <div class="button_cont" id="newColaborador" align="center"><a class="example_b" href="#" onclick="return false;" >Nuevo colaborador</a></div>

			    <div class="button_cont" align="center"><a class="example_b" href="#" onclick="return false;" >Cancelar</a></div>
			</div>



		</div>



	</div>

    
<script charset="utf-8">

const chooseFile = document.getElementById("fileColaboradorInput");
const imgPreview = document.getElementById("id-cuadro-box");

chooseFile.addEventListener("change", function () {
  getImgData();
});

function getImgData() {
  const files = chooseFile.files[0];
  if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {
      imgPreview.innerHTML = '<img src="' + this.result + '" />';
    });    
  }
}


</script>

