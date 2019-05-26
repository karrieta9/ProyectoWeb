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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//  Route::get('/ingredients', 'IngredientesController@index')->name('ingredients');
//  Route::post('/ingredients', 'IngredientesController@store');
// Route::get('ingredients/{ingredient}/edit', 'IngredientesController@edit');



Route::resource('ingredients','IngredientesController');
//Route::get('plateado', 'prueba@index');
Route::resource('platos', 'PlatosController');
Route::resource('ordenes','OrdensController');
Route::resource('liquidacion', 'LiquidacionController');



Route::get('liquidacion/cierre', 'LiquidacionController@show')->name('liquidacion');
Route::get('ventas','HomeController@ventas')->name('ventas');



//Route::post('liquidacion', 'HomeController@buscarPlatos');