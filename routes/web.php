<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ImageneController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Route::get('/galeria', function () {
    return view('imagenes/index')->with('fotos',ImageneController::cargarGaleria());
})->name('galeria');

Route::get('/masfoto', function () {
    return view('imagenes/create');
})->name('masfoto');

Route::resource('/categorias',CategoriaController::class);
Route::resource('/imagenes',ImageneController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
