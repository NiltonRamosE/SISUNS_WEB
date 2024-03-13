<h2>Integrantes Actuales</h2>
@if ($mensaje == "El miembro se ha creado correctamente." || $mensaje == "El integrante se ha actualizado correctamente.")
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
    <div class="col-md-6 mb-6">
        <div class="card">
            <div class="card-header"><i class="fa-regular fa-file"></i> Registra Integrante</div>
            <div class="card-body">
                <form action="{{ route('administrador.save_miembro') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text">Nombres y Apellidos</span>
                        <input type="text" aria-label="First name" class="form-control" name="nombres" required>
                        <input type="text" aria-label="Last name" class="form-control" name="apellido_paterno"
                            required>
                        <input type="text" aria-label="Last name" class="form-control" name="apellido_materno"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="perfil_academico">Perfil académico:</label>
                        <textarea class="form-control" id="perfil_academico" placeholder="Ingrese el perfil académico" name="perfil_academico"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="correo">Correo Institucional:</label>
                        <input type="text" class="form-control" id="correo" name="correo_institucional"
                            placeholder="Ingrese Correo Institucional" required>
                    </div>

                    <div class="form-group">
                        <label for="correo">Correo Personal (Opcional):</label>
                        <input type="text" class="form-control" id="correo" name="correo_personal"
                            placeholder="Ingrese Correo Personal">
                    </div>

                    <div class="form-group">
                        <label for="celular">Celular:</label>
                        <input type="text" class="form-control" id="celular" name="celular"
                            placeholder="Ingrese Celular" required>
                    </div>

                    <div class="form-group">
                        <label for="celular">Linkedin (Opcional):</label>
                        <input type="text" class="form-control" id="linkedin" name="user_linkedin"
                            placeholder="Ingrese linkedin">
                    </div>

                    <div class="form-group">
                        <label for="celular">Github (Opcional):</label>
                        <input type="text" class="form-control" id="github" name="user_github"
                            placeholder="Ingrese github">
                    </div>

                    <div class="form-group">
                        <label for="celular">Instagram (Opcional):</label>
                        <input type="text" class="form-control" id="instagram" name="user_instagram"
                            placeholder="Ingrese instagram">
                    </div>

                    <div class="form-group">
                        <label for="rol_select">Seleccione su Rol:</label>
                        <select class="form-control" name="tipo_miembro" id="rol_select">
                            <option selected disabled value="">Selecciona rol...</option>
                            <option value="Responsable">RESPONSABLE</option>
                            <option value="Co-Responsable">CO-RESPONSABLE</option>
                            <option value="Lider">LIDER</option>
                            <option value="Secretario(a)">SECRETARIO(A)</option>
                            <option value="Miembro">MIEMBRO</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="imagen" class="form-label">Selecciona una imagen:</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                    </div>

                    <button type="submit" class="btn btn-primary btn-add-news mt-1 w-100"><i
                            class="fa-solid fa-bookmark"></i> Guardar</button>
                </form>

            </div>
        </div>
    </div>
    @foreach ($miembros as $miembro)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header"><i class="fa-regular fa-file"></i> Integrante</div>
                <div class="card-body">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text">Nombres</span>
                        <input type="text" aria-label="First name" class="form-control" name="nombres"
                            value="{{ $miembro->nombre . ' ' . $miembro->apellido_paterno . ' ' . $miembro->apellido_materno }}"
                            readonly>
                    </div>

                    <div>
                        <div class="img-thumbnail position-relative">
                            @if (isset($miembro->img_miembro))
                                <img src="{{ asset($miembro->img_miembro) }}" alt="Imagen 1" class="img-thumbnail">
                            @else
                                <img src="https://picsum.photos/300/200?random=1" alt="Imagen 1"
                                    class="img-thumbnail">
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="perfil_academico">Perfil académico:</label>
                        <textarea class="form-control" id="perfil_academico" name="perfil_academico" value="" readonly
                            rows="5">{{ $miembro->perfil_academico }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="correo">Correo Institucional:</label>
                        <input type="text" class="form-control" id="correo" name="correo_institucional"
                            value="{{ $miembro->correo_institucional }}" readonly>
                    </div>
                    @if (isset($miembro->correo_personal))
                        <div class="form-group">
                            <label for="correo">Correo Personal:</label>
                            <input type="text" class="form-control" id="correo" name="correo_personal"
                                value="{{ $miembro->correo_personal }}" readonly>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="celular">Celular:</label>
                        <input type="text" class="form-control" id="celular" name="celular"
                            value="{{ $miembro->celular }}" readonly>
                    </div>
                    @if (isset($miembro->user_linkedin))
                        <div class="form-group">
                            <label for="celular">Linkedin:</label>
                            <input type="text" class="form-control" id="linkedin" name="user_linkedin"
                                value="{{ $miembro->user_linkedin }}" readonly>
                        </div>
                    @endif
                    @if (isset($miembro->user_github))
                        <div class="form-group">
                            <label for="celular">Github:</label>
                            <input type="text" class="form-control" id="github" name="user_github"
                                value="{{ $miembro->user_github }}" readonly>
                        </div>
                    @endif
                    @if (isset($miembro->user_instagram))
                        <div class="form-group">
                            <label for="celular">Instagram:</label>
                            <input type="text" class="form-control" id="instagram" name="user_instagram"
                                value="{{ $miembro->user_instagram }}" readonly>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="rol">Rol:</label>
                        <input type="text" class="form-control" id="rol_select" name="tipo_miembro"
                            value="{{ $miembro->tipo_miembro }}" readonly>
                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-add-news mt-1 w-100" data-bs-toggle="modal"
                        data-bs-target="#miembro_modal_{{ $miembro->id }}" style="background: rgb(47 183 171)"> <i
                            class="fa-solid fa-pen-to-square"></i>
                        Editar
                    </button>
                    <a href="{{ route('administrador.delete_miembro', ['id' => $miembro->id]) }}"
                        class="btn btn-primary btn-add-news mt-1 w-100" style="background: rgb(33 37 41)"><i
                            class="fa-solid fa-trash"></i> Eliminar</a>
                </div>
                {{-- MODAL PARA EDITAR --}}
                <!-- Modal -->
                <div class="modal fade" id="miembro_modal_{{ $miembro->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form class="modal-content" action="{{ route('administrador.update_miembro', ['id' => $miembro->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Integrante {{ $miembro->id }}
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">Nombres y Apellidos</span>
                                    <input type="text" aria-label="First name" class="form-control"
                                        name="nombres" required  value="{{ $miembro->nombre}}">
                                    <input type="text" aria-label="Last name" class="form-control"
                                        name="apellido_paterno" required value="{{ $miembro->apellido_paterno}}">
                                    <input type="text" aria-label="Last name" class="form-control"
                                        name="apellido_materno" required value="{{ $miembro->apellido_materno}}">
                                </div>

                                <div class="form-group">
                                    <label for="perfil_academico">Perfil académico:</label>
                                    <textarea class="form-control" id="perfil_academico" placeholder="Ingrese el perfil académico"
                                        name="perfil_academico">{{ $miembro->perfil_academico}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="correo">Correo Institucional:</label>
                                    <input type="text" class="form-control" id="correo"
                                        name="correo_institucional" placeholder="Ingrese Correo Institucional"
                                        required value="{{$miembro->correo_institucional}}">
                                </div>

                                <div class="form-group">
                                    <label for="correo">Correo Personal (Opcional):</label>
                                    <input type="text" class="form-control" id="correo" name="correo_personal"
                                        placeholder="Ingrese Correo Personal" value="{{$miembro->correo_personal}}">
                                </div>

                                <div class="form-group">
                                    <label for="celular">Celular:</label>
                                    <input type="text" class="form-control" id="celular" name="celular"
                                        placeholder="Ingrese Celular" required value="{{$miembro->celular}}">
                                </div>

                                <div class="form-group">
                                    <label for="celular">Linkedin (Opcional):</label>
                                    <input type="text" class="form-control" id="linkedin" name="user_linkedin"
                                        placeholder="Ingrese linkedin" value="{{$miembro->user_linkedin}}">
                                </div>

                                <div class="form-group">
                                    <label for="celular">Github (Opcional):</label>
                                    <input type="text" class="form-control" id="github" name="user_github"
                                        placeholder="Ingrese github" value="{{$miembro->user_github}}">
                                </div>

                                <div class="form-group">
                                    <label for="celular">Instagram (Opcional):</label>
                                    <input type="text" class="form-control" id="instagram" name="user_instagram"
                                        placeholder="Ingrese instagram" value="{{$miembro->user_instagram}}">
                                </div>

                                <div class="form-group">
                                    <label for="rol_select">Seleccione su Rol:</label>
                                    <select class="form-control" name="tipo_miembro" id="rol_select">
                                        <option value="Responsable">RESPONSABLE</option>
                                        <option value="Co-Responsable">CO-RESPONSABLE</option>
                                        <option value="Lider">LIDER</option>
                                        <option value="Secretario(a)">SECRETARIO(A)</option>
                                        <option value="Miembro" selected >MIEMBRO</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="imagen" class="form-label">Selecciona una imagen:</label>
                                    <input type="file" class="form-control" id="imagen" name="imagen">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
