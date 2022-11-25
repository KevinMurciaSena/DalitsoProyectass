@extends('layouts.main')

@section('content')
    <div class="card">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <div class="card-header bg-gradient-primary text-white text-center">
            <h1>Detalle del producto</h1>
        </div>
        <div class="card-body">
            <div class="row my-3">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="my-3 d-flex justify-content-center">
                        <img class="preFoto" src="{{ asset('storage') . '/' . $producto->foto }}" alt="foto"
                            class="img-fluid img-miniatura">
                    </div>
                    <table class="table table-bordered mt-3">
                        <tbody>
                            <tr>
                                <th class="fw-bold">Nombre</th>
                                <td>{{ $producto->nombre }}</td>
                            </tr>
                            <tr>
                                <th class="fw-bold">Descripcion</th>
                                <td>{{ $producto->descripcion }}</td>
                            </tr>
                            <tr>
                                <th class="fw-bold">Unidades</th>
                                <td>{{ $producto->unidades }}</td>
                            </tr>
                            <tr>
                                <th class="fw-bold">Precio</th>
                                <td>{{ $producto->precio }}</td>
                            </tr>
                            <tr>
                                <th class="fw-bold">Categoria</th>
                                <td>{{ $producto->categoria }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('productos.index') }}" class="btn bg-gradient-primary text-white">Volver</a>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </div>

@endsection
