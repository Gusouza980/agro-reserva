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



Route::get('/cadastro', function () {
    return view('cadastro.index');
})->name("cadastro");

Route::get('/cadastro/passos', function () {
    return view('cadastro.passos');
})->name("cadastro.passos");

Route::get('/login', function () {
    return view('login');
})->name("login");

Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name("index");
Route::get('/cadastro/fazenda', [\App\Http\Controllers\SiteController::class, 'cadastro_fazenda'])->name("cadastro.fazenda");
Route::get('/cadastro/passos', [\App\Http\Controllers\SiteController::class, 'cadastro_passos'])->name("cadastro.passos");
Route::get('/fazenda/{fazenda}/conheca', [\App\Http\Controllers\SiteController::class, 'conheca'])->name("fazenda.conheca");
Route::get('/fazenda/{fazenda}/conheca/lotes', [\App\Http\Controllers\SiteController::class, 'conheca'])->name("fazenda.conheca.lotes");
Route::get('/fazenda/{fazenda}/conheca/depoimentos', [\App\Http\Controllers\SiteController::class, 'conheca'])->name("fazenda.conheca.depoimentos");
Route::get('/fazenda/{fazenda}/conheca/avaliacoes', [\App\Http\Controllers\SiteController::class, 'conheca'])->name("fazenda.conheca.avaliacoes");
Route::get('/fazenda/{fazenda}/lotes', [\App\Http\Controllers\SiteController::class, 'lotes'])->name("fazenda.lotes");
Route::get('/fazenda/{fazenda}/lote/{lote}',  [\App\Http\Controllers\SiteController::class, 'lote'])->name("fazenda.lote");
Route::get('/carrinho/adicionar/{produto}',  [\App\Http\Controllers\CarrinhoController::class, 'adicionar'])->name("carrinho.adicionar");
Route::get('/carrinho/deletar/{produto}',  [\App\Http\Controllers\CarrinhoController::class, 'deletar'])->name("carrinho.deletar");
Route::get('/carrinho/limpa',  [\App\Http\Controllers\CarrinhoController::class, 'limpa'])->name("carrinho.limpa");
Route::get('/carrinho',  [\App\Http\Controllers\CarrinhoController::class, 'carrinho'])->name("carrinho");
Route::get('/carrinho/concluir',  [\App\Http\Controllers\CarrinhoController::class, 'concluir'])->name("carrinho.concluir");
Route::post('/cadastro/fazenda/salvar', [\App\Http\Controllers\FazendaController::class, 'cadastro_site'])->name("cadastro.fazenda.salvar");        


Route::middleware(['cadastro_finalizado'])->group(function () {
    
});

Route::middleware(['fazenda_logada'])->group(function () {
    
});

Route::post('/cadastro/salvar', [\App\Http\Controllers\ClienteController::class, 'cadastro_inicial'])->name("cadastro.salvar");
Route::post('/cadastro/finalizar', [\App\Http\Controllers\ClienteController::class, 'cadastro_final'])->name("cadastro.finalizar");
Route::post('/logar', [\App\Http\Controllers\SiteController::class, 'logar'])->name("logar");


Route::get('/painel/login', [\App\Http\Controllers\PainelController::class, 'login'])->name("painel.login");
Route::post('/painel/logar', [\App\Http\Controllers\PainelController::class, 'logar'])->name("painel.logar");

Route::middleware(['admin'])->group(function () {
    Route::get('/painel/sair', [\App\Http\Controllers\PainelController::class, 'sair'])->name("painel.sair");
    Route::get('/painel', [\App\Http\Controllers\PainelController::class, 'index'])->name("painel.index");
    
    //ROTAS RELACIONADAS A FAZENDAS
    Route::get('/painel/fazendas', [\App\Http\Controllers\FazendaController::class, 'index'])->name("painel.fazendas");        
    Route::get('/painel/fazenda/editar/{fazenda}', [\App\Http\Controllers\FazendaController::class, 'editar'])->name("painel.fazenda.editar");        
    Route::get('/painel/fazenda/editar/{fazenda}/ativar', [\App\Http\Controllers\FazendaController::class, 'ativar'])->name("painel.fazenda.ativar");        
    Route::get('/painel/fazenda/editar/{fazenda}/desativar', [\App\Http\Controllers\FazendaController::class, 'desativar'])->name("painel.fazenda.desativar");        
    Route::post('/painel/fazenda/editar/{fazenda}/reserva', [\App\Http\Controllers\FazendaController::class, 'reserva'])->name("painel.fazenda.editar.reserva");        
    Route::post('/painel/fazenda/{fazenda}/slug/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_slug'])->name("painel.fazenda.salvar.slug");        
    Route::post('/painel/fazenda/{fazenda}/destaque/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_destaque'])->name("painel.fazenda.salvar.destaque");        
    Route::post('/painel/fazenda/{fazenda}/logo/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_logo'])->name("painel.fazenda.salvar.logo");        
    Route::post('/painel/fazenda/{fazenda}/conheca/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_conheca'])->name("painel.fazenda.salvar.conheca");        
    Route::post('/painel/fazenda/{fazenda}/conheca/lotes/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_conheca_lotes'])->name("painel.fazenda.salvar.conheca.lotes");        
    Route::post('/painel/fazenda/{fazenda}/conheca/avaliacoes/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_conheca_avaliacoes'])->name("painel.fazenda.salvar.conheca.avaliacoes");        
    Route::post('/painel/fazenda/editar/{fazenda}/depoimento/novo', [\App\Http\Controllers\FazendaController::class, 'novo_depoimento'])->name("painel.fazenda.editar.depoimento.novo");        
    Route::post('/painel/fazenda/editar/{depoimento}/depoimento/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_depoimento'])->name("painel.fazenda.editar.depoimento.salvar");        
    Route::get('/painel/fazenda/editar/{depoimento}/depoimento/excluir', [\App\Http\Controllers\FazendaController::class, 'excluir_depoimento'])->name("painel.fazenda.editar.depoimento.excluir");        


    //ROTAS RELACIONADAS A RAÇAS
    Route::get('/painel/racas', [\App\Http\Controllers\RacasController::class, 'index'])->name("painel.racas");
    Route::post('/painel/raca/cadastrar', [\App\Http\Controllers\RacasController::class, 'cadastrar'])->name("painel.raca.cadastrar");
    Route::post('/painel/raca/editar/{raca}', [\App\Http\Controllers\RacasController::class, 'editar'])->name("painel.raca.editar");
    Route::get('/painel/raca/excluir/{raca}', [\App\Http\Controllers\RacasController::class, 'excluir'])->name("painel.raca.excluir");

});

Route::get('/teste', [\App\Http\Controllers\FazendaController::class, 'teste']);
Route::get('/api/getCidadesByUf/{uf}', [\App\Http\Controllers\ApiController::class, 'getCidadesByUf']);
