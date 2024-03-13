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
                        <a class="nav-link" href="#section_n">Acerca de Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#section_p">Proyectos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#section_nt">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#section_c">Contacto</a>
                    </li>
                    {{--
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('administrador.login') }}">Login</a>
                    </li>
                    --}}
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <div class="container-fluid banner">
        <div id="carouselExampleInterval" class="container carousel slide position-relative" data-bs-ride="carousel">
            <!-- Carrusel de imágenes -->
            <div class="carousel-inner slide__div">
                @if(isset($carruseles) && count($carruseles) > 0)
                    @foreach($carruseles as $key => $carrusel)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="10000">
                            <img src="{{ asset($carrusel->img_carrusel) }}" class="d-block img-fluid" alt="...">
                        </div>
                    @endforeach
                @else
                    <!-- Carrusel por defecto -->
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="https://picsum.photos/300/200?random=1" class="d-block img-fluid" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="10000">
                        <img src="https://picsum.photos/300/200?random=2" class="d-block img-fluid" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="10000">
                        <img src="https://picsum.photos/300/200?random=3" class="d-block img-fluid" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="10000">
                        <img src="https://picsum.photos/300/200?random=4" class="d-block img-fluid" alt="...">
                    </div>
                @endif
            </div>
            <!-- Mensaje en la esquina superior derecha -->
            @if(isset($ultimaNoticia->titulo))
            <div class="position-absolute top-0 end-0 m-3 bg-light rounded shadow p-4"
                style="border: 1px solid rgb(227, 227, 227); max-width: 580px">
                <h3 class="mb-3">Noticias de última hora!</h3>
                <h6 class="mb-3">{{$ultimaNoticia->titulo}}</h6>
                <p class="mb-0">{{$ultimaNoticia->descripcion}}</p>
                <hr>
                <h6 class="mb-3">{{$ultimaNoticia->created_at}}</h6>
            </div>
            @endif
            <!-- Controles del carrusel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>



    @yield('content');

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
