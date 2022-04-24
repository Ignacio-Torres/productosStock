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
Route::get('/productos/buscar','App\Http\Controllers\gestionProductosController@buscar')->name('productos.buscar');
Route::post('/productos/consultar','App\Http\Controllers\gestionProductosController@consultar')->name('productos.consultar');
Route::resource('productos','App\Http\Controllers\gestionProductosController')->names('productos');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
