<?php

namespace App\Http\Livewire\Institucional\Cadastro;

use Livewire\Component;
use App\Models\Cliente;
use App\Classes\Agrisk\Apiary\ApiaryClientes;
use Illuminate\Support\Facades\Log;

class TermosAgrisk extends Component
{
    public $show = false;
    public $cliente;
    public $terms = "";
    public $questoes;
    public $respostas = [];
    public $reprovado = false;
    protected $listeners = ["showTermosAgrisk"];

    public function showTermosAgrisk(){
        $this->cliente = Cliente::find(session()->get("cliente")["id"]);
        $api = new ApiaryClientes;
        if($api->isAuthenticated()){
            if(!$this->cliente->agriskTermosToken){
                $detalhes = $api->clientDetail($this->cliente->agriskId);
                $this->cliente->agriskTermosToken = $api->createTerms($detalhes->id, $detalhes->name, $detalhes->taxId, null);
                $this->cliente->save();
            }
            if($this->cliente->agriskTermosToken){
                $terms = $api->termsDetail($this->cliente->agriskTermosToken);
                if(isset($terms->message) && $terms->message == 'No attempts left'){
                    session()->flash("erro", "Você não possui mais tentativas. Por favor, entre em contato com o time comercial.");
                }else{
                    $this->terms = str_replace("Empresa acima", "Empresa <b>" . $terms->companyName . "</b>", $terms->term);
                    $this->questoes = $terms->questions;
                }
            }else{
                Log::channel('agrisk')->emergency('Erro ao recuperar o token referente aos termos do cliente <b>' . $this->cliente->nome . "</b>");
                session()->flash("erro", "Desculpe. Ainda não conseguimos gerar os termos de compromisso para a sua análise de crédito. Por favor, tente novamente em alguns minutos.");
            }
        }else{
            Log::channel('agrisk')->emergency('Erro de autenticação a API Agrisk durante o cadastro do cliente <b>' . $this->cliente->nome_dono . "</b>");
            session()->flash("erro", "Desculpe, estamos com um problema em nosso sistema. Tente novamente mais tarde, ou entre em contato com nosso time comercial.");
        }
        $this->show = true;
    }

    public function aceitarTermos(){
        $this->cliente->agriskTermosAceito = true;
        $this->cliente->save();
    }

    public function enviarRespostas(){
        $respostas = [];
        foreach($this->respostas as $id => $valor){
            $respostas[] = [
                "id" => $id,
                "answer" => $valor
            ];
        }
        $api = new ApiaryClientes;
        if($api->isAuthenticated()){
            $resultado = $api->sendAnswers($this->cliente->agriskTermosToken, $respostas);
            if($resultado->message == "approved"){

            }else{
                $this->reprovado = true;
            }
        }else{
            Log::channel('agrisk')->emergency('Erro de autenticação a API Agrisk durante o cadastro do cliente <b>' . $this->cliente->nome_dono . "</b>");
            session()->flash("erro", "Desculpe, estamos com um problema em nosso sistema. Tente novamente mais tarde, ou entre em contato com nosso time comercial.");
        }
    }

    public function voltar(){
        $this->reset();
        $this->emit("showListaEtapas");
    }

    public function render()
    {
        return view('livewire.institucional.cadastro.termos-agrisk');
    }
}
