@extends('layouts.main')


@section('content')
    @if ($query)
        <div class="alert alert-info" role="alert">
            <p>A continuacion se presentan los resultados de la busqueda <span class="fw-bold">{{ $query }}</span></p>
        </div>
    @endif
    @if ($mensaje = Session::get('exito'))
        <div class="alert alert-success bg-success border-dark alert-dismissible fade show" role="alert">
            <p>{{ $mensaje }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($mensaje = Session::get('Error'))
        <div class="text-white alert alert-success bg-danger border-dark alert-dismissible fade show" role="alert">
            <p>{{ $mensaje }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card shadow">
        <div class="card-header bg-gradient-primary text-center">
            <h1 class="text-white">Categorias</h1>
        </div>
        <div class="card-body">
    @can(['administrador'])
        <div class="mt-3">
            <a href="{{ route('categorias.create') }}" class="btn bg-gradient-primary text-white mb-3">
                Crear nueva categoria
            </a>
        </div>
    @endcan
            <div class="my-3">
                @if (count($categorias) > 0)
                    <table class="table table-hover">
                        <thead>
                            <th>Nombre</th>
                            <th class="text-center">Acciones</th>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $item)
                                <tr>
                                    <td class="fw-bold">{{ $item->nombre }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('categorias.show', $item->id) }}"
                                        class="btn btn-success me-2 float-end btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fa-solid fa-eye"></i>
                                        </span>
                                        <span class="text">Ver</span>
                                    </a>
                                    <a href="{{ route('categorias.edit', $item->id) }}"
                                        class="btn btn-warning float-end me-2 btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </span>
                                        <span class="text">Editar</span>
                                    </a>
                                    <form action="{{ route('categorias.destroy', $item->id) }}" method="post"
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
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categorias->links() }}
                @else
                    <p>no hay nada que coincida con la busqueda</p>
                @endif

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
