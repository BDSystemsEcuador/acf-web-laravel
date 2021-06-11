<div class="menu-contenedor ">
    <div id="menu-box" class="menu-contenedor container-nav">
      <div class="menu-bar-container">
        <div class="menu-bar container ">
          <a class="nav__logo" href="/"
            ><img
              class="nav__logo"
              src="{{asset('img/logoFAC.png')}}"
              alt="Inicio"
              srcset=""
              title="Inicio"
          /></a>
          <span class="nav-bar" id="btnMenu"
            >Menú<i class="fas fa-bars"></i
          ></span>
        </div>
      </div>
      <nav class="main-nav" id="main-nav">
        <ul class="menu">
          <li class="menu__item">
            <a href="/" class="menu__link">Inicio</a>
          </li>
          {{-- <li class="menu__item">
            <a href="/quienes_somos" class="menu__link">Quiénes Somos</a>
          </li> --}}
          @inject('categories', 'App\Http\Controllers\CategoryController')
          @inject('pages', 'App\Http\Controllers\CategoryController')

          @foreach ($pages->pages() as $page)
            @if ($page->category_id == null)
            <li class="menu__item">
              <a href="{{route('paginas.show',$page->id)}}" class="menu__link">{{$page->title}}</a>
            </li>
            @endif
          @endforeach
          {{-- menu dinamico --}}
          @foreach ($categories->categories() as $category)
          @if (count($category->pages )>0)
          <li class="menu__item container-submenu">
            <a href="#" class="menu__link submenu-btn"
              >{{$category->title}}<i class="fas fa-chevron-down"></i
            ></a>
            <ul class="submenu">
              @foreach ($category->pages as $page)
              <li class="menu__item">
                <a href="{{route('paginas.show',$page->id)}}" class="menu__link">{{$page->title}}</a>
              </li>
              @endforeach

            </ul>
          </li>      
          @endif

          @endforeach
          {{-- <li class="menu__item container-submenu">
            <a href="#" class="menu__link submenu-btn"
              >Comunicación <i class="fas fa-chevron-down"></i
            ></a>
            <ul class="submenu">
              <li class="menu__item">
                <a href="" class="menu__link">Boletines</a>
              </li>
              <li class="menu__item">
                <a href="" class="menu__link">ACF en medios</a>
              </li>
              <li class="menu__item">
                <a href="" class="menu__link">Material educomunicacional</a>
              </li>
            </ul>
          </li> --}}
          {{-- <li class="menu__item container-submenu">
            <a href="#" class="menu__link submenu-btn"
              >Únete y participa <i class="fas fa-chevron-down"></i
            ></a>
            <ul class="submenu">
              <li class="menu__item">
                <a href="" class="menu__link">Donaciones</a>
              </li>
              <li class="menu__item">
                <a href="" class="menu__link">Voluntariado</a>
              </li>
            </ul>
          </li> --}}
          {{-- <li class="menu__item">
            <a href="#" class="menu__link">Rendición de cuentas</a>
          </li> --}}
          <li class="menu__item">
            <a href="/admin" class="menu__link">Acceder</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
