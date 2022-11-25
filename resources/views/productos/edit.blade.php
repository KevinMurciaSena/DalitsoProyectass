@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <div class="card shadow">
        <div class="card-header bg-gradient-primary text-white text-center">
            <h1>Editar productos</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('productos.update', $producto->id) }}" method="post" class="needs-validation"
                enctype="multipart/form-data" novalidate>
                @method('PUT')
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
                        value="{{ $producto->nombre }}"required>
                    <label for="nombre">Nombre</label>
                    <div class="invalid-feedback">
                        debe ingresar el nombre del producto
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion"
                        value="{{ $producto->descripcion }}" required>
                    <label for="descripcion">Descripcion</label>

                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="unidades" name="unidades" placeholder="unidades"
                        minlength="10" maxlength="10" value="{{ $producto->unidades }}" required>
                    <label for="unidades">Unidades</label>
                    <div class="invalid-feedback">
                        El numero de unidades debe contener 10 digitos
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="precio" name="precio" placeholder="precio"
                        value="{{ $producto->precio }}" required>
                    <label for="precio">Precio</label>
                    <div class="invalid-feedback">
                        debe ingresar la precio del producto
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="categoria_id" name="categoria_id" required>
                        <option selected value="">Selecione...</option>
                        @foreach ($categorias as $item)
                            <option value="{{ $item->id }}" @if ($item->id == $producto->categoria_id) selected @endif>
                                {{ $item->nombre }}</option>
                        @endforeach
                    </select>
                    <label for="categoria_id">Categoria</label>
                    <div class="invalid-feedback">
                        debe seleccionar un categoria.
                    </div>
                </div>
                <div class="mb-3">
                    @if (isset($producto->foto))
                        <img class="preFoto" src="{{ asset('storage') . '/' . $producto->foto }}" alt="Foto"
                            class="img-fluid img-miniatura">
                    @endif
                    <div class="mb-3">
                        <label for="foto">Foto:</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>

                </div>

                <button type="submit" class="btn bg-gradient-primary text-white">Guardar</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>

@endsection
