<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>Bubbletea&Coffee</title>
    <link rel="icon" href="assets/images/favicon.png" type="image/png" />

    <!-- Bootstrap core CSS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/template.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

<!--

TemplateMo 579 Cyborg Gaming

https://templatemo.com/tm-579-cyborg-gaming

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{route('inicio')}}" class="logo">
                        <img src="assets/images/logo.png" alt="" width="auto" height="auto">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Search End ***** -->
                    <div class="search-input">
                      <form id="search" action="#">
                        <input type="text" placeholder="Buscar..." id='searchText' name="searchKeyword" onkeypress="handle" />
                        <i class="fa fa-search"></i>
                      </form>
                    </div>
                    <!-- ***** Search End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{route('inicio')}}">Recetas</a></li>
                        <li><a href="{{route('galeria')}}">Galería</a></li>
                        @if(Auth::check())
                           @if(Auth::user()->role=='1')
                              <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="{{route('recetasAdmin')}}">Gestionar</a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item text-center text-morado" href="{{route('recetasAdmin')}}">Recetas</a>
                                  <a class="dropdown-item text-center text-morado" href="{{route('categoriasAdmin')}}">Categorias</a>
                                  <a class="dropdown-item text-center text-morado" href="{{route('fotosAdmin')}}">Fotos</a>
                                </div>

                              </li>
                            @endif
                        @endif
                        <li><a href="{{route('misRecetas')}}">Mis recetas</a></li>
                        <li>
                          @guest
                              @if (Route::has('login'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}<img src="assets/images/profile-header.png" alt=""></a>
                                  </li>
                              @endif
                              @else
                                <li class="nav-item dropdown">

                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}<img src="assets/images/profile-header.png" alt="">
                                    </a>
                                    

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item bg-white text-center text-morado" href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar sesión') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                          @endguest
                        </li>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header><br><br>
  <!-- ***** Header Area End ***** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">

        <!-- ***** Most Popular Start ***** -->
        <div class="most-popular">
          <div class="row mt-5">
            <div class="col-lg-12">
              @yield('content')
            </div>
          </div>
        </div>
        <!-- ***** Most Popular End ***** -->

      </div>
    </div>
  </div>
  
  <!-- <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2023 <br> Todos los derechos reservados a Bubbletea&Coffee DIY.</p>
        </div>
      </div>
    </div>
  </footer> -->

  <footer class="bg-carbon text-center text-white">
    <!-- Grid container -->
    <div class="container p-0 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4">
  
        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating mt-4 m-1" href="https://twitter.com/?lang=es" role="button"
          ><i class="fab fa-twitter"></i
        ></a>

        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating mt-4 m-1" href="https://www.instagram.com/" role="button"
          ><i class="fab fa-instagram"></i
        ></a>

        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating mt-4 m-1" href="https://www.linkedin.com/in/david-l%C3%B3pez-tapias-a02649239/" role="button"
          ><i class="fab fa-linkedin-in"></i
        ></a>

        <!-- Github -->
        <a class="btn btn-outline-light btn-floating mt-4 m-1" href="https://github.com/Davidlt4" role="button"
          ><i class="fab fa-github"></i
        ></a>

      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      <p class="text-white">Copyright © 2023 <br> Todos los derechos reservados a Bubbletea&Coffee DIY.</p>
    </div>
    <!-- Copyright -->
    
  </footer>



  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>


  </body>

</html>
