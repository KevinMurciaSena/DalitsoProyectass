@extends('layouts.main')



@section('content')
<div class="card shadow">
    <div class="card-header bg-gradient-primary shadow text-center">
        <h1 class="text-white">Nueva categoria</h1>
    </div>
        <div class="card-body">
            <form action="{{ route('categorias.store') }}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                    <label for="nombre">Nombre</label>
                </div>
                <button type="submit" class=" w-100 btn bg-gradient-primary text-white mt-3">Guardar</button>
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
