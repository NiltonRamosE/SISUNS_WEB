<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $usuario = $request->input('username');
        $password = $request->input('password');
        $usuarioSearch = Administrador::where('usuario', $usuario)
            ->where('password', $password)->first();
        if ($usuarioSearch != null) {
            session(['usuario'=>$usuario]);
            session(['password'=>$password]);
            return redirect()->route('administrador.inicio');
        } else {
            return redirect()->route('administrador.login')->with('error', 'Usuario o contraseña inconrrecta');
        }
    }
    public function goToLogin(Request $request){
        if(LoginController::validarSession()){
            return redirect()->route('administrador.inicio');
        }
        $mensaje = $request->session()->get('error');
        return view("login_page_admin", ['mensaje'=>$mensaje]);
    }
    public function logOut()
    {
        session()->forget('usuario');
        session()->forget('id_usuario');
        return redirect()->route('administrador.login');
    }
    public static function validarSession(){
        if (Session::has('usuario')){
            return true;
        }else{
            return false;
        }
    }
}
