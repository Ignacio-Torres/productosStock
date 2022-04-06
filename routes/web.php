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
    return view('welcome');
});
Route::get('/productos/consultar','App\Http\Controllers\gestionProductosController@consultar')->name('consultarProducto');

Route::get('/productos/registrar','App\Http\Controllers\gestionProductosController@mostrarRegistrar')->name('mostrarRegistrarProducto');

Route::post('/productos/guardarRegistro','App\Http\Controllers\gestionProductosController@registrar')->name('registrarProducto');

Route::get('/productos/eliminar','App\Http\Controllers\gestionProductosController@eliminar')->name('eliminarProducto');

Route::get('/productos/actualizar','App\Http\Controllers\gestionProductosController@actualizar')->name('actualizarProducto');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
