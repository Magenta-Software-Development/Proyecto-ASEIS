<?php

use App\Http\Controllers\AuthController;
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

/*//Ruta a Login
Route::get('/login', function () {
    return view('login');
})->name('app_login');*/

Route::controller(AuthController::class)->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('app_login'); //Muestra el formulario de login
    Route::post('/login/Verify', [AuthController::class, 'loginVerify'])->name('app_login_verify'); //Verifica el login

    //Route::get('/register', [AuthController::class, 'register'])->name('register');//Muestra el formulario de registro
    //Route::post('/register', [AuthController::class, 'registerVerify'])->name('register.store');//Crea el usuario

    //Route::post('/registerReferred', [AuthController::class, 'registerReferredVerify'])->name('registerReferred.store');//Crea el usuario

    Route::post('/logout', [AuthController::class, 'logout'])->name('app_logout'); //Cierra la sesión

    //Route::get('/register/referred', [AuthController::class, 'registerReferred'])->name('register.referred');//Muestra el formulario de registro con referido
});

//Todas estas rutas deben de estar bloqueadas hasta que se haga un auth o un login
Route::middleware('auth')->group(function () {
    //Ruta a index de gestion de cursos
    Route::get('/index', function () {
        return view('index');
    })->name('app_index');

    //Ruta a index de gestion de usuarios de docentes
    Route::get('/GestionarUsuarios/indexDocente', function () {
        return view('gestion-usuarios/index-docentes');
    })->name('app_index_usuarios');

    //Ruta a index de gestion de usuarios de estudiantes
    Route::get('/GestionarUsuarios/indexEstudiante', function () {
        return view('gestion-usuarios/index-estudiante');
    })->name('app_index_estudiante');

    //Ruta a navbar lateral
    Route::get('/indexD', function () {
        return view('indexD');
    })->name('app_index_docente');

    //Ruta para visualizar el perfil del Docente
    Route::get('/indexD/perfilDocente', function () {
        return view('gestion-perfilDocente/perfilDocente');
    })->name('app_perfil_docente');

    //Ruta de la vista cursos no disponibles
    Route::get('/gestionAdmin/indexCursosNoDisponibles', function () {
        return view('gestion-admin/index-cursos-no-disponibles');
    })->name('app_index_cursos_no_disponibles');

    //Ruta de la vista cursos publicados
    Route::get('/gestionAdmin/indexCursosPublicados', function () {
        return view('gestion-admin/index-cursos-publicados');
    })->name('app_index_cursos_publicados');

    //ruta a index de gestion de categorias Admin
    Route::get('/GestionarCategorias/indexCategorias', function () {
        return view('gestion-categorias/index-categorias');
    })->name('app_index_categorias');
});








/*Lo ultimo que se hizo fue identificar a traves del rol que trae la respuesta del ajax, darle entrada al index de docente o de admin
falta bloquear las rutas como tal ahora, creo que eso se hace con un Auth:: algo y se obtiene el rol de esa persona, si es admin se
le da acceso a todo lo de admin, y si es docente, a todo lo de docente menos admin, a traves del route controller*/
