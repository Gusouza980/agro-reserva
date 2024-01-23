<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Boleto;
use App\Models\Venda;
use App\Models\Carrinho;
use App\Models\Reserva;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Classes\Email;
use Illuminate\Support\Str;
use PDF;
use Illuminate\Support\Facades\Log;

class ContaController extends Controller
{
    //
    public function index(){
        if(session()->get("cliente")){
            $cliente = Cliente::find(session()->get("cliente")["id"]);
            return view("cliente.index2", ["cliente" => $cliente]);
        }else{
            return redirect()->route("index");
        }
    }

    public function compra(Venda $venda){
        if($venda->cliente_id != session()->get("cliente")["id"]){
            return redirect()->route("index");
        }else{
            return view("cliente.compra", ["venda" => $venda]);
        }
    }

    public function teste(){
        $file = file_get_contents('templates/emails/confirmar-compra.html');
        if(Email::enviar($file, "Confirmação de Compra", "gusouza980@gmail.com")){
            echo "deu bom";
        }else{
            echo "deu ruim";
        } 
    }

    public function alterar_senha(Request $request){
        $cliente = Cliente::find(session()->get("cliente")["id"]);
        if(Hash::check($request->senha_antiga, $cliente->senha)){
            $cliente->senha = Hash::make($request->senha_nova);
            $cliente->save();
            toastr()->success("Senha atualizada !");
        }else{
            toastr()->error("A senha informada está incorreta");
        }

        return redirect()->back();
    }

    public function recuperar_senha(Request $request){
        $cliente = Cliente::where("email", $request->email)->first();
        if(!$cliente){
            session()->flash("erro", "Não existe uma conta com o e-mail informado");
            return redirect()->back();
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
                return redirect()->route("login");
            }else{
                session()->flash("erro", "Não foi possível enviar um e-mail com sua nova senha temporária no momento. Por favor, tente mais tarde.");
                return redirect()->back();
            } 
        }
    }
    
    public function baixar_boleto(Boleto $boleto){
        return Storage::download($boleto->caminho, $boleto->descricao . " " . date("d-m-Y", strtotime($boleto->validade)) . ".pdf");
    }

    public function reserva(Venda $venda){
        return view("cliente.reserva", ["venda" => $venda]);
    }

    public function comprovante_reserva(Venda $venda){
        $fazendas = [];
        foreach($venda->carrinho->produtos as $produto){
            $fazendas[$produto->produtable->fazenda_id][] = $produto;
        }
        $data = ["venda" => $venda, "fazendas" => $fazendas];
        // $cliente = $venda->cliente;
        // if($venda->getRelationValue("parcelas")->count() == 0){
        //     $pdf = PDF::loadView('cliente.comprovante2', $data);
        // }else{
            $pdf = PDF::loadView('cliente.comprovante3', $data);
        // }
        return $pdf->stream();
    }

    public function relatorio_vendas(Reserva $reserva){
        $carrinhos = Carrinho::whereHas("lotes", function($q) use ($reserva){
            $q->whereIn("lotes.id", $reserva->lotes->pluck("id"));
        })->get();
        $vendas = Venda::whereIn("carrinho_id", $carrinhos->pluck("id"))->with("cliente")->get()->sortBy("cliente.nome_dono");
        // dd($vendas);
        $data = [
            "reserva" => $reserva,
            "vendas" => $vendas
        ];
        $pdf = PDF::loadView('cliente.relatorios.vendas2', $data);
        return $pdf->stream();
    }
}
