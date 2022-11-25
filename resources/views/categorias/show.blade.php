@extends('layouts.main')


@section('content')
    <div class="card">
        <div class="card-header text-center">
            <h1>Detalle de categoria</h1>
        </div>
        <div class="card-body">
            <div class="my-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>{{ $categoria->nombre }}</td>
                    </tbody>
                </table>
                @can(['administrador'])
                    <h4 class="my-3">Productos:</h4>
                    <ul class="list-group list-group-flush mb-3">
                        @foreach ($productos as $item)
                            <li class="list-group-item">{{ $item->nombre }} {{ $item->apellido }}</li>
                        @endforeach
                    </ul>
                @endcan
                <a href="{{ route('categorias.index') }}" class="w-100 btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>


    @endsection
