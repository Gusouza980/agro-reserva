<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fazenda;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Lote;
use App\Models\Visita;
use App\Models\Carrinho;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Cookie;

class SiteController extends Controller
{

    public function testes(){
        $rdStation = new \RDStation\RDStation('gusouza980@gmail.com');
        $rdStation->setApiToken('ff3c1145b001a01c18bfa3028660b6c6');
        $rdStation->setLeadData('identifier', 'interesse-lote');
        $rdStation->setLeadData('lote', '20 - Mimosa');
        $res = $rdStation->sendLead();
        dd($res);
    }

    public function index(){
        // dd($cliente->toArray());
        if(Cookie::get('cliente')){
            $usuario = Cliente::find(Cookie::get('cliente'));
            $usuario->ultimo_acesso = date('Y-m-d');
            $usuario->save();
            // $cookie = Cookie::forever('cliente', $usuario->id);
            session(["cliente" => $usuario->toArray()]);
            
            $carrinho = Carrinho::where([["cliente_id", $usuario->id], ["aberto", true]])->first();
            if($carrinho){
                session(["carrinho" => $carrinho->id]);
            }
        }
        $reservas = Reserva::where("ativo", true)->orderBy("inicio", "ASC")->get();
        return view("index", ["reservas" => $reservas]);
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
        return view("fazenda", ["fazenda" => $fazenda, "logos" => $logos, "reserva" => $reserva]);
    }

    public function lotes($slug){
        $fazenda = Fazenda::where("slug", $slug)->first();
        if(!session()->get("cliente")){
            session()->put(["pagina_retorno" => url()->full()]);
            session()->flash("erro", "Para acessar os lotes, faça seu login.");
            return redirect()->route("login");
        }
        $reserva = $fazenda->reservas->where("ativo", 1)->first();
        return view("lotes", ["fazenda" => $fazenda, "reserva" => $reserva]);
    }

    public function lote($slug, Lote $lote){
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

        $rdStation = new \RDStation\RDStation(session()->get("cliente")["email"]);
        $rdStation->setApiToken('ff3c1145b001a01c18bfa3028660b6c6');
        $rdStation->setLeadData('name', session()->get("cliente")["nome_dono"]);
        $rdStation->setLeadData('identifier', 'interesse-lote');
        $rdStation->setLeadData('numero-lote', "" . $lote->numero . $lote->letra);
        $rdStation->setLeadData('nome-lote', $lote->nome);
        $rdStation->setLeadData('fazenda-lote', $lote->fazenda->nome_fazenda);
        $rdStation->sendLead();

        $lote->video = $this->convertYoutube($lote->video);

        $fazenda = Fazenda::where("slug", $slug)->first();
        return view("lote", ["lote" => $lote, "fazenda" => $fazenda]);
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
        return view('login');
    }

    public function logar(Request $request){
        $usuario = Cliente::where("email", $request->email)->first();
        if($usuario){
            if(Hash::check($request->senha, $usuario->senha)){
                $usuario->ultimo_acesso = date('Y-m-d');
                $usuario->save();
                $cookie = Cookie::forever('cliente', $usuario->id);
                session(["cliente" => $usuario->toArray()]);
                
                $carrinho = Carrinho::where([["cliente_id", $usuario->id], ["aberto", true]])->first();
                if($carrinho){
                    session(["carrinho" => $carrinho->id]);
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

    public function convertYoutube($string) {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe width=\"350\" height=\"200\" src=\"//www.youtube.com/embed/$2\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>",
            $string
        );
    }
}
