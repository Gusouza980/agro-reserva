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
        $fazendas = Fazenda::where("ativo", true)->get();
        return view("index", ["fazendas" => $fazendas]);
    }

    public function conheca($slug){
        $fazenda = Fazenda::where("slug", $slug)->first();
        return view("fazenda", ["fazenda" => $fazenda]);
    }

    public function lotes($slug){
        $fazenda = Fazenda::where("slug", $slug)->first();
        return view("lotes", ["fazenda" => $fazenda]);
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
    }
}
