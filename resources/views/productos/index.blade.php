@extends('layouts.main')


@section('content')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @if ($mensaje = Session::get('exito'))
        <div class="alert alert-success bg-success border-dark alert-dismissible fade show" role="alert">
            <p>{{ $mensaje }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card shadow">
        <div class="card-header bg-gradient-primary text-white text-center">
            <h1>Productos</h1>
        </div>
        <div class="card-body">
            <div class="mt-3">
                <a href="{{ route('productos.create') }}" class="btn bg-gradient-primary text-white">
                    Crear nuevo producto
                </a>
            </div>
            <div class="my-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th class="text-center">Acciones</th>
                            <th class="text-start">Comprar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $item)
                            <tr>
                                <td class="fw-bold">{{ $item->nombre }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('productos.show', $item->id) }}"
                                        class="btn btn-success me-2 float-end btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fa-solid fa-eye"></i>
                                        </span>
                                        <span class="text">Ver</span>
                                    </a>
                                    <a href="{{ route('productos.edit', $item->id) }}"
                                        class="btn btn-warning float-end me-2 btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </span>
                                        <span class="text">Editar</span>
                                    </a>
                                    <form action="{{ route('productos.destroy', $item->id) }}" method="post"
                                        class="justify-content-start form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger float-end me-2 btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Eliminar</span>
                                        </button>
                                    </form>



                                    {{-- <a href="{{ route('productos.show', $item->id) }}"
                                        class="btn btn-info justify-content-start me-1 rounded-circle"><i
                                            class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('productos.edit', $item->id) }}"
                                        class="btn btn-warning justify-content-start me-1 rounded-circle"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('productos.destroy', $item->id) }}" method="post"
                                        class="justify-content-start form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded-circle"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </form> --}}
                                </td>
                                <form action="{{ route('carritos.show', $item->id) }}">
                                    <td><button class="btn btn-outline-dark btn-block"><i
                                                class="fa-solid fa-bag-shopping"></i></button></td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
          
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script>
        $('.form-delete').submit(function(e) {
            e.preventDefault();
            //Lanzar alerta de Sweetalert
            Swal.fire({
                title: '¿Esta seguro de eliminar?',
                text: "Esta acción no se podrá deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0d6efd',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection
