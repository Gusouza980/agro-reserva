<?php

namespace App\Http\Controllers;

use App\Exports\RelatorioCadastros;
use Illuminate\Http\Request;
use App\Models\Fazenda;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Lote;
use App\Models\Raca;
use App\Models\Embriao;
use App\Models\Visita;
use App\Models\Carrinho;
use App\Models\Lance;
use App\Models\HomeBanner;
use Illuminate\Support\Facades\Hash;
use App\Models\Configuracao;
use Cookie;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Classes\Agrisk\Apiary\ApiaryClientes;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Facades\Excel;

class SiteController extends Controller
{

    public function testes()
    {
        echo $cliente;
        // DiscordAlert::to('cadastro')->message("O cliente Luis Gustavo acabou de realizar seu pré-cadastro na plataforma.");
        // return Excel::download(new RelatorioCadastros(), 'relatorio_cadastros_semanais.xlsx');
    }

    public function index()
    {
        // $configuracao = Configuracao::first();
        // dd("FOI");
        // dd(DB::getQueryLog());
        // $agent = new Agent();
        // if($agent->isMobile()){
        //     $view = "mobile.index";
        // }else{
        //     $view = "index";
        // }
        // return view($view, ["reservas" => $reservas, "configuracao" => $configuracao, "banners" => $banners]);
    }

    public function index2()
    {
        DB::connection()->enableQueryLog();

        $configuracao = Configuracao::first();

        // RESERVAS QUE ESTÃO ATIVAS
        if (cache()->has('reservas_ativas')) {
            $reservas = cache()->get('reservas_ativas');
        } else {
            $reservas = cache()->remember('reservas_ativas', 60 * 60 * 24 * 7, function () {
                return Reserva::where("ativo", true)->with("lotes")->with("lotes.fazenda")->with("fazenda")->with("lotes.reserva")->with("lotes.fazenda")->orderBy("inicio", "ASC")->get();
            });
        }

        // BANNERS EXIBIDOS NA HOME
        if (cache()->has('banners')) {
            $banners = cache()->get("banners");
        } else {
            $banners = cache()->remember('banners', 60 * 60 * 24 * 7, function () {
                return HomeBanner::orderBy("prioridade", "ASC")->get();
            });
        }

        return view("index2", ["reservas" => $reservas, "configuracao" => $configuracao, "banners" => $banners]);
    }

    public function conheca($slug, Reserva $reserva)
    {
        $fazenda = Fazenda::where("slug", $slug)->first();
        // $reserva = $fazenda->reservas->where("ativo", 1)->first();
        if (!$reserva->institucional) {
            return redirect()->route("fazenda.lotes", ["fazenda" => $fazenda->slug, "reserva" => $reserva]);
        }
        if ($fazenda->video_conheca) {
            $fazenda->video_conheca = $this->convertYoutube($fazenda->video_conheca);
        }
        if ($fazenda->video_conheca_lotes) {
            $fazenda->video_conheca_lotes = $this->convertYoutube($fazenda->video_conheca_lotes);
        }
        foreach ($fazenda->depoimentos as $depoimento) {
            $depoimento->video = $this->convertYoutube($depoimento->video);
        }
        $fazendas = [];
        $logos = [];
        foreach ($reserva->lotes as $lote) {
            if (!in_array($lote->fazenda_id, $fazendas)) {
                $fazendas[] = $lote->fazenda_id;
                $logos[] = $lote->fazenda->logo;
            }
        }
        $fazendas = Fazenda::whereIn("id", $fazendas)->get();
        $finalizadas = "";
        $agent = new Agent();
        if ($agent->isMobile()) {
            $view = "mobile";
            // $view = "index";
        } else {
            $view = "desktop";
        }
        return view("fazenda", ["view" => $view, "fazenda" => $fazenda, "fazendas" => $fazendas, "reserva" => $reserva, "finalizadas" => $finalizadas, "nome_pagina" => "Conheça"]);
    }

    public function embrioes($slug, Reserva $reserva)
    {
        $fazenda = Fazenda::where("slug", $slug)->first();
        // $reserva = $fazenda->reservas->where("ativo", 1)->first();
        if (!$reserva->institucional) {
            if (!session()->get("popup_institucional")) {
                $popup_institucional = true;
                session(["popup_institucional" => true]);
            } else {
                $popup_institucional = false;
            }
        } else {
            $popup_institucional = false;
        }
        $fazendas = $reserva->embrioes->unique("fazenda_id")->pluck("fazenda_id");
        $embrioes = $reserva->embrioes;
        return view("embrioes", ["fazenda" => $fazenda, "fazendas" => $fazendas, "reserva" => $reserva, "popup_institucional" => $popup_institucional, "embrioes" => $embrioes, "nome_pagina" => "Embriões"]);
    }

    public function lotes($slug, Reserva $reserva)
    {
        $fazenda = $reserva->fazenda;
        return view("lotes", ["fazenda" => $fazenda, "reserva" => $reserva, "nome_pagina" => "Lotes"]);
    }

    public function pesquisa(Request $request)
    {
        $pesquisa = $request->pesquisa;
        return view("pesquisa", ["pesquisa" => $pesquisa]);
    }

    public function raca($slug)
    {
        $raca = Raca::where("slug", $slug)->first();
        return view("raca", ["raca" => $raca]);
    }

    public function reservas_abertas()
    {
        return view("reservas_abertas");
    }

    public function navegue_por_racas()
    {
        return view("navegue_por_racas");
    }

    public function lote($slug, Reserva $reserva = null, Lote $lote)
    {
        /*if (!session()->get("cliente")) {
            session()->flash("erro", "Para acessar os lotes, faça seu login.");
            session()->put(["pagina_retorno" => url()->full()]);
            session()->put(["lote_origem" => $lote->id]);
            return redirect()->route("login");
        }*/

        if (!$reserva) {
            $reserva = $lote->reserva;
        }

        $visita = new Visita;

        if (session()->get("cliente")) {
            $visita->cliente_id = session()->get("cliente")["id"];
            $visita->logado = true;
        }

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $estado = null;
        $cidade = null;
        $cep = null;

        $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip));

        if ($query && $query["status"] == "success") {
            $estado = $query["region"];
            $cidade = $query["city"];
            $cep = $query["zip"];
        }

        if ((isset(session()->get("cliente")["admin"]) && session()->get("cliente")["admin"] != true)) {
            $visita->ip = $ip;
            $visita->lote_id = $lote->id;
            $visita->estado = $estado;
            $visita->cidade = $cidade;
            $visita->cep = $cep;

            $visita->save();

            $lote->visitas += 1;
            $lote->save();

            if (session()->get("cliente")) {
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

        // $lote->video = $this->convertYoutube($lote->video);
        // $fazenda = Fazenda::where("slug", $slug)->first();
        return view("lote2", ["lote" => $lote, "nome_pagina" =>  "Lote: " . $lote->numero . $lote->letra . " - " . $lote->nome]);
    }

    public function embriao($slug, Reserva $reserva, Embriao $embriao)
    {
        if (!session()->get("cliente")) {
            session()->flash("erro", "Para acessar os lotes, faça seu login.");
            session()->put(["pagina_retorno" => url()->full()]);
            session()->put(["lote_origem" => $embriao->id]);
            return redirect()->route("login");
        }
        $visita = new Visita;
        $configuracao = Configuracao::first();

        if (session()->get("cliente")) {
            $visita->cliente_id = session()->get("cliente")["id"];
            $visita->logado = true;
        }

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $estado = null;
        $cidade = null;
        $cep = null;

        $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip));

        if ($query && $query["status"] == "success") {
            $estado = $query["region"];
            $cidade = $query["city"];
            $cep = $query["zip"];
        }

        if ((isset(session()->get("cliente")["admin"]) && session()->get("cliente")["admin"] != true)) {
            $visita->ip = $ip;
            $visita->embriao_id = $embriao->id;
            $visita->estado = $estado;
            $visita->cidade = $cidade;
            $visita->cep = $cep;

            $visita->save();

            $embriao->visitas += 1;
            $embriao->save();

            if (session()->get("cliente")) {
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

    public function lance(Request $request, Lote $lote)
    {

        $lance = Lance::where([["lote_id", $lote->id], ["valor", ">", $request->valor]])->first();
        if ($lance) {
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

    public function maior_lance(Lote $lote)
    {
        $lance = Lance::where("lote_id", $lote->id)->orderBy("valor", "DESC")->first();
        if (!$lance) {
            return response()->json("erro");
        }
        $res = [];
        $res["id"] = $lance->id;
        $res["nome"] = $lance->cliente->nome_dono;
        $res["valor"] = $lance->valor;
        return response()->json($res);
    }

    public function login()
    {
        if (session()->get("cliente")) {
            return redirect()->route("index");
        }
        session()->flash("nome_pagina", "Login");
        return view('login', ["nome_pagina" => "Login"]);
    }

    public function logar(Request $request)
    {
        $usuario = Cliente::where("email", $request->email)->first();
        if ($usuario) {
            if (Hash::check($request->senha, $usuario->senha)) {
                $usuario->ultimo_acesso = date('Y-m-d');
                $usuario->save();
                Cookie::queue('cliente', $usuario->id, 518400);
                session(["cliente" => $usuario->toArray()]);

                $carrinho = Carrinho::where([["cliente_id", $usuario->id], ["aberto", true]])->first();
                if ($carrinho) {
                    session()->put(["carrinho" => true]);
                }

                if (!$usuario->finalizado) {
                    return redirect()->route('cadastro');
                }

                if (session()->get("pagina_retorno") && session()->get("pagina_retorno") != route("login")) {
                    $pagina = session()->get("pagina_retorno");
                    session()->forget("pagina_retorno");
                    return redirect($pagina);
                } else {
                    return redirect(url()->previous());
                }
            } else {
                session()->flash("erro", "Usuário ou senha incorretos");
                return redirect()->back()->withInput($request->except('senha'));
            }
        } else {
            session()->flash("erro", "Usuário ou senha incorretos");
            return redirect()->back()->withInput($request->except('senha'));
        }
    }

    public function contato()
    {
        return view("contato");
    }

    public function sobre()
    {
        return view("sobre");
    }

    public function reservas_finalizadas()
    {
        return view("finalizadas");
    }

    public function conheca_finalizadas(Reserva $reserva, $slug)
    {
        if (!$reserva->institucional) {
            return redirect()->route("fazenda.lotes", ["fazenda" => $reserva->fazenda]);
        }
        $fazenda = Fazenda::where("slug", $slug)->first();
        $fazenda->video_conheca = $this->convertYoutube($fazenda->video_conheca);
        $fazenda->video_conheca_lotes = $this->convertYoutube($fazenda->video_conheca_lotes);
        foreach ($fazenda->depoimentos as $depoimento) {
            $depoimento->video = $this->convertYoutube($depoimento->video);
        }
        $fazendas = [];
        $logos = [];
        if ($reserva->multi_fazendas) {
            foreach ($reserva->lotes as $lote) {
                if (!in_array($lote->fazenda_id, $fazendas)) {
                    $fazendas[] = $lote->fazenda_id;
                    $logos[] = $lote->fazenda->logo;
                }
            }
        }
        $fazendas = Fazenda::whereIn("id", $fazendas)->get();
        return view("finalizadas.fazenda", ["fazenda" => $fazenda, "fazendas" => $fazendas, "reserva" => $reserva]);
    }

    public function lotes_finalizadas(Reserva $reserva, $slug)
    {
        $fazenda = $reserva->fazenda;
        $lotes = $reserva->lotes->where('ativo', true)->where('membro_pacote', false);
        $prioridades = $lotes->where("prioridade", true)->sortBy("numero");
        $lotes = $lotes->where("prioridade", false)->sortBy("numero");
        $lotes = $prioridades->merge($lotes);
        session()->flash("nome_pagina", "Lotes");
        return view("lotes", ["fazenda" => $fazenda, "reserva" => $reserva, "finalizadas" => true, "prioridades" => $prioridades, "lotes" => $lotes, "lotes_bkp" => $lotes]);
    }

    public function lote_finalizadas(Reserva $reserva, $slug, Lote $lote)
    {
        if (!session()->get("cliente")) {
            session()->flash("erro", "Para acessar os lotes, faça seu login.");
            session()->put(["pagina_retorno" => url()->full()]);
            return redirect()->route("login");
        }
        $visita = new Visita;

        if (session()->get("cliente")) {
            $visita->cliente_id = session()->get("cliente")["id"];
            $visita->logado = true;
        }

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $estado = null;
        $cidade = null;
        $cep = null;

        $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip));

        if ($query && $query["status"] == "success") {
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

    public function convertYoutube($string)
    {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe width=\"350\" height=\"200\" src=\"//www.youtube.com/embed/$2\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>",
            $string
        );
    }

    public function redirect_fazenda($slug, Lote $lote = null)
    {
        $fazenda = Fazenda::where("slug", $slug)->first();
        if (!$fazenda) {
            return redirect()->route('index');
        }
        $reserva = $fazenda->reservas->where("ativo", 1)->first();
        if (url()->current() == route('fazenda.conheca.antigo', ['fazenda' => $slug]) || url()->current() == route('fazenda.conheca.lotes.antigo', ['fazenda' => $slug]) || url()->current() == route('fazenda.conheca.depoimentos.antigo', ['fazenda' => $slug]) || url()->current() == route('fazenda.conheca.avaliacoes.antigo', ['fazenda' => $slug])) {
            return redirect()->route("fazenda.conheca", ["fazenda" => $slug, "reserva" => $reserva]);
        }
        if (url()->current() == route('fazenda.lotes.antigo', ['fazenda' => $slug])) {
            return redirect()->route("fazenda.lotes", ["fazenda" => $slug, "reserva" => $reserva]);
        }
        if (url()->current() == route('fazenda.conheca.antigo', ['fazenda' => $slug])) {
            return redirect()->route("fazenda.conheca", ["fazenda" => $slug, "reserva" => $reserva]);
        }
        if (url()->current() == route('fazenda.lote.antigo', ['fazenda' => $slug, 'lote' => $lote])) {
            return redirect()->route("fazenda.lote", ["fazenda" => $slug, "reserva" => $reserva, "lote" => $lote]);
        }
    }

    public function experiencia_ouro_branco()
    {
        return view("experiencias.ouro-branco");
    }
}
