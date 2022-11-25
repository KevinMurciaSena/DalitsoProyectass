@extends('layouts.main')


@section('content')
    <div class="card shadow">
        <div class="card-header bg-gradient-primary text-white text-center">
            <h1>Editar categoria</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('categorias.update', $categoria->id) }}" method="post" class="needs-validation" novalidate>
                @method('PUT')
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
                        value="{{ $categoria->nombre }}" required>
                    <label for="nombre">Nombre</label>
                </div>
                <button type="submit" class="w-100 btn bg-gradient-primary text-white">Guardar</button>
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
