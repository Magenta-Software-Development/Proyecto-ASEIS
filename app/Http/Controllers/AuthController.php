<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Contracts\Providers\Auth as ProvidersAuth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function login()
    {
        return view('login'); //retorna la vista login
    }

    public function loginVerify(Request $request)
    {

        //Trae todos los usuarios
        $user = User::where('id_usuario', $request->id)->first();


        //Si el usuario existe
        if ($user) {
            Log::info("AuthController");
            Log::info("Usuario existe");
            Auth::login($user); //inicia la sesion.
            Log::info(Auth::check());
            return $user;
        }
    }

    public function logout()
    {

        if (Auth::check()) {

            $user = Auth::user();

            Auth::logout();
            return redirect()->route('app_login')->with('success', 'Sesión cerrada correctamente');
        } else {
            return redirect()->route('app_login')->with('error', 'No hay ninguna sesión activa');
        }
    }
}
