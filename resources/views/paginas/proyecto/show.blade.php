@extends('layouts.main')
@section('title','Alas de Colibrí')
@section('body')
<div class="container principal">
    <h1 class="copy-title">Nombre del proyecto</h1>
    <p>
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio animi
      libero consectetur esse velit consequatur nam illo deleniti tempore.
      Recusandae possimus nobis enim, similique ab eos asperiores amet itaque,
      omnis odit sit. Esse sunt dolorem dicta cupiditate suscipit cum. Eos
      eveniet consequatur similique cumque veniam. Accusamus amet natus
      blanditiis cumque?
    </p>
    <script>
        lightbox.option({
          'disableScrolling': true
          })
    </script>
    <section class="galeria-noticia">
     <a href="{{asset('img/paginas/inicio/1-min.jpg')}}" data-lightbox="roadtrip"><img src="{{asset('img/paginas/inicio/1-min.jpg')}}" alt=""/></a>
     <a href="{{asset('img/paginas/inicio/1-min.jpg')}}" data-lightbox="roadtrip"><img src="{{asset('img/paginas/inicio/1-min.jpg')}}" alt=""/></a>
     <a href="{{asset('img/paginas/inicio/1-min.jpg')}}" data-lightbox="roadtrip"><img src="{{asset('img/paginas/inicio/1-min.jpg')}}" alt=""/></a>
     <a href="{{asset('img/paginas/inicio/1-min.jpg')}}" data-lightbox="roadtrip"><img src="{{asset('img/paginas/inicio/1-min.jpg')}}" alt=""/></a>
     <a href="{{asset('img/paginas/inicio/1-min.jpg')}}" data-lightbox="roadtrip"><img src="{{asset('img/paginas/inicio/1-min.jpg')}}" alt=""/></a>
     <a href="{{asset('img/paginas/inicio/1-min.jpg')}}" data-lightbox="roadtrip"><img src="{{asset('img/paginas/inicio/1-min.jpg')}}" alt=""/></a>

    </section>
    <section class="more-info">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum maxime veniam maiores id iure earum officiis natus quaerat. Ea vitae sit voluptatem mollitia autem, nesciunt, quae in porro numquam temporibus, adipisci expedita optio sed quia aspernatur repellat assumenda reiciendis perferendis debitis voluptate dignissimos eum iure. Ut non voluptatum incidunt sequi.</p>
    </section>
  </div>
@endsection
