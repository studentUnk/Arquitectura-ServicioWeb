<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas directas API REST 
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// -- Servicio de pelicula
Route::get('/pelicula','App\Http\Controllers\PeliculaController@indexAPI');
Route::post('/pelicula','App\Http\Controllers\PeliculaController@storeAPI');
Route::put('/pelicula','App\Http\Controllers\PeliculaController@updateAPI');
Route::delete('/pelicula','App\Http\Controllers\PeliculaController@destroyAPI');
