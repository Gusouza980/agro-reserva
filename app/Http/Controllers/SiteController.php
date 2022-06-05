<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fazenda;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Lote;
use App\Models\Embriao;
use App\Models\Visita;
use App\Models\Carrinho;
use App\Models\Lance;
use App\Models\HomeBanner;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\Configuracao;
use \App\Classes\Util;
use Cookie;
use Analytics;
use Spatie\Analytics\Period;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Log;
use Alaouy\Youtube\Facades\Youtube;

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
        $configuracao = Configuracao::first();
        $reservas = Reserva::where("ativo", true)->orderBy("inicio", "ASC")->get();
        $banners = HomeBanner::orderBy("prioridade", "ASC")->get();
        
        $agent = new Agent();
        if($agent->isMobile()){
            $view = "mobile.index";
            // $view = "index";
        }else{
            $view = "index";
        }
        return view($view, ["reservas" => $reservas, "configuracao" => $configuracao, "banners" => $banners]);
    }

    public function index2(){
        $configuracao = Configuracao::first();
        $reservas = Reserva::where("ativo", true)->orderBy("inicio", "ASC")->get();
        $banners = HomeBanner::orderBy("prioridade", "ASC")->get();
        
        return view("index2", ["reservas" => $reservas, "configuracao" => $configuracao, "banners" => $banners]);
    }

    public function conheca($slug, Reserva $reserva){
        $fazenda = Fazenda::where("slug", $slug)->first();
        // $reserva = $fazenda->reservas->where("ativo", 1)->first();
        if(!$reserva->institucional){
            return redirect()->route("fazenda.lotes", ["fazenda" => $fazenda->slug, "reserva" => $reserva]);
        }
        if($fazenda->video_conheca){
            $fazenda->video_conheca = $this->convertYoutube($fazenda->video_conheca);
        }
        if($fazenda->video_conheca_lotes){
            $fazenda->video_conheca_lotes = $this->convertYoutube($fazenda->video_conheca_lotes);
        }
        foreach($fazenda->depoimentos as $depoimento){
            $depoimento->video = $this->convertYoutube($depoimento->video);
        }
        $fazendas = [];
        $logos = [];
        foreach($reserva->lotes as $lote){
            if(!in_array($lote->fazenda_id, $fazendas)){
                $fazendas[] = $lote->fazenda_id;
                $logos[] = $lote->fazenda->logo;
            }
        }
        $fazendas = Fazenda::whereIn("id", $fazendas)->get();
        $finalizadas = "";
        $agent = new Agent();
        if($agent->isMobile()){
            $view = "mobile";
            // $view = "index";
        }else{
            $view = "desktop";
        }
        return view("fazenda", ["view" => $view, "fazenda" => $fazenda, "fazendas" => $fazendas, "reserva" => $reserva, "finalizadas" => $finalizadas, "nome_pagina" => "Conheça"]);
    }

    public function embrioes($slug, Reserva $reserva){
        $fazenda = Fazenda::where("slug", $slug)->first();
        // $reserva = $fazenda->reservas->where("ativo", 1)->first();
        if(!$reserva->institucional){
            if(!session()->get("popup_institucional")){
                $popup_institucional = true;
                session(["popup_institucional" => true]);
            }else{
                $popup_institucional = false;
            }
        }else{
            $popup_institucional = false;
        }
        $fazendas = $reserva->embrioes->unique("fazenda_id")->pluck("fazenda_id");
        $embrioes = $reserva->embrioes;
        return view("embrioes", ["fazenda" => $fazenda, "fazendas" => $fazendas, "reserva" => $reserva, "popup_institucional" => $popup_institucional, "embrioes" => $embrioes, "nome_pagina" => "Embriões"]);
    }

    public function lotes($slug, Reserva $reserva){
        $fazenda = Fazenda::where("slug", $slug)->first();
        if($reserva->lotes->count() == 0){
            return redirect()->route('fazenda.embrioes', ['fazenda' => $fazenda->slug, 'reserva' => $reserva]);
        }
        // $reserva = $fazenda->reservas->where("ativo", 1)->first();
        if(!$reserva->institucional){
            if(!session()->get("popup_institucional")){
                $popup_institucional = true;
                session(["popup_institucional" => true]);
            }else{
                $popup_institucional = false;
            }
        }else{
            $popup_institucional = false;
        }
        $lotes = $reserva->lotes->where('ativo', true)->where('membro_pacote', false);
        return view("lotes", ["fazenda" => $fazenda, "reserva" => $reserva, "popup_institucional" => $popup_institucional, "lotes" => $lotes, "nome_pagina" => "Lotes"]);
    }

    public function lotes2($slug, Reserva $reserva){
        if($reserva->lotes->count() == 0){
            return redirect()->route('fazenda.embrioes', ['fazenda' => $fazenda->slug, 'reserva' => $reserva]);
        }
        // $reserva = $fazenda->reservas->where("ativo", 1)->first();
        if(!$reserva->institucional){
            if(!session()->get("popup_institucional")){
                $popup_institucional = true;
                session(["popup_institucional" => true]);
            }else{
                $popup_institucional = false;
            }
        }else{
            $popup_institucional = false;
        }
        $fazenda = $reserva->fazenda;
        $lotes = $reserva->lotes->where('ativo', true)->where('membro_pacote', false);
        return view("lotes2", ["fazenda" => $fazenda, "reserva" => $reserva, "popup_institucional" => $popup_institucional, "lotes" => $lotes, "nome_pagina" => "Lotes"]);
    }

    public function lote($slug, Reserva $reserva, Lote $lote){
        if(!session()->get("cliente")){
            session()->flash("erro", "Para acessar os lotes, faça seu login.");
            session()->put(["pagina_retorno" => url()->full()]);
            session()->put(["lote_origem" => $lote->id]);
            return redirect()->route("login");
        }
        $visita = new Visita;
        $configuracao = Configuracao::first();

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

        if((isset(session()->get("cliente")["admin"]) && session()->get("cliente")["admin"] != true)){
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
        return view("lote", ["configuracao" => $configuracao, "lote" => $lote, "lote_bkp" => $lote, "reserva" => $reserva, "fazenda" => $fazenda, "nome_pagina" =>  "Lote: " . $lote->numero . $lote->letra . " - " . $lote->nome]);
    }

    public function embriao($slug, Reserva $reserva, Embriao $embriao){
        if(!session()->get("cliente")){
            session()->flash("erro", "Para acessar os lotes, faça seu login.");
            session()->put(["pagina_retorno" => url()->full()]);
            session()->put(["lote_origem" => $lote->id]);
            return redirect()->route("login");
        }
        $visita = new Visita;
        $configuracao = Configuracao::first();

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

        if((isset(session()->get("cliente")["admin"]) && session()->get("cliente")["admin"] != true)){
            $visita->ip = $ip;
            $visita->embriao_id = $embriao->id;
            $visita->estado = $estado;
            $visita->cidade = $cidade;
            $visita->cep = $cep;

            $visita->save();

            $embriao->visitas += 1;
            $embriao->save();

            if(session()->get("cliente")){
                $rdStation = new \RDStation\RDStation(session()->get("cliente")["email"]);
                $rdStation->setApiToken('ff3c1145b001a01c18bfa3028660b6c6');
                $rdStation->setLeadData('name', session()->get("cliente")["nome_dono"]);
                $rdStation->setLeadData('identifier', 'interesse-lote');
                $rdStation->setLeadData('numero-lote', "" . $embriao->numero);
                $rdStation->setLeadData('nome-lote', $embriao->nome);
                $rdStation->setLeadData('fazenda-lote', $embriao->fazenda->nome_fazenda);
                $rdStation->sendLead();
            }
            
        }

        $fazenda = Fazenda::where("slug", $slug)->first();
        return view("embriao", ["configuracao" => $configuracao, "embriao" => $embriao, "reserva" => $reserva, "fazenda" => $fazenda, "nome_pagina" =>  "Lote: " . $embriao->prefixo_numero . $embriao->numero . $embriao->sufixo_numero . " - " . $embriao->grau_sangue]);
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
                // dd($usuario);
                // $cookie = cookie()->forever('cliente', $usuario->id);
                // $cookie = Cookie::forget('cliente');
                Cookie::queue('cliente', $usuario->id, 518400);
                // $response->withCookie(cookie()->forever($usuario->id));
                // return response("view")->withCookie($cookie);
                // dd(cookie("cliente"));
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
                return redirect()->back()->withInput($request->except('senha'));
            } 
        }else{
            session()->flash("erro", "Usuário ou senha incorretos");
            return redirect()->back()->withInput($request->except('senha'));
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
        if(!$reserva->institucional){
            return redirect()->route("fazenda.lotes", ["fazenda" => $fazenda]);
        }
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
        $fazendas = Fazenda::whereIn("id", $fazendas)->get();
        return view("finalizadas.fazenda", ["fazenda" => $fazenda, "fazendas" => $fazendas, "reserva" => $reserva]);
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

    public function redirect_fazenda($slug, Lote $lote = null){
        $fazenda = Fazenda::where("slug", $slug)->first();
        $reserva = $fazenda->reservas->where("ativo", 1)->first();
        if(url()->current() == route('fazenda.conheca.antigo', ['fazenda' => $slug]) || url()->current() == route('fazenda.conheca.lotes.antigo', ['fazenda' => $slug]) || url()->current() == route('fazenda.conheca.depoimentos.antigo', ['fazenda' => $slug]) || url()->current() == route('fazenda.conheca.avaliacoes.antigo', ['fazenda' => $slug])){
            return redirect()->route("fazenda.conheca", ["fazenda" => $slug, "reserva" => $reserva]);
        }
        if(url()->current() == route('fazenda.lotes.antigo', ['fazenda' => $slug])){
            return redirect()->route("fazenda.lotes", ["fazenda" => $slug, "reserva" => $reserva]);
        }
        if(url()->current() == route('fazenda.conheca.antigo', ['fazenda' => $slug])){
            return redirect()->route("fazenda.conheca", ["fazenda" => $slug, "reserva" => $reserva]);
        }
        if(url()->current() == route('fazenda.lote.antigo', ['fazenda' => $slug, 'lote' => $lote])){
            return redirect()->route("fazenda.lote", ["fazenda" => $slug, "reserva" => $reserva, "lote" => $lote]);
        }
    }

    public function experiencia_ouro_branco(){
        return view("experiencias.ouro-branco");
    }
}
