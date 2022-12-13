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
    public $erro_codigo = false;
    public $codigo_ativacao;

    public $codigo_dispositivo;
    protected $listeners = ["showTermosAgrisk", "setCodigoDispositivo"];

    public function setCodigoDispositivo($visitorId){
        if(!$this->codigo_dispositivo && !empty($visitorId)){
            $this->codigo_dispositivo = $visitorId;
        }
    }
    public function resetarFormulario(){
        $this->reprovado = false;
        $this->respostas = [];
        $this->showTermosAgrisk();
    }

    public function showTermosAgrisk(){
        $this->dispatchBrowserEvent("carregaCodigoDispositivo");
        $this->cliente = Cliente::find(session()->get("cliente")["id"]);
        if($this->cliente->agriskTermosFinalizado){
            
        }else{
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
                        foreach($terms->questions as $key => $questao){
                            $this->questoes[$key]["id"] = $questao->id;
                            $this->questoes[$key]["questao"] = $questao->question;
                            foreach($questao->answers as $key2 => $alternativa){
                                $valor = new \ArrayIterator($alternativa);
                                $valor = $valor->current();
                                $this->questoes[$key]["alternativas"][$key2] = $valor;
                            }
                        }
                    }
                }else{
                    Log::channel('agrisk')->emergency('Erro ao recuperar o token referente aos termos do cliente <b>' . $this->cliente->nome_dono . "</b>");
                    session()->flash("erro", "Desculpe. Ainda não conseguimos gerar os termos de compromisso para a sua análise de crédito. Por favor, tente novamente em alguns minutos.");
                }
            }else{
                Log::channel('agrisk')->emergency('Erro de autenticação a API Agrisk durante a apresentação dos termos do cliente <b>' . $this->cliente->nome_dono . "</b>", ["response" => $api->getLastError()]);
                session()->flash("erro", "Desculpe, estamos com um problema em nosso sistema. Tente novamente mais tarde, ou entre em contato com nosso time comercial.");
            }
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
            if($resultado->message == "Approved"){
                $response = $api->sendTermsToken($this->cliente);
                if($response){
                    $this->cliente->agriskTermosRespondido = true;
                    $this->cliente->save();
                }else{
                    Log::channel('agrisk')->emergency('Erro no envio do código de verificação Agrisk para o cliente <b>' . $this->cliente->nome_dono . "</b>");
                    $this->erro_codigo = true;
                }
            }else{
                $this->reprovado = true;
            }
        }else{
            Log::channel('agrisk')->emergency('Erro de autenticação a API Agrisk durante o envio de respostas do cliente <b>' . $this->cliente->nome_dono . "</b>", ["response" => $api->getLastError()]);
            session()->flash("erro", "Desculpe, estamos com um problema em nosso sistema. Tente novamente mais tarde, ou entre em contato com nosso time comercial.");
        }
    }

    public function verificarCodigo(){
        if(!$this->codigo_dispositivo){
            Log::channel('agrisk')->emergency('Erro ao recuperar o código de dispositivo pro cliente <b>' . $this->cliente->nome_dono . "</b>");
            session()->flash("erro", "Desculpe, estamos com um problema em nosso sistema. Tente novamente mais tarde, ou entre em contato com nosso time comercial.");
        }else{
            $api = new ApiaryClientes;
            if($api->isAuthenticated()){
                $resultado = $api->verificarCodigo($this->cliente, $this->codigo_ativacao, $this->codigo_dispositivo);
                if($resultado){
                    $this->cliente->agriskTermosVerificado = true;
                    $this->cliente->agriskTermosFinalizado = true;
                    $this->cliente->save();
                    $this->show = false;
                    $this->emit("showListaEtapas");
                }else{
                    Log::channel('agrisk')->emergency('Erro na validação do código Agrisk do cliente <b>' . $this->cliente->nome_dono . "</b>", ["response" => $api->getLastError()]);
                    session()->flash("erro", "Ocorreu um erro ao validar seu código de ativação. Por favor, verifique se o código está correto.");
                    $this->codigo_ativacao = null;
                }
            }else{
                Log::channel('agrisk')->emergency('Erro de autenticação a API Agrisk durante a verificação de código do cliente <b>' . $this->cliente->nome_dono . "</b>", ["response" => $api->getLastError()]);
                session()->flash("erro", "Desculpe, estamos com um problema em nosso sistema. Tente novamente mais tarde, ou entre em contato com nosso time comercial.");
            }
        }
    }

    public function reenviarCodigo(){
        $api = new ApiaryClientes;
        if($api->isAuthenticated()){
            $response = $api->sendTermsToken($this->cliente);
            if($response){
                session()->flash("sucesso", "Enviamos um novo código para seu número cadastrado. Caso ainda não receba você pode entrar em contato com nosso time comercial.");
            }else{
                Log::channel('agrisk')->emergency('Erro no envio do código de verificação Agrisk para o cliente <b>' . $this->cliente->nome_dono . "</b>", ["response" => $api->getLastError()]);
                $this->erro_codigo = true;
            }
        }else{
            Log::channel('agrisk')->emergency('Erro de autenticação a API Agrisk durante o reenvio do código do cliente <b>' . $this->cliente->nome_dono . "</b>", ["response" => $api->getLastError()]);
            session()->flash("erro", "Desculpe, estamos com um problema em nosso sistema. Tente novamente mais tarde, ou entre em contato com nosso time comercial.");
        }
    }

    public function negarTermos(){
        $this->cliente->agriskTermosFinalizado = true;
        $this->cliente->save();
        $this->show = false;
        $this->emit("showListaEtapas");
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
