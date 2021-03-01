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
        $request->validate([
            'email' => 'required|min:3|max:100',
            'senha' => 'required|min:5|max:15'
        ]);

        $cliente = Cliente::where("email", $request->email)->get();

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
        $cliente->senha = $request->senha;
        $cliente->save();

        session()->put(["cliente" => $cliente->id]);

        return redirect()->route("cadastro.passos");
    
    }

    public function cadastro_final(Request $request){

        include_once(app_path() . '/Apis/_functions.php');

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
            'telefone' => 'required|min:10|max:14',
            'whatsapp' => 'required|min:10|max:14',
        ]);

        $cliente = Cliente::find(session()->get("cliente"));

        $url = 'https://api.bscommerce.com.br/cadastro/';

        /* array de dados - lista carrinho completo */
        $data =  array(
            "token" => $tokenapi,
            "ope"   => "setCliente",
            "nome" => $request->nome, // varchar(2) a varchar(100), obrigatorio
            "email" => $cliente->email, // varchar(3) a varchar(100), obrigatorio
            "cpf" => $request->cpf, // varchar(11) a varchar(14), se formatado, obrigatorio 999.999.999-99
            "sexo" => $request->sexo, // 1 = masculino, 0 = feminino, obrigatorio
            "cidade" => $request->cidade, // numerico inteiro, vem da função da API getCidades
            "endereco" => $request->endereco, // varchar(3) a varchar(100), obrigatorio
            "numero" => $request->numero, // varchar(1) a varchar(10), opcional
            "complemento" => ($request->complemento) ? $request->complemento : '' , // varchar(3) a varchar(50), opcional
            "cep" => $request->cep, // varchar(8) a varchar(9), se formatado, obrigatorio 99999-999
            "bairro" => $request->bairro, // varchar(3) a varchar(60), obrigatorio
            "telefone" => $request->telefone, // varchar(10) a varchar(14), se formatado, opcional (99)99999-9999
            "celular" => $request->whatsapp, // varchar(10) a varchar(14), se formatado, opcional (99)99999-9999
            "senha" => $cliente->senha // varchar(5) a varchar(15), obrigatorio (recomendo confirmação)
        );


        /* envia dados e recebe retorno */
        $retorno = callAPI($url, $data);

        /* converte json em array (opcional) */
        $dados_cliente = json_decode($retorno);

        if(!$dados_cliente){
            toastr()->error("Erro ao efetuar cadastro. Tente mais tarde.");
            return redirect()->back();
        }

        $data =  array(
            "token" => $tokenapi,
            "ope"   => "setEmpresa",
            "cliente" => $dados_cliente[0]->ID_Cliente, // numerico inteiro, vem da função da API getClientes
            "nome" => $request->fazenda, // varchar(2) a varchar(200), obrigatorio
            "fantasia" => $request->fazenda, // varchar(2) a varchar(200), obrigatorio
            "email" => $cliente->email, // varchar(3) a varchar(100), obrigatorio
            "cnpj" => $request->cnpj, // varchar(14) a varchar(18), se formatado, obrigatorio 999.999.999-99
            "telefone" => $request->telefone, // varchar(10) a varchar(14), se formatado, obrigatorio (99)99999-9999
            "cidade" => $request->cidade, // numerico inteiro, vem da função da API getCidades
            "endereco" => $request->endereco, // varchar(3) a varchar(100), obrigatorio
            "numero" => $request->numero, // varchar(1) a varchar(10), opcional
            "complemento" => $request->complemento, // varchar(3) a varchar(50), opcional
            "cep" => $request->cep, // varchar(8) a varchar(9), se formatado, obrigatorio 99999-999
            "bairro" => $request->bairro, // varchar(3) a varchar(60), obrigatorio
            "status" => 1 // 1 = validada, 0 = necessita validar pela administração, obrigatorio
        );

        
        
        /* envia dados e recebe retorno */
        $retorno = callAPI($url, $data);
        
        /* converte json em array (opcional) */
        $dados = json_decode($retorno);

        if(!$dados){
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
            $cliente->telefone = $request->telefone;
            $cliente->whatsapp = $request->whatsapp;
            $cliente->finalizado = true;

            $cliente->save();

            toastr()->error("Erro ao efetuar cadastro. Tente mais tarde.");
            return redirect()->back();
        }else{
            session()->put(["userid" => $dados_cliente[0]->ID_Cliente]);
        }



        return redirect()->route("index");
    
    }
}
