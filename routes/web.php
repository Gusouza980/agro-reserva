<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name("index");

Route::get('/fazenda/conheca', function () {
    return view('fazenda');
})->name("fazenda.conheca");

Route::get('/fazenda/conheca/lotes', function () {
    return view('fazenda');
})->name("fazenda.conheca.lotes");

Route::get('/fazenda/conheca/depoimentos', function () {
    return view('fazenda');
})->name("fazenda.conheca.depoimentos");

Route::get('/fazenda/conheca/avaliacao', function () {
    return view('fazenda');
})->name("fazenda.conheca.avaliacao");

Route::get('/fazenda/lotes', function () {
    return view('lotes');
})->name("fazenda.lotes");

Route::get('/fazenda/lote', function () {
    return view('lote');
})->name("fazenda.lote");

Route::get('/cadastro', function () {
    return view('cadastro.index');
})->name("cadastro");

Route::get('/cadastro/passos', function () {
    return view('cadastro.passos');
})->name("cadastro.passos");

Route::middleware(['cadastro_finalizado'])->group(function () {
    
});

Route::middleware(['fazenda_logada'])->group(function () {
    
});

Route::post('/cadastro/salvar', [\App\Http\Controllers\ClienteController::class, 'cadastro_inicial'])->name("cadastro.salvar");
Route::post('/cadastro/finalizar', [\App\Http\Controllers\ClienteController::class, 'cadastro_final'])->name("cadastro.finalizar");


Route::get('/painel/login', [\App\Http\Controllers\PainelController::class, 'login'])->name("painel.login");
Route::get('/painel', [\App\Http\Controllers\PainelController::class, 'index'])->name("painel.index");
Route::get('/painel/fazenda/cadastro', [\App\Http\Controllers\FazendaController::class, 'cadastro'])->name("painel.fazenda.cadastro");

