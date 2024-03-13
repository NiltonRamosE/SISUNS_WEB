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
            </div>
            </div>
        </div>
    </nav>

    <!-- Contenido específico del administrador -->
    <div class="container">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    Iniciar sesión
                  </div>
                  <div class="card-body">
                    <form action="{{route('administrador.validar')}}" method="post"> <div class="mb-3">
                        @csrf
                        <label for="username" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Ingrese su nombre de usuario">
                      </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña">
                      </div>
                      <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary" style="background: rgb(116 177 150); border:none">Iniciar sesión</button>
                      </div>

                      @if ($mensaje != null)
                        {{$mensaje}}
                      @endif
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
