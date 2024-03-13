@extends('layouts.admin_layout')

@section('content')
    <div class="container">
        {{-- GESTIÓN DE INTEGRANTES ACTUALES --}}
        <div class="container mt-5">
            @include('layouts._partials.admin.gestion_integrantes')
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endsection

