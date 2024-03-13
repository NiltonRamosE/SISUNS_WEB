<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SISUNS: Portal Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/2308920d3f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="{{ asset('img/computer-icon.svg') }}" type="image/svg">
    <link rel="stylesheet" href=" {{ asset('css/style.css') }} ">

    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- ==============RECIÉN AGREGADO=========== -->
    <style>
        .carousel-message {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: rgba(255, 255, 255, 0.7);
            /* Fondo semi-transparente */
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class ="row title_main">
        <div class="col-1"></div>
        <div class="col-10">
            <h1>Semillero de Investigación de la Universidad Nacional del Santa</h1>
        </div>
        <div class="col-1"></div>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('inicio') }}">
                <img src="{{ asset('img/SISUNS-logo.png') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('inicio') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link active" style="font-weight: bold">Link del repositorio: <a
                                style="color: rgb(17, 78, 158)" href="{{ $proyecto->enlace_repositorio }}">
                                <i class="fa-brands fa-github"></i> {{ $proyecto->enlace_repositorio }}
                            </a></span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <div class="container-fluid banner mb-5">
        <div class="container position-relative">
            <div class="row">
                <div class="col">
                    <h5>{{ $proyecto->titulo }}</h5>
                    @if(isset($proyecto->img_proyecto))
                        <img src="{{ asset($proyecto->img_proyecto) }}" alt="Imagen 1" class="shadow p-2 mb-2 rounded" style="width: 600px">
                    @else
                        <img src="https://picsum.photos/300/200?random=1" alt="Imagen 1" class="shadow p-2 mb-2 rounded" style="width: 600px">
                    @endif
                    <div class="mb-2">
                        <p>Subido el {{ $proyecto->created_at }}</p>
                        {{ $proyecto->descripcion }}
                    </div>
                    <!-- Inline level -->
                    <div class="form-group">
                        <span style="font-weight: bold; font-size:1.1em">Para mas información visita el repositorio: </span>
                        <a style="color: rgb(17, 78, 158)" href="{{ $proyecto->enlace_repositorio }}">
                            <i class="fa-brands fa-github"></i> {{ $proyecto->enlace_repositorio }}
                        </a>
                    </div>
                </div>
                <div class="col">
                    <h5>Contenido:</h5>
                    
                    <div class="mb-2">
                        {{ $proyecto->contenido }}
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4>Universidad</h4>
                    <ul class="footer__ul">
                        <li><a href="">Admisión</a></li>
                        <li><a href="">Pregrado</a></li>
                        <li><a href="">PostGrado</a></li>
                        <li><a href="">Semilleros de Investigación</a></li>
                    </ul>
                    <div><a href="https://www.uns.edu.pe/#/principal" target="_blank"><img
                                src="{{ asset('img/logo UNS.png') }}" alt=""></a></div>
                </div>
                <div class="col">
                    <h4>Encuentranos</h4>
                    <p>Av. Pacífico 508 - Nuevo Chimbote</p>
                    <p>Central Telefónica.: (51)-43-310445 Chimbote - Ancash - Perú.</p>
                    <p>®2016 Dirección de Imagen Institucional</p>
                    <p>Transparencia Universitaria: transparencia@uns.edu.pe</p>
                    <div class="footer__redes">
                        <a href="https://twitter.com/?lang=es" target="_blank"><img
                                src="{{ asset('img/twiter-log.png') }}" alt=""></a>
                        <a href="https://www.facebook.com/" target="_blank"><img
                                src="{{ asset('img/facebook-log.png') }}" alt=""></a>
                        <a href="https://www.youtube.com/" target="_blank"><img
                                src="{{ asset('img/youtube-log.png') }}" alt=""></a>
                        <a href="https://www.instagram.com/" target="_blank"><img
                                src="{{ asset('img/instagram-log.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col">
                    <h4>Transparencia</h4>
                    <ul class="">
                        <li><a href="" download="Resolucion_SISUNS_19_10_2023" target="_blank"><img
                                    src="{{ asset('img/download-icon.svg') }}" alt=""> Resolución
                                Vicerrectoral: SISUNS</a></li>
                        <li><a href="" download="Ley-Transparencia" target="_blank"><img
                                    src="{{ asset('img/download-icon.svg') }}" alt=""> Ley de
                                Transparencia</a></li>
                        <li><a href="" download="Ley-Creacion" target="_blank"><img
                                    src="{{ asset('img/download-icon.svg') }}" alt=""> Ley de Creación</a>
                        </li>
                    </ul>
                    <div class="">
                        <a href="#"><img src="{{ asset('img/libroReclamaciones.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col">
                    <h4>Ubícanos</h4>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1656.3078818946906!2d-78.5153739367841!3d-9.119542647810022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ab85b689424563%3A0x699ba0e0500a7e69!2sCentro%20de%20C%C3%B3mputo%20UNS!5e0!3m2!1ses-419!2spe!4v1697165213187!5m2!1ses-419!2spe"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class ="container text-center sub-footer">
            <span class="text-muted">© 2024 SISUNS - Semillero de Investigación</span>
        </div>
    </footer>
</body>

</html>
