<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Return_;
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
        //Iniciar una sesion con session->start() en el controlador

        /*Log::info(User::all());
        Log::info($request->all());
        Log::info($request->id);
        Log::info($request->token);
        Log::info($request->rol);*/


        $rol = $request->rol;
        $request->session()->start();
        session(['rol' => $rol]);
        session()->save();

        Log::info(session_status());

        return $rol;
    }

    public function logout(Request $request)
    {

        Log::info(session_status());

        $request->session()->invalidate();
        session()->flush();
        return redirect()->route('app_login');


        //Limpia la sesion

    }
}

/*Lo ultimo que hice fue intentar autenticar el inicio de sesion con un session start, quiero revisar que el session start de Js
Inicie el session start de laravel, tal vez llamando con ajax a la funcion LoginVerify y solo iniciando la sesion de laravel me sirva
Ojala lo pueda lograr, debo de */
