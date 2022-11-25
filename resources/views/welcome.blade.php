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

<body>
    <!-- Navbar -->
    <nav class="navbar nab navbar-expand-lg  ">

        <div class="container"> <a class="navbar-brand text-light" data-scroll-nav="0" href="">Dalitso Sport</a>
            <p class="text-light navbar-brand" style="padding-right:0.8rem;">|</p>
            @can(['administrador'])
                <a class="text-white" href="{{ route('categorias.index') }}">Gestion de productos</a>
            @endcan
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span
                    class="fas fa-bars"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar..." name="buscar"
                        aria-label="Buscar">

                    <a href="#busqueda" class="barra"><button class="btn btn-outline-light">
                        <i class="fa-solid fa-magnifying-glass"></i> </button>
                    </a>
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
    <!-- End Navbar -->

    <!-- Banner Image -->

    <div class="banner text-center" data-scroll-index='0'>
        <div class="banner-overlay">
            <div class="container">
                @if ($mensaje = Session::get('exito'))
                    <div class="alert text-center w-100 ms-3 fade show border-radius"
                        style="width:30rem" role="alert">
                            <li>
                                <p>{{ $mensaje }}</p>
                            </li>
                    
                    </div>
                @endif
                <h1 class="text-capitalize">Bienvenido a Dalitso Sport</h1>
                <p class="fs-5">Bienvenido a Dalitso Sport tienda deportiva.</p>

                @guest
                    <a href="{{ route('productos.index') }}" class="banner-btn shadow">Iniciar sesion</a>
                @endguest

            </div>
        </div>
    </div>

    <!-- End Banner Image -->

    <!-- About -->

    <div class="about-us section-padding" data-scroll-index='1'>
        <div class="container">
            <div class="row">
                <div>
                    <div class="col-md-12 section-title text-center">
                        <h3 class="fw-bold">Categorias.</h3>
                        <span class="section-title-line" id="busqueda"></span>
                        @foreach ($categoria as $item)
                            <tr>
                                <td><a
                                        class="pl-3 mt-5 fs-4 pt-3"href="{{ route('categorias.show', ['categoria' => $item->id]) }}">{{ $item->nombre }}</a>
                                </td>

                            </tr>
                        @endforeach

                    </div>
                    <div class="col-md-12 mb-4 section-title text-center">
                        <h3 class="fw-bold      ">Descubre nuestros nuevos productos.</h3>
                        <span class="section-title-line"></span>
                    </div>
                </div>
                <div class="grid-view col-lg-12">
                    <div class="row">
                        @foreach ($productos as $item)
                            <div class="col-lg-4 col-md-5 col-sm-5 col-8">
                                <div class="card border-dark mb-5 shadow rounded-4" style="width: 100%; height:34rem;">
                                    <img src="{{ asset('storage') . '/' . $item->foto }}"
                                        class="img-fluid img-miniatura mt-3" alt="foto">
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush d-flex">
                                            <li class="list-group-item border-dark"><b>Nombre:</b> {{ $item->nombre }}</li>
                                            <li class="list-group-item border-dark"><b>Descripcion:</b>
                                                {{ $item->descripcion }}</li>
                                            <li class="list-group-item border-dark"><b>Precio:</b> ${{ $item->precio }}</li>
                                            <div class=" boton card-body">
                                                <li class=" list-group-item">
                                                    @auth
                                                        <form action="{{ route('compras.show', $item->id) }}">
                                                        @endauth
                                                        @guest

                                                        <form action="{{ route('login') }}">
                                                        @endguest
                                                        <button class="btn btn-outline-dark w-100 shadow">
                                                            Ver producto</button>
                                                    </form>
                                                </li>
                                            </div>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div> {{ $productos->links() }} </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
    <div class="col-md-6 mb-50">
        <div class="section-img"> <img src="images/about.jpg" alt="" class="img-responsive" />
        </div>
    </div>
    </div>
    </div>
    </div>

    <!-- End About -->

    <!-- Services -->
    {{-- <div class="services section-padding bg-grey" data-scroll-index='2'>
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title text-center">
                    <h3>We Are Best At Our Service</h3>
                    <p>Vestibulum elementum dui tempus dolor gravida, vel mattis erat fermentum.</p>
                    <span class="section-title-line"></span>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-30">
                    <div class="service-box bg-white text-center">
                        <div class="icon"> <i class="fas fa-chart-line"></i> </div>
                        <div class="icon-text">
                            <h4 class="title-box">Chart Line</h4>
                            <p>Sed malesuada, est eget condimentum iaculis, nisi ex facilisis metus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-30">
                    <div class="service-box bg-white text-center">
                        <div class="icon"> <i class="fas fa-bullhorn "></i> </div>
                        <div class="icon-text">
                            <h4 class="title-box">Quick Anouncement</h4>
                            <p>Sed malesuada, est eget condimentum iaculis, nisi ex facilisis metus.</p>
                        </div>
                    </div>class="preFoto"
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-30">
                    <div class="service-box bg-white text-center">
                        <div class="icon"> <i class="fas fa-map-marked"></i> </div>
                        <div class="icon-text">
                            <h4 class="title-box">Mark Location</h4>
                            <p>Sed malesuada, est eget condimentum iaculis, nisi ex facilisis metus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-30">
                    <div class="service-box bg-white text-center">
                        <div class="icon"> <i class="fas fa-bug"></i> </div>
                        <div class="icon-text">
                            <h4 class="title-box">Bug Solution</h4>
                            <p>Sed malesuada, est eget condimentum iaculis, nisi ex facilisis metus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-30">
                    <div class="service-box bg-white text-center">
                        <div class="icon"> <i class="fas fa-comments"></i> </div>
                        <div class="icon-text">
                            <h4 class="title-box">Fast Communication</h4>
                            <p>Sed malesuada, est eget condimentum iaculis, nisi ex facilisis metus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-30">
                    <div class="service-box bg-white text-center">
                        <div class="icon"> <i class="fas fa-paint-brush"></i> </div>
                        <div class="icon-text">
                            <h4 class="title-box">Clean Design</h4>
                            <p>Sed malesuada, est eget condimentum iaculis, nisi ex facilisis metus.</p>
                        </div>
                    </div>
                </div> --}}
    </div>
    </div>
    </div>




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
