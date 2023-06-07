<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\RecetaController;
use App\Models\Receta;
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

// Route::get('/', function () {
//     return view('receta.index_inicio');
// })->name('inicio');

Route::get('/',[RecetaController::class,'index_inicio'])->name('inicio');
Route::get('buscadorini',[RecetaController::class,'index_inicio'])->name('buscadorini');

//Apartado de categorias

Route::resource('/categorias',CategoriaController::class)->middleware('admin');
Route::get('categoriasAdmin',[CategoriaController::class,'index'])->name('categoriasAdmin')->middleware('admin');

Route::get('verCategoria/{id}',[CategoriaController::class,'verCategoria'])->name('verCategoria');

//Apartado de FOTOS

Route::get('buscadorfoto',[FotoController::class,'index'])->middleware('admin')->name('buscadorfoto');
Route::get('fotosAdmin',[FotoController::class,'index'])->middleware('admin')->name('fotosAdmin');

Route::get('/galeria', function () {
    return view('foto/galeria')->with('fotos',FotoController::cargarGaleria());
})->name('galeria');

Route::get('/subirfoto',[FotoController::class,'create'])->middleware('auth')->name('subirfoto');

Route::get('fotos.edit/{id}',[FotoController::class,'edit'])->middleware('admin')->name('fotos.edit');
Route::get('fotos.index',[FotoController::class,'index'])->middleware('admin')->name('fotos.index');
Route::patch('fotos.update/{id}',[FotoController::class,'update'])->middleware('admin')->name('fotos.update');
Route::delete('fotos.destroy/{id}',[FotoController::class,'destroy'])->middleware('admin')->name('fotos.destroy');

Route::post('fotos.store',[FotoController::class,'store'])->name('fotos.store')->middleware('auth');

//Apartado de RECETAS

//PARA ADMIN

Route::resource('/recetas',RecetaController::class)->middleware('admin');
Route::get('buscadorAdmin',[RecetaController::class,'index'])->middleware('admin')->name('buscadorAdmin');
Route::get('buscadorAdminCat',[CategoriaController::class,'index'])->middleware('admin')->name('buscadorAdminCat');

Route::get('recetasAdmin',[RecetaController::class,'index'])->name('recetasAdmin')->middleware('admin');

//PARA USUARIO

Route::get('/misRecetas', function () {
    return view('receta/index_usuario');
})->name('misRecetas')->middleware('auth');

Route::get('/crearReceta',[RecetaController::class,'create_usuario'])->name('crearReceta')->middleware('auth');
Route::post('storeRecUsuario',[RecetaController::class,'store_usuario'])->name('storeRecUsuario')->middleware('auth');

//para borrar receta
Route::delete('deleteRecUsuario/{id}',[RecetaController::class,'destroy_usuario'])->name('deleteRecUsuario')->middleware('auth');

//para editar receta updateRecUsuario
Route::get('editRecUsuario/{id}',[RecetaController::class,'edit_usuario'])->name('editRecUsuario')->middleware('auth');
Route::patch('updateRecUsuario/{receta}',[RecetaController::class,'update_usuario'])->name('updateRecUsuario')->middleware('auth');

Route::get('verRecetaIni/{id}',[RecetaController::class,'show_inicio'])->name('verRecetaIni');

//Para añadir a FAVORITOS

Route::post('fav',[FavoritoController::class,'fav'])->middleware('auth')->name('fav');
Route::delete('delfav/{id}',[FavoritoController::class,'delfav'])->middleware('auth')->name('delfav');

Route::get('/misFavoritos', function () {
    return view('favorito/index_fav');
})->name('misFavoritos')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
