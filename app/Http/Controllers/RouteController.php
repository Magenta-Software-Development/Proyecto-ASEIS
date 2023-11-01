<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Funciones de ruta para administrador---------------------------------------------------------------------------------------------------------------------
    //REGRESAR A ADMINISTRADOR EL ROL CUANDO NOS DEN EL USUARIO ADMINISTRADOR
    
    public function index()
    {
        //Chequea que la sesion este activa
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->rol == 'Docente') { //Si es admin le da acceso
                return view('index');
            } else {
                //Send him back to where it was
                return back()->with('error', 'No tienes permisos para acceder a esta página');
            }
        }
    }

    public function gestionIndexDocente()
    {
        //Chequea que la sesion este activa
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->rol == 'Docente') { //si es admin le da acceso
                return view('gestion-usuarios.index-docentes');
            } else {
                //Send him back to where it was
                return back()->with('error', 'No tienes permisos para acceder a esta página');
            }
        }
    }

    public function gestionIndexEstudiante()
    {
        //Chequea que la sesion este activa
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->rol == 'Docente') { //si es admin le da acceso
                return view('gestion-usuarios.index-estudiante');
            } else {
                //Send him back to where it was
                return back()->with('error', 'No tienes permisos para acceder a esta página');
            }
        }
    }

    public function gestionCursosNoDisponibles()
    {
        //Chequea que la sesion este activa
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->rol == 'Docente') { //si es admin le da acceso
                return view('gestion-admin.index-cursos-no-disponibles');
            } else {
                //Send him back to where it was
                return back()->with('error', 'No tienes permisos para acceder a esta página');
            }
        }
    }

    public function gestionCursosDisponibles()
    {
        //Chequea que la sesion este activa
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->rol == 'Docente') { //si es admin le da acceso
                return view('gestion-admin.index-cursos-publicados');
            } else {
                //Send him back to where it was
                return back()->with('error', 'No tienes permisos para acceder a esta página');
            }
        }
    }

    public function gestionCategorias()
    {
        //Chequea que la sesion este activa
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->rol == 'Docente') { //si es admin le da acceso
                return view('gestion-categorias.index-categorias');
            } else {
                //Send him back to where it was
                return back()->with('error', 'No tienes permisos para acceder a esta página');
            }
        }
    }



    //Funciones de ruta para docente --------------------------------------------------------------------------------------------------------
    public function indexD()
    {
        //Chequea que la sesion este activa
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->rol == 'Docente') { //Si es docente le da acceso
                return view('indexD');
            } else {
                //Send him back to where it was
                return back()->with('error', 'No tienes permisos para acceder a esta página');
            }
        }
    }

    public function perfilDocente()
    {
        //Chequea que la sesion este activa
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->rol == 'Docente') { //Si es docente le da acceso
                return view('gestion-perfilDocente.perfilDocente');
            } else {
                //Send him back to where it was
                return back()->with('error', 'No tienes permisos para acceder a esta página');
            }
        }
    }

   /* public function NOMBRE DE LA FUNCION COMO EN WEB.PHP()
    {
        //Chequea que la sesion este activa
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->rol == 'ROL QUE DAR ACCESO') { //Si es docente le da acceso
                return view('gestion-perfilDocente.perfilDocente');
            } else {
                //Send him back to where it was
                return back()->with('error', 'No tienes permisos para acceder a esta página');
            }
        }
    }*/

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
