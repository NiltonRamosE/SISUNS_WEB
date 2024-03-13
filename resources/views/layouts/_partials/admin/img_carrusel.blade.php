<h2 class="mt-5 mb-4">Imágenes que se mostrarán en el carrusel</h2>
@if ($mensaje == "La imagen del carrusel se ha subido correctamente.")
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
    <!-- Generar imágenes aleatorias -->
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="img-thumbnail position-relative">
            @if(isset($carruseles[0]->img_carrusel))
                <img src="{{ asset($carruseles[0]->img_carrusel) }}" alt="Imagen 1" class="img-thumbnail">
            @else
                <img src="https://picsum.photos/300/200?random=1" alt="Imagen 1" class="img-thumbnail">
            @endif
            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop1"
                class="btn btn-primary upload-btn"><i class="fa-solid fa-plus"></i> Cambiar Imágen
            </button>
        </div>
    </div>
    <!-- Modal Para IMG 1-->
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Subir Imágen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class=" mx-auto">
                        <form action="{{route('administrador.save_img_carrusel')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Selecciona una imagen:</label>
                                <input type="file" class="form-control" id="imagen" name="imagen">
                                
                                @if (isset($carruseles[0]->img_carrusel))
                                    <input type="hidden" class="form-control" value= "{{ $carruseles[0]->id }}" name="id_imagen">  
                                @endif
                                
                            </div>
                            <button type="submit" class="btn btn-primary">Subir</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="img-thumbnail position-relative">
            @if(isset($carruseles[1]->img_carrusel))
                <img src="{{ asset($carruseles[1]->img_carrusel) }}" alt="Imagen 2" class="img-thumbnail">
            @else
                <img src="https://picsum.photos/300/200?random=2" alt="Imagen 2" class="img-thumbnail">
            @endif
            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop2"
                class="btn btn-primary upload-btn"><i class="fa-solid fa-plus"></i> Cambiar Imágen
            </button>
        </div>
    </div>
    <!-- Modal Para IMG 2-->
    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Subir Imágen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class=" mx-auto">
                        <form action="{{route('administrador.save_img_carrusel')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Selecciona una imagen:</label>
                                <input type="file" class="form-control" id="imagen" name="imagen">
                                @if (isset($carruseles[1]->img_carrusel))
                                    <input type="hidden" class="form-control" value= "{{ $carruseles[1]->id }}" name="id_imagen">  
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Subir</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="img-thumbnail position-relative">
            @if(isset($carruseles[2]->img_carrusel))
                <img src="{{ asset($carruseles[2]->img_carrusel) }}" alt="Imagen 3" class="img-thumbnail">
            @else
                <img src="https://picsum.photos/300/200?random=3" alt="Imagen 3" class="img-thumbnail">
            @endif
            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop3"
                class="btn btn-primary upload-btn"><i class="fa-solid fa-plus"></i> Cambiar Imágen
            </button>
        </div>
    </div>
    <!-- Modal Para IMG 3-->
    <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Subir Imágen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class=" mx-auto">
                        <form action="{{route('administrador.save_img_carrusel')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Selecciona una imagen:</label>
                                <input type="file" class="form-control" id="imagen" name="imagen">
                                @if (isset($carruseles[2]->img_carrusel))
                                    <input type="hidden" class="form-control" value= "{{ $carruseles[2]->id }}" name="id_imagen">  
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Subir</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="img-thumbnail position-relative">
            @if(isset($carruseles[3]->img_carrusel))
                <img src="{{ asset($carruseles[3]->img_carrusel) }}" alt="Imagen 4" class="img-thumbnail">
            @else
                <img src="https://picsum.photos/300/200?random=4" alt="Imagen 4" class="img-thumbnail">
            @endif
            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop4"
                class="btn btn-primary upload-btn"><i class="fa-solid fa-plus"></i> Cambiar Imágen
            </button>
        </div>
    </div>
    <!-- Modal Para IMG 4-->
    <div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Subir Imágen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class=" mx-auto">
                        <form action="{{route('administrador.save_img_carrusel')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Selecciona una imagen:</label>
                                <input type="file" class="form-control" id="imagen" name="imagen">
                                @if (isset($carruseles[3]->img_carrusel))
                                    <input type="hidden" class="form-control" value= "{{ $carruseles[3]->id }}" name="id_imagen">  
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Subir</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>