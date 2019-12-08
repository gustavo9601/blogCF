<?php

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
    return view('welcome');
});

//Ruta pasando por parametros
Route::get('/test/{name}/{surname?}', function($name, $surname = 'Marrquez'){
    return "<h1>Nombre: $name</h1><h1>Apellido: $surname</h1> ";
});

//Grupo de rutas
//Route::group();