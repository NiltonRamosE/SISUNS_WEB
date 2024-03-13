<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SISUNS: Administrador</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="icon" href="{{ asset('img/computer-icon.svg') }}" type="image/svg">
    <link rel="stylesheet" href=" {{ asset('css/style.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href=" {{ asset('css/style_admin.css') }} ">
    <script src="https://kit.fontawesome.com/2308920d3f.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Encabezado -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('administrador.inicio') }}">
                <img src="{{ asset('img/SISUNS-logo.png') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <h1 class="">
                        SISUNS: <span class="admin_span_title"> ADMINISTRADOR</span>
                    </h1>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('administrador.inicio')}}">Carrusel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('administrador.noticias')}}">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('administrador.proyectos') }}">Proyectos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('administrador.integrantes') }}">Integrantes</a>
                    </li>
                </ul>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle user_title" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user"></i>
                        <span>
                            @if (Session::has('usuario'))
                                {{ $usuarioSearch->nombre . ' ' . $usuarioSearch->apellido_paterno . ' ' . $usuarioSearch->apellido_materno}}
                            @endif
                        </span>
                    </button>
                    <form class="dropdown-menu" action="{{route('administrador.logOut')}}" method="POST">
                        @csrf
                        <li><button type="submit" class="dropdown-item">Cerrar Sesión</button></li>
                    </form>
                </div>
            </div>

            </div>
        </div>
    </nav>

    <!-- Contenido específico del administrador -->
    @yield('content')


    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-light">

    </footer>

    <!-- Scripts -->
    @yield('scripts')
</body>

</html>
