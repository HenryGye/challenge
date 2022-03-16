<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsuarioController;
use App\Http\Controllers\API\BlogController;

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

Route::controller(UsuarioController::class)->group(function () {
    Route::get('/usuario', 'index');
    Route::get('/usuario/{id}', 'show')->where('id', '[0-9]+');
});

Route::controller(BlogController::class)->group(function () {
    Route::get('/blog', 'index');
    Route::get('/blog/{id}', 'show')->where('id', '[0-9]+');
});

Route::fallback(function(){
    return response()->json(['message' => 'Ruta no encontrada']);
});
