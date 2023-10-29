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

Route::get('/indexD', function(){
    return view('indexD');
})->name('app_index_docente');

//ruta a index de gestion de categorias Admin
Route::get('/GestionarCategorias/indexCategorias',function(){
    return view('gestion-categorias/index-categorias');
})->name('app_index_categorias');
