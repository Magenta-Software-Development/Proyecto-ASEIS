<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        //Buscar si el usuario existe
        $user = User::where('email', $request->email)->first();

        if ($user) {
            Auth::login($user); //inicia la sesion
            return back()->with('success','Sesion creada correctamente');
        } else {

            //Create an user object
            $user = new User();
            $user->names = "Usuario";
            $user->email = $request->email;
            $user->password = $request->password;

            User::create([
                'name' => $user->names,
                'email' => $user->email,
                'password' => $user->password,
            ]);

            $user2 = User::where('email', $request->email)->first();
            Auth::login($user2); //inicia la sesion
            return back()->with('success','Sesion creada correctamente');
        }
    }

    public function logout()
    {

        $user = Auth::user();
        User::where('id', $user->id)->delete();

        Auth::logout();
        return redirect()->route('app_login')->with('success','Sesion crerada correctamente');
    }
}


