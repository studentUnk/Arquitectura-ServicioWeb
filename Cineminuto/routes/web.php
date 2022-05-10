<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\FuncionPeliculaController;


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
    //return view('pelicula.index');
});

/*
Route::get('/pelicula', function () {
    return view('pelicula.index');
});
*/

//Route::get('/pelicula/create',[PeliculaController::class,'create']); # Acceder a metodo create

//Route::resource('pelicula',PeliculaController::class); # crear todas las rutas que existen en el controlador

///*

Route::resource('pelicula',PeliculaController::class)->middleware('auth'); # Forzar autenticacion
Route::resource('funcion_pelicula',FuncionPeliculaController::class)->middleware('auth'); # Forzar aut.

Auth::routes();
//Auth::routes(['register'=>false,'reset'=>false]); # Deshabilitar registro y recordar contraseña en el login

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [PeliculaController::class, 'index'])->name('home');
Route::get('/home', [FuncionPeliculaController::class, 'index'])->name('home');


Route::group(['middleware'=>'auth'],function(){
    //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [PeliculaController::class, 'index'])->name('home');
    Route::get('/home', [FuncionPeliculaController::class, 'index'])->name('home');
});


//*/

