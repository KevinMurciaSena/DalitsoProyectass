@extends('layouts.main')


@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i>Crear Usuario</a>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Usuarios</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    @foreach ($usuarios as $item)
                                        <tr>
                                            <td class="w-90">{{ $item->name }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('usuarios.edit', $item->id) }}" class="btn btn-warning float-end me-2 btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </span>
                                                    <span class="text">Editar</span>
                                                </a>
                                            </td>
                                            <hr>
                                        </tr>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="card">
        <div class="card-header text-center">
            <h1>Usuarios</h1>
        </div>
        <div class="card-body">
            @if ($mensaje = Session::get('exito'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p>{{ $mensaje }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($mensaje = Session::get('warning'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p>{{ $mensaje }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="my-3">
                @if (count($usuarios) > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('usuarios.edit', $item->id) }}"
                                            class="btn btn-warning justify-content-start me-1 rounded-circle"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>no hay nada que coincida con la busqueda</p>
                @endif

            </div>
        </div>
    </div> --}}
        @endsection
