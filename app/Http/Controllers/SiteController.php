<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fazenda;
use App\Models\Cliente;
use App\Models\Lote;
use App\Models\Visita;
use App\Models\Carrinho;
use Illuminate\Support\Facades\Hash;

class SiteController extends Controller
{

    public function index(){
        // $res = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=37130000&destinations=37143000&mode=driving&language=pt-BR&sensor=false&key=AIzaSyCDJEB7uVGEkVU0Utm3p9kOeCnastPy01o");
        // $res = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=37130000&key=AIzaSyCDJEB7uVGEkVU0Utm3p9kOeCnastPy01o");
        // die($res);
        $fazendas = Fazenda::where("ativo", true)->get();
        return view("index", ["fazendas" => $fazendas]);
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
        return view("fazenda", ["fazenda" => $fazenda]);
    }

    public function lotes($slug){
        $fazenda = Fazenda::where("slug", $slug)->first();
        $cliente = Cliente::find(session()->get("cliente")["id"]);
        return view("lotes", ["fazenda" => $fazenda, "cliente" => $cliente]);
    }

    public function lote($slug, Lote $lote){
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

    public function logar(Request $request){
        $usuario = Cliente::where("email", $request->email)->first();
        if(Hash::check($request->senha, $usuario->senha)){
            session(["cliente" => $usuario->toArray()]);
            $carrinho = Carrinho::where([["cliente_id", $usuario->id], ["aberto", true]])->first();
            if($carrinho){
                session(["carrinho" => $carrinho->id]);
            }
            return redirect()->route("index");
        }
        session()->flash("erro", "Usuário ou senha incorretos");
        return redirect()->back();
    }

    public function contato(){
        return view("contato");
    }
}
