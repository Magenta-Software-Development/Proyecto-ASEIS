<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //redirije a login
    return redirect()->route('app_login');
})->name('app_welcome');

Route::get('/registro-docente', function () {
    //redirije a login
    return view('registro-docente');
})->name('registro');

Route::get('/error', function () {
    //redirije a login
    return view('error');
})->name('error');


Route::controller(AuthController::class)->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('app_login'); //Muestra el formulario de login
    Route::post('/login/Verify', [AuthController::class, 'loginVerify'])->name('app_login_verify'); //Verifica el login
    Route::post('/logout', [AuthController::class, 'logout'])->name('app_logout'); //Cierra la sesión

});

//Todas estas rutas deben de estar bloqueadas hasta que se haga un auth o un login
//Route::middleware('auth')->group(function () {

    Route::controller(RouteController::class)->group(function () {

        //Rutas de Admin ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        Route::get('/index', [RouteController::class, 'index'])->name('app_index'); //Muestra el indice del admin
        Route::get('/GestionarUsuarios/indexDocente', [RouteController::class, 'gestionIndexDocente'])->name('app_index_docentes'); //Muestra la pagina de gestion de docentes
        Route::get('/GestionarUsuarios/indexEstudiante', [RouteController::class, 'gestionIndexEstudiante'])->name('app_index_estudiantes'); //Muestra la pagina de gestion de estudiantes
        Route::get('/gestionAdmin/indexCursosNoDisponibles', [RouteController::class, 'gestionCursosNoDisponibles'])->name('app_index_cursos_no_disponibles'); //Muestra la pagina de gestion de cursos no disponibles
        Route::get('/gestionAdmin/indexCursosPublicados', [RouteController::class, 'gestionCursosDisponibles'])->name('app_index_cursos_publicados'); //Muestra la pagina de gestion de cursos publicados
        Route::get('/GestionarCategorias/indexCategorias', [RouteController::class, 'gestionCategorias'])->name('app_index_categorias'); //Muestra la pagina de gestion de categorias
        Route::get('/GestionarEspecialidades/indexCategorias', [RouteController::class, 'gestionEspecialidades'])->name('app_index_especialidades'); //Muestra la pagina de gestion de especialidades
        Route::get('/GestionarCodigos/indexCategorias', [RouteController::class, 'gestionCodigos'])->name('app_index_codigos'); //Muestra la pagina de gestion de codigos
        Route::get('/gestionAdmin/indexGestionNoticias', [RouteController::class, 'gestionNoticias'])->name('app_index_gestion_noticias'); //Muestra el indice de gestion de usuarios de docentes
        Route::get('/gestionAdmin/indexGestionCursos', [RouteController::class, 'gestionCursos'])->name('app_index_gestion_cursosAdmin'); //Muestra el indice de gestion de crear noticas del administrador.
        Route::get('/gestionAdmin/indexNoticias', [RouteController::class, 'gestionIndexNoticias'])->name('app_index_noticias'); //Muestra el indice de gestion de crear noticas del administrador.


        //Rutas de Docente -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        Route::get('/indexD', [RouteController::class, 'indexD'])->name('app_index_docente'); //Muestra el indice del docente
        Route::get('/indexD/perfilDocente', [RouteController::class, 'perfilDocente'])->name('app_perfil_docente'); //Muestra el perfil del docente
        Route::get('/gestionDocente/indexCrearCurso', [RouteController::class, 'indexCrearCurso'])->name('app_index_gestion_cursos'); //Muestra la pagina de gestion de cursos creados por ese docente en especifico
        Route::get('/gestionDocente/indexCursosPublicadosDocente', [RouteController::class, 'CursosPublicadosDocente'])->name('app_index_cursosPublicados_docente'); //Muestra la pagina de gestion de cursos publicados por ese docente en especifico
        Route::get('/gestionDocente/indexCursosNoDisponiblesDocente', [RouteController::class, 'CursosNoDisponiblesDocente'])->name('app_index_cursos_no_disponibles_docente'); //Muestra la pagina de gestion de cursos no disponibles por ese docente en especifico
        Route::get('/gestionDocente/indexNoticiasDocente', [RouteController::class, 'NoticiasDocente'])->name('app_index_noticias_docente'); //Muestra la pagina de crear noticias para ese docente en especifico
        Route::get('/gestionDocente/indexNoticiasPublicadas', [RouteController::class, 'NoticiasPublicadas'])->name('app_index_noticias_publicadas'); //Muestra la pagina de gestion de noticias publicadas por ese docente en especifico
        Route::get('/gestionDocente/indexGestionNoticiasD', [RouteController::class, 'GestionNoticiasDocente'])->name('app_index_gestion_noticias_docente'); //Muestra el indice de gestion de noticias

        //Route::get('TU RUTA', [RouteController::class, 'NOMBRE DE LA FUNCION'])->name('NOMBRE DE LLAMADO DE LA RUTA'); -> IR A ROUTE CONTROLLER A CONFIGURAR TU FUNCION

    });
//});
