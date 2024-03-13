<h2>Proyectos</h2>
@if ($mensaje == "El proyecto se ha creado correctamente." || $mensaje == "El proyecto se ha actualizado correctamente.")
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <p>{{$mensaje}}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@elseif ($mensaje != null)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <p>{{$mensaje}}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header" style="background: rgb(47 183 171);"><i class="fa-regular fa-file"></i> Registrar
                Proyecto</div>
            <div class="card-body">
                <form action="{{ route('administrador.save_proyecto') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="titulo">Título:</label>
                        <input type="text" class="form-control" id="titulo" placeholder="Ingrese el título"
                            name="title_project">
                    </div>
                    <div class="form-group">
                        <label for="repositorio">Enlace de repositorio:</label>
                        <div class="input-group">
                            <input class="form-control h-100" aria-label="With textarea"
                                placeholder="Ingrese el repositorio" name="repositorio_project">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <div class="input-group">
                            <textarea class="form-control h-100" aria-label="With textarea" placeholder="Ingrese la descripcion"
                                name="descripcion_project"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contenido">Contenido (Opcional):</label>
                        <div class="input-group">
                            <textarea class="form-control h-100" aria-label="With textarea" placeholder="Ingrese la descripcion"
                                name="content_project"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="imagen" class="form-label">Selecciona una imagen:</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                    </div>
                    <button type="submit" class="btn btn-primary btn-add-news mt-1 w-100"><i
                            class="fa-solid fa-bookmark"></i> Guardar
                    </button>
                </form>
            </div>
        </div>
    </div>

    @foreach ($proyectos as $proyecto)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header" style="background: rgb(47 183 171);"><i class="fa-regular fa-file"></i>
                    Proyecto</div>
                <div class="card-body">
                    <div>
                        <div class="form-group">
                            <h5 class="form-control-static">{{ $proyecto->titulo }}</h5>
                        </div>
                        <div>
                            <div class="img-thumbnail position-relative">
                                @if (isset($proyecto->img_proyecto))
                                    <img src="{{ asset($proyecto->img_proyecto) }}" alt="Imagen 1"
                                        class="img-thumbnail">
                                @else
                                    <img src="https://picsum.photos/300/200?random=1" alt="Imagen 1"
                                        class="img-thumbnail">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="form-control-static">{{ $proyecto->descripcion }}</p>
                        </div>
                        <div class="form-group">
                            <a class="form-control-static" href="{{ $proyecto->enlace_repositorio }}">{{ $proyecto->enlace_repositorio }}</a>
                        </div>
                        <a href="{{ route('administrador.update_proyecto_prioridad', ['id' => $proyecto->id]) }}" class="btn btn-primary btn-add-news mt-1 w-100"> 
                            <i class="fa-solid fa-star"></i> Destacar
                        </a>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-add-news mt-1 w-100" data-bs-toggle="modal"
                            data-bs-target="#proyecto_modal_{{ $proyecto->id }}" style="background: rgb(47 183 171)"> <i
                            class="fa-solid fa-pen-to-square" ></i>
                            Editar
                        </button>
                        <a href="{{ route('administrador.delete_proyecto', ['id' => $proyecto->id]) }}"
                            class="btn btn-primary btn-add-news mt-1 w-100" style="background: rgb(33 37 41)"> <i
                                class="fa-solid fa-trash"></i> Eliminar </a>
                    </div>
                </div>

                {{-- EL MODAL PARA EDITAR --}}
                <div class="modal fade" id="proyecto_modal_{{ $proyecto->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <form class="modal-content" action="{{ route('administrador.update_proyecto', ['id' => $proyecto->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Proyecto {{$proyecto->id}}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="titulo">Título:</label>
                                    <input type="text" class="form-control" id="titulo" placeholder="Ingrese el título"
                                        name="title_project" value="{{$proyecto->titulo}}">
                                </div>
                                <div class="form-group">
                                    <label for="repositorio">Enlace de repositorio:</label>
                                    <div class="input-group">
                                        <input class="form-control h-100" aria-label="With textarea"
                                            placeholder="Ingrese el repositorio" name="repositorio_project" value="{{$proyecto->enlace_repositorio}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción:</label>
                                    <div class="input-group">
                                        <textarea class="form-control h-100" aria-label="With textarea" placeholder="Ingrese el Contenido"
                                            name="descripcion_project">{{$proyecto->descripcion}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="imagen" class="form-label">Selecciona una imagen:</label>
                                    <input type="file" class="form-control" id="imagen" name="imagen">
                                </div>
                                <div class="form-group">
                                    <label for="prioridad_select">¿Desea destacar el proyecto?:</label>
                                    <select class="form-control" name="prioridad_project" id="prioridad_select">
                                        <option disabled value="">Selecciona prioridad...</option>
                                        <option value="DESTACADO" @if($proyecto->prioridad == 'DESTACADO') selected @endif>DESTACADO</option>
                                        <option value="NO DESTACADO" @if($proyecto->prioridad == 'NO DESTACADO') selected @endif>NO DESTACADO</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
