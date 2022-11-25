<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icono.css') }}">

    <title>Recibo</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid p-5">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Recibo</h1>

        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="">
                <div
                    class="card border-left-success shadow w-50 vh-50 py-2 position-absolute top-50 start-50 translate-middle">
                    <div class="card-body">
                        <div class="card-header bg-white text-center">
                            <div class="d-flex justify-content-between">
                                <img src="{{ asset('images/fondoo.png') }}" style="width:12rem">
                                <div class="col-ms-6">
                                    <ul>
                                        <h4 class="fw-bold text-black">Dalitso Shop</h4>
                                        <p>3164758898</p>
                                        <p>cll 145a #143 12</p>
                                    </ul>
                                </div>
                                <div class="col-ms-6">
                                    <ul>
                                        <p>Fecha</p>
                                        <p>Número de factura</p>
                                        <p></p>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-1">
                            <div class="text-xl font-weight-bold text-success text-uppercase ms-2 mb-3">
                               
                            </div>
                            <form action="{{ route('recibos.store') }}" method="post" class="needs-validation"
                                enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="d-flex justify-content-evenly mb-4">
                                    <div>
                                        <ul>
                                                <h5><strong>Nombre:</strong><input name="name" type="text" readonly
                                                        class="form-control-plaintext" id="staticEmail"
                                                        value=" {{ $name }}">
                                                    <h5><strong>Email:</strong><input name="email" type="text" readonly
                                                            class="form-control-plaintext" id="staticEmail"
                                                            value="{{ $email }}"> </h5>
                                            <h5><strong>Direccion:</strong><input name="direccion" type="text" class="form-control mt-2" id="staticEmail2"></h5>
                                        </ul>


                                    </div>
                                    <div>
                                        <ul>
                                            <h5><strong>Producto:</strong><input name="nombre" type="text" readonly
                                                    class="form-control-plaintext" id="staticEmail"
                                                    value=" {{ $producto->nombre }}"> </h5>
                                            <h5><strong>Precio:</strong><input name="precio" type="text" readonly
                                                    class="form-control-plaintext" id="staticEmail"
                                                    value="{{ $producto->precio }}">

                                                    <input name="producto_id" type="hidden" readonly
                                                    class="form-control-plaintext" id="staticEmail"
                                                    value="{{ $producto->id}}"></h5>
                                                    <input name="user_id" type="hidden" readonly
                                                    class="form-control-plaintext" id="staticEmail"
                                                    value="{{ $id_user }}"></h5>
                                        </ul>
                                    </div>
                                </div>
                                <button type="submit" class="btn bg-success text-white"><i
                                class="fas fa-download fa-sm  text-white-50 me-2"></i>Confirmar compra</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>
<script>

var m1 = document.getElementById("precio");
var m2 = document.getElementById("unidades");
var boton_de_calcular = document.getElementById("calcular");
boton_de_calcular.addEventListener("click", res);

function res() {
    var multi = m1.value * m2.value;
    document.getElementById("precioT").value = multi ; }
    
</script>
