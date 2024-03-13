<hr>
<h2>Últimas Noticias y Eventos</h2>
<p>Actualizaciones sobre conferencias, publicaciones, etc.</p>
<div class="row">
    @foreach ($noticias as $noticia)
    <div class="col-md-4 mb-4">
        <div class="card" >
            <div class="card-header" style="background: #2fb7ab"><i class="fa-solid fa-newspaper"></i> {{ $noticia->created_at }}</div>
            <div class="card-body">
                <div>
                    <div class="form-group">
                        <h5 class="bm-1" id="titulo">{{ $noticia->titulo }}</h5>
                    </div>
                    <div>
                        <div class="position-relative bm-5">
                            @if(isset($noticia->img_noticia))
                                <img src="{{ asset($noticia->img_noticia) }}" alt="Imagen 1" class="">
                            @else
                                <img src="https://picsum.photos/300/200?random=1" alt="Imagen 1" class="">
                            @endif
                        </div>
                    </div>
                    <div>
                        <div>
                            <div class="h-100">
                                {{ $noticia->descripcion }}
                            </div>
                        </div>
                    </div>
                    <form class="mb-1" action="{{ route('noticia', ['id' => $noticia->id]) }}" method="GET">
                        @csrf
                        <button type="submit" style="width: 100%; background: rgb(92 167 134)" class="btn"><i class="fa-solid fa-eye"></i> Ver mas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
