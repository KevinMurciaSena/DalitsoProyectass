<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Bienvenido a Dalitso Sport</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
        integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.fancybox.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.default.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<nav class="navbar nab navbar-expand-lg" style="background-color: rgb(37,37,37)">
  
    <div class="container"> <a class="navbar-brand text-light" data-scroll-nav="0" href="{{ route('welcome.index') }}">Dalitso Sport</a>
        <p class="text-light navbar-brand" style="padding-right:0.8rem;">|</p>
        @can(['administrador'])
        <a class="text-white" href="{{ route('productos.index')}}">Gestion de productos</a>
        @endcan
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span
                class="fas fa-bars"></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <form class="d-flex" role="search" >
                <input class="form-control me-2" type="search" placeholder="Buscar..." name="buscar"
                    aria-label="Buscar">
                    <a href="#busqueda" class="barra"><button class="btn btn-outline-light"><i class="fa-solid fa-magnifying-glass"></i></button></a>
            </form>
            <div>
                <a class="text-white" href="{{ route('carritos.index') }}"><i class="fa-solid fa-cart-shopping ms-2"></i></a>
            </div>
            <ul class="navbar-nav text-dark ms-3">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu text-dark">
                            <li>
                                <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit()";>
                                    Cerrar sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="post">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                </ul>
        </div>
    </div>
</nav>

<body>
    

   
    <div class="about-us section-padding" data-scroll-index='1'>
    
        <div class="container">
         
                    <div class="col-md-12 section-title text-center " style="padding-top:1px;" >
                        <h3>Informacion del producto</h3>
                        <span class="section-title-line"></span>            
                    </div>
                    
                </div>               
              <form action="{{ route('carritos.store') }}" method="post" class="needs-validation" 
                enctype="multipart/form-data" novalidate> 
                @csrf

                <div class="container card border-dark position-absolute top-50 start-50 translate-middle shadow " style="margin-top: 3rem ">
                    <div class="card-body row" style="width: 100%; height:30rem; ">
           

              
                <div class="col"> 
                    <img src="{{ asset('storage') . '/' . $producto->foto }}" style="padding-left:1rem; padding-top:3rem; height:19.5rem; padding-left:3.2rem">
                </div>
                    <div style="padding-right:3rem; padding-top:3rem;" class="col">
                    <ul>
                        <li class="card-item"><b>Nombre:</b> {{ $producto->nombre }}</li>
                        <br><br>
                        <li><b>Descripcion:</b>
                            {{ $producto->descripcion }}</li>
                            <br><br>
                        <li><b>Precio:</b> ${{ $producto->precio }}</li>
                        <br><br>
                        <li><b>Categoria: </b>{{ $producto ->categoria}}</li>

                        <input name="producto_id" type="hidden" readonly
                        class="form-control-plaintext" id="staticEmail"
                        value="{{ $producto->id}}"></h5>

                        <input name="user_id" type="hidden" readonly
                        class="form-control-plaintext" id="staticEmail"
                        value="{{ $id_user }}"></h5>

                        <input name="name" type="hidden" readonly
                        class="form-control-plaintext" id="staticEmail"
                        value="{{ $name }}"></h5>

                        <input name="email" type="hidden" readonly
                        class="form-control-plaintext" id="staticEmail"
                        value="{{ $email }}"></h5>

                        <input name="nombre" type="hidden" readonly
                        class="form-control-plaintext" id="staticEmail"
                        value="{{ $producto->nombre }}"></h5>

                          <input name="precio" type="hidden" readonly
                        class="form-control-plaintext" id="precio" id="staticEmail"
                        value="{{ $producto->precio }}"></h5>
                        
                        <input name="foto" type="hidden" readonly
                        class="form-control-plaintext" id="staticEmail"
                        value="{{$producto->foto }}"></h5>

                    </ul>
                    <div>
                </div>      
            </div>
                <div class="col" style="height: 10rem; margin-top:6rem;">
                    <div class="section-title text-center" style="margin-top:-5rem; padding-bottom:1rem" >
                        <h3 style="font-size: 1.5rem">Informacion del local</h3>
                        <span class="section-title-line"></span>            
                    </div>
                    <div class="card container">
                    <p style="padding-top:0.2rem"><strong>Direccion: </strong> Mnz B-Casa#31-Valparaiso I</p>

                    <p style="padding-top:1rem"><strong>Correo Electronico: </strong>Dalitso@gmail.com</p>

                    <p style="padding-top:1rem; padding-bottom:0.2rem"><strong>Numero: </strong> 3158096274</p>
                    </div>

                    @auth
                    <p class=" ml-3" > <strong>Cantidad: </strong><input id="unidades" name="unidades" type="number"
                        class="mt-4 ml-1 pl-1" style="width: 3rem;" minlenght="0" maxlength="2" id="staticEmail" value="1"
                     ></p></div>

                     <input type="hidden" name="precioT" id="precioT">
                     
                     @endauth
         


                <div class="row" style="padding-left:4rem;">
                <div class="justify-content-between " style="padding-top: 2rem;">
                    
                    <li><button class="btn btn-outline-dark w-100 shadow" id="calcular" >Añadir al carrito</button></li>
          
                </div>
                <div class="col justify-content-between" style="padding-top: 2rem;">
                </form>
                {{-- <li><form action="{{ route('recibos.show', $producto->id) }}">
                
                    @csrf
                  
                     <button class="btn btn-outline-dark w-100 shadow">comprar</button></li></form>
               </div> --}}

           
            </div>
            </div>
        
            
            </div>
        </div>
    </div>

</body>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
    </script>
    <!-- owl carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- magnific-popup -->
    <script src="js/jquery.fancybox.min.js"></script>

    <!-- scrollIt js -->
    <script src="js/scrollIt.min.js"></script>

    <!-- isotope.pkgd.min js -->
    <script src="js/isotope.pkgd.min.js"></script>
    <script>
             var m1 = document.getElementById("precio");
                var m2 = document.getElementById("unidades");
                var boton_de_calcular = document.getElementById("calcular");
                boton_de_calcular.addEventListener("click", res);
            
                function res() {
                    var multi = m1.value * m2.value;
                    document.getElementById("precioT").value = multi ; }

        $(window).on("scroll", function() {

            var bodyScroll = $(window).scrollTop(),
                navbar = $(".navbar");

            if (bodyScroll > 130) {

                navbar.addClass("nav-scroll");
                $('.navbar-logo img').attr('src', 'images/logo-black.png');


            } else {

                navbar.removeClass("nav-scroll");
                $('.navbar-logo img').attr('src', 'images/logo-white.png');

            }

        });

        $(window).on("load", function() {



            var bodyScroll = $(window).scrollTop(),
                navbar = $(".navbar");

            if (bodyScroll > 130) {

                navbar.addClass("nav-scroll");
                $('.navbar-logo img').attr('src', 'images/logo-black.png');


            } else {

                navbar.removeClass("nav-scroll");
                $('.navbar-logo img').attr('src', 'images/logo-white.png');

            }

            /* smooth scroll
              -------------------------------------------------------*/
            $.scrollIt({

                easing: 'swing', // the easing function for animation
                scrollTime: 900, // how long (in ms) the animation takes
                activeClass: 'active', // class given to the active nav element
                onPageChange: null, // function(pageIndex) that is called when page is changed
                topOffset: -63
            });

            /* isotope
            -------------------------------------------------------*/
            var $gallery = $('.gallery').isotope({});
            $('.gallery').isotope({

                // options
                itemSelector: '.item-img',
                transitionDuration: '0.5s',

            });


            $(".gallery .single-image").fancybox({
                'transitionIn': 'elastic',
                'transitionOut': 'elastic',
                'speedIn': 600,
                'speedOut': 200,
                'overlayShow': false
            });


            /* filter items on button click
            -------------------------------------------------------*/
            $('.filtering').on('click', 'button', function() {

                var filterValue = $(this).attr('data-filter');

                $gallery.isotope({
                    filter: filterValue
                });

            });

            $('.filtering').on('click', 'button', function() {

                $(this).addClass('active').siblings().removeClass('active');

            });

        })

        $(function() {
            $(".cover-bg").each(function() {
                var attr = $(this).attr('data-image-src');

                if (typeof attr !== typeof undefined && attr !== false) {
                    $(this).css('background-image', 'url(' + attr + ')');
                }

            });

            /* sections background color from data background
            -------------------------------------------------------*/
            $("[data-background-color]").each(function() {
                $(this).css("background-color", $(this).attr("data-background-color"));
            });


            /* Owl Caroursel testimonial
              -------------------------------------------------------*/

            $('.testimonials .owl-carousel').owlCarousel({
                loop: true,
                autoplay: true,
                items: 1,
                margin: 30,
                dots: true,
                nav: false,

            });

        });
    </script>



