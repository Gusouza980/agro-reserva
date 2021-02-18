<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\ClienteRaca;

class ClienteController extends Controller
{
    //

    public function cadastro_inicial(Request $request){
        if($request->senha != $request->senha2){
            toastr()->error("As senhas não coincidem.");
            return redirect()->back();
        }

        $cliente = new Cliente;
        $cliente->email = $request->email;
        $cliente->senha = Hash::make($request->senha);
        $cliente->save();

        session()->put(["cliente" => $cliente->id]);

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
        $cliente = Cliente::find(session()->get("cliente"));
        $cliente->nome_dono = $request->nome;
        $cliente->nome_fazenda = $request->fazenda;
        $cliente->cnpj = $request->cnpj;
        $cliente->cep = $request->cep;
        $cliente->cidade = $request->cidade;
        $cliente->estado = $request->estado;
        $cliente->bairro = $request->bairro;
        $cliente->numero = $request->numero;
        $cliente->complemento = $request->complemento;
        $cliente->rua = $request->endereco;
        $cliente->telefone = $request->telefone;
        $cliente->whatsapp = $request->whatsapp;
        $cliente->interesses = $request->interesses;
        $cliente->finalizado = true;
        $cliente->save();
        $racas = explode(",", $request->racas);
        foreach($racas as $raca){
            if($raca){
                $cliente_raca = new ClienteRaca;
                $cliente_raca->cliente_id = $cliente->id;
                $cliente_raca->raca_id = $raca;
                $cliente_raca->save();
            }
        }

        return redirect()->route("index");
    
    }
}
