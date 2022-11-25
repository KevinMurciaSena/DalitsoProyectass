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
<nav class="navbar nab navbar-expand-lg"
    style="background: linear-gradient(to bottom, rgba(0, 81, 255, 0.719) 0%, #6200ffb4 50%);">

    <div class="container"> <a class="navbar-brand text-light" data-scroll-nav="0" href="{{ route('welcome.index') }}">
            Dalitso Sport</a>
        <p class="text-light navbar-brand" style="padding-right:0.8rem;">|</p>
        @can(['administrador'])
            <a class="text-white" href="{{ route('productos.index') }}">Gestion de productos</a>
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
                <a href="#busqueda" class="barra"><button class="btn btn-outline-light"><i
                            class="fa-solid fa-magnifying-glass"></i></button></a>
            </form>
            <div>
                <a class="text-white" href="{{ route('carritos.index') }}"><i
                        class="fa-solid fa-cart-shopping ms-2"></i></a>
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
    {{-- <div class="col-md-12 mb-3 section-title text-center position-absolute top-50 start-50 translate-middle">
        <h3>Carrito de compras</h3>
        <span class="section-title-line"></span>
    </div> --}}
    <div class="col-md-8 d-flex border-dark position-absolute top-50 start-50 translate-middle">
        <div class="me-2 w-100">
            <div class="card border-dark mt-5">
                <div class="card-header">
                    <h3>Carrito</h3>
                </div>
                @foreach ($carrito as $item)
                <div class="d-flex">

                    <div class="container w-80   mb-3">
                        <div class="card d-flex justify-content-between fw-bold flex-row text-end p-3 mt-3 border-dark"
                            style=" widht:4rem height: 2rem">
                            <tr>
                                <td><img class="me-3" style="width: 4rem"
                                        src="{{ asset('storage') . '/' . $item->foto }}"></td>
                                <td class="">{{ $item->nombre }}</td><br>
                                <td class="">Unidades: {{ $item->unidades }}</td><br>
                                <td class=" ">Precio Unitario: $ {{ $item->precio }}</td><br>
                                <td class=" ">Precio Total: $ {{ $item->precioT }}</td>
                                <input name="name" type="hidden" readonly class="unidades"
                                class="form-control-plaintext" id="staticEmail"
                                value="{{ $item->unidades }}"></h5>
                                
                        <input class ="suma" type ="hidden"  id="suma" value="{{ $item->precioT}}" name="" id="">
               
                        <input class ="nombres" type ="hidden"  id="nombres" value="{{ $item->nombre}}" name="" id="">
                                

               
                            </tr>
                        </div>
                        
                    </div>
                    <div class="mb-5 mt-5 me-3">
                        <form action="{{ route('carritos.destroy', $item->id) }}" method="post"
                            class="form-delete">
                            @csrf
                            @method('DELETE')
                                <span class="icon text-dark-100">
                                    <button class="btn btn-outline-none "><i class="fas fa-trash"></i></button>
                                </span> 
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="ms-2 w-100">
            <div class="card border-dark mt-5">
                <div class="card-header d-flex justify-content-between">
                    <h3>Total: </h3>
                    <form action="{{ route('recibos.store') }}" method="post" class="needs-validation" novalidate>
                    @csrf
                    
                    <h3 style="margin-top: -0.8rem">
                        <input type="number" name="precioT" class="text-end form-control-plaintext" readonly id="precioTT" >
                    </h3>
                    
                </div>
                <div class="card-body">
                    <div class="">

                       <p class="text-end">Direccion: <input type="text" name="direccion" class="mb-3" style="padding-left:0.3rem"></p> 
                    

                        @foreach($carrito as $item)          
                        <input name="user_id" type="hidden" readonly
                        class="form-control-plaintext" id="staticEmail"
                        value="{{ $UserId }}"></h5>     
                        <input name="name" type="hidden" readonly
                        class="form-control-plaintext" id="staticEmail"
                        value="{{ $name }}"></h5>
                        <input name="email" type="hidden" readonly
                        class="form-control-plaintext" id="staticEmail"
                        value="{{ $email }}"></h5
                   
                        ></h5>
                        
                      
                                   
                                       @endforeach
                                  <input name="Descripcion" type="hidden" readonly
                                       class="form-control-plaintext" 
                                       id="nombreT"></h5>
                                                 
                        <button class="btn btn-outline-dark w-100">Comprar</button>
                    </form>
                    </div>
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

<script>
    var m1 = document.getElementsByClassName("suma");

    var precioTT = 0

    for (var i = 0; i < m1.length; i++) {

        var precio = m1[i].value

        var test = parseInt(m1[i].value, 0);

        precioTT = precioTT + test


    }
    document.getElementById("precioTT").value = precioTT;

    var m2 = document.getElementsByClassName("nombres");
  
    var m3 = document.getElementsByClassName("unidades");
   
    console.log(m2);

    var nombres = ""
    
    var nombresT = ""

    for (var i = 0; i < m1.length; i++) {

        var nombre = m2[i].value;
        var precio = m1[i].value;
        var unidad = m3[i].value;
   

      

        nombresT = nombresT + " " + unidad +  " " + nombre + " " + precio + " | "
        
       console.log(nombresT)

    }


    document.getElementById("nombreT").value = nombresT;
</script>
