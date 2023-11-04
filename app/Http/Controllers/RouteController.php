<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Funciones de ruta para administrador---------------------------------------------------------------------------------------------------------------------
    //REGRESAR A ADMINISTRADOR EL ROL CUANDO NOS DEN EL USUARIO ADMINISTRADOR

    public function index(Request $request)
    {

        if ($request->session()->get('rol') == 'Admin' && $request->session()->token() != null) {
            return view('index');
        } else {
            return redirect()->route('app_login');
        }
    }

    public function gestionIndexDocente(Request $request)
    {

        if ($request->session()->get('rol') == 'Admin' && $request->session()->token() != null) {
            return view('gestion-usuarios.index-docentes');
        } else {
            return redirect()->route('app_login');
        }
    }

    public function gestionIndexEstudiante(Request $request)
    {
        if ($request->session()->get('rol') == 'Admin' && $request->session()->token() != null) {
            return view('gestion-usuarios.index-estudiante');
        } else {
            return redirect()->route('app_login');
        }
    }

    public function gestionCursosNoDisponibles(Request $request)
    {
        if ($request->session()->get('rol') == 'Admin' && $request->session()->token() != null) {
            return view('gestion-admin.index-cursos-no-disponibles');
        } else {
            return redirect()->route('app_login');
        }
    }

    public function gestionCursosDisponibles(Request $request)
    {
        if ($request->session()->get('rol') == 'Admin' && $request->session()->token() != null) {
            return view('gestion-admin.index-cursos-publicados');
        } else {
            return redirect()->route('app_login');
        }
    }

    public function gestionCategorias(Request $request)
    {

        if ($request->session()->get('rol') == 'Admin' && $request->session()->token() != null) {
            return view('gestion-categorias.index-categorias');
        } else {
            return redirect()->route('app_login');
        }
    }

    public function gestionEspecialidades(Request $request)
    {

        if ($request->session()->get('rol') == 'Admin' && $request->session()->token() != null) {
            return view('gestion-especialidades.index-especialidades');
        } else {
            return redirect()->route('app_login');
        }
    }

    public function gestionCodigos(Request $request)
    {
        if ($request->session()->get('rol') == 'Admin' && $request->session()->token() != null) {
            return view('gestion-codigos.index-codigos');
        } else {
            return redirect()->route('app_login');
        }
    }
    ///////////////////////////////CAMBIAR ROL DOCENTE -> ADMINISTRADOR CUANDO TERMINE DE HACER CAMBIOS/////////////////////

    //Funciones de ruta para docente --------------------------------------------------------------------------------------------------------
    public function indexD(Request $request)
    {
        if ($request->session()->get('rol') == 'Docente' && $request->session()->token() != null) {
            return view('indexD');
        } else {
            return redirect()->route('app_login');
        }
    }

    public function perfilDocente(Request $request)
    {
        if ($request->session()->get('rol') == 'Docente' && $request->session()->token() != null) {
            return view('gestion-perfilDocente.perfilDocente');
        } else {
            return redirect()->route('app_login');
        }
    }

    public function indexCrearCurso(Request $request)
    {
        if ($request->session()->get('rol') == 'Docente' && $request->session()->token() != null) {
            return view('gestion-perfilDocente.index-gestion-cursos');
        } else {
            return redirect()->route('app_login');
        }
    }

    public function CursosPublicadosDocente(Request $request)
    {

        if ($request->session()->get('rol') == 'Docente' && $request->session()->token() != null) {
            return view('gestion-perfilDocente.index-cursosPublicados-Docente');
        } else {
            return redirect()->route('app_login');
        }
    }

    public function CursosNoDisponiblesDocente(Request $request)
    {

        if ($request->session()->get('rol') == 'Docente' && $request->session()->token() != null) {
            return view('gestion-perfilDocente.index-cursos-no-disponibles-Docente');
        } else {
            return redirect()->route('app_login');
        }
    }

    public function NoticiasDocente(Request $request)
    {

        if ($request->session()->get('rol') == 'Docente' && $request->session()->token() != null) {
            return view('gestion-perfilDocente.index-noticias-docente');
        } else {
            return redirect()->route('app_login');
        }
    }

    public function NoticiasPublicadas(Request $request)
    {

        if ($request->session()->get('rol') == 'Docente' && $request->session()->token() != null) {
            return view('gestion-perfilDocente.index-noticias-publicadas');
        } else {
            return redirect()->route('app_login');
        }
    }

    public function gestionNoticias(Request $request)
    {

        if ($request->session()->get('rol') == 'Docente' && $request->session()->token() != null) {
            return view('gestion-admin.index-gestion-noticias');
        } else {
            return redirect()->route('app_login');
        }
    }


    public function gestionNoticiasPublicadas(Request $request)
    {

        if ($request->session()->get('rol') == 'Docente' && $request->session()->token() != null) {
            return view('gestion-admin.index-noticias-publicadas');
        } else {
            return redirect()->route('app_login');
        }
    }


    /*
    
    Estructura de la ruta:

    Roles:
    Admin
    Docente

        public function NOMBRE DE LA FUNCION COMO EN WEB.PHP(Request $request)
        {

            if ($request->session()->get('rol') == 'ROL AL QUE SE QUIERE DAR ACCESO' && $request->session()->token() != null) {
                //Si el rol es el que se quiere dejar accesar y el token es diferente de null, entonces se muestra la vista
                //El token sera null cuando se cierre sesion
                
                return view('RUTA A LA VISTA QUE QUIERES MOSTRAR');
            } else {
                return redirect()->route('app_login');
            }
        }


    */




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
