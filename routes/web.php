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


//borar luego
Route::get('email', function () {
    return view('\auth\passwords\email');
});

Route::get('reset', function () {
    return view('\auth\passwords\reset');
});

Route::get('verify', function () {
    return view('\auth\verify');
});
