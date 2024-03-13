@extends('layouts.admin_layout')

@section('content')
    <div class="container">
        {{-- GESTIÓN DE NOTICIAS --}}
        <div class="container mt-5">
            @include('layouts._partials.admin.gestion_noticias')
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function habilitarEdicion(group_id) {
            input_title = document.getElementById('title' + group_id);
            input_title.removeAttribute("readonly");
            input_img = document.getElementById('imagen_news_' + group_id);
            input_img.style.display = "inline-block";
            btn_save = document.getElementById('btn_save_' + group_id);
            btn_save.style.display = "inline-block";
            alert("hello");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endsection
