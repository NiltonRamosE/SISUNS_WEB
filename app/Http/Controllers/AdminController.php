<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Carrusel;
use App\Models\Proyecto;
use App\Models\Miembro;
use App\Models\Noticia;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        if(!LoginController::validarSession()){
            return redirect()->route('administrador.login');
        }

        $mensaje = $request->session()->get('msj');

        $usuario = Session::get('usuario');
        $password = Session::get('password');
        $usuarioSearch = Administrador::where('usuario', $usuario)->where('password', $password)->first();

        $carruseles = Carrusel::take(4)->get();
        return view('home_page_admin')->with('carruseles', $carruseles)->with('usuarioSearch', $usuarioSearch)->with('mensaje',$mensaje);
    }

    public function goToNoticias(Request $request)
    {
        if(!LoginController::validarSession()){
            return redirect()->route('administrador.login');
        }

        $mensaje = $request->session()->get('msj');
        //--------------------------
        $usuario = Session::get('usuario');
        $password = Session::get('password');
        $usuarioSearch = Administrador::where('usuario', $usuario)->where('password', $password)->first();
        $noticias = Noticia::orderBy('created_at', 'desc')->get();
        return view('news_page_admin')->with('noticias', $noticias)->with('usuarioSearch', $usuarioSearch)->with('mensaje',$mensaje);
    }

    public function goToProyectos(Request $request)
    {
        if(!LoginController::validarSession()){
            return redirect()->route('administrador.login');
        }

        $mensaje = $request->session()->get('msj');
        //--------------------------
        $usuario = Session::get('usuario');
        $password = Session::get('password');
        $usuarioSearch = Administrador::where('usuario', $usuario)->where('password', $password)->first();
        $proyectos = Proyecto::orderBy('created_at', 'desc')->get();
        return view('projects_page_admin')->with('proyectos', $proyectos)->with('usuarioSearch', $usuarioSearch)->with('mensaje',$mensaje);
    }

    public function goToIntegrantes(Request $request)
    {
        if(!LoginController::validarSession()){
            return redirect()->route('administrador.login');
        }

        $mensaje = $request->session()->get('msj');
        //--------------------------
        $usuario = Session::get('usuario');
        $password = Session::get('password');
        $usuarioSearch = Administrador::where('usuario', $usuario)->where('password', $password)->first();
        $miembros = Miembro::all();
        return view('team_page_admin')->with('miembros', $miembros)->with('usuarioSearch', $usuarioSearch)->with('mensaje',$mensaje);
    }

    public function createImgCarrusel(Request $request)
    {
        try{ 
            $request->validate([
                'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imagen = $request->file('imagen');
            $nombreImagen = $imagen->hashName();
            $imagen->move(public_path('img/carrusel'), $nombreImagen);
            $urlImagen = 'img/carrusel/' . $nombreImagen;

            if ($request->has('id_imagen')) {
                $id_imagen = $request->input('id_imagen');
                $carrusel = Carrusel::find($id_imagen);
                if ($carrusel) {
                    $rutaAnterior = public_path($carrusel->img_carrusel);

                    if (file_exists($rutaAnterior)) {
                        unlink($rutaAnterior);
                        \Illuminate\Support\Facades\Log::info("Archivo eliminado con éxito: $rutaAnterior");
                    }else{
                        \Illuminate\Support\Facades\Log::error("No se pudo eliminar el archivo: $rutaAnterior");
                    }
                    $carrusel->update(['img_carrusel' => $urlImagen]);
                }
            }else{
                Carrusel::create([
                    'img_carrusel' => $urlImagen
                ]);
            }
            return redirect()->back()->with('msj', 'La imagen del carrusel se ha subido correctamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('msj', 'No se pudo agregar la imagen, verifica si las especificaciones son correctas.');
        }
    }

    public function createProyecto(Request $request)
    {
        try{ 
            $request->validate([
                'title_project' => 'required|string|max:100',
                'descripcion_project' => 'required|string|max:100',
                'repositorio_project' => 'required|string',
                'content_project' => 'nullable|string',
                'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $nombreImagen = $imagen->hashName();
                $imagen->move(public_path('img/proyectos'), $nombreImagen);
                $urlImagen = 'img/proyectos/' . $nombreImagen;
            }else{
                $urlImagen = null;
            }

            Proyecto::create([
                'titulo' => $request->input('title_project'),
                'descripcion' => $request->input('descripcion_project'),
                'enlace_repositorio' => $request->input('repositorio_project'),
                'contenido' => $request->input('content_project'),
                'prioridad' => 'NO DESTACADO',
                'img_proyecto' => $urlImagen,
            ]);

            return redirect()->back()->with('msj', 'El proyecto se ha creado correctamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('msj', 'No se pudo registrar el proyecto, verifica si los campos están correctos.');
        }
    }

    public function createNoticia(Request $request)
    {
        try{ 
            $request->validate([
                'title_news' => 'required|string|max:100',
                'descripcion_news' => 'required|string|max:100',
                'content_news' => 'required|string',
                'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $nombreImagen = $imagen->hashName();
                $imagen->move(public_path('img/noticias'), $nombreImagen);
                $urlImagen = 'img/noticias/' . $nombreImagen;
            } else {
                $urlImagen = null;
            }

            $fecha = Carbon::now()->toDateString();
            $hora = Carbon::now()->toTimeString();

            $usuario = Session::get('usuario');
            $password = Session::get('password');
            $usuarioSearch = Administrador::where('usuario', $usuario)->where('password', $password)->first();

            Noticia::create([
                'titulo' => $request->input('title_news'),
                'contenido' => $request->input('content_news'),
                'fecha_emision' => $fecha,
                'hora_publicacion' => $hora,
                'descripcion' => $request->input('descripcion_news'),
                'autor' => $usuarioSearch->nombre .' '. $usuarioSearch->apellido_paterno.' '. $usuarioSearch->apellido_materno,
                'img_noticia' => $urlImagen,
            ]);

            return redirect()->back()->with('msj', 'Noticia creada exitosamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('msj', 'No se pudo registrar la noticia, verifica si los campos están correctos.');
        }
    }

    public function createMiembro(Request $request)
    {
        try {
            $request->validate([
                'nombres' => 'required|string|max:255',
                'apellido_paterno' => 'required|string|max:255',
                'apellido_materno' => 'required|string|max:255',
                'perfil_academico' => 'required|string',
                'correo_institucional' => 'required|string|email|max:255',
                'correo_personal' => 'nullable|string|email|max:255',
                'celular' => 'required|string|max:20',
                'user_linkedin' => 'nullable|string|max:255',
                'user_github' => 'nullable|string|max:255',
                'user_instagram' => 'nullable|string|max:255',
                'tipo_miembro' => 'required|string|in:Responsable,Co-Responsable,Lider,Secretario(a),Miembro',
                'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $nombreImagen = $imagen->hashName();
                $imagen->move(public_path('img/miembros'), $nombreImagen);
                $urlImagen = 'img/miembros/' . $nombreImagen;
            }else {
                $urlImagen = null;
            }

            Miembro::create([
                'nombre' => $request->input('nombres'),
                'apellido_paterno' => $request->input('apellido_paterno'),
                'apellido_materno' => $request->input('apellido_materno'),
                'perfil_academico' => $request->input('perfil_academico'),
                'correo_institucional' => $request->input('correo_institucional'),
                'correo_personal' => $request->input('correo_personal'),
                'celular' => $request->input('celular'),
                'user_linkedin' => $request->input('user_linkedin'),
                'user_github' => $request->input('user_github'),
                'user_instagram' => $request->input('user_instagram'),
                'tipo_miembro' => $request->input('tipo_miembro'),
                'img_miembro' => $urlImagen,
            ]);

            return redirect()->back()->with('msj', 'El miembro se ha creado correctamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('msj', 'No se pudo registrar al integrante, verifica si los campos están correctos.');
        }
    }

    public function destroyProyecto(string $id)
    {
        $proyecto = Proyecto::find($id);

        if($proyecto->img_proyecto){
            $rutaAnterior = public_path($proyecto->img_proyecto);
            if (file_exists($rutaAnterior)) {
                unlink($rutaAnterior);
                \Illuminate\Support\Facades\Log::info("Archivo eliminado con éxito: $rutaAnterior");
            }else{
                \Illuminate\Support\Facades\Log::error("No se pudo eliminar el archivo: $rutaAnterior");
            }
        }
        
        $proyecto->delete();
        return redirect()->back()->with('msj', 'El proyecto se ha eliminado correctamente.');
    }

    public function destroyMiembro(string $id)
    {
        $miembro = Miembro::find($id);

        if($miembro->img_miembro){
            $rutaAnterior = public_path($miembro->img_miembro);
            if (file_exists($rutaAnterior)) {
                unlink($rutaAnterior);
                \Illuminate\Support\Facades\Log::info("Archivo eliminado con éxito: $rutaAnterior");
            }else{
                \Illuminate\Support\Facades\Log::error("No se pudo eliminar el archivo: $rutaAnterior");
            }
        }
        
        $miembro->delete();
        return redirect()->back()->with('msj', 'El miembro se ha eliminado correctamente.');
    }

    public function destroyNoticia(string $id)
    {
        $noticia = Noticia::find($id);

        if($noticia->img_noticia){
            $rutaAnterior = public_path($noticia->img_noticia);

            if (file_exists($rutaAnterior)) {
                unlink($rutaAnterior);
                \Illuminate\Support\Facades\Log::info("Archivo eliminado con éxito: $rutaAnterior");
            }else{
                \Illuminate\Support\Facades\Log::error("No se pudo eliminar el archivo: $rutaAnterior");
            }
        }
        
        $noticia->delete();
        return redirect()->back()->with('msj', 'La Noticia se ha eliminado correctamente.');
    }

    public function updateProyecto(Request $request, string $id)
    {
        try{ 
            $request->validate([
                'title_project' => 'required|string|max:100',
                'descripcion_project' => 'required|string|max:100',
                'repositorio_project' => 'required|string',
                'content_project' => 'nullable|string',
                'prioridad_project' => 'required|string|max:12',
                'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            if($request->hasFile('imagen')){
                $imagen = $request->file('imagen');
                $nombreImagen = $imagen->hashName();
                $imagen->move(public_path('img/proyectos'), $nombreImagen);
                $urlImagen = 'img/proyectos/' . $nombreImagen;
            }else{
                $urlImagen = null;
            }
            $proyecto = Proyecto::find($id);

            if($proyecto->img_proyecto){
                $rutaAnterior = public_path($proyecto->img_proyecto);
                if (file_exists($rutaAnterior)) {
                    unlink($rutaAnterior);
                    \Illuminate\Support\Facades\Log::info("Archivo eliminado con éxito: $rutaAnterior");
                }else{
                    \Illuminate\Support\Facades\Log::error("No se pudo eliminar el archivo: $rutaAnterior");
                }
            }

            $proyecto->titulo = $request->input('title_project');
            $proyecto->descripcion = $request->input('descripcion_project');
            $proyecto->contenido = $request->input('content_project');
            $proyecto->prioridad = $request->input('prioridad_project');
            $proyecto->enlace_repositorio = $request->input('repositorio_project');
            $proyecto->img_proyecto = $urlImagen;
            $proyecto->save();
            return redirect()->back()->with('msj', 'El proyecto se ha actualizado correctamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('msj', 'No se pudo actualizar el proyecto, verifica si los campos están correctos.');
        }
    }

    public function updatePrioridadProyecto(string $id)
    {
        try{ 
            $proyecto = Proyecto::find($id);
            $proyecto->update(['prioridad' => 'DESTACADO']);
            return redirect()->back()->with('msj', 'Prioridad cambiada exitosamente');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('msj', 'Error al cambiar la prioridad');
        }
    }

    public function updateMiembro(Request $request, string $id)
    {
        try {
            $request->validate([
                'nombres' => 'required|string|max:255',
                'apellido_paterno' => 'required|string|max:255',
                'apellido_materno' => 'required|string|max:255',
                'perfil_academico' => 'required|string',
                'correo_institucional' => 'required|string|email|max:255',
                'correo_personal' => 'nullable|string|email|max:255',
                'celular' => 'required|string|max:20',
                'user_linkedin' => 'nullable|string|max:255',
                'user_github' => 'nullable|string|max:255',
                'user_instagram' => 'nullable|string|max:255',
                'tipo_miembro' => 'required|string|in:Responsable,Co-Responsable,Lider,Secretario(a),Miembro',
                'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if($request->hasFile('imagen')){
                $imagen = $request->file('imagen');
                $nombreImagen = $imagen->hashName();
                $imagen->move(public_path('img/miembros'), $nombreImagen);
                $urlImagen = 'img/miembros/' . $nombreImagen;
            }else{
                $urlImagen = null;
            }
            $miembro = Miembro::find($id);

            if($miembro->img_miembro){
                $rutaAnterior = public_path($miembro->img_miembro);
                if (file_exists($rutaAnterior)) {
                    unlink($rutaAnterior);
                    \Illuminate\Support\Facades\Log::info("Archivo eliminado con éxito: $rutaAnterior");
                }else{
                    \Illuminate\Support\Facades\Log::error("No se pudo eliminar el archivo: $rutaAnterior");
                }
            }

            $miembro->nombre = $request->input('nombres');
            $miembro->apellido_paterno = $request->input('apellido_paterno');
            $miembro->apellido_materno = $request->input('apellido_materno');
            $miembro->perfil_academico = $request->input('perfil_academico');
            $miembro->correo_institucional = $request->input('correo_institucional');
            $miembro->correo_personal = $request->input('correo_personal');
            $miembro->celular = $request->input('celular');
            $miembro->user_linkedin = $request->input('user_linkedin');
            $miembro->user_github = $request->input('user_github');
            $miembro->user_instagram = $request->input('user_instagram');
            $miembro->tipo_miembro = $request->input('tipo_miembro');
            $miembro->img_miembro = $urlImagen;
            $miembro->save();
            return redirect()->back()->with('msj', 'El integrante se ha actualizado correctamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('msj', 'No se pudo actualizar al integrante, verifica si los campos están completos.');
        }
    }

    public function updateNoticia(Request $request, string $id)
    {
        try{ 
            $request->validate([
                'title_news' => 'required|string|max:100',
                'descripcion_news' => 'required|string|max:100',
                'content_news' => 'required|string',
                'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $nombreImagen = $imagen->hashName();
                $imagen->move(public_path('img/noticias'), $nombreImagen);
                $urlImagen = 'img/noticias/' . $nombreImagen;
            } else {
                $urlImagen = null;
            }

            $noticia = Noticia::find($id);

            if($noticia->img_noticia){
                $rutaAnterior = public_path($noticia->img_noticia);

                if (file_exists($rutaAnterior)) {
                    unlink($rutaAnterior);
                    \Illuminate\Support\Facades\Log::info("Archivo eliminado con éxito: $rutaAnterior");
                }else{
                    \Illuminate\Support\Facades\Log::error("No se pudo eliminar el archivo: $rutaAnterior");
                }
            }

            $noticia->titulo = $request->input('title_news');
            $noticia->contenido = $request->input('content_news');
            $noticia->img_noticia = $urlImagen;
            $noticia->descripcion = $request->input('descripcion_news');
            $noticia->save();
            return redirect()->back()->with('msj', 'Noticia actualizada exitosamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('msj', 'No se pudo actualizar la noticia, verifica si los campos están correctos.');
        }
    }
}
