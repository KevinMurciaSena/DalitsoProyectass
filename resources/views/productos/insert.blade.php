@extends('layouts.main')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-gradient-primary text-white text-center">
            <h1>Nuevo producto</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('productos.store') }}" method="post" class="needs-validation" enctype="multipart/form-data"
                novalidate>
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                    <label for="nombre">Nombre</label>
                    <div class="invalid-feedback">
                        debe ingresar el nombre del producto
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion"
                        required>
                    <label for="descripcion">Descripcion</label>

                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="unidades" name="unidades" placeholder="unidades"
                        minlength="10" maxlength="10" required>
                    <label for="unidades">Unidades</label>
                    <div class="invalid-feedback">
                        El numero de unidades no es correcto
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="precio" name="precio" placeholder="precio" required>
                    <label for="precio">Precio</label>
                    <div class="invalid-feedback">
                        debe ingresar la precio del producto
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="categoria_id" name="categoria_id" required>
                        <option selected value="">Selecione...</option>
                        @foreach ($categorias as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                    <label for="categoria_id">categoria</label>
                    <div class="invalid-feedback">
                        debe seleccionar un categoria
                    </div>
                </div>
                <div class="mb-3">
                    <label for="fot">Foto:</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
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
