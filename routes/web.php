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

Route::get('/', function () {
    return view('login');
})->name('app_index');


Route::get('/GestionarUsuarios/indexDocente', function () {
    return view('gestion-usuarios/index-docentes');
})->name('app_index_usuarios');

Route::get('/GestionarUsuarios/indexEstudiante', function () {
    return view('gestion-usuarios/index-estudiante');
})->name('app_index_estudiante');

Route::get('/MostrarInfo', function () {
    return view('gestion-usuarios/mostar-informacion');
})->name('app_mostrar_info');

Route::get('/CrearUsuarioAdmin', function () {
    return view('gestion-usuarios/crearUsuariosAdmin');
})->name('app_crear_usuario_admin');
