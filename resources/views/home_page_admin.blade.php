@extends('layouts.admin_layout')

@section('content')
    <div class="container">
        {{-- GESTIÓN DE IMÁGENES EN CARRUSEL --}}
        <div class="container">
            @include('layouts._partials.admin.img_carrusel')
        </div>
@endsection

@section('scripts')
    <script>
        var contadorInputs = 0; // Variable para contar los inputs creados
        function agregarInput() {
            contadorInputs++; // Incrementamos el contador
            var inputNuevo = document.createElement('input');
            inputNuevo.type = 'text';
            inputNuevo.className = 'form-control mb-1';
            inputNuevo.placeholder = 'Ingrese nombres y apellidos';
            inputNuevo.id = 'input' + contadorInputs; // Asignamos un ID único
            inputNuevo.name = 'integrante' + contadorInputs; // Asignamos un name único

            var contenedor = document.getElementById('contenedorInputs');
            contenedor.insertBefore(inputNuevo, contenedor
            .lastElementChild); // Insertamos el nuevo input antes del último botón

            if (contadorInputs === 1) { // Si hay al menos un input, mostramos el botón "Quitar"
                document.querySelector('.btn-danger').style.display = 'inline-block';
            }
        }

        function quitarInput() {
            if (contadorInputs > 0) { // Verificamos que hay al menos un input para eliminar
                var contenedor = document.getElementById('contenedorInputs');
                var ultimoInput = document.getElementById('input' + contadorInputs); // Obtenemos el último input
                contenedor.removeChild(ultimoInput); // Eliminamos el último input
                contadorInputs--; // Disminuimos el contador

                if (contadorInputs === 0) { // Si no hay más inputs, ocultamos el botón "Quitar"
                    document.querySelector('.btn-danger').style.display = 'none';
                }
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endsection

