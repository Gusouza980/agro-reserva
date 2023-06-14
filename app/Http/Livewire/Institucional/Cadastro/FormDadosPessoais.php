<?php

namespace App\Http\Livewire\Institucional\Cadastro;

use Livewire\Component;
use App\Models\Cliente;
use App\Classes\Util;
use App\Classes\Agrisk\Apiary\ApiaryClientes;
use Illuminate\Support\Facades\Log;

class FormDadosPessoais extends Component
{
    public $show;
    public $categoria = 1;

    public $rg;
    public $cpf;
    public $cnpj;
    public $nome_fantasia;
    public $nascimento;
    public $cep;
    public $rua;
    public $numero;
    public $bairro;
    public $cidade;
    public $estado;
    public $pais;
    public $complemento;

    protected $listeners = ["showFormDadosPessoais"];

    public function showFormDadosPessoais($categoria){
        $this->categoria = $categoria;
        $this->show = true;
        $this->dispatchBrowserEvent("carregaMascaras");
    }

    public function mount($show){
        $this->show = $show;
    }

    public function salvar(){
        $cliente = Cliente::find(session()->get("cliente")["id"]);

        $cliente->pessoa_fisica = !$this->categoria;
        if($cliente->pessoa_fisica){
            $cliente->rg = $this->rg;
            $cliente->cpf = $this->cpf;
            $cliente->nascimento = Util::convertDateToString($this->nascimento);
            $api = new ApiaryClientes;
            if($api->isAuthenticated()){
                $response = $api->createClient($cliente->cpf, $this->nascimento);
                if($response){
                    // CASO O CLIENTE JÁ TENHA SIDO CADASTRADO NO AGRISK É RETORNADO UM ERRO, PORÉM ESSE ERRO CONTÉM O CLIENTID NAS SUAS INSFORMAÇÕES
                    // AQUI É TESTADO ISSO
                    if(isset($response->clientId)){
                        $cliente->agriskId = $response->clientId;
                    }else{
                        $cliente->agriskId = $response->id;
                    }
                    $cliente->agriskTaxId = $cliente->cpf;
                }else{
                    $erro = $api->getLastError();
                    if(is_object($erro)){
                        session()->flash("erro", $erro->message[0]);
                    }elseif($erro){
                        session()->flash("erro", $erro);
                    }
                    return false;
                }
            }else{
                Log::channel('agrisk')->emergency('Erro de autenticação a API Agrisk durante o cadastro do cliente <b>' . $cliente->nome_dono . "</b>");
                session()->flash("erro", "Desculpe, estamos com um problema em nosso sistema. Tente novamente mais tarde, ou entre em contato com nosso time comercial.");
                return false;
            }
        }else{
            $cliente->cnpj = $this->cnpj;
            $cliente->nome_fantasia = $this->nome_fantasia;
        }
        $cliente->cep = $this->cep;
        $cliente->rua = $this->rua;
        $cliente->numero = $this->numero;
        $cliente->bairro = $this->bairro;
        $cliente->cidade = $this->cidade;
        $cliente->estado = $this->estado;
        $cliente->pais = $this->pais;
        $cliente->complemento = $this->complemento;
        if($cliente->etapa_cadastro < 3){
            $cliente->etapa_cadastro = 3;
        }

        $cliente->save();

        session()->forget("cliente");
        session()->put(["cliente" => $cliente->toArray()]);

        $this->show = false;
        $this->emit("showListaEtapas");
    }

    public function voltar(){
        $this->show = false;
        $this->emit("showSelecaoCategoria");
    }

    public function render()
    {
        return view('livewire.institucional.cadastro.form-dados-pessoais');
    }
}
