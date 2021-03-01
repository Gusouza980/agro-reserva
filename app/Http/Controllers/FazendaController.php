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

class FazendaController extends Controller
{

    public function teste(){
        include_once(app_path() . '\Apis\_functions.php');


        $slug = (isset($_GET['slug'])) ? $_GET['slug'] : ""; //get ou post

        /* link especifico */
        $url = 'https://api.bscommerce.com.br/setor/';
        
        /* array de dados */
        $data =  array(
            "token" => $tokenapi,
            "ope"   => "getSetor",
          "slug"  	=> "fazenda-poranga"
        );
        
        /* envia dados e recebe retorno */
        $retorno = callAPI($url, $data);
        
        /* converte json em array (opcional) */
        $dados = json_decode($retorno);
        
        var_dump($dados);
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
        $fazenda->video_conheca_lotes = $request->video_conheca_lotes;
        $fazenda->titulo_conheca_lotes = $request->titulo_conheca_lotes;
        $fazenda->animais_conheca_lotes = $request->animais_conheca_lotes;
        $fazenda->embrioes_conheca_lotes = $request->embrioes_conheca_lotes;
        $fazenda->bezerros_conheca_lotes = $request->bezerros_conheca_lotes;
        $fazenda->save();
        toastr()->success("Conteúdo salvo com sucesso!");

        return redirect()->back();

    }

    public function salvar_conheca_avaliacoes(Request $request, Fazenda $fazenda){

        if($request->file("fundo_conheca_avaliacao")){
            Storage::delete($fazenda->fundo_conheca_avaliacao);
            $fazenda->fundo_conheca_avaliacao = $request->file('fundo_conheca_avaliacao')->store(
                'imagens/fazendas/' . Str::slug($fazenda->nome_fazenda) . "/conheca/avaliacoes", 'local'
            );
        }
        $fazenda->texto_conheca_avaliacao_resumo = $request->texto_conheca_avaliacao_resumo;
        $fazenda->quantidade_conheca_avaliacao_producao = $request->quantidade_conheca_avaliacao_producao;
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

    public function cadastro_site(Request $request){
        $fazenda = new Fazenda;
        $fazenda->nome_dono = $request->nome_dono;
        $fazenda->nome_fazenda = $request->nome_fazenda;
        $fazenda->telefone = $request->telefone;
        $fazenda->cnpj = $request->cnpj;
        $fazenda->email = $request->email;
        $fazenda->whatsapp = $request->whatsapp;
        $fazenda->save();
        return response()->json("Sucesso");
    }
}
