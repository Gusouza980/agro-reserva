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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/reconhecimento/identidade', [\App\Http\Controllers\Api\ReconhecimentoImagemController::class, 'verificarIdentidade']);


Route::resource('banners', \App\Http\Controllers\Api\BannersController::class);

// RESERVAS
Route::get('/reservas/ativas', [\App\Http\Controllers\Api\ReservasController::class, 'ativas']);
Route::resource('reservas', \App\Http\Controllers\Api\ReservasController::class);

// LOG DE PÁGINAS
Route::post('/log/create', [\App\Http\Controllers\LogPaginasController::class, 'create'])->name("log.paginas.create");
Route::post('/log/update', [\App\Http\Controllers\LogPaginasController::class, 'update'])->name("log.paginas.update");
Route::post('/log/evento/create', [\App\Http\Controllers\LogPaginasController::class, 'create_evento'])->name("log.paginas.evento.create");
