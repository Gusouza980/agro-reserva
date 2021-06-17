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

Route::get('/sair', function () {
    session()->forget("cliente");
    return redirect()->route("index");
})->name("sair");

Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name("index");
Route::get('/cadastro', [\App\Http\Controllers\ClienteController::class, 'cadastro'])->name("cadastro");
Route::get('/cadastro/fazenda', [\App\Http\Controllers\SiteController::class, 'cadastro_fazenda'])->name("cadastro.fazenda");
Route::get('/cadastro/passos', [\App\Http\Controllers\SiteController::class, 'cadastro_passos'])->name("cadastro.passos");
Route::get('/fazenda/{fazenda}/conheca', [\App\Http\Controllers\SiteController::class, 'conheca'])->name("fazenda.conheca");
Route::get('/fazenda/{fazenda}/conheca/lotes', [\App\Http\Controllers\SiteController::class, 'conheca'])->name("fazenda.conheca.lotes");
Route::get('/fazenda/{fazenda}/conheca/depoimentos', [\App\Http\Controllers\SiteController::class, 'conheca'])->name("fazenda.conheca.depoimentos");
Route::get('/fazenda/{fazenda}/conheca/avaliacoes', [\App\Http\Controllers\SiteController::class, 'conheca'])->name("fazenda.conheca.avaliacoes");
Route::get('/fazenda/{fazenda}/lotes', [\App\Http\Controllers\SiteController::class, 'lotes'])->name("fazenda.lotes");
Route::get('/fazenda/{fazenda}/lote/{lote}',  [\App\Http\Controllers\SiteController::class, 'lote'])->name("fazenda.lote");
Route::get('/carrinho/adicionar/{lote}',  [\App\Http\Controllers\CarrinhoController::class, 'adicionar'])->name("carrinho.adicionar");
Route::get('/carrinho/deletar/{produto}',  [\App\Http\Controllers\CarrinhoController::class, 'deletar'])->name("carrinho.deletar");
Route::get('/carrinho/limpa',  [\App\Http\Controllers\CarrinhoController::class, 'limpa'])->name("carrinho.limpa");
Route::get('/carrinho',  [\App\Http\Controllers\CarrinhoController::class, 'carrinho'])->name("carrinho");
Route::get('/carrinho/checkout',  [\App\Http\Controllers\CarrinhoController::class, 'checkout'])->name("carrinho.checkout");
Route::post('/carrinho/concluir',  [\App\Http\Controllers\CarrinhoController::class, 'concluir'])->name("carrinho.concluir");
Route::get('/contato', [\App\Http\Controllers\SiteController::class, 'contato'])->name("contato");

Route::get('/facebook/autenticar', [\App\Http\Controllers\FacebookController::class, 'autenticar'])->name("facebook.autenticar");
Route::get('/facebook/callback', [\App\Http\Controllers\FacebookController::class, 'callback'])->name("facebook.callback");

Route::post('/cadastrar', [\App\Http\Controllers\ClienteController::class, 'cadastrar'])->name("cadastro.salvar");
Route::post('/cadastro/finalizar', [\App\Http\Controllers\ClienteController::class, 'cadastro_final'])->name("cadastro.finalizar");
Route::post('/logar', [\App\Http\Controllers\SiteController::class, 'logar'])->name("logar");

Route::get('/conta', [\App\Http\Controllers\ContaController::class, 'index'])->name("conta.index");
Route::get('/conta/boleto/download/{boleto}', [\App\Http\Controllers\ContaController::class, 'baixar_boleto'])->name("conta.boleto.download");

Route::get('/painel/login', [\App\Http\Controllers\PainelController::class, 'login'])->name("painel.login");
Route::post('/painel/logar', [\App\Http\Controllers\PainelController::class, 'logar'])->name("painel.logar");

Route::get('/fazenda/painel/login', [\App\Http\Controllers\FazendeiroController::class, 'login'])->name("painel.fazenda.login");
Route::post('/fazenda/painel/logar', [\App\Http\Controllers\FazendeiroController::class, 'logar'])->name("painel.fazenda.logar");

Route::middleware(['fazendeiro'])->group(function () {
    Route::get('/fazenda/painel/sair', [\App\Http\Controllers\FazendeiroController::class, 'sair'])->name("painel.fazenda.sair");
    Route::get('/fazenda/painel', [\App\Http\Controllers\FazendeiroController::class, 'index'])->name("painel.fazenda.index");

    // ROTAS DE VENDAS DA FAZENDA
    Route::get('/fazenda/painel/vendas', [\App\Http\Controllers\FazendeiroController::class, 'vendas'])->name("painel.fazenda.vendas");
    Route::get('/fazenda/painel/venda/{venda}', [\App\Http\Controllers\FazendeiroController::class, 'visualizar_venda'])->name("painel.fazenda.vendas.visualizar");
    Route::post('/fazenda/painel/venda/boleto/adicionar/{venda}', [\App\Http\Controllers\VendasController::class, 'adicionar_boleto'])->name("painel.fazenda.vendas.boleto.adicionar");
    Route::post('/fazenda/painel/venda/nota/adicionar/{venda}', [\App\Http\Controllers\VendasController::class, 'adicionar_nota'])->name("painel.fazenda.vendas.nota.adicionar");

});

Route::middleware(['admin'])->group(function () {
    Route::get('/painel/sair', [\App\Http\Controllers\PainelController::class, 'sair'])->name("painel.sair");
    Route::get('/painel', [\App\Http\Controllers\PainelController::class, 'index'])->name("painel.index");
    
    //ROTAS RELACIONADAS A FAZENDAS
    Route::get('/painel/fazendas', [\App\Http\Controllers\FazendaController::class, 'index'])->name("painel.fazendas");        
    Route::get('/painel/fazenda/cadastro', [\App\Http\Controllers\FazendaController::class, 'cadastro'])->name("painel.fazenda.cadastro");        
    Route::post('/painel/fazenda/cadastrar', [\App\Http\Controllers\FazendaController::class, 'cadastrar'])->name("painel.fazenda.cadastrar");        
    Route::get('/painel/fazenda/editar/{fazenda}', [\App\Http\Controllers\FazendaController::class, 'editar'])->name("painel.fazenda.editar");        
    Route::get('/painel/fazenda/editar/{fazenda}/ativar', [\App\Http\Controllers\FazendaController::class, 'ativar'])->name("painel.fazenda.ativar");        
    Route::get('/painel/fazenda/editar/{fazenda}/desativar', [\App\Http\Controllers\FazendaController::class, 'desativar'])->name("painel.fazenda.desativar");        
    Route::post('/painel/fazenda/editar/{fazenda}/reserva', [\App\Http\Controllers\FazendaController::class, 'reserva'])->name("painel.fazenda.editar.reserva");        
    Route::post('/painel/fazenda/{fazenda}/slug/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_slug'])->name("painel.fazenda.salvar.slug");        
    Route::post('/painel/fazenda/{fazenda}/informacoes/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_informacoes'])->name("painel.fazenda.salvar.informacoes");        
    Route::post('/painel/fazenda/{fazenda}/destaque/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_destaque'])->name("painel.fazenda.salvar.destaque");        
    Route::post('/painel/fazenda/{fazenda}/logo/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_logo'])->name("painel.fazenda.salvar.logo");        
    Route::post('/painel/fazenda/{fazenda}/conheca/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_conheca'])->name("painel.fazenda.salvar.conheca");        
    Route::post('/painel/fazenda/{fazenda}/conheca/lotes/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_conheca_lotes'])->name("painel.fazenda.salvar.conheca.lotes");        
    Route::post('/painel/fazenda/{fazenda}/conheca/avaliacoes/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_conheca_avaliacoes'])->name("painel.fazenda.salvar.conheca.avaliacoes");        
    Route::post('/painel/fazenda/{fazenda}/conheca/depoimentos/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_conheca_depoimentos'])->name("painel.fazenda.salvar.conheca.depoimentos");        
    Route::post('/painel/fazenda/editar/{fazenda}/depoimento/novo', [\App\Http\Controllers\FazendaController::class, 'novo_depoimento'])->name("painel.fazenda.editar.depoimento.novo");        
    Route::post('/painel/fazenda/editar/{depoimento}/depoimento/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_depoimento'])->name("painel.fazenda.editar.depoimento.salvar");        
    Route::get('/painel/fazenda/editar/{depoimento}/depoimento/excluir', [\App\Http\Controllers\FazendaController::class, 'excluir_depoimento'])->name("painel.fazenda.editar.depoimento.excluir");        
    Route::post('/painel/fazenda/editar/{fazenda}/producao/novo', [\App\Http\Controllers\FazendaController::class, 'novo_producao'])->name("painel.fazenda.editar.producao.novo");        
    Route::post('/painel/fazenda/editar/{producao}/producao/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_producao'])->name("painel.fazenda.editar.producao.salvar");        
    Route::get('/painel/fazenda/editar/{producao}/producao/excluir', [\App\Http\Controllers\FazendaController::class, 'excluir_producao'])->name("painel.fazenda.editar.producao.excluir");        
    Route::post('/painel/fazenda/editar/usuario/salvar/{usuario?}', [\App\Http\Controllers\FazendaController::class, 'salvar_usuario'])->name("painel.fazenda.editar.usuario.salvar");


    // ROTAS RELACIONADAS AOS LOTES DE FAZENDA
    Route::get('/painel/fazenda/{fazenda}/lotes', [\App\Http\Controllers\LotesController::class, 'index'])->name("painel.fazenda.lotes");        
    Route::get('/painel/fazenda/{fazenda}/lote/cadastro', [\App\Http\Controllers\LotesController::class, 'cadastro'])->name("painel.fazenda.lote.cadastro");        
    Route::post('/painel/fazenda/{fazenda}/lote/cadastrar', [\App\Http\Controllers\LotesController::class, 'cadastrar'])->name("painel.fazenda.lote.cadastrar");        
    Route::get('/painel/fazenda/lote/editar/{lote}', [\App\Http\Controllers\LotesController::class, 'editar'])->name("painel.fazenda.lote.editar");        
    Route::post('/painel/fazenda/lote/salvar/{lote}', [\App\Http\Controllers\LotesController::class, 'salvar'])->name("painel.fazenda.lote.salvar");        

    //ROTAS RELACIONADAS A RAÇAS
    Route::get('/painel/racas', [\App\Http\Controllers\RacasController::class, 'index'])->name("painel.racas");
    Route::post('/painel/raca/cadastrar', [\App\Http\Controllers\RacasController::class, 'cadastrar'])->name("painel.raca.cadastrar");
    Route::post('/painel/raca/editar/{raca}', [\App\Http\Controllers\RacasController::class, 'editar'])->name("painel.raca.editar");
    Route::get('/painel/raca/excluir/{raca}', [\App\Http\Controllers\RacasController::class, 'excluir'])->name("painel.raca.excluir");

    //ROTAS RELACIONADAS A ASSESSORES
    Route::get('/painel/assessores', [\App\Http\Controllers\AssessoresController::class, 'index'])->name("painel.assessores");
    Route::post('/painel/assessor/cadastrar', [\App\Http\Controllers\AssessoresController::class, 'cadastrar'])->name("painel.assessor.cadastrar");
    Route::post('/painel/assessor/editar/{assessor}', [\App\Http\Controllers\AssessoresController::class, 'editar'])->name("painel.assessor.editar");
    Route::get('/painel/assessor/excluir/{assessor}', [\App\Http\Controllers\AssessoresController::class, 'excluir'])->name("painel.assessor.excluir");

    Route::get('/painel/clientes', [\App\Http\Controllers\ClienteController::class, 'index'])->name("painel.clientes");

    Route::get('/painel/visitas', [\App\Http\Controllers\PainelController::class, 'visitas'])->name("painel.visitas");
    Route::get('/painel/vendas', [\App\Http\Controllers\VendasController::class, 'index'])->name("painel.vendas");
    Route::get('/painel/venda/{venda}', [\App\Http\Controllers\VendasController::class, 'visualizar'])->name("painel.vendas.visualizar");
    Route::post('/painel/venda/boleto/adicionar/{venda}', [\App\Http\Controllers\VendasController::class, 'adicionar_boleto'])->name("painel.vendas.boleto.adicionar");
    Route::post('/painel/venda/nota/adicionar/{venda}', [\App\Http\Controllers\VendasController::class, 'adicionar_nota'])->name("painel.vendas.nota.adicionar");

});

Route::get('/teste', [\App\Http\Controllers\FazendaController::class, 'teste']);
Route::get('/api/getCidadesByUf/{uf}', [\App\Http\Controllers\ApiController::class, 'getCidadesByUf']);
Route::post('/api/calcDistanciaCep', [\App\Http\Controllers\ApiController::class, 'calcDistanciaCep']);
Route::get('/api/declararInteresseLote/{lote}', [\App\Http\Controllers\ApiController::class, 'declararInteresseLote']);
Route::get('/api/curtirLote/{lote}', [\App\Http\Controllers\ApiController::class, 'curtirLote']);
Route::get('/api/descurtirLote/{lote}', [\App\Http\Controllers\ApiController::class, 'descurtirLote']);
