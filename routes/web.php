<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|CAMBIOS MIKESBAHIA
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/holamundo', function () {
    return view('holamundo');
});

Route::get('/MostrarInfo', function () {
    return view('Listar-usuarios/mostar-informacion');
});
