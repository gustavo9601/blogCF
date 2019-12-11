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
})->middleware('language');


//Grupo de rutas
Route::group(
    ["prefix" => 'admin'],   //genera en el path /admin
    function () {


        Route::get('/test', function () {
            $name = 'Gustavo Marquez';
            $numeros = [1, 2, 3, 4];
            return view('test', compact("name", "numeros"));//Con compact le pasamos varios parametros entre ""
            //return view('test')->with('name', $name);//Con with le pasamos parametros a la vista
        });

        //Ruta pasando por parametros
        Route::get('/test/{name}/{surname?}', function ($name, $surname = 'Marrquez') {
            return "<h1>Nombre: $name</h1><h1>Apellido: $surname</h1> ";
        })->where('name', '[A-Za-z]+');  //Especificando los valores posibles con exprecion regular

    });


//Ruta que recibe cualquier verbo
Route::any('cualquier-verbo', function () {
    return "<h1>Cualquier verbo</h1>";
});

//Especfiicando varios verbos
Route::match(['get', 'post'], '/ruta-match', function () {
    return "Ruta que recibe los verbos GET y POST";
})->name('solo-get-post');  // le añadimos un nombre a la ruta


Route::get('/test-conection-bd', function () {
    try {

        //Tratara de hacer la conexion con la informacion en el archivo .env
        dd(DB::connection()->getPdo());
    } catch (\Exception $e) {
        return "No se pudo conectar a la bd y el error es: " . $e;
    }
});


Route::get('/users', function () {
    dd(App\User::with(['posts'])->first()->where('id', '=', '1')->get());
});

//Parquete del query builder
use Illuminate\Support\Facades\DB;
Route::get('/query-builder', function(){

    $usuerios = DB::table('users')
        ->join('posts', 'users.id', 'posts.user_id')  //Haciendo un join (tabla_comparar, id_actual, id_comparar)
        ->select('users.id', 'users.name', 'posts.title', 'posts.content')   //Seleccionando las columnas a mostrar
        ->where('email', '=', 'marks.chris@example.com')   // condicion
        ->get();  //Obteniendo solo la coleccion
    dd($usuerios);

});


//Ruta de redireccionamiento
Route::redirect('/redireccionado', '/admin/test/gustavo/s');


/*=====
Rutas desde controlador
=======
*/

Route::get('/cargar-usuarios', 'TestController@index');


Route::resource('/posts', 'PostController');