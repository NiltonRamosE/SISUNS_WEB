@extends('layouts.index_template')
@section('content')
        <!-- Acerca de Nosotros -->
        <div class="container seccion" id="section_n">
            <div class="row">
                <div class="col-md-12 text-center">
                    @include('layouts._partials.nosotros')
                </div>
            </div>
        </div>

        <!-- Proyectos Destacados -->
        <div class="container seccion" id="section_p">
            <div class="row">
                <div class="col-md-12 text-center">
                    @include('layouts._partials.proyectos')
                </div>
            </div>
        </div>
        <!-- Últimas Noticias y Eventos -->
        <div class="container seccion" id="section_nt">
            <div class="row">
                <div class="col-md-12 text-center">
                    @include('layouts._partials.noticias')
                </div>
            </div>
        </div>

        <!-- Formulario de Contacto -->
        <div class="container seccion" id="section_c">
            <div class="row">
                <div class="col-md-12 text-center">
                    @include('layouts._partials.contactanos')
                </div>
            </div>
        </div>
@endsection
