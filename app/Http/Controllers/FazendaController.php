<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Fazenda;
use App\Models\FazendaRaca;
use App\Apis\Api;
use App\Models\Depoimento;
use App\Models\Producao;
use App\Models\Fazendeiro;
use App\Models\LoteNumero;
use App\Models\FazendaAvaliacao;

class FazendaController extends Controller
{

    public function teste(){
        include_once(app_path() . '/Apis/_functions.php');


        $url = 'https://api.bscommerce.com.br/produto/';

        /* array de dados */
        $data =  array(
            "token" => $tokenapi,
            "ope"   => "getProduto",
            "code"  => '1240'
        );

        /* envia dados e recebe retorno */
        $retorno = callAPI($url, $data);

        /* converte json em array (opcional) */
        $dados = json_decode($retorno);
        
        dd($dados);
        /*
        $dados[0]->ID_Cliente
            -1 	= E-mail não existe
            0 	= Senha não confere
            >0 	= Login OK, definir $_SESSION['userid'] 
        */

    }

    public function index(){
        $fazendas = Fazenda::all();
        return view("painel.fazendas.consultar", ["fazendas" => $fazendas]);
    }

    public function cadastro(){
        return view("painel.fazendas.cadastro");
    }

    public function cadastrar(Request $request){
        $fazenda = new Fazenda;
        $fazenda->nome_dono = $request->nome_dono;
        $fazenda->nome_fazenda = $request->nome_fazenda;
        $fazenda->slug = Str::slug($request->nome_fazenda);
        $fazenda->telefone = $request->telefone;
        $fazenda->cnpj = $request->cnpj;
        $fazenda->email = $request->email;
        $fazenda->whatsapp = $request->whatsapp;
        $fazenda->save();
        return redirect()->route("painel.fazendas");
    }

    public function editar(Fazenda $fazenda){
        return view("painel.fazendas.editar", ["fazenda" => $fazenda]);
    }

    public function reserva(Request $request, Fazenda $fazenda){
        $fazenda->data_inicio_reserva = date("Y-m-d H:i", strtotime($request->data_inicio_reserva . " " . $request->hora_inicio_reserva));
        $fazenda->data_fim_reserva = date("Y-m-d H:i", strtotime($request->data_fim_reserva . " " . $request->hora_fim_reserva));
        $fazenda->save();
        toastr()->success("O período de reservas foi salvo com sucesso!");
        return redirect()->back();
    }

    public function ativar(Fazenda $fazenda){
        $fazenda->ativo = true;
        $fazenda->save();
        toastr()->success("Fazenda ativada com sucesso!");
        return redirect()->back();
    }

    public function desativar(Fazenda $fazenda){
        $fazenda->ativo = false;
        $fazenda->save();
        toastr()->success("Fazenda desativada com sucesso!");
        return redirect()->back();
    }

    public function salvar_informacoes(Request $request, Fazenda $fazenda){

        $fazenda->nome_dono = $request->nome_dono;
        $fazenda->nome_fazenda = $request->nome_fazenda;
        $fazenda->slug = Str::slug($request->nome_fazenda);
        $fazenda->telefone = $request->telefone;
        $fazenda->cnpj = $request->cnpj;
        $fazenda->email = $request->email;
        $fazenda->whatsapp = $request->whatsapp;
        $fazenda->save();
        toastr()->success("Conteúdo salvo com sucesso!");
        return redirect()->back();

    }

    public function salvar_slug(Request $request, Fazenda $fazenda){

        $fazenda->slug = $request->slug;
        $fazenda->save();
        toastr()->success("Conteúdo salvo com sucesso!");
        return redirect()->back();

    }

    public function salvar_destaque(Request $request, Fazenda $fazenda){

        if($request->file("fundo_destaque")){
            Storage::delete($fazenda->fundo_destaque);
            $fazenda->fundo_destaque = $request->file('fundo_destaque')->store(
                'imagens/fazendas/' . Str::slug($fazenda->nome_fazenda) . "/destaque", 'local'
            );
            $fazenda->save();
            toastr()->success("Conteúdo salvo com sucesso!");
        }

        return redirect()->back();

    }

    public function salvar_logo(Request $request, Fazenda $fazenda){
        if($request->file("logo")){
            Storage::delete($fazenda->logo);
            $fazenda->logo = $request->file('logo')->store(
                'imagens/fazendas/' . Str::slug($fazenda->nome_fazenda) . "/logo", 'local'
            );
            $fazenda->save();
            toastr()->success("Logo salva com sucesso!");
        }

        return redirect()->back();
    }

    public function salvar_conheca(Request $request, Fazenda $fazenda){

        if($request->file("fundo_conheca")){
            Storage::delete($fazenda->fundo_conheca);
            $fazenda->fundo_conheca = $request->file('fundo_conheca')->store(
                'imagens/fazendas/' . Str::slug($fazenda->nome_fazenda) . "/conheca", 'local'
            );
        }

        if($request->file("miniatura_conheca")){
            Storage::delete($fazenda->miniatura_conheca);
            $fazenda->miniatura_conheca = $request->file('miniatura_conheca')->store(
                'imagens/fazendas/' . Str::slug($fazenda->nome_fazenda) . "/conheca/miniatura", 'local'
            );
        }


        $fazenda->video_conheca = $request->video_conheca;
        $fazenda->titulo_conheca = $request->titulo_conheca;
        $fazenda->texto_conheca = $request->texto_conheca;
        $fazenda->save();
        toastr()->success("Conteúdo salvo com sucesso!");

        return redirect()->back();

    }

    public function salvar_conheca_lotes(Request $request, Fazenda $fazenda){

        if($request->file("fundo_conheca_lotes")){
            Storage::delete($fazenda->fundo_conheca_lotes);
            $fazenda->fundo_conheca_lotes = $request->file('fundo_conheca_lotes')->store(
                'imagens/fazendas/' . Str::slug($fazenda->nome_fazenda) . "/conheca/lotes", 'local'
            );
        }

        if($request->file("miniatura_conheca_lotes")){
            Storage::delete($fazenda->miniatura_conheca_lotes);
            $fazenda->miniatura_conheca_lotes = $request->file('miniatura_conheca_lotes')->store(
                'imagens/fazendas/' . Str::slug($fazenda->nome_fazenda) . "/conheca/lotes/miniatura", 'local'
            );
        }

        $fazenda->video_conheca_lotes = $request->video_conheca_lotes;
        $fazenda->titulo_conheca_lotes = $request->titulo_conheca_lotes;
        $fazenda->animais_conheca_lotes = $request->animais_conheca_lotes;
        $fazenda->embrioes_conheca_lotes = $request->embrioes_conheca_lotes;
        $fazenda->bezerros_conheca_lotes = $request->bezerros_conheca_lotes;
        $fazenda->save();
        toastr()->success("Conteúdo salvo com sucesso!");

        return redirect()->back();

    }

    public function novo_numero(Request $request, Fazenda $fazenda){
        $numero = new LoteNumero;
        $numero->fazenda_id = $fazenda->id;
        $numero->titulo = $request->titulo;
        $numero->valor = $request->valor;
        $numero->save();
        return redirect()->back();
    }

    public function salvar_numero(Request $request, LoteNumero $numero){
        $numero->titulo = $request->titulo;
        $numero->valor = $request->valor;
        $numero->save();
        return redirect()->back();
    }

    public function excluir_numero(LoteNumero $numero){
        $numero->delete();
        return redirect()->back();
    }

    public function nova_avaliacao(Request $request, Fazenda $fazenda){
        $avaliacao = new FazendaAvaliacao;
        $avaliacao->fazenda_id = $fazenda->id;
        $avaliacao->nome = $request->nome;

        if($request->file("caminho")){
            $avaliacao->caminho = $request->file('caminho')->store(
                'imagens/fazendas/' . Str::slug($fazenda->nome_fazenda) . "/conheca/avaliacoes/avaliacoes", 'local'
            );
        }

        $avaliacao->save();
        return redirect()->back();
    }

    public function salvar_avaliacao(Request $request, FazendaAvaliacao $avaliacao){
        $avaliacao->nome = $request->nome;

        if($request->file("caminho")){
            Storage::delete($avaliacao->caminho);
            $avaliacao->caminho = $request->file('caminho')->store(
                'imagens/fazendas/' . Str::slug($avaliacao->fazenda->nome_fazenda) . "/conheca/avaliacoes/avaliacoes", 'local'
            );
        }

        $avaliacao->save();
        return redirect()->back();
    }

    public function excluir_avaliacao(FazendaAvaliacao $avaliacao){
        Storage::delete($avaliacao->caminho);
        $avaliacao->delete();
        return redirect()->back();
    }

    public function salvar_conheca_avaliacoes(Request $request, Fazenda $fazenda){

        if($request->file("fundo_conheca_avaliacao")){
            Storage::delete($fazenda->fundo_conheca_avaliacao);
            $fazenda->fundo_conheca_avaliacao = $request->file('fundo_conheca_avaliacao')->store(
                'imagens/fazendas/' . Str::slug($fazenda->nome_fazenda) . "/conheca/avaliacoes", 'local'
            );
        }

        if($request->file("miniatura_conheca_avaliacao")){
            Storage::delete($fazenda->miniatura_conheca_avaliacao);
            $fazenda->miniatura_conheca_avaliacao = $request->file('miniatura_conheca_avaliacao')->store(
                'imagens/fazendas/' . Str::slug($fazenda->nome_fazenda) . "/conheca/avaliacoes/miniatura", 'local'
            );
        }

        $fazenda->texto_conheca_avaliacao_resumo = $request->texto_conheca_avaliacao_resumo;
        $fazenda->texto_conheca_avaliacao_diferencial = $request->texto_conheca_avaliacao_diferencial;
        $fazenda->save();
        toastr()->success("Conteúdo salvo com sucesso!");

        return redirect()->back();

    }

    public function salvar_conheca_depoimentos(Request $request, Fazenda $fazenda){

        if($request->file("fundo_conheca_depoimentos")){
            Storage::delete($fazenda->fundo_conheca_depoimentos);
            $fazenda->fundo_conheca_depoimentos = $request->file('fundo_conheca_depoimentos')->store(
                'imagens/fazendas/' . Str::slug($fazenda->nome_fazenda) . "/conheca/depoimentos", 'local'
            );
        }

        if($request->file("miniatura_conheca_depoimentos")){
            Storage::delete($fazenda->miniatura_conheca_depoimentos);
            $fazenda->miniatura_conheca_depoimentos = $request->file('miniatura_conheca_depoimentos')->store(
                'imagens/fazendas/' . Str::slug($fazenda->nome_fazenda) . "/conheca/depoimentos/miniatura", 'local'
            );
        }

        $fazenda->save();
        toastr()->success("Conteúdo salvo com sucesso!");

        return redirect()->back();

    }

    public function novo_depoimento(Request $request, Fazenda $fazenda){
        $depoimento = new Depoimento;
        $depoimento->titulo = $request->titulo;
        $depoimento->video = $request->video;
        $depoimento->texto = $request->texto;
        $depoimento->fazenda_id = $fazenda->id;
        $depoimento->save();
        toastr()->success("Depoimento salvo com sucesso!");
        return redirect()->back();
    }

    public function salvar_depoimento(Request $request, Depoimento $depoimento){
        $depoimento->titulo = $request->titulo;
        $depoimento->video = $request->video;
        $depoimento->texto = $request->texto;
        $depoimento->save();
        toastr()->success("Depoimento salvo com sucesso!");
        return redirect()->back();
    }

    public function excluir_depoimento(Depoimento $depoimento){
        $depoimento->delete();
        toastr()->success("Depoimento removido com sucesso!");
        return redirect()->back();
    }

    public function novo_producao(Request $request, Fazenda $fazenda){
        $producao = new Producao;
        $producao->titulo = $request->titulo;
        $producao->subtitulo = $request->subtitulo;
        $producao->fazenda_id = $fazenda->id;
        $producao->save();
        toastr()->success("Produção salva com sucesso!");
        return redirect()->back();
    }

    public function salvar_producao(Request $request, Producao $producao){
        $producao->titulo = $request->titulo;
        $producao->subtitulo = $request->subtitulo;
        $producao->save();
        toastr()->success("Produção salva com sucesso!");
        return redirect()->back();
    }

    public function excluir_producao(Producao $producao){
        $producao->delete();
        toastr()->success("Produção removida com sucesso!");
        return redirect()->back();
    }

    public function salvar_usuario(Request $request, Fazendeiro $usuario = null){
        if(!$usuario){
            $usuario = new Fazendeiro;
            $usuario->fazenda_id = $request->fazenda_id;
        }

        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->usuario = $request->usuario;
        $usuario->senha = Hash::make($request->senha);
        $usuario->acesso = 0;
        $usuario->save();

        toastr()->success("Informações de usuário atualizadas.");
        return redirect()->back();
    }

}
