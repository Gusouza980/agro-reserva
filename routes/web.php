<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\BrowserKit\HttpBrowser;
use App\Http\Livewire\Institucional\CadastroNovo;
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


Route::middleware(['cookie'])->group(function () {
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
        $cookie = \Cookie::forget("cliente");
        return redirect()->route("index")->withCookie($cookie);
    })->name("sair");

    // ROTAS DO INSTITUCIONAL

    Route::get('/', [\App\Http\Controllers\SiteController::class, 'index2'])->name("index");
    Route::get('/login', [\App\Http\Controllers\SiteController::class, 'login'])->name("login");
    Route::post('/logar', [\App\Http\Controllers\SiteController::class, 'logar'])->name("logar");
    Route::get('/cadastro', [\App\Http\Controllers\ClienteController::class, 'cadastro'])->name("cadastro");
    // Route::get('/cadastro_novo', function(){
    //     return redirect()->route('cadastro');
    // })->name("cadastro.novo");
    Route::get('/cadastro_novo', CadastroNovo\Pagina::class)->name("cadastro.novo");

    Route::get('/pesquisa', [\App\Http\Controllers\SiteController::class, 'pesquisa'])->name("pesquisa");
    Route::get('/raca/{slug}', [\App\Http\Controllers\SiteController::class, 'raca'])->name("raca");
    Route::get('/reservas-abertas', [\App\Http\Controllers\SiteController::class, 'reservas_abertas'])->name("reservas_abertas");
    Route::get('/navegue-por-racas', [\App\Http\Controllers\SiteController::class, 'navegue_por_racas'])->name("navegue_por_racas");

    Route::get('/fazenda/{fazenda}/{reserva}/lotes', [\App\Http\Controllers\SiteController::class, 'lotes2'])->name("fazenda.lotes");
    Route::get('/fazenda/{fazenda}/{reserva}/embrioes', [\App\Http\Controllers\SiteController::class, 'embrioes'])->name("fazenda.embrioes");
    Route::get('/fazenda/{fazenda}/{reserva?}/lote/{lote}',  [\App\Http\Controllers\SiteController::class, 'lote'])->name("fazenda.lote");
    Route::get('/fazenda/{fazenda}/{reserva}/embriao/{embriao}',  [\App\Http\Controllers\SiteController::class, 'embriao'])->name("fazenda.embriao");

    Route::get('/quem-somos', [\App\Http\Controllers\SiteController::class, 'sobre'])->name("sobre");
    // Route::get('/pre_to_main', [\App\Http\Controllers\ClienteController::class, 'pre_to_main']);
    Route::post('/senha/recuperar', [\App\Http\Controllers\ContaController::class, 'recuperar_senha'])->name("conta.senha.recuperar");

    Route::get('/experciencias/ouro-branco', [\App\Http\Controllers\SiteController::class, 'experiencia_ouro_branco'])->name("experiencias.ouro_branco");

    // ROTAS DE API
    Route::post('/api2/senha/recuperar', [\App\Http\Controllers\ApiController::class, 'recuperar_senha_test'])->name("api.test.conta.senha.recuperar");

    Route::post('/api/logar', [\App\Http\Controllers\ApiController::class, 'logar'])->name("api.logar");
    Route::post('/api2/logar', [\App\Http\Controllers\ApiController::class, 'logar_test'])->name("api.test.logar");

    //ROTAS DE RESERVAS ANTIGAS
    Route::get('/reservas/finalizadas', [\App\Http\Controllers\SiteController::class, 'reservas_finalizadas'])->name("reservas.finalizadas");

    //Blog
    Route::match(['get','post'], '/blog', [\App\Http\Controllers\BlogController::class, 'index'])->name("blog");
    // Route::get('/blog2', [\App\Http\Controllers\BlogController::class, 'index2'])->name("blog2");
    Route::get('/blog/{slug}', [\App\Http\Controllers\BlogController::class, 'index'])->name("blog.categoria");
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
    
        Route::get('/conta/reserva/{reserva}/relatorio/', [\App\Http\Controllers\ContaController::class, 'relatorio_vendas'])->name("conta.reserva.relatorio");

    });
    
    // Route::get('/contato', [\App\Http\Controllers\SiteController::class, 'contato'])->name("contato");
    
    // Route::get('/facebook/autenticar', [\App\Http\Controllers\FacebookController::class, 'autenticar'])->name("facebook.autenticar");
    // Route::get('/facebook/callback', [\App\Http\Controllers\FacebookController::class, 'callback'])->name("facebook.callback");
    
    Route::get('lang/change/{lang}', [\App\Http\Controllers\LangController::class, 'trocar'])->name('lang.change');

});

Route::get('/painel/login', [\App\Http\Controllers\PainelController::class, 'login'])->name("painel.login");
Route::post('/painel/logar', [\App\Http\Controllers\PainelController::class, 'logar'])->name("painel.logar");

// Route::get('/fazenda/painel/login', [\App\Http\Controllers\FazendeiroController::class, 'login'])->name("painel.fazenda.login");
// Route::post('/fazenda/painel/logar', [\App\Http\Controllers\FazendeiroController::class, 'logar'])->name("painel.fazenda.logar");

// Route::middleware(['fazendeiro'])->group(function () {
//     Route::get('/fazenda/painel/sair', [\App\Http\Controllers\FazendeiroController::class, 'sair'])->name("painel.fazenda.sair");
//     Route::get('/fazenda/painel', [\App\Http\Controllers\FazendeiroController::class, 'index'])->name("painel.fazenda.index");

//     // ROTAS DE VENDAS DA FAZENDA
//     Route::get('/fazenda/painel/vendas', [\App\Http\Controllers\FazendeiroController::class, 'vendas'])->name("painel.fazenda.vendas");
//     Route::get('/fazenda/painel/venda/{venda}', [\App\Http\Controllers\FazendeiroController::class, 'visualizar_venda'])->name("painel.fazenda.vendas.visualizar");
//     Route::post('/fazenda/painel/venda/parcela/receber', [\App\Http\Controllers\VendasController::class, 'receber_parcela'])->name("painel.fazenda.vendas.boleto.adicionar");
//     Route::post('/fazenda/painel/venda/nota/adicionar/{venda}', [\App\Http\Controllers\VendasController::class, 'adicionar_nota'])->name("painel.fazenda.vendas.nota.adicionar");

// });

Route::middleware(['admin'])->group(function () {
    Route::get('/painel/sair', [\App\Http\Controllers\PainelController::class, 'sair'])->name("painel.sair");
    Route::get('/painel', [\App\Http\Controllers\PainelController::class, 'index'])->name("painel.index");

    // ROTAS DE ROTINAS
    Route::get('/painel/rotinas/recomendacoes/calcular', [\App\Http\Controllers\RotinasController::class, 'calcula_recomendacoes'])->name("painel.rotinas.recomendacoes.calcular");
    
    // ROTAS RELACIOANDAS A USUÁRIOS
    Route::get('/painel/usuarios', [\App\Http\Controllers\UsuarioController::class, 'index'])->name("painel.usuarios");        
    Route::post('/painel/usuarios/salvar', [\App\Http\Controllers\UsuarioController::class, 'salvar'])->name("painel.usuarios.salvar");        
    Route::post('/painel/usuarios/senha/alterar', [\App\Http\Controllers\UsuarioController::class, 'alterar_senha'])->name("painel.usuarios.senha.alterar");        
    Route::get('/painel/usuarios/{usuario}/excluir', [\App\Http\Controllers\UsuarioController::class, 'excluir'])->name("painel.usuarios.excluir");        

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
    Route::post('/painel/fazenda/reserva/lotes/importar', [\App\Http\Controllers\LotesController::class, 'importar'])->name("painel.fazenda.reserva.lotes.importar");        
    Route::get('/painel/fazenda/reserva/lote/reservar/{lote}', [\App\Http\Controllers\LotesController::class, 'reservar'])->name("painel.fazenda.reserva.lote.reservar");        
    Route::get('/painel/fazenda/reserva/lote/ativo/{lote}', [\App\Http\Controllers\LotesController::class, 'ativo'])->name("painel.fazenda.reserva.lote.ativo");
    Route::get('/painel/fazenda/reserva/lote/prioridade/{lote}', [\App\Http\Controllers\LotesController::class, 'prioridade'])->name("painel.fazenda.reserva.lote.prioridade");
    Route::get('/painel/fazenda/reserva/lote/preco/{lote}', [\App\Http\Controllers\LotesController::class, 'preco'])->name("painel.fazenda.reserva.lote.preco");
    Route::get('/painel/fazenda/reserva/lote/comprar/{lote}', [\App\Http\Controllers\LotesController::class, 'comprar'])->name("painel.fazenda.reserva.lote.comprar");
    
    // ROTAS RELACIONADAS AOS EMBRIÕES
    Route::get('/painel/fazenda/reserva/{reserva}/embrioes', [\App\Http\Controllers\EmbrioesController::class, 'index'])->name("painel.fazenda.reserva.embrioes"); 
    Route::get('/painel/fazenda/reserva/{reserva}/embriao/cadastro', [\App\Http\Controllers\EmbrioesController::class, 'cadastro'])->name("painel.fazenda.reserva.embriao.cadastro");        
    Route::post('/painel/fazenda/reserva/{reserva}/embriao/salvar', [\App\Http\Controllers\EmbrioesController::class, 'salvar'])->name("painel.fazenda.reserva.embriao.salvar");        
    Route::get('/painel/fazenda/reserva/embriao/editar/{embriao}', [\App\Http\Controllers\EmbrioesController::class, 'editar'])->name("painel.fazenda.reserva.embriao.editar");        

    //ROTAS RELACIONADAS AS RESERVAS
    Route::get('/painel/reservas', [\App\Http\Controllers\ReservasController::class, 'index'])->name("painel.reservas");        
    Route::get('/painel/fazenda/{fazenda}/reservas', [\App\Http\Controllers\ReservasController::class, 'index'])->name("painel.fazenda.reservas");        
    Route::post('/painel/fazenda/{fazenda}/reserva/cadastrar', [\App\Http\Controllers\ReservasController::class, 'cadastrar'])->name("painel.fazenda.reserva.cadastrar");        
    Route::post('/painel/fazenda/reserva/editar/{reserva}', [\App\Http\Controllers\ReservasController::class, 'editar'])->name("painel.fazenda.reserva.editar");        
    Route::post('/painel/fazenda/reserva/excluir/{reserva}', [\App\Http\Controllers\ReservasController::class, 'excluir'])->name("painel.fazenda.reserva.excluir");        
    Route::get('/painel/fazenda/reserva/{reserva}/relatorio', [\App\Http\Controllers\ReservasController::class, 'relatorio'])->name("painel.fazenda.reservas.relatorio");        
    Route::get('/painel/fazenda/reserva/{reserva}/relatorio/inicio/{inicio}', [\App\Http\Controllers\ReservasController::class, 'relatorio_inicio_definido'])->name("painel.fazenda.reservas.relatorio.inicio");        
    Route::get('/painel/fazenda/reserva/{reserva}/relatorio/pdf', [\App\Http\Controllers\ReservasController::class, 'relatorio_pdf'])->name("painel.fazenda.reservas.relatorio.pdf");        
    Route::get('/painel/fazenda/reserva/{reserva}/abertura', [\App\Http\Controllers\ReservasController::class, 'abertura'])->name("painel.fazenda.reservas.abertura");
    Route::get('/painel/fazenda/reserva/{reserva}/preco', [\App\Http\Controllers\ReservasController::class, 'preco'])->name("painel.fazenda.reservas.preco");
    Route::get('/painel/fazenda/reserva/{reserva}/compras', [\App\Http\Controllers\ReservasController::class, 'compras'])->name("painel.fazenda.reservas.compras");
    Route::get('/painel/fazenda/reserva/{reserva}/relatorio/', [\App\Http\Controllers\ReservasController::class, 'relatorio_vendas'])->name("painel.fazenda.reservas.relatorio");

    //ROTAS RELACIONADAS A RAÇAS
    Route::get('/painel/racas', [\App\Http\Controllers\RacasController::class, 'index'])->name("painel.racas");
    Route::post('/painel/raca/cadastrar', [\App\Http\Controllers\RacasController::class, 'cadastrar'])->name("painel.raca.cadastrar");
    Route::post('/painel/raca/editar/{raca}', [\App\Http\Controllers\RacasController::class, 'editar'])->name("painel.raca.editar");
    Route::get('/painel/raca/excluir/{raca}', [\App\Http\Controllers\RacasController::class, 'excluir'])->name("painel.raca.excluir");

    //ROTAS RELACIONADAS A RAÇAS
    Route::get('/painel/provas_sociais', [\App\Http\Controllers\ProvasSociaisController::class, 'index'])->name("painel.provas_sociais");
    Route::post('/painel/provas_sociais/cadastrar', [\App\Http\Controllers\ProvasSociaisController::class, 'cadastrar'])->name("painel.prova_social.cadastrar");
    Route::post('/painel/provas_sociais/editar/{prova_social}', [\App\Http\Controllers\ProvasSociaisController::class, 'editar'])->name("painel.prova_social.editar");
    Route::get('/painel/provas_sociais/excluir/{prova_social}', [\App\Http\Controllers\ProvasSociaisController::class, 'excluir'])->name("painel.prova_social.excluir");

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

    // ROTAS RELACIONADAS A CLIENTES
    Route::match(['get','post'], '/painel/clientes', [\App\Http\Controllers\ClienteController::class, 'index'])->name("painel.clientes");
    Route::post('/painel/clientes/pesquisar', [\App\Http\Controllers\ClienteController::class, 'pesquisar'])->name("painel.cliente.pesquisar");
    Route::get('/painel/clientes/export', [\App\Http\Controllers\ClienteController::class, 'export'])->name("painel.clientes.export");
    Route::post('/painel/cliente/cadastrar', [\App\Http\Controllers\ClienteController::class, 'cadastro_painel'])->name("painel.cliente.cadastrar");
    Route::get('/painel/cliente/{cliente}', [\App\Http\Controllers\ClienteController::class, 'visualizar'])->name("painel.cliente.visualizar");
    Route::get('/painel/comercial/cliente/{cliente}', [\App\Http\Controllers\ClienteController::class, 'visualizar_comercial'])->name("painel.comercial.cliente.visualizar");
    Route::get('/painel/cliente/{cliente}/finalizar', [\App\Http\Controllers\ClienteController::class, 'finalizar'])->name("painel.cliente.finalizar");
    Route::get('/painel/cliente/{cliente}/credito/analistar', [\App\Http\Controllers\ClienteController::class, 'analise_credito'])->name("painel.cliente.credito.analise");
    Route::get('/painel/cliente/credito/exportar/{analise}', [\App\Http\Controllers\ClienteController::class, 'exportar_analise_credito'])->name("painel.cliente.credito.analise.exportar");
    Route::post('/painel/cliente/credito/{analise}/observacoes/salvar', [\App\Http\Controllers\ClienteController::class, 'salvar_observacoes_analise'])->name("painel.cliente.credito.analise.observacoes.salvar");
    Route::post('/painel/cliente/{cliente}/dados/salvar', [\App\Http\Controllers\ClienteController::class, 'salvar_dados_gerais'])->name("painel.cliente.dados.salvar");
    Route::get('/painel/cliente/{cliente}/aprovacao/{aprovacao}', [\App\Http\Controllers\ClienteController::class, 'aprovacao'])->name("painel.cliente.aprovacao");

    // ROTAS RELACIONADAS A VENDEDORES
    Route::get('/painel/vendedores', [\App\Http\Controllers\VendedoresController::class, 'index'])->name("painel.vendedores");
    Route::post('/painel/vendedor/{cliente}/informacoes/salvar', [\App\Http\Controllers\VendedoresController::class, 'salvar_informacoes'])->name("painel.vendedor.informacoes.salvar");

    // ROTAS RELACIONADAS A VENDAS
    Route::match(['get', 'post'],'/painel/visitas', [\App\Http\Controllers\PainelController::class, 'visitas'])->name("painel.visitas");
    Route::match(['get', 'post'],'/painel/vendas', [\App\Http\Controllers\VendasController::class, 'index'])->name("painel.vendas");
    Route::get('/painel/compradores', [\App\Http\Controllers\VendasController::class, 'compradores'])->name("painel.compradores");
    Route::get('/painel/vendas/lotes', [\App\Http\Controllers\VendasController::class, 'lotes'])->name("painel.vendas.lotes");
    Route::post('/painel/vendas/nova', [\App\Http\Controllers\VendasController::class, 'venda_manual'])->name("painel.vendas.nova");
    Route::get('/painel/venda/{venda}', [\App\Http\Controllers\VendasController::class, 'visualizar'])->name("painel.vendas.visualizar");
    Route::get('/painel/venda/parcela/{parcela}/receber', [\App\Http\Controllers\VendasController::class, 'receber_parcela'])->name("painel.vendas.parcela.receber");
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


    // ROTAS DE MARKETPLACE
    
    // ROTAS DE VENDEDORES E SEUS PRODUTOS
    Route::get('/painel/marketplace/vendedores', [\App\Http\Controllers\MarketplaceVendedoresController::class, 'consultar'])->name("painel.marketplace.vendedores");
    Route::get('/painel/marketplace/vendedores/cadastrar', [\App\Http\Controllers\MarketplaceVendedoresController::class, 'cadastrar'])->name("painel.marketplace.vendedores.cadastrar");
    Route::post('/painel/marketplace/vendedores/salvar', [\App\Http\Controllers\MarketplaceVendedoresController::class, 'salvar'])->name("painel.marketplace.vendedores.salvar");
    Route::get('/painel/marketplace/vendedores/editar/{vendedor}', [\App\Http\Controllers\MarketplaceVendedoresController::class, 'editar'])->name("painel.marketplace.vendedores.editar");
    Route::get('/painel/marketplace/vendedores/{vendedor}/produtos', [\App\Http\Controllers\MarketplaceProdutosController::class, 'consultar'])->name("painel.marketplace.vendedores.produtos");
    Route::get('/painel/marketplace/vendedores/{vendedor}/produtos/cadastrar', [\App\Http\Controllers\MarketplaceProdutosController::class, 'cadastrar'])->name("painel.marketplace.vendedores.produtos.cadastrar");
    Route::get('/painel/marketplace/vendedores/{vendedor}/produtos/{produto}/editar', [\App\Http\Controllers\MarketplaceProdutosController::class, 'editar'])->name("painel.marketplace.vendedores.produtos.editar");
    Route::post('/painel/marketplace/vendedores/{vendedor}/produtos/salvar', [\App\Http\Controllers\MarketplaceProdutosController::class, 'salvar'])->name("painel.marketplace.vendedores.produtos.salvar");

    // ROTAS DECATEGORIAS
    Route::get('/painel/marketplace/categorias', [\App\Http\Controllers\MarketplaceCategoriasController::class, 'consultar'])->name("painel.marketplace.categorias");



    // ==========================================================================================================================

    // ROTAS DE CONFIGURACOES

    // LIVE
    Route::get('/painel/configuracoes/live', [\App\Http\Controllers\LiveController::class, 'index'])->name("painel.configuracoes.live");
    Route::post('/painel/configuracoes/live/salvar', [\App\Http\Controllers\LiveController::class, 'salvar'])->name("painel.configuracoes.live.salvar");

    // BANNERS DA HOME
    Route::get('/painel/configuracoes/home/banners', [\App\Http\Controllers\ConfiguracoesController::class, 'home_banners'])->name("painel.configuracoes.home.banners");
    Route::post('/painel/configuracoes/home/banners/salvar', [\App\Http\Controllers\ConfiguracoesController::class, 'home_banners_salvar'])->name("painel.configuracoes.home.banners.salvar");
    Route::get('/painel/configuracoes/home/banners/deletar/{banner}', [\App\Http\Controllers\ConfiguracoesController::class, 'home_banners_deletar'])->name("painel.configuracoes.home.banners.deletar");
    
    Route::get('/painel/configuracoes/seo', [\App\Http\Controllers\SeoController::class, 'index'])->name("painel.configuracoes.seo");

    // ROTA DE LOG
    Route::get('/painel/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    // LIMPAR CACHE
    Route::get('/painel/limpar-cache', [\App\Http\Controllers\PainelController::class, 'limparCache'])->name("painel.cache.limpar");

});

// ROTAS DO NOVO PAINEL

Route::prefix('sistema')->name("sistema.")->group(function () {

    // LOGIN CONTROLLER
    Route::controller(\App\Http\Controllers\Sistema\LoginController::class)->group(function () {
            
        Route::get('/login', 'login')->name("login");
        Route::post('/logar', 'logar')->name("logar");
    
    });

    Route::middleware(['admin'])->group(function () {

        // INDEX CONTROLLER
        Route::controller(\App\Http\Controllers\Sistema\IndexController::class)->group(function () {
            
            Route::get('/sair', 'sair')->name("sair");
            Route::get('/', 'index')->name("index");
        
        });

        // ROTAS DE CLIENTES
        Route::prefix('clientes')->name('clientes.')->controller(\App\Http\Controllers\Sistema\ClientesController::class)->group(function(){
            // LISTAGEM DE CLIENTES
            Route::get('consultar', 'consultar')->name('consultar');
            Route::get('detalhes/{cliente}', 'detalhes')->name('detalhes');
        });

        // ROTAS DE USUÁRIOS
        Route::prefix('usuarios')->name('usuarios.')->controller(\App\Http\Controllers\Sistema\UsuariosController::class)->group(function(){
            // LISTAGEM DE USUÁRIOS
            Route::get('consultar', 'consultar')->name('consultar');
        });

        // ROTAS DE RESERVAS
        Route::prefix('reservas')->name('reservas.')->controller(\App\Http\Controllers\Sistema\ReservasController::class)->group(function(){
            // LISTAGEM DE RESERVAS
            Route::get('consultar', 'consultar')->name('consultar');
        });

        // ROTAS DE LOTES
        Route::prefix('lotes')->name('lotes.')->controller(\App\Http\Controllers\Sistema\LotesController::class)->group(function(){
            // LISTAGEM DE LOTES
            Route::get('{reserva}/consultar', 'consultar')->name('consultar');
        });

        // ROTAS DE BANNERS
        Route::prefix('banners')->name('banners.')->controller(\App\Http\Controllers\Sistema\BannersController::class)->group(function(){
            // LISTAGEM DE BANNERS
            Route::get('consultar', 'consultar')->name('consultar');
        });

        // ROTAS DE VENDAS
        Route::prefix('vendas')->name('vendas.')->controller(\App\Http\Controllers\Sistema\VendasController::class)->group(function(){
            // LISTAGEM DE VENDAS
            Route::get('consultar', 'consultar')->name('consultar');

            // DETALHES DE VENDA
            Route::get('detalhes/{venda}', 'detalhes')->name('detalhes');
        });

        // ROTAS DE DEMANDAS
        Route::prefix('demandas')->name('demandas.')->controller(\App\Http\Controllers\Sistema\DemandasController::class)->group(function(){
            // LISTAGEM DE DEMANDAS
            Route::get('consultar', 'consultar')->name('consultar');
        });

        // ROTAS DE GUIAS
        Route::prefix('guias')->name('guias.')->controller(\App\Http\Controllers\Sistema\GuiasController::class)->group(function(){
            // LISTAGEM DE GUIAS
            Route::get('consultar', 'consultar')->name('consultar');
        });

        // ROTAS DE RELATÓRIOS
        Route::prefix('relatorios')->name('relatorios.')->controller(\App\Http\Controllers\Sistema\RelatoriosController::class)->group(function(){
            // LISTAGEM DE RELATÓRIOS
            Route::get('consultar', 'consultar')->name('consultar');
        });

    });

});



// ROTAS DO MARKETPLACE
Route::get('/loja', [\App\Http\Controllers\MarketplaceController::class, 'index'])->name("marketplace.index");
Route::get('/loja/produtos', [\App\Http\Controllers\MarketplaceController::class, 'produtos'])->name("marketplace.produtos");
Route::get('/loja/vendedor/{slug}/{produto}', [\App\Http\Controllers\MarketplaceController::class, 'produto'])->name("marketplace.produto");
Route::get('/loja/vendedor/{slug}', [\App\Http\Controllers\MarketplaceController::class, 'vendedor'])->name("marketplace.vendedor");

Route::get('/teste', [\App\Http\Controllers\SiteController::class, 'testes']);
Route::get('/email', function(){
    return view("emails.declaracao-interesse");
});
Route::get('/api/getCidadesByUf/{uf}', [\App\Http\Controllers\ApiController::class, 'getCidadesByUf']);
Route::post('/api/calcDistanciaCep', [\App\Http\Controllers\ApiController::class, 'calcDistanciaCep']);
Route::get('/api/declararInteresseLote/{lote}', [\App\Http\Controllers\ApiController::class, 'declararInteresseLote']);
Route::get('/api/curtirLote/{lote}', [\App\Http\Controllers\ApiController::class, 'curtirLote']);
Route::get('/api/descurtirLote/{lote}', [\App\Http\Controllers\ApiController::class, 'descurtirLote']);


Route::get('/girolando-bx/catalogo', function(){
    // header('Content-Type: application/pdf');
    $data = file_get_contents(asset('catalogos/Girolando_BX.pdf'));
    header('Content-Type: application/pdf');
    echo $data;
    // $file = asset('catalogos/Girolando_BX.pdf');
    // response()->make(null , 200, [
    //     'Content-Type' => 'application/pdf',
    //     'Content-Disposition' => 'inline; filename="'.$file.'"'
    // ]);
});