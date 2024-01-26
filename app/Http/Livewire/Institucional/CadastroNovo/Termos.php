<?php

namespace App\Http\Livewire\Institucional\CadastroNovo;

use App\Models\Cliente;
use Livewire\Component;
use App\Facades\AgriskFacade;
use App\Classes\Agrisk\Apiary\ApiaryClient;
use App\Classes\Agrisk\Apiary\ApiaryError;

class Termos extends Component
{
    public $term;
    public $codigo_dispositivo;
    public $respostasQuestoes = [];
    public $codigo_ativacao;
    public $erros = [];
    protected $listeners = [
        'setCodigoDispositivo'
    ];

    public function getClienteProperty(){
        return Cliente::find(session()->get("cliente")['id']);
    }

    public function setCodigoDispositivo($visitorId){
        if(!$this->codigo_dispositivo && !empty($visitorId)){
            $this->codigo_dispositivo = $visitorId;
        }
    }

    public function getEtapa(){
        if(!$this->cliente->agriskTermosAceito){
            return 'termos';
        }

        if($this->cliente->agriskTermosAceito && !$this->cliente->agriskTermosRespondido){
            return 'questoes';
        }

        if($this->cliente->agriskTermosAceito && $this->cliente->agriskTermosRespondido && !$this->cliente->agriskTermosVerificado){
            return 'codigo';
        }

        if($this->cliente->agriskTermosAceito && $this->cliente->agriskTermosRespondido && $this->cliente->agriskTermosVerificado){
            return redirect()->route('index');
        }
    }

    public function getTermsText(){
        if(!$this->cliente->agriskTermosToken){
            $response = AgriskFacade::createClient(\Util::limparString($this->cliente->cpf), date("d/m/Y", strtotime($this->cliente->nascimento))); 
            if($response instanceof ApiaryError){
                $this->erros = [
                    'Não foi possível gerar os termos de análise de crédito. Por favor, entre em contato com o comercial para obter mais informações.'
                ];
                return '<span style="color: red;">Não foi possível gerar os termos de análise de crédito. Por favor, verifique seu CPF e data de nascimento ou entre em contato com o comercial para obter mais informações.</span>';
            }else{
                $agriskClient = AgriskFacade::clientDetail($response->id);
                if($agriskClient instanceof ApiaryError){
                    $this->erros = $agriskClient->getArrayMessages();
                    return implode('<br>', $this->erros);
                }else{
                    $response = AgriskFacade::createTerms($agriskClient);
                    if($response instanceof ApiaryError){
                        $this->erros = $response->getArrayMessages();
                        return implode('<br>', $this->erros);
                    }else{
                        $this->cliente->agriskId = $agriskClient->id;
                        $this->cliente->agriskTaxId = $this->cliente->cpf;
                        $this->cliente->agriskTermosToken = AgriskFacade::getTermsAuthorizationToken($response->url);
                        $this->cliente->save();
                        unset($this->cliente);
                    }
                }
            }
        }
        $response = AgriskFacade::termsDetail($this->cliente->agriskTermosToken);
        if($response instanceof ApiaryError){
            $this->erros = $response->getArrayMessages();
            return;
        }
        return $response->term;
    }

    public function getTermsQuestions(){
        $response = AgriskFacade::termsDetail($this->cliente->agriskTermosToken);
        if($response instanceof ApiaryError){
            $this->erros = array_map(function($error){
                if($error == 'No attempts left'){
                    return 'Você não possui mais tentativas. Por favor, entre em contato com o comercial para obter mais informações.';
                }
            }, $response->getArrayMessages());
            return;
        }
        return $response->questions;
    }

    public function aceitar(){
        $this->cliente->agriskTermosAceito = true;
        $this->cliente->save();
        $this->cliente->refresh();
    }

    public function enviarRespostas(){
        $response = AgriskFacade::sendAnswers($this->cliente->agriskTermosToken, $this->respostasQuestoes);
        if($response instanceof ApiaryError){
            $this->erros = $response->getArrayMessages();
            return;
        }else{
            $this->cliente->refresh();
        }
    }

    public function enviarCodigo(){
        if(!$this->codigo_dispositivo){
            \Log::channel('agrisk')->emergency('Erro ao recuperar o código de dispositivo pro cliente <b>' . $this->cliente->nome_dono . "</b>");
            session()->flash("erros", "Desculpe, estamos com um problema em nosso sistema. Tente novamente mais tarde, ou entre em contato com nosso time comercial.");
        }else{
            $response = AgriskFacade::verificarCodigo($this->cliente->agriskTermosToken, $this->codigo_ativacao, $this->codigo_dispositivo);
            if($response){
                $this->cliente->agriskTermosVerificado = true;
                $this->cliente->agriskTermosFinalizado = true;
                $this->cliente->save();
                return redirect()->route('index');
            }else{
                $this->erros = "Ocorreu um erro ao validar seu código de ativação. Por favor, verifique se o código está correto.";
                $this->codigo_ativacao = null;
            }
        }
    }

    public function reenviarCodigo(){
        $token = $this->cliente->agriskTermosToken;
        $telefone = $this->cliente->telefone;
        $response = AgriskFacade::sendTermsToken($token, $telefone);
        if($response){
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Código enviado com sucesso!']);
        }
    }

    public function mount(){
        
    }

    public function render()
    {
        $this->dispatchBrowserEvent("carregaCodigoDispositivo");
        return view('livewire.institucional.cadastro-novo.termos')->layout('layouts.login');
    }
}
