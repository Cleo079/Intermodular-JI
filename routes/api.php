<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\eventoController;
use App\Http\Controllers\api\usuarioController;
use App\Http\Controllers\api\eventoApi;
use App\Http\Controllers\api\entradaApi;
use App\Http\Controllers\api\eventoControllerApi;
use App\Http\Controllers\api\EntradasControllerApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::apiResource('usuario',usuarioController::class);

Route::post('usuario/login', [usuarioController::class, 'login']);

Route::get('entradasApi', [EntradasControllerApi::class, 'index']);
Route::post('entradasApi', [EntradasControllerApi::class, 'store']);

// Route::apiResource('evento', eventoApi::class);
// Route::apiResource('entradas', entradaApi::class);







Route::apiResource('evento', eventoController::class);

Route::apiResource('eventoApi', eventoControllerApi::class);

