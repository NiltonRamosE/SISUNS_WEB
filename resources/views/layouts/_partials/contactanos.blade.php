<h2>Contacto</h2>
<p>Formulario de contacto o información de contacto.</p>


<div class="box-contacto">

    @foreach ($miembros as $miembro)
        <div class="row">
            <div class="col-3">
                @if (isset($miembro->img_miembro))
                    <img style="border-radius: 0px" src="{{ asset($miembro->img_miembro) }}" alt="Imagen 1"
                        class="img-thumbnail object-fit-cover border rounded">
                @else
                    <img style="border-radius: 0px" src="https://picsum.photos/300/200?random=1" alt="Imagen 1"
                        class="img-thumbnail object-fit-cover border rounded">
                @endif
            </div>
            <div class="col-9 box-contacto__info">
                <h5 style="background: #61635e; color:white"><i>{{ $miembro->tipo_miembro }}: </i>
                    <b>{{ $miembro->nombre . ' ' . $miembro->apellido_paterno . ' ' . $miembro->apellido_materno }}</b>
                </h5>
                <div class="row">
                    <div class="col">
                        <p><b>Perfil Académico:</b> {{ $miembro->perfil_academico }}</p>
                    </div>
                    <div class="col">
                        <p class="icon-contact"><b>Correo Institucional:</b> {{ $miembro->correo_institucional }}</p>
                        @if (isset($miembro->correo_personal))
                            <p class="icon-mail-personal"><b>Correo personal:</b> {{ $miembro->correo_personal }}</p>
                        @endif
                        <p class="icon-phone"><b>Celular:</b> {{ $miembro->celular }}</p>
                        @if (isset($miembro->user_linkedin))
                            <p class="icon-linkedin"> <img src="{{ asset('/img/linkedin.svg') }}" alt="">
                                <b>Linkedin:</b> {{ $miembro->user_linkedin }}</p>
                        @endif
                        @if (isset($miembro->user_github))
                            <p class="icon-github"><img src="{{ asset('/img/github.svg') }}" alt="">
                                <b>Github:</b> {{ $miembro->user_github }}</p>
                        @endif
                        @if (isset($miembro->user_instagram))
                            <p class="icon-instagram"><img src="{{ asset('/img/instagram-log.png') }}" alt="">
                                <b>Instagram:</b> {{ $miembro->user_instagram }}</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>
