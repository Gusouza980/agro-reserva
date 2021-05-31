<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\ClienteRaca;

class ClienteController extends Controller
{
    //

    public function index(){
        $clientes = Cliente::all();
        return view("painel.clientes.consultar", ["clientes" => $clientes]);
    }

    public function cadastro_inicial(Request $request){
        $request->validate([
            'email' => 'required|min:3|max:100',
            'senha' => 'required|min:5|max:15'
        ]);

        $cliente = Cliente::where("email", $request->email)->first();

        if($cliente){
            toastr()->error("Já existe um cliente cadastrado com esse e-mail.");
            return redirect()->back();
        }

        if($request->senha != $request->senha2){
            toastr()->error("As senhas não coincidem.");
            return redirect()->back();
        }

        $cliente = new Cliente;
        $cliente->email = $request->email;
        $cliente->senha = Hash::make($request->senha);
        $cliente->telefone = $request->telefone;
        $cliente->save();

        session()->put(["cliente" => $cliente->toArray()]);

        return redirect()->route("cadastro.passos");
    
    }

    public function cadastro_final(Request $request){

        $request->validate([
            'nome' => 'required|min:2|max:100',
            'fazenda' => 'required|min:2|max:200',
            'cpf' => 'required|min:11|max:14',
            'cnpj' => 'required|min:14|max:18',
            'cep' => 'required|min:8|max:9',
            'cidade' => 'required|max:15',
            'bairro' => 'required|min:3|max:60',
            'numero' => 'required|min:1|max:10',
            'complemento' => 'max:50',
            'endereco' => 'required|min:3|max:100',
            'whatsapp' => 'required|min:10|max:14',
        ]);

        $cliente = Cliente::find(session()->get("cliente")["id"]);

        $cliente->nome_dono = $request->nome;
        $cliente->nome_fazenda = $request->fazenda;
        $cliente->cnpj = $request->cnpj;
        $cliente->cpf = $request->cpf;
        $cliente->cep = $request->cep;
        $cliente->cidade = $request->cidade;
        $cliente->interesses = $request->interesses;
        $cliente->racas = $request->racas;
        $cliente->estado = $request->estado;
        $cliente->bairro = $request->bairro;
        $cliente->numero = $request->numero;
        $cliente->complemento = $request->complemento;
        $cliente->rua = $request->endereco;
        $cliente->whatsapp = $request->whatsapp;
        $cliente->finalizado = true;
        
        $cliente->save();

        session()->forget("cliente");
        session(["cliente" => $cliente->toArray()]);

        toastr()->success("Cadastro efetuado com sucesso.");
        return redirect()->route("index");

    }
}
