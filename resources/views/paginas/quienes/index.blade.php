@extends('layouts.main')
@section('title','Alas de Colibrí')
@section('body')
<div class="container">
    <div class="quienes">
      <h1 class="copy-title">Quiénes Somos</h1>
      <p>
        Fundación Alas de Colibrí es una organización de la sociedad civil sin
        fines de lucro, que trabaja en la promoción y defensa de los derechos
        humanos y de la naturaleza, así como en la restitución de los mismos,
        mediante la intervención de un equipo especializado e
        interdisciplinario, con enfoque de género, movilidad humana,
        intergeneracional, de discapacidades y étnico - cultural
        constituyéndonos en un aporte para la construcción de una sociedad
        justa, equitativa, libre y solidaria.
      </p>
      <h1 class="copy-title">¿Por qué un colibrí?</h1>
      <div class="quienes-flex">
        <img src="{{asset('img/logoFAC.png')}}" class="quienes__logo" alt="..." />
        <p class="quienes-flex__info">
          Llevamos este nombre porque el equipo humano y profesional que trabaja
          en la Fundación, tiene la firme convicción de que los niños, niñas,
          adolescentes, jóvenes, y adultos; independientemente de su
          nacionalidad, religión y lenguaje son muy similares a los colibríes.
          Se cuenta que el colibrí se creó para transportar los sueños y los
          deseos de las personas de un lado a otro, por este motivo se muestran
          tan libres, bellos, y ágiles, sin embargo encerrarlos, enjaularlos,
          detenerlos o quitarles su libertad, les provoca la muerte. Fundación
          Alas de Colibrí, está comprometida con la defensa de los derechos
          humanos y de la naturaleza e invita a que seas parte de este camino.
        </p>
      </div>
      <p class="quienes__txt"></p>
      <div class="quienes-box">
        <div class="quienes__item">
          <img src="{{asset('img/paginas/inicio/1-min.jpg')}}" class="quienes__img" alt="..." />
          <div class="quienes__item-info">
            <h3 class="quienes__item-title">Mision</h3>
            <p class="quienes__item-txt">
              Somos una organización de la sociedad civil sin fines de lucro,
              que trabaja en la promoción y defensa de los derechos humanos y de
              la naturaleza, así como en la restitución de los mismos, mediante
              la intervención de un equipo especializado e interdisciplinario,
              con enfoque de género, movilidad humana, intergeneracional, de
              discapacidades y étnico - cultural constituyéndonos en un aporte
              para la construcción de una sociedad justa, equitativa, libre y
              solidaria.
            </p>
          </div>
        </div>
        <div class="quienes__item">
          <div class="quienes__item-info">
            <h3 class="quienes__item-title">Visión</h3>
            <p class="quienes__item-txt">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus
              neque itaque qui, tenetur ratione saepe sapiente accusamus magni
              magnam fuga optio, illum, explicabo maxime ut aperiam ullam
              commodi? Numquam perferendis harum neque tempora consequatur autem
              adipisci blanditiis facere sint inventore, fugit iusto aperiam eos
              quis soluta doloribus voluptatum illo laboriosam.
            </p>
          </div>
          <img src="{{asset('img/paginas/inicio/2-min.jpg')}}" class="quienes__img" alt="..." />
        </div>
        <div class="quienes__item">
          <img src="{{asset('img/paginas/inicio/3-min.jpg')}}" class="quienes__img" alt="..." />
          <div class="quienes__item-info">
            <h3 class="quienes__item-title">Objetivos</h3>
            <p class="quienes__item-txt">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero
              nihil rerum hic quo blanditiis nobis minus eum aut unde! Voluptas
              asperiores quidem veniam laudantium aliquid, perspiciatis earum?
              Voluptate esse quasi, veritatis eveniet nesciunt doloribus,
              facilis ratione itaque minima sunt repellendus culpa qui eos
              cupiditate aliquam? Earum praesentium sequi sint minus possimus.
              Aspernatur, deserunt dolor nobis facere voluptas repellat aliquam
              culpa!
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
