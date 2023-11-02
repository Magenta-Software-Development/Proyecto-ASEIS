<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user = User::where('email', $request->email)->first();


        //Si el usuario existe
        if ($user) {
            Auth::login($user); //inicia la sesion.
            return $user;
        } else {

            //Create an user object
            $user = new User();
            $user->names = "Usuario";
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->rol = $request->rol['roles'];

            User::create([
                'name' => $user->names,
                'email' => $user->email,
                'password' => $user->password,
                'rol' => $user->rol,
            ]);

            $user2 = User::where('email', $request->email)->first();
            Auth::login($user2); //inicia la sesion
            return $user2;
        }
    }

    public function logout()
    {

        if (Auth::check()) {

            $user = Auth::user();
            User::where('id', $user->id)->delete();

            Auth::logout();
            return redirect()->route('app_login')->with('success', 'Sesión cerrada correctamente');
        } else {
            return redirect()->route('app_login')->with('error', 'No hay ninguna sesión activa');
        }
    }
}
