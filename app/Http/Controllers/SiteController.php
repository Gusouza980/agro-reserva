<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fazenda;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Lote;
use App\Models\Visita;
use App\Models\Carrinho;
use App\Models\Lance;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\Configuracao;
use \App\Classes\Util;
use Cookie;
use Analytics;
use Spatie\Analytics\Period;

class SiteController extends Controller
{

    public function testes(){
        
        $reservas = Reserva::where([["aberto", true], ['encerrada', false]])->get();
        $lotes = Lote::whereIn("reserva_id", $reservas)->get();
        $relevancias = [];
        $recomendados = [];
        for($i = 0; $i < $lotes->count(); $i++){
            $lote1 = $lotes[$i];
            $num_chaves = $lote1->chaves->count();
            if($num_chaves > 0){
                $recomendados[$lote1->id] = [];
            }
            $relevancias[$i] = [];
            for($j = 0; $j < $lotes->count(); $j++){
                if($i != $j){
                    $relevancias[$i][$j] = 0;
                    $lote2 = $lotes[$j];
                    foreach($lote1->chaves as $chave){
                        if($lote2->chaves->contains($chave)){
                            $relevancias[$i][$j]++;
                        }
                    }
                    if($num_chaves > 0){
                        if((($relevancias[$i][$j] * 100) / $num_chaves) >= 100){
                            if($relevancias[$i][$j] < 2){
                                dd(($relevancias[$i][$j] * 100) / $num_chaves);
                            }
                            $recomendados[$lote1->id][] = $lote2->id; 
                            
                        }
                    }
                }
            }
            
        }
        foreach($recomendados as $key => $recomendados){
            $lote1 = Lote::find($key);
            foreach($recomendados as $recomendado){
                $lote1->recomendados()->attach($recomendado);
            }
        }

    }

    public function index(){
        // dd($cliente->toArray());
        $configuracao = Configuracao::first();
        $reservas = Reserva::where("ativo", true)->orderBy("inicio", "ASC")->get();
        $reserva_aberta = Reserva::where([["aberto", true], ['encerrada', false]])->first();
        if($reserva_aberta){
            $lotes = $reserva_aberta->lotes;
            $lotes_destaque = $lotes->where("reservado", false)->sortByDesc("visualizacoes");
            if($lotes_destaque->count() < 10){
                $count = 10 - $lotes_destaque->count();
                $lotes_destaque = $lotes_destaque->merge($lotes->where("reservado", true)->sortByDesc("visualizacoes")->take($count));
            }
        }else{
            $lotes_destaque = null;
        }
        
        return view("index", ["reservas" => $reservas, "configuracao" => $configuracao, "lotes_destaque" => $lotes_destaque]);
        // $beneficiario = new \Eduardokum\LaravelBoleto\Pessoa(
        //     [
        //         'nome'      => 'Agroreserva',
        //         'endereco'  => 'Rua Dom Pedro II, 74',
        //         'cep'       => '37131-456',
        //         'uf'        => 'MG',
        //         'cidade'    => 'Alfenas',
        //         'documento' => '41.893.302/0001-13',
        //     ]
        // );
        
        // $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
        //     [
        //         'nome'      => 'Luis Gustavo',
        //         'endereco'  => 'Rua Dom Pedro II, 74',
        //         'bairro'    => 'Vila Formosa',
        //         'cep'       => '37131-456',
        //         'uf'        => 'MG',
        //         'cidade'    => 'Alfenas',
        //         'documento' => '111.021.656-46',
        //     ]
        // );
        
        // $boleto = new \Eduardokum\LaravelBoleto\Boleto\Banco\Caixa(
        //     [
        //         'logo'                   => asset('imagens/logo-caixa.png'),
        //         'dataVencimento'         => new \Carbon\Carbon(),
        //         'valor'                  => 100.41,
        //         'multa'                  => false,
        //         'juros'                  => false,
        //         'numero'                 => 1,
        //         'numeroDocumento'        => 1,
        //         'pagador'                => $pagador,
        //         'beneficiario'           => $beneficiario,
        //         'agencia'                => 4393,
        //         'conta'                  => 13319,
        //         'carteira'               => 'RG',
        //         'codigoCliente'          => 20,
        //         'descricaoDemonstrativo' => ['demonstrativo 1', 'demonstrativo 2', 'demonstrativo 3'],
        //         'instrucoes'             => ['instrucao 1', 'instrucao 2', 'instrucao 3'],
        //         'aceite'                 => 'S',
        //         'especieDoc'             => 'DM',
        //     ]
        // );
        
        // $pdf = new \Eduardokum\LaravelBoleto\Boleto\Render\Pdf();
        // $pdf->addBoleto($boleto);
        // $pdf->gerarBoleto($pdf::OUTPUT_SAVE, public_path('imagens/cef.pdf'));
    }

    public function conheca($slug){
        $fazenda = Fazenda::where("slug", $slug)->first();
        $fazenda->video_conheca = $this->convertYoutube($fazenda->video_conheca);
        $fazenda->video_conheca_lotes = $this->convertYoutube($fazenda->video_conheca_lotes);
        foreach($fazenda->depoimentos as $depoimento){
            $depoimento->video = $this->convertYoutube($depoimento->video);
        }
        $reserva = $fazenda->reservas->where("ativo", 1)->first();
        $fazendas = [];
        $logos = [];
        foreach($reserva->lotes as $lote){
            if(!in_array($lote->fazenda_id, $fazendas)){
                $fazendas[] = $lote->fazenda_id;
                $logos[] = $lote->fazenda->logo;
            }
        }
        $finalizadas = "";
        return view("fazenda", ["fazenda" => $fazenda, "logos" => $logos, "reserva" => $reserva, "finalizadas" => $finalizadas, "nome_pagina" => "Conheça"]);
    }

    public function lotes($slug){
        $fazenda = Fazenda::where("slug", $slug)->first();
        $reserva = $fazenda->reservas->where("ativo", 1)->first();
        $lotes = $reserva->lotes->where('ativo', true)->where('membro_pacote', false);
        $prioridades = $lotes->where("prioridade", true)->sortBy("numero");
        $lotes = $lotes->where("prioridade", false)->sortBy("numero");
        $lotes = $prioridades->merge($lotes);
        return view("lotes", ["fazenda" => $fazenda, "reserva" => $reserva, "prioridades" => $prioridades, "lotes" => $lotes, "nome_pagina" => "Lotes"]);
    }

    public function lote($slug, Lote $lote){
        if(!session()->get("cliente")){
            session()->flash("erro", "Para acessar os lotes, faça seu login.");
            session()->put(["pagina_retorno" => url()->full()]);
            session()->put(["lote_origem" => $lote->id]);
            return redirect()->route("login");
        }
        $visita = new Visita;

        if(session()->get("cliente")){
            $visita->cliente_id = session()->get("cliente")["id"];
            $visita->logado = true;
        }

        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    
        $estado = null;
        $cidade = null;
        $cep = null;
    
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
    
        if($query && $query["status"] == "success"){
            $estado = $query["region"];
            $cidade = $query["city"];
            $cep = $query["zip"];
        }

        if(!session()->get("cliente") || (isset(session()->get("cliente")["admin"]) && session()->get("cliente")["admin"] != true)){
            $visita->ip = $ip;
            $visita->lote_id = $lote->id;
            $visita->estado = $estado;
            $visita->cidade = $cidade;
            $visita->cep = $cep;

            $visita->save();

            $lote->visitas += 1;
            $lote->save();

            if(session()->get("cliente")){
                $rdStation = new \RDStation\RDStation(session()->get("cliente")["email"]);
                $rdStation->setApiToken('ff3c1145b001a01c18bfa3028660b6c6');
                $rdStation->setLeadData('name', session()->get("cliente")["nome_dono"]);
                $rdStation->setLeadData('identifier', 'interesse-lote');
                $rdStation->setLeadData('numero-lote', "" . $lote->numero . $lote->letra);
                $rdStation->setLeadData('nome-lote', $lote->nome);
                $rdStation->setLeadData('fazenda-lote', $lote->fazenda->nome_fazenda);
                $rdStation->sendLead();
            }
            
        }

        $lote->video = $this->convertYoutube($lote->video);
        $fazenda = Fazenda::where("slug", $slug)->first();
        return view("lote", ["lote" => $lote, "lote_bkp" => $lote, "reserva" => $lote->reserva, "fazenda" => $fazenda, "nome_pagina" =>  "Lote: " . $lote->numero . $lote->letra . " - " . $lote->nome]);
    }

    public function lance(Request $request, Lote $lote){
        
        $lance = Lance::where([["lote_id", $lote->id], ["valor", ">", $request->valor]])->first();
        if($lance){
            return response()->json("erro");
        }
        $lance = new Lance;
        $lance->cliente_id = session()->get("cliente")["id"];
        $lance->lote_id = $lote->id;
        $lance->reserva_id = $lote->reserva->id;
        $lance->valor = $request->valor;
        $lance->save();

        $res = [];
        $res["id"] = $lance->id;
        $res["nome"] = session()->get("cliente")["nome_dono"];
        $res["valor"] = $request->valor;

        return response()->json($res);
        
    }

    public function maior_lance(Lote $lote){
        $lance = Lance::where("lote_id", $lote->id)->orderBy("valor", "DESC")->first();
        if(!$lance){
            return response()->json("erro");
        }
        $res = [];
        $res["id"] = $lance->id;
        $res["nome"] = $lance->cliente->nome_dono;
        $res["valor"] = $lance->valor;
        return response()->json($res);
    }

    public function cadastro_fazenda(){
        return view("cadastro.fazenda");
    }

    public function cadastro_passos(){

        if(!session()->get("cliente")){
            return redirect()->route("cadastro");
        }

        return view('cadastro.passos');
    }

    public function login(){
        if(session()->get("cliente")){
            return redirect()->route("index");
        }
        session()->flash("nome_pagina", "Login");
        return view('login', ["nome_pagina" => "Login"]);
    }

    public function logar(Request $request){
        $usuario = Cliente::where("email", $request->email)->first();
        if($usuario){
            if(Hash::check($request->senha, $usuario->senha)){
                $usuario->ultimo_acesso = date('Y-m-d');
                $usuario->save();
                $cookie = Cookie::forever('cliente', $usuario->id);
                session(["cliente" => $usuario->toArray()]);
                
                $carrinhos = Carrinho::where([["cliente_id", $usuario->id], ["aberto", true]])->get();
                $carrinho_ids = [];
                
                foreach($carrinhos as $carrinho){
                    if($carrinho->reserva_id == null || $carrinho->reserva->encerrada){
                        $carrinho->delete();
                    }else{
                        if(!session()->get("carrinho")){
                            session()->put("carrinho", []);
                        }
                        
                        session()->push("carrinho", ["id" => $carrinho->id, "reserva" => $carrinho->reserva_id]);
                    }
                }

                if(session()->get("pagina_retorno") && session()->get("pagina_retorno") != route("login")){
                    $pagina = session()->get("pagina_retorno");
                    session()->forget("pagina_retorno");
                    return redirect($pagina);
                }else{
                    return redirect()->route("index");
                }
            }else{
                session()->flash("erro", "Usuário ou senha incorretos");
                return redirect()->back();
            } 
        }else{
            session()->flash("erro", "Usuário ou senha incorretos");
            return redirect()->back();
        }      
    }

    public function contato(){
        return view("contato");
    }

    public function sobre(){
        return view("sobre");
    }

    public function reservas_finalizadas(){
        $reservas = Reserva::where("encerrada", true)->get();
        return view("finalizadas.index", ["reservas" => $reservas]);
    }

    public function conheca_finalizadas(Reserva $reserva, $slug){
        $fazenda = Fazenda::where("slug", $slug)->first();
        $fazenda->video_conheca = $this->convertYoutube($fazenda->video_conheca);
        $fazenda->video_conheca_lotes = $this->convertYoutube($fazenda->video_conheca_lotes);
        foreach($fazenda->depoimentos as $depoimento){
            $depoimento->video = $this->convertYoutube($depoimento->video);
        }
        $fazendas = [];
        $logos = [];
        if($reserva->multi_fazendas){
            foreach($reserva->lotes as $lote){
                if(!in_array($lote->fazenda_id, $fazendas)){
                    $fazendas[] = $lote->fazenda_id;
                    $logos[] = $lote->fazenda->logo;
                }
            }
        }
        return view("finalizadas.fazenda", ["fazenda" => $fazenda, "logos" => $logos, "reserva" => $reserva]);
    }

    public function lotes_finalizadas(Reserva $reserva, $slug){
        $fazenda = $reserva->fazenda;
        $lotes = $reserva->lotes->where('ativo', true)->where('membro_pacote', false);
        $prioridades = $lotes->where("prioridade", true)->sortBy("numero");
        $lotes = $lotes->where("prioridade", false)->sortBy("numero");
        $lotes = $prioridades->merge($lotes);
        session()->flash("nome_pagina", "Lotes");
        return view("lotes", ["fazenda" => $fazenda, "reserva" => $reserva, "finalizadas" => true, "prioridades" => $prioridades, "lotes" => $lotes, "lotes_bkp" => $lotes]);
    }

    public function lote_finalizadas(Reserva $reserva, $slug, Lote $lote){
        if(!session()->get("cliente")){
            session()->flash("erro", "Para acessar os lotes, faça seu login.");
            session()->put(["pagina_retorno" => url()->full()]);
            return redirect()->route("login");
        }
        $visita = new Visita;

        if(session()->get("cliente")){
            $visita->cliente_id = session()->get("cliente")["id"];
            $visita->logado = true;
        }

        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    
        $estado = null;
        $cidade = null;
        $cep = null;
    
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
    
        if($query && $query["status"] == "success"){
            $estado = $query["region"];
            $cidade = $query["city"];
            $cep = $query["zip"];
        }

        $visita->ip = $ip;
        $visita->lote_id = $lote->id;
        $visita->estado = $estado;
        $visita->cidade = $cidade;
        $visita->cep = $cep;

        $visita->save();

        $lote->visitas += 1;
        $lote->save();

        // $rdStation = new \RDStation\RDStation(session()->get("cliente")["email"]);
        // $rdStation->setApiToken('ff3c1145b001a01c18bfa3028660b6c6');
        // $rdStation->setLeadData('name', session()->get("cliente")["nome_dono"]);
        // $rdStation->setLeadData('identifier', 'interesse-lote');
        // $rdStation->setLeadData('numero-lote', "" . $lote->numero . $lote->letra);
        // $rdStation->setLeadData('nome-lote', $lote->nome);
        // $rdStation->setLeadData('fazenda-lote', $lote->fazenda->nome_fazenda);
        // $rdStation->sendLead();

        $lote->video = $this->convertYoutube($lote->video);

        $fazenda = Fazenda::where("slug", $slug)->first();
        return view("lote", ["lote" => $lote, "lote_bkp" => $lote, "fazenda" => $fazenda, "finalizadas" => true, "reserva" => $reserva]);
    }

    public function convertYoutube($string) {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe width=\"350\" height=\"200\" src=\"//www.youtube.com/embed/$2\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>",
            $string
        );
    }
}
