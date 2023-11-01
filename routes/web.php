<?php

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

Route::get('/',function(){
    //redirije a login
    return redirect()->route('app_login');
})->name('app_welcome');

Route::get('/registro-docente',function(){
    //redirije a login
    return view('registro-docente');
})->name('registro');

//Ruta a Login
Route::get('/login', function () {
    return view('login');
})->name('app_login');

//Todas estas rutas deben de estar bloqueadas hasta que se haga un auth o un login

//Ruta a Index
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
Route::get('/indexD', function(){
    return view('indexD');
})->name('app_index_docente');

//Ruta para visualizar el perfil del Docente
Route::get('/indexD/perfilDocente',function(){
    return view('gestion-perfilDocente/perfilDocente');
})->name('app_perfil_docente');

//Ruta para gestionar cursos
Route::get('/gestionDocente/indexCrearCurso',function(){
    return view('gestion-perfilDocente/index-gestion-cursos');
})->name('app_index_gestion_cursos');

//Ruta para visualizar cursos Publicados en Docente
Route::get('/gestionDocente/indexCursosPublicadosDocente',function(){
    return view('gestion-perfilDocente/index-cursosPublicados-Docente');
})->name('app_index_cursosPublicados_docente');

//Ruta para visualizar cursos No Disponibles en Docente
Route::get('/gestionDocente/indexCursosNoDisponiblesDocente',function(){
    return view('gestion-perfilDocente/index-cursos-no-disponibles-docente');
})->name('app_index_cursos_no_disponibles_docente');

//Ruta para visualizar la gestion de noticias en Docente
Route::get('/gestionDocente/indexNoticiasDocente',function(){
    return view('gestion-perfilDocente/index-noticias-docente');
})->name('app_index_noticias_docente');

//Ruta para visualizar las noticias publicadas en Docente
Route::get('/gestionDocente/indexNoticiasPublicadas',function(){
    return view('gestion-perfilDocente/index-noticias-publicadas');
})->name('app_index_noticias_publicadas');

//Ruta de la vista cursos no disponibles
Route::get('/gestionAdmin/indexCursosNoDisponibles', function(){
    return view('gestion-admin/index-cursos-no-disponibles');
})->name('app_index_cursos_no_disponibles');

//Ruta de la vista cursos publicados
Route::get('/gestionAdmin/indexCursosPublicados', function(){
    return view('gestion-admin/index-cursos-publicados');
})->name('app_index_cursos_publicados');

//ruta a index de gestion de categorias Admin
Route::get('/GestionarCategorias/indexCategorias',function(){
    return view('gestion-categorias/index-categorias');
})->name('app_index_categorias');

