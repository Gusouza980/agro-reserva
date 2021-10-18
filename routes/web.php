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


Route::middleware(['popup'])->group(function () {
    Route::get('/cadastro', function () {
        return view('cadastro.index');
    })->name("cadastro");
    
    Route::get('/cadastro/passos', function () {
        return view('cadastro.passos');
    })->name("cadastro.passos");
    
    
    
    Route::get('/termos-e-condicoes-de-uso', function () {
        return view('termos');
    })->name("termos");
    
    Route::get('/politicas-de-privacidade', function () {
        return view('politicas');
    })->name("politicas");
    
    Route::get('/sair', function () {
        session()->forget("cliente");
        session()->forget("carrinho");
        return redirect()->route("index");
    })->name("sair");
    
    
    // Route::get('/teste', [\App\Http\Controllers\ContaController::class, 'teste']);
    
    Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name("index");
    Route::get('/login', [\App\Http\Controllers\SiteController::class, 'login'])->name("login");
    Route::post('/logar', [\App\Http\Controllers\SiteController::class, 'logar'])->name("logar");
    Route::get('/cadastro', [\App\Http\Controllers\ClienteController::class, 'cadastro'])->name("cadastro");
    Route::post('/cadastrar', [\App\Http\Controllers\ClienteController::class, 'cadastrar'])->name("cadastro.salvar");
    Route::get('/cadastro/finalizar', [\App\Http\Controllers\ClienteController::class, 'finalizar_cadastro'])->name("cadastro.finalizar");
    Route::post('/cadastro/finalizar/salvar', [\App\Http\Controllers\ClienteController::class, 'cadastro_final'])->name("cadastro.finalizar.salvar");
    Route::post('/cadastro/login', [\App\Http\Controllers\ClienteController::class, 'login_cadastro'])->name("cadastro.login");
    Route::get('/cadastro/fazenda', [\App\Http\Controllers\SiteController::class, 'cadastro_fazenda'])->name("cadastro.fazenda");
    Route::get('/cadastro/passos', [\App\Http\Controllers\SiteController::class, 'cadastro_passos'])->name("cadastro.passos");
    Route::get('/fazenda/{fazenda}/conheca', [\App\Http\Controllers\SiteController::class, 'conheca'])->name("fazenda.conheca");
    Route::get('/fazenda/{fazenda}/conheca/lotes', [\App\Http\Controllers\SiteController::class, 'conheca'])->name("fazenda.conheca.lotes");
    Route::get('/fazenda/{fazenda}/conheca/depoimentos', [\App\Http\Controllers\SiteController::class, 'conheca'])->name("fazenda.conheca.depoimentos");
    Route::get('/fazenda/{fazenda}/conheca/avaliacoes', [\App\Http\Controllers\SiteController::class, 'conheca'])->name("fazenda.conheca.avaliacoes");
    Route::get('/fazenda/{fazenda}/lotes', [\App\Http\Controllers\SiteController::class, 'lotes'])->name("fazenda.lotes");
    Route::get('/fazenda/{fazenda}/lote/{lote}',  [\App\Http\Controllers\SiteController::class, 'lote'])->name("fazenda.lote");
    Route::get('/quem-somos', [\App\Http\Controllers\SiteController::class, 'sobre'])->name("sobre");
    Route::get('/pre_to_main', [\App\Http\Controllers\ClienteController::class, 'pre_to_main']);
    Route::post('/senha/recuperar', [\App\Http\Controllers\ContaController::class, 'recuperar_senha'])->name("conta.senha.recuperar");
    
    //ROTAS DE RESERVAS ANTIGAS
    Route::get('/reservas/finalizadas', [\App\Http\Controllers\SiteController::class, 'reservas_finalizadas'])->name("reservas.finalizadas");
    // Route::get('/reservas/finalizadas/{reserva}/{fazenda}', [\App\Http\Controllers\SiteController::class, 'reservas_finalizadas'])->name("reservas.finalizadas");
    Route::get('/reservas/finalizadas/{reserva}/{fazenda}/conheca', [\App\Http\Controllers\SiteController::class, 'conheca_finalizadas'])->name("reservas.finalizadas.fazenda.conheca");
    Route::get('/reservas/finalizadas/{reserva}/{fazenda}/conheca/lotes', [\App\Http\Controllers\SiteController::class, 'conheca_finalizadas'])->name("reservas.finalizadas.fazenda.conheca.lotes");
    Route::get('/reservas/finalizadas/{reserva}/{fazenda}/conheca/depoimentos', [\App\Http\Controllers\SiteController::class, 'conheca_finalizadas'])->name("reservas.finalizadas.fazenda.conheca.depoimentos");
    Route::get('/reservas/finalizadas/{reserva}/{fazenda}/conheca/avaliacoes', [\App\Http\Controllers\SiteController::class, 'conheca_finalizadas'])->name("reservas.finalizadas.fazenda.conheca.avaliacoes");
    Route::get('/reservas/finalizadas/{reserva}/{fazenda}/lotes', [\App\Http\Controllers\SiteController::class, 'lotes_finalizadas'])->name("reservas.finalizadas.fazenda.lotes");
    Route::get('/reservas/finalizadas/{reserva}/{fazenda}/lote/{lote}',  [\App\Http\Controllers\SiteController::class, 'lote_finalizadas'])->name("reservas.finalizadas.fazenda.lote");
    
    //Blog
    Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'index'])->name("blog");
    Route::get('/noticia/{slug}', [\App\Http\Controllers\BlogController::class, 'noticia'])->name("noticia");
    
    Route::middleware(['cliente_logado'])->group(function () {
        Route::get('/carrinho/adicionar/{lote}',  [\App\Http\Controllers\CarrinhoController::class, 'adicionar'])->name("carrinho.adicionar");
        Route::get('/carrinho/deletar/{produto}',  [\App\Http\Controllers\CarrinhoController::class, 'deletar'])->name("carrinho.deletar");
        Route::get('/carrinho/limpa',  [\App\Http\Controllers\CarrinhoController::class, 'limpa'])->name("carrinho.limpa");
        Route::get('/carrinho',  [\App\Http\Controllers\CarrinhoController::class, 'carrinho'])->name("carrinho");
        Route::get('/carrinho/checkout/{carrinho}',  [\App\Http\Controllers\CarrinhoController::class, 'checkout'])->name("carrinho.checkout");
        Route::post('/carrinho/concluir',  [\App\Http\Controllers\CarrinhoController::class, 'concluir'])->name("carrinho.concluir");
        Route::get('/carrinho/concluido',  [\App\Http\Controllers\CarrinhoController::class, 'concluido'])->name("carrinho.concluido");
    
        Route::get('/conta', [\App\Http\Controllers\ContaController::class, 'index'])->name("conta.index");
        Route::get('/conta/reserva/{venda}', [\App\Http\Controllers\ContaController::class, 'reserva'])->name("conta.reserva");
        Route::get('/conta/reserva/comprovante/{venda}', [\App\Http\Controllers\ContaController::class, 'comprovante_reserva'])->name("conta.reserva.comprovante");
        Route::post('/conta/senha/alterar', [\App\Http\Controllers\ContaController::class, 'alterar_senha'])->name("conta.senha.alterar");
        Route::get('/conta/boleto/download/{boleto}', [\App\Http\Controllers\ContaController::class, 'baixar_boleto'])->name("conta.boleto.download");
    
    });
    
    Route::get('/contato', [\App\Http\Controllers\SiteController::class, 'contato'])->name("contato");
    
    Route::get('/facebook/autenticar', [\App\Http\Controllers\FacebookController::class, 'autenticar'])->name("facebook.autenticar");
    Route::get('/facebook/callback', [\App\Http\Controllers\FacebookController::class, 'callback'])->name("facebook.callback");
    
    
    
    
});

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
    Route::post('/painel/fazenda/{fazenda}/catalogo/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_catalogo'])->name("painel.fazenda.salvar.catalogo");        
    Route::post('/painel/fazenda/{fazenda}/conheca/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_conheca'])->name("painel.fazenda.salvar.conheca");        
    Route::post('/painel/fazenda/{fazenda}/conheca/lotes/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_conheca_lotes'])->name("painel.fazenda.salvar.conheca.lotes");        
    Route::post('/painel/fazenda/{fazenda}/conheca/avaliacoes/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_conheca_avaliacoes'])->name("painel.fazenda.salvar.conheca.avaliacoes");        
    
    Route::post('/painel/fazenda/{fazenda}/conheca/depoimentos/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_conheca_depoimentos'])->name("painel.fazenda.salvar.conheca.depoimentos");        
    Route::post('/painel/fazenda/editar/{fazenda}/depoimento/novo', [\App\Http\Controllers\FazendaController::class, 'novo_depoimento'])->name("painel.fazenda.editar.depoimento.novo");        
    Route::post('/painel/fazenda/editar/{depoimento}/depoimento/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_depoimento'])->name("painel.fazenda.editar.depoimento.salvar");        
    Route::get('/painel/fazenda/editar/{depoimento}/depoimento/excluir', [\App\Http\Controllers\FazendaController::class, 'excluir_depoimento'])->name("painel.fazenda.editar.depoimento.excluir");        
    
    Route::post('/painel/fazenda/{fazenda}/conheca/numeros/novo', [\App\Http\Controllers\FazendaController::class, 'novo_numero'])->name("painel.fazenda.editar.numero.novo");        
    Route::post('/painel/fazenda/editar/{numero}/numero/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_numero'])->name("painel.fazenda.editar.numero.salvar");        
    Route::get('/painel/fazenda/editar/{numero}/numero/excluir', [\App\Http\Controllers\FazendaController::class, 'excluir_numero'])->name("painel.fazenda.editar.numero.excluir");        

    Route::post('/painel/fazenda/{fazenda}/conheca/avaliacaos/novo', [\App\Http\Controllers\FazendaController::class, 'nova_avaliacao'])->name("painel.fazenda.editar.avaliacao.novo");        
    Route::post('/painel/fazenda/editar/{avaliacao}/avaliacao/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_avaliacao'])->name("painel.fazenda.editar.avaliacao.salvar");        
    Route::get('/painel/fazenda/editar/{avaliacao}/avaliacao/excluir', [\App\Http\Controllers\FazendaController::class, 'excluir_avaliacao'])->name("painel.fazenda.editar.avaliacao.excluir");        

    Route::post('/painel/fazenda/editar/{fazenda}/producao/novo', [\App\Http\Controllers\FazendaController::class, 'novo_producao'])->name("painel.fazenda.editar.producao.novo");        
    Route::post('/painel/fazenda/editar/{producao}/producao/salvar', [\App\Http\Controllers\FazendaController::class, 'salvar_producao'])->name("painel.fazenda.editar.producao.salvar");        
    Route::get('/painel/fazenda/editar/{producao}/producao/excluir', [\App\Http\Controllers\FazendaController::class, 'excluir_producao'])->name("painel.fazenda.editar.producao.excluir");        
    
    Route::post('/painel/fazenda/editar/usuario/salvar/{usuario?}', [\App\Http\Controllers\FazendaController::class, 'salvar_usuario'])->name("painel.fazenda.editar.usuario.salvar");


    // ROTAS RELACIONADAS AOS LOTES DE FAZENDA
    Route::get('/painel/fazenda/reserva/{reserva}/lotes', [\App\Http\Controllers\LotesController::class, 'index'])->name("painel.fazenda.reserva.lotes");        
    Route::get('/painel/fazenda/reserva/{reserva}/lote/cadastro', [\App\Http\Controllers\LotesController::class, 'cadastro'])->name("painel.fazenda.reserva.lote.cadastro");        
    Route::post('/painel/fazenda/reserva/{reserva}/lote/cadastrar', [\App\Http\Controllers\LotesController::class, 'cadastrar'])->name("painel.fazenda.reserva.lote.cadastrar");        
    Route::get('/painel/fazenda/reserva/lote/editar/{lote}', [\App\Http\Controllers\LotesController::class, 'editar'])->name("painel.fazenda.reserva.lote.editar");        
    Route::post('/painel/fazenda/reserva/lote/salvar/{lote}', [\App\Http\Controllers\LotesController::class, 'salvar'])->name("painel.fazenda.reserva.lote.salvar");        
    Route::get('/painel/fazenda/reserva/lote/reservar/{lote}', [\App\Http\Controllers\LotesController::class, 'reservar'])->name("painel.fazenda.reserva.lote.reservar");        
    Route::get('/painel/fazenda/reserva/lote/ativo/{lote}', [\App\Http\Controllers\LotesController::class, 'ativo'])->name("painel.fazenda.reserva.lote.ativo");
    Route::get('/painel/fazenda/reserva/lote/preco/{lote}', [\App\Http\Controllers\LotesController::class, 'preco'])->name("painel.fazenda.reserva.lote.preco");
    Route::get('/painel/fazenda/reserva/lote/comprar/{lote}', [\App\Http\Controllers\LotesController::class, 'comprar'])->name("painel.fazenda.reserva.lote.comprar");
    //ROTAS RELACIONADAS AS RESERVAS
    Route::get('/painel/fazenda/{fazenda}/reservas', [\App\Http\Controllers\ReservasController::class, 'index'])->name("painel.fazenda.reservas");        
    Route::post('/painel/fazenda/{fazenda}/reserva/cadastrar', [\App\Http\Controllers\ReservasController::class, 'cadastrar'])->name("painel.fazenda.reserva.cadastrar");        
    Route::post('/painel/fazenda/reserva/editar/{reserva}', [\App\Http\Controllers\ReservasController::class, 'editar'])->name("painel.fazenda.reserva.editar");        
    Route::post('/painel/fazenda/reserva/excluir/{reserva}', [\App\Http\Controllers\ReservasController::class, 'excluir'])->name("painel.fazenda.reserva.excluir");        
    Route::get('/painel/fazenda/reserva/{reserva}/relatorio', [\App\Http\Controllers\ReservasController::class, 'relatorio'])->name("painel.fazenda.reservas.relatorio");        
    Route::get('/painel/fazenda/reserva/{reserva}/relatorio/pdf', [\App\Http\Controllers\ReservasController::class, 'relatorio_pdf'])->name("painel.fazenda.reservas.relatorio.pdf");        
    Route::get('/painel/fazenda/reserva/{reserva}/abertura', [\App\Http\Controllers\ReservasController::class, 'abertura'])->name("painel.fazenda.reservas.abertura");
    Route::get('/painel/fazenda/reserva/{reserva}/preco', [\App\Http\Controllers\ReservasController::class, 'preco'])->name("painel.fazenda.reservas.preco");
    Route::get('/painel/fazenda/reserva/{reserva}/compras', [\App\Http\Controllers\ReservasController::class, 'compras'])->name("painel.fazenda.reservas.compras");

    //ROTAS RELACIONADAS A RAÇAS
    Route::get('/painel/racas', [\App\Http\Controllers\RacasController::class, 'index'])->name("painel.racas");
    Route::post('/painel/raca/cadastrar', [\App\Http\Controllers\RacasController::class, 'cadastrar'])->name("painel.raca.cadastrar");
    Route::post('/painel/raca/editar/{raca}', [\App\Http\Controllers\RacasController::class, 'editar'])->name("painel.raca.editar");
    Route::get('/painel/raca/excluir/{raca}', [\App\Http\Controllers\RacasController::class, 'excluir'])->name("painel.raca.excluir");

    //ROTAS RELACIONADAS A POPUPS
    Route::get('/painel/popups', [\App\Http\Controllers\PopupController::class, 'index'])->name("painel.popups");
    Route::post('/painel/popup/cadastrar', [\App\Http\Controllers\PopupController::class, 'cadastrar'])->name("painel.popup.cadastrar");
    Route::post('/painel/popup/editar/{popup}', [\App\Http\Controllers\PopupController::class, 'editar'])->name("painel.popup.editar");
    Route::get('/painel/popup/excluir/{popup}', [\App\Http\Controllers\PopupController::class, 'excluir'])->name("painel.popup.excluir");
    Route::get('/painel/popup/ativo/{popup}', [\App\Http\Controllers\PopupController::class, 'ativo'])->name("painel.popup.ativo");

    //ROTAS RELACIONADAS A ASSESSORES
    Route::get('/painel/assessores', [\App\Http\Controllers\AssessoresController::class, 'index'])->name("painel.assessores");
    Route::post('/painel/assessor/cadastrar', [\App\Http\Controllers\AssessoresController::class, 'cadastrar'])->name("painel.assessor.cadastrar");
    Route::post('/painel/assessor/editar/{assessor}', [\App\Http\Controllers\AssessoresController::class, 'editar'])->name("painel.assessor.editar");
    Route::get('/painel/assessor/excluir/{assessor}', [\App\Http\Controllers\AssessoresController::class, 'excluir'])->name("painel.assessor.excluir");

    Route::get('/painel/clientes', [\App\Http\Controllers\ClienteController::class, 'index'])->name("painel.clientes");
    Route::get('/painel/clientes/export', [\App\Http\Controllers\ClienteController::class, 'export'])->name("painel.clientes.export");
    Route::post('/painel/cliente/cadastrar', [\App\Http\Controllers\ClienteController::class, 'cadastro_painel'])->name("painel.cliente.cadastrar");
    Route::get('/painel/cliente/{cliente}', [\App\Http\Controllers\ClienteController::class, 'visualizar'])->name("painel.cliente.visualizar");
    Route::get('/painel/cliente/{cliente}/finalizar', [\App\Http\Controllers\ClienteController::class, 'finalizar'])->name("painel.cliente.finalizar");
    Route::get('/painel/cliente/{cliente}/credito/analistar', [\App\Http\Controllers\ClienteController::class, 'analise_credito'])->name("painel.cliente.credito.analise");
    Route::get('/painel/cliente/credito/exportar/{analise}', [\App\Http\Controllers\ClienteController::class, 'exportar_analise_credito'])->name("painel.cliente.credito.analise.exportar");
    Route::post('/painel/cliente/{cliente}/dados/salvar', [\App\Http\Controllers\ClienteController::class, 'salvar_dados_gerais'])->name("painel.cliente.dados.salvar");
    Route::get('/painel/cliente/{cliente}/aprovacao/{aprovacao}', [\App\Http\Controllers\ClienteController::class, 'aprovacao'])->name("painel.cliente.aprovacao");

    // ROTAS RELACIONADAS A VENDAS
    Route::match(['get', 'post'],'/painel/visitas', [\App\Http\Controllers\PainelController::class, 'visitas'])->name("painel.visitas");
    Route::get('/painel/vendas', [\App\Http\Controllers\VendasController::class, 'index'])->name("painel.vendas");
    Route::post('/painel/vendas/nova', [\App\Http\Controllers\VendasController::class, 'venda_manual'])->name("painel.vendas.nova");
    Route::get('/painel/venda/{venda}', [\App\Http\Controllers\VendasController::class, 'visualizar'])->name("painel.vendas.visualizar");
    Route::post('/painel/venda/boleto/adicionar/{venda}', [\App\Http\Controllers\VendasController::class, 'adicionar_boleto'])->name("painel.vendas.boleto.adicionar");
    Route::post('/painel/venda/nota/adicionar/{venda}', [\App\Http\Controllers\VendasController::class, 'adicionar_nota'])->name("painel.vendas.nota.adicionar");
    Route::get('/painel/venda/comprovante/{venda}', [\App\Http\Controllers\ContaController::class, 'comprovante_reserva'])->name("painel.vendas.comprovante");
    Route::get('/painel/venda/comprovante/{venda}/enviar', [\App\Http\Controllers\VendasController::class, 'envia_comprovante'])->name("painel.vendas.comprovante.enviar");
    Route::get('/api/trocaStatusVenda/{venda}/{status}', [\App\Http\Controllers\ApiController::class, 'trocaStatusVenda']);

    // ROTAS RELACIONADAS AOS CARRINHOS
    Route::get('/painel/carrinhos/abertos', [\App\Http\Controllers\CarrinhoController::class, 'abertos'])->name("painel.carrinhos.abertos");

    // ROTAS DE TAGS
    Route::get('/painel/tags', [\App\Http\Controllers\TagsController::class, 'consultar'])->name("painel.tags");
    Route::post('/painel/tags/cadastrar', [\App\Http\Controllers\TagsController::class, 'cadastrar'])->name("painel.tag.cadastrar");
    Route::post('/painel/tags/salvar/{tag}', [\App\Http\Controllers\TagsController::class, 'salvar'])->name("painel.tag.salvar");
    Route::get('/painel/tags/deletar/{tag}', [\App\Http\Controllers\TagsController::class, 'deletar'])->name("painel.tag.deletar");

    // ROTAS DE CATEGORIAS
    Route::get('/painel/categorias', [\App\Http\Controllers\CategoriasController::class, 'consultar'])->name("painel.categorias");
    Route::post('/painel/categorias/cadastrar', [\App\Http\Controllers\CategoriasController::class, 'cadastrar'])->name("painel.categoria.cadastrar");
    Route::post('/painel/categorias/salvar/{categoria}', [\App\Http\Controllers\CategoriasController::class, 'salvar'])->name("painel.categoria.salvar");
    Route::get('/painel/categorias/deletar/{categoria}', [\App\Http\Controllers\CategoriasController::class, 'deletar'])->name("painel.categoria.deletar");

    // ROTAS DE NOTÍCIAS
    Route::get('/painel/noticias', [\App\Http\Controllers\NoticiasController::class, 'consultar'])->name("painel.noticias");
    Route::get('/painel/noticias/cadastro', [\App\Http\Controllers\NoticiasController::class, 'cadastro'])->name("painel.noticia.cadastro");
    Route::get('/painel/noticias/leads/{noticia}', [\App\Http\Controllers\NoticiasController::class, 'visitas'])->name("painel.noticia.visitas");
    Route::post('/painel/noticias/cadastrar', [\App\Http\Controllers\NoticiasController::class, 'cadastrar'])->name("painel.noticia.cadastrar");
    Route::get('/painel/noticias/editar/{noticia}', [\App\Http\Controllers\NoticiasController::class, 'editar'])->name("painel.noticia.editar");
    Route::post('/painel/noticias/salvar/{noticia}', [\App\Http\Controllers\NoticiasController::class, 'salvar'])->name("painel.noticia.salvar");
    Route::get('/painel/noticias/deletar/{noticia}', [\App\Http\Controllers\NoticiasController::class, 'deletar'])->name("painel.noticia.deletar");
    Route::get('/painel/noticias/publicar/{noticia}', [\App\Http\Controllers\NoticiasController::class, 'publicar'])->name("painel.noticia.publicar");
    Route::get('/painel/noticias/destacar/{noticia}', [\App\Http\Controllers\NoticiasController::class, 'destacar'])->name("painel.noticia.destacar");

    // ROTAS DE CONFIGURACOES

    // LIVE
    Route::get('/painel/configuracoes/live', [\App\Http\Controllers\LiveController::class, 'index'])->name("painel.configuracoes.live");
    Route::post('/painel/configuracoes/live/salvar', [\App\Http\Controllers\LiveController::class, 'salvar'])->name("painel.configuracoes.live.salvar");

});

Route::get('/teste', [\App\Http\Controllers\SiteController::class, 'testes']);
Route::get('/api/getCidadesByUf/{uf}', [\App\Http\Controllers\ApiController::class, 'getCidadesByUf']);
Route::post('/api/calcDistanciaCep', [\App\Http\Controllers\ApiController::class, 'calcDistanciaCep']);
Route::get('/api/declararInteresseLote/{lote}', [\App\Http\Controllers\ApiController::class, 'declararInteresseLote']);
Route::get('/api/curtirLote/{lote}', [\App\Http\Controllers\ApiController::class, 'curtirLote']);
Route::get('/api/descurtirLote/{lote}', [\App\Http\Controllers\ApiController::class, 'descurtirLote']);
