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


Route::controller(AuthController::class)->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('app_login'); //Muestra el formulario de login
    Route::post('/login/Verify', [AuthController::class, 'loginVerify'])->name('app_login_verify'); //Verifica el login
    Route::post('/logout', [AuthController::class, 'logout'])->name('app_logout'); //Cierra la sesión

});

//Todas estas rutas deben de estar bloqueadas hasta que se haga un auth o un login
Route::middleware('auth')->group(function () {

    Route::controller(RouteController::class)->group(function () {

        //Rutas de Admin ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        Route::get('/index', [RouteController::class, 'index'])->name('app_index'); //Muestra el indice del admin
        Route::get('/GestionarUsuarios/indexDocente', [RouteController::class, 'gestionIndexDocente'])->name('app_index_docentes'); //Muestra el indice de gestion de usuarios de docentes
        Route::get('/GestionarUsuarios/indexEstudiante', [RouteController::class, 'gestionIndexEstudiante'])->name('app_index_estudiantes'); //Muestra el indice de gestion de usuarios de docentes
        Route::get('/gestionAdmin/indexCursosNoDisponibles', [RouteController::class, 'gestionCursosNoDisponibles'])->name('app_index_cursos_no_disponibles'); //Muestra el indice de gestion de usuarios de docentes
        Route::get('/gestionAdmin/indexCursosPublicados', [RouteController::class, 'gestionCursosDisponibles'])->name('app_index_cursos_publicados'); //Muestra el indice de gestion de usuarios de docentes
        Route::get('/GestionarCategorias/indexCategorias', [RouteController::class, 'gestionCategorias'])->name('app_index_categorias'); //Muestra el indice de gestion de usuarios de docentes


        //Rutas de Docente -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        Route::get('/indexD', [RouteController::class, 'indexD'])->name('app_index_docente'); //Muestra el indice del docente
        Route::get('/indexD/perfilDocente', [RouteController::class, 'perfilDocente'])->name('app_perfil_docente');
        Route::get('TU RUTA', [RouteController::class, 'NOMBRE DE LA FUNCION'])->name('NOMBRE DE LLAMADO DE LA RUTA'); -> IR A ROUTE CONTROLLER
        //Route::get('TU RUTA', [RouteController::class, 'NOMBRE DE LA FUNCION'])->name('NOMBRE DE LLAMADO DE LA RUTA'); -> IR A ROUTE CONTROLLER
        
    });
});
