<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\RecetaController;
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



// INICIO

Route::get('/', function () {
    return view('welcome');
})->name('inicio');


Route::get('/masfoto', function () {
    return view('imagenes/create');
})->name('masfoto');


//Apartado de categorias
Route::resource('/categorias',CategoriaController::class)->middleware('admin');
Route::get('categoriasAdmin',[CategoriaController::class,'index'])->name('categoriasAdmin')->middleware('admin');

//Apartado de fotos
Route::resource('/fotos',FotoController::class)->middleware('admin');

Route::get('/galeria', function () {
    return view('foto/galeria')->with('fotos',FotoController::cargarGaleria());
})->name('galeria');

Route::get('/subirfoto',[FotoController::class,'create'])->middleware('auth')->name('subirfoto');

//Apartado de recetas

Route::resource('/recetas',RecetaController::class)->middleware('admin');
Route::get('recetasAdmin',[RecetaController::class,'index'])->name('recetasAdmin')->middleware('admin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
