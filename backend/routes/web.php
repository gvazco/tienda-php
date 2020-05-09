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
    return view('plantilla');
});

Route::view('/', 'paginas.plantilla');
Route::view('/comercio', 'paginas.comercio');
Route::view('/slide', 'paginas.slide');
Route::view('/banner', 'paginas.banner');
Route::view('/categorias', 'paginas.categorias');
Route::view('/subcategorias', 'paginas.subcategorias');
Route::view('/productos', 'paginas.productos');
Route::view('/ventas', 'paginas.ventas');
Route::view('/visitas', 'paginas.visitas');
Route::view('/usuarios', 'paginas.usuarios');
Route::view('/administradores', 'paginas.administradores');
// Route::view('/opiniones', 'paginas.opiniones');



// Método Get


// Route::get('/', 'PlantillaController@traerPlantilla' );
// Route::get('/comercio', 'ComercioController@traerComercio' );
// Route::get('/slide', 'SlideController@traerSlide' );
// Route::get('/banner', 'BannerController@traerBanner' );
// Route::get('/categorias', 'CategoriasController@traerCategorias' );
// Route::get('/subcategorias', 'SubcategoriasController@traerSubcategorias' );
// Route::get('/productos', 'ProductosController@traerProductos' );
// Route::get('/ventas', 'VentasController@traerVentas' );
// Route::get('/visitas', 'VisitasController@traerVisitas' );
// Route::get('/usuarios', 'UsuariosController@traerUsuarios' );
// Route::get('/administradores', 'AdministradoresController@traerAdministradores' );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Routas que incluyen todos los métodos HTTP
//Routes::resource
//php artisan route list

Route::resource('/', 'PlantillaController');
Route::resource('/plantilla', 'PlantillaController');
Route::resource('/comercio', 'ComercioController');
Route::resource('/slide', 'SlideController');
Route::resource('/banner', 'BannerController');
Route::resource('/categorias', 'CategoriasController');
Route::resource('/subcategorias', 'SubcategoriasController');
Route::resource('/productos', 'ProductosController');
Route::resource('/ventas', 'VentasController');
Route::resource('/visitas', 'VisitasController');
Route::resource('/usuarios', 'UsuariosController');
Route::resource('/administradores', 'AdministradoresController');
// Route::resource('/opiniones', 'OpinionesController');
