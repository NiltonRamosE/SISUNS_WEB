<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrusel;
use App\Models\Proyecto;
use App\Models\Miembro;
use App\Models\Noticia;
class MainController extends Controller
{
    public function index()
    {
        $carruseles = Carrusel::take(4)->get();

        $noticias = Noticia::orderBy('created_at', 'desc')->take(6)->get();

        $proyectos = Proyecto::where('prioridad', 'DESTACADO')->take(6)->get();

        $ultimaNoticia = Noticia::latest()->first();
        $miembros = Miembro::all();
        return view('index')->with('carruseles', $carruseles)
        ->with('noticias', $noticias)
        ->with('proyectos', $proyectos)
        ->with('miembros', $miembros)
        ->with('ultimaNoticia', $ultimaNoticia);
    }
    
    public function goToProyecto(string $id){
        $proyecto = Proyecto::find($id);
        return view('project_page')->with('proyecto',$proyecto);
    }

    public function goToNoticia(string $id){
        $noticia = Noticia::find($id);
        return view('noticia_page')->with('noticia',$noticia);
    }
}
