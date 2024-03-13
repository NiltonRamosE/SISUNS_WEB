<hr>
<h2>Proyectos Destacados</h2>
<div class="row">
    @foreach ($proyectos as $proyecto)
    <div class="col-md-4 mb-4" >
        <div class="card" >
            <div class="card-header" style="background: rgb(47 183 171);"><i class="fa-regular fa-file"></i> Proyecto 1</div>
            <div class="card-body">
                <h5 class="card-title">{{ $proyecto->titulo }}</h5>
                <div>
                    <div class="position-relative">
                        @if(isset($proyecto->img_proyecto))
                            <img src="{{ asset($proyecto->img_proyecto) }}" alt="Imagen 1" class="">
                        @else
                            <img src="https://picsum.photos/300/200?random=1" alt="Imagen 1" class="">
                        @endif
                    </div>
                </div>
                <p class="d-inline-block text-truncate mb-1" style="max-width: 100%">
                    {{$proyecto->descripcion}}
                </p>
                <form class="mb-1" action="{{ route('proyecto', ['id' => $proyecto->id]) }}" method="GET">
                    @csrf
                    <button type="submit" style="width: 100%; background: rgb(92 167 134)" class="btn"><i class="fa-solid fa-eye"></i> Ver mas</button>
                </form>
                {{-- <!-- Inline level -->
                <div class="form-group">
                    <h6 class="form-control-static">Para mas información visita el repositorio:</h6>
                    <a style="color: rgb(17, 78, 158)" href="{{ $proyecto->enlace_repositorio }}">
                        {{ $proyecto->enlace_repositorio }}
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
    @endforeach

    <!-- Agrega más tarjetas aquí para cada proyecto -->
</div>
