<h2>Noticias de última hora</h2>
@if ($mensaje == "Noticia creada exitosamente." || $mensaje == "Noticia actualizada exitosamente.")
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
            <div class="card-header"><i class="fa-solid fa-newspaper"></i> Noticia 1</div>
            <div class="card-body">
                <form action="{{ route('administrador.save_noticia') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="titulo">Título:</label>
                        <input type="text" class="form-control" id="titulo" placeholder="Ingrese el título"
                            name="title_news">
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <div class="input-group">
                            <textarea class="form-control h-100" aria-label="With textarea" placeholder="Ingrese una descripcion" name="descripcion_news"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contenido">Contenido: </label>
                        <div class="input-group">
                            <textarea class="form-control h-100" aria-label="With textarea" placeholder="Ingrese el Contenido" name="content_news"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="imagen" class="form-label">Selecciona una imagen:</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                    </div>

                    <button type="submit" class="btn btn-primary btn-add-news mt-1 w-100"><i
                            class="fa-solid fa-bookmark"></i>
                        Guardar
                    </button>
                </form>
            </div>
        </div>
    </div>

    @foreach ($noticias as $noticia)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header"><i class="fa-solid fa-newspaper"></i> {{ $noticia->created_at }}</div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <span type="text" class="form-control mb-1" id="title_news_{{ $noticia->id }}">{{ $noticia->titulo }}</span>
                        </div>
                        <div>
                            <div class="img-thumbnail position-relative mb-1">
                                @if (isset($noticia->img_noticia))
                                    <img src="{{ asset($noticia->img_noticia) }}"alt="Imagen 1" class="img-thumbnail">
                                @else
                                    <img src="https://picsum.photos/300/200?random=1" alt="Imagen 1"
                                        class="img-thumbnail">
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripcion:</label>
                            <div class="input-group">
                                <textarea class="form-control h-100" aria-label="With textarea" placeholder="Ingrese una descripcion" name="descripcion_news">{{$noticia->descripcion}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="autor">Autor:</label>
                            <span type="text" class="form-control mb-1" id="title_news_{{ $noticia->id }}">{{ $noticia->autor }}</span>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-add-news mt-1 w-100" data-bs-toggle="modal"
                            data-bs-target="#news_{{ $noticia->id }}">
                            Editar
                        </button>
                        <a href="{{ route('administrador.delete_noticia', ['id' => $noticia->id]) }}"
                            class="btn btn-primary btn-add-news mt-1 w-100" style="background: rgb(33 37 41)"><i
                                class="fa-solid fa-trash"></i> Eliminar</a>

                    </form>
                </div>

                <!--INSERTANDO UN MODAL-->

                <!-- Modal -->
                <div class="modal fade" id="news_{{ $noticia->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <form class="modal-content" action="{{ route('administrador.update_noticia', ['id' => $noticia->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar noticia {{$noticia->id}}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="titulo">Título:</label>
                                    <input type="text" class="form-control" id="titulo" placeholder="Ingrese el título"
                                        name="title_news" value="{{$noticia->titulo}}">
                                </div>

                                <div class="form-group">
                                    <label for="descripcion">Descripcion:</label>
                                    <div class="input-group">
                                        <textarea class="form-control h-100" aria-label="With textarea" placeholder="Ingrese una descripcion" name="descripcion_news">{{$noticia->descripcion}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="contenido">Contenido:</label>
                                    <div class="input-group">
                                        <textarea class="form-control h-100" aria-label="With textarea" placeholder="Ingrese el Contenido" name="content_news">{{$noticia->contenido}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="autor">Autor:</label>
                                    <input type="text" class="form-control" id="autor" name="autor" value="{{$noticia->autor}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="imagen" class="form-label">Selecciona una imagen:</label>
                                    <input type="file" class="form-control" id="imagen" name="imagen">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    @endforeach
</div>
