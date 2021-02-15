<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Fazenda;
use App\Models\FazendaRaca;

class FazendaController extends Controller
{
    //
    public function cadastro_inicial(Request $request){
        if($request->senha != $request->senha2){
            toastr()->error("As senhas não coincidem.");
            return redirect()->back();
        }

        $fazenda = new Fazenda;
        $fazenda->email = $request->email;
        $fazenda->senha = Hash::make($request->senha);
        $fazenda->save();

        session()->put(["fazenda" => $fazenda->id]);

        return redirect()->route("cadastro.passos");
    
    }

    public function cadastro_final(Request $request){
        $request->validate([
            'nome' => 'required|max:100',
            'fazenda' => 'required|max:150',
            'cnpj' => 'required|max:50',
            'cep' => 'required|max:50',
            'cidade' => 'required|max:50',
            'estado' => 'required|max:5',
            'bairro' => 'required|max:50',
            'numero' => 'required|max:6',
            'complemento' => 'max:255',
            'endereco' => 'required|max:255',
            'telefone' => 'required|max:50',
            'whatsapp' => 'required|max:50',
            'interesses' => 'required|max:255',
        ]);
        $fazenda = Fazenda::find(session()->get("fazenda"));
        $fazenda->nome_dono = $request->nome;
        $fazenda->nome_fazenda = $request->fazenda;
        $fazenda->cnpj = $request->cnpj;
        $fazenda->cep = $request->cep;
        $fazenda->cidade = $request->cidade;
        $fazenda->estado = $request->estado;
        $fazenda->bairro = $request->bairro;
        $fazenda->numero = $request->numero;
        $fazenda->complemento = $request->complemento;
        $fazenda->rua = $request->endereco;
        $fazenda->telefone = $request->telefone;
        $fazenda->whatsapp = $request->whatsapp;
        $fazenda->interesses = $request->interesses;
        $fazenda->save();
        $racas = explode(",", $request->racas);
        foreach($racas as $raca){
            if($raca){
                $fazenda_raca = new FazendaRaca;
                $fazenda_raca->fazenda_id = $fazenda->id;
                $fazenda_raca->raca_id = $raca;
                $fazenda_raca->save();
            }
        }

        return redirect()->route("index");
    
    }
}
