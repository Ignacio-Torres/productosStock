<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('auth/login');
});
Route::get('/productos/buscar','App\Http\Controllers\gestionProductosController@buscar')->name('productos.buscar');
Route::get('/productos/{id}/edit','App\Http\Controllers\gestionProductosController@edit')->name('productos.edit');
Route::post('/productos/{id}/update','App\Http\Controllers\gestionProductosController@update')->name('productos.update');
Route::post('/productos/consultar','App\Http\Controllers\gestionProductosController@consultar')->name('productos.consultar');
Route::get('/productos/eliminar','App\Http\Controllers\gestionProductosController@eliminar')->name('productos.eliminar');
Route::post('/productos/delete','App\Http\Controllers\gestionProductosController@delete')->name('productos.delete');
Route::post('/productos/desactivar','App\Http\Controllers\gestionProductosController@desactivar')->name('productos.desactivar');
Route::resource('productos','App\Http\Controllers\gestionProductosController')->except('edit','update')->names('productos');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
