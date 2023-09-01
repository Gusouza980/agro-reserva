<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Lote;
use App\Models\InteresseLote;
use App\Models\CurtidaLote;
use App\Models\Venda;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Classes\Email;
use Illuminate\Support\Str;
use PDF;
use Illuminate\Support\Facades\Log;
use \App\Classes\Util;

class ApiController extends Controller
{
    //

    public function getCidadesByUf($uf){
        $cidades = Cidade::where("id_estado", $uf)->get();
        return response()->json($cidades->toJson());   
    }

    public function calcDistanciaCep(Request $request){
        $res = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $request->origem . "&destinations=" . $request->destino . "&mode=driving&language=pt-BR&sensor=false&key=AIzaSyCDJEB7uVGEkVU0Utm3p9kOeCnastPy01o");
        return response()->json($res);
    }

    public function declararInteresseLote(Lote $lote){
        $interesse = InteresseLote::where([["cliente_id", session()->get("cliente")["id"]], ["lote_id", $lote->id]])->first();
        if($interesse){
            $interesse->delete();
            return response()->json("retirado");
        }else{
            $interesse = new InteresseLote;
            $interesse->cliente_id = session()->get("cliente")["id"];
            $interesse->lote_id = $lote->id;
            $interesse->save();
            return response()->json("adicionado");
        }
    }

    public function curtirLote(Lote $lote){
        $curtida = CurtidaLote::where([["cliente_id", session()->get("cliente")["id"]], ["lote_id", $lote->id]])->first();
        if($curtida){
            if($curtida->curtiu == true){
                $curtida->delete();
                return response()->json("retirado");
            }else{
                $curtida->curtiu = true;
                $curtida->save();
                return response()->json("trocado");
            }
        }else{
            $curtida = new CurtidaLote;
            $curtida->cliente_id = session()->get("cliente")["id"];
            $curtida->lote_id = $lote->id;
            $curtida->curtiu = true;
            $curtida->save();
            return response()->json("marcado");
        }
    }

    public function descurtirLote(Lote $lote){
        $curtida = CurtidaLote::where([["cliente_id", session()->get("cliente")["id"]], ["lote_id", $lote->id]])->first();
        if($curtida){
            if($curtida->curtiu == false){
                $curtida->delete();
                return response()->json("retirado");
            }else{
                $curtida->curtiu = false;
                $curtida->save();
                return response()->json("trocado");
            }
        }else{
            $curtida = new CurtidaLote;
            $curtida->cliente_id = session()->get("cliente")["id"];
            $curtida->lote_id = $lote->id;
            $curtida->curtiu = false;
            $curtida->save();
            return response()->json("marcado");
        }
    }

    public function trocaStatusVenda(Venda $venda, $status){
        $venda->situacao = $status;
        if(config("globals.situacoes")[$venda->situacao] == "Cancelado"){
            $venda->lote->reservado = false;
            $venda->lote->save();
        }
        $venda->save();
        return response()->json($status);
    }

    public function recuperar_senha(Request $request){
        $cliente = Cliente::where("email", $request->email)->first();
        if(!$cliente){
            session()->flash("erro", "Não existe uma conta com o e-mail informado");
            return response()->json(["codigo" => 0, "mensagem" => "Não existe uma conta com o e-mail informado"]);
        }else{
            $nova_senha = Str::random(6);
            $cliente->senha = Hash::make($nova_senha);
            $cliente->save();
            $file = "Olá <b>" . $cliente->nome . "</b><br>";
            $file .= "Estamos enviando uma senha para que consiga acessar nosso sistema !<br>";
            $file .= "Caso deseje, você poderá alterá-la facilmente acessando o seu painel de cliente e clicando no botão 'Alterar Senha'. Após isso, basta informar a senha recebida no email no campo 'Senha Antiga' e a senha desejada no campo 'Nova Senha'.<br>";
            $file .= "Se tiver mais dúvidas, nossos consultores estão sempre disponíveis !";
            $file .= "<br><br>Nova Senha: " . $nova_senha;
            if(Email::enviar($file, "Nova senha", $cliente->email)){
                session()->flash("sucesso", "Uma senha temporária foi enviada para o e-mail informado no seu cadastro.");
                return response()->json(["codigo" => 200]);
            }else{
                session()->flash("erro", "Não foi possível enviar um e-mail com sua nova senha temporária no momento. Por favor, tente mais tarde.");
                return response()->json(["codigo" => 1, "mensagem" => "Não foi possível enviar um e-mail com sua nova senha temporária no momento. Por favor, tente mais tarde."]);
            } 
        }
    }

    public function cadastrar(Request $request){
        $cliente = Cliente::where("email", $request->email)->first();

        if($cliente){
            session()->flash("erro_email", "O email informado já está sendo utilizado.");
            return response()->json(["codigo" => 0, "mensagem" => "E-mail informado já está sendo utilizado."]);
        }

        $cliente = new Cliente;
        $cliente->email = $request->email;
        $cliente->nome_dono = $request->nome;
        $cliente->telefone = $request->telefone;
        $cliente->senha = Hash::make($request->senha);

        if($request->segmento){
            $cliente->segmentos = implode(",", $request->segmento);
        }

        $cliente->finalizado = false;
        $cliente->save();

        $rdStation = new \RDStation\RDStation($cliente->email);
        $rdStation->setApiToken('ff3c1145b001a01c18bfa3028660b6c6');
        $rdStation->setLeadData('name', $cliente->nome_dono);
        $rdStation->setLeadData('identifier', 'precadastro');
        $rdStation->setLeadData('telefone', $cliente->telefone);
        $rdStation->setLeadData('cadastro-finalizado', "Não");
        $rdStation->sendLead();

        $file = file_get_contents('templates/emails/confirma-cadastro/confirma-cadastro.html');
        $file = str_replace("{{nome}}", $cliente->nome_dono, $file);
        $file = str_replace("{{usuario}}", $cliente->email, $file);
        $file = str_replace("{{senha}}", $request->senha, $file);
        Email::enviar($file, "Confirmação de Cadastro", $cliente->email, false);

        return response()->json(["codigo" => 200]);
    }

    public function cadastro_final(Request $request){

        if($request->pessoa_fisica == "1"){
            $cliente = Cliente::where("cpf", $request->cpf)->orWhere("documento", $request->cpf)->first();
            if($cliente){
                session()->flash("erro_email", "O cpf informado já está sendo utilizado.");
                return response()->json(["codigo" => 0, "mensagem" => "O CPF informado já está sendo utilizado."]);
            }
        }else{
            $cliente = Cliente::where("cnpj", $request->cnpj)->orWhere("documento", $request->cnpj)->first();
            if($cliente){
                session()->flash("erro_email", "O cnpj informado já está sendo utilizado.");
                return response()->json(["codigo" => 0, "mensagem" => "O CNPJ informado já está sendo utilizado."]);
            }
        }

        $cliente = Cliente::find($request->cliente_id);

        $cliente->nome_fazenda = $request->nome_fazenda;
        $cliente->rg = $request->rg;
        if($request->pessoa_fisica == "1"){
            $cliente->pessoa_fisica = true;
            $cliente->cpf = $request->cpf;
            $cliente->documento = $request->cpf;
            $cliente->nascimento = Util::convertDateToString($request->nascimento);
        }else{
            $cliente->pessoa_fisica = false;
            $cliente->cnpj = $request->cnpj;
            $cliente->documento = $request->cnpj;
        }

        $cliente->inscricao_produtor_rural = $request->inscricao_produtor_rural;
        $cliente->cep = $request->cep;
        $cliente->rua = $request->rua;
        $cliente->numero = $request->numero;
        $cliente->complemento = $request->complemento;
        $cliente->cidade = $request->cidade;
        $cliente->estado = $request->estado;
        $cliente->bairro = $request->bairro;
        $cliente->pais = $request->pais;
        $cliente->referencia_bancaria_banco = $request->referencia_bancaria_banco;
        $cliente->referencia_bancaria_gerente = $request->referencia_bancaria_gerente;
        $cliente->referencia_bancaria_tel = $request->referencia_bancaria_tel;
        $cliente->referencia_comercial1 = $request->referencia_comercial1;
        $cliente->referencia_comercial1_tel = $request->referencia_comercial1_tel;
        $cliente->referencia_comercial2 = $request->referencia_comercial2;
        $cliente->referencia_comercial2_tel = $request->referencia_comercial2_tel;
        $cliente->finalizado = true;
        
        $cliente->save();
        
        return response()->json(["codigo" => 200]);

    }

    public function logar_test(Request $request){
        $usuario = DB::connection("mysql2")->table("clientes")->select("*")->where("email", $request->email)->first();
        if($usuario){
            if(Hash::check($request->senha, $usuario->senha)){
                $usuario->ultimo_acesso = date('Y-m-d');
                $usuario->save();
                return response()->json(["codigo" => 200]);
            }else{
                return response()->json(["codigo" => 0, "mensagem" => "Senha incorreta"]);
            }
        }else{
            return response()->json(["codigo" => 1, "mensagem" => "E-mail incorreto"]);
        }  
    }

    public function logar(Request $request){
        $usuario = Cliente::where("email", $request->email)->first();
        if($usuario){
            if(Hash::check($request->senha, $usuario->senha)){
                $usuario->ultimo_acesso = date('Y-m-d');
                $usuario->save();
                return response()->json(["codigo" => 200]);
            }else{
                return response()->json(["codigo" => 0, "mensagem" => "Senha incorreta"]);
            }
        }else{
            return response()->json(["codigo" => 1, "mensagem" => "E-mail incorreto"]);
        }      
    }
}
