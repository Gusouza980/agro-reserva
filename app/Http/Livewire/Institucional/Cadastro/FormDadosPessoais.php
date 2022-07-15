<?php

namespace App\Http\Livewire\Institucional\Cadastro;

use Livewire\Component;
use App\Models\Cliente;

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
            $cliente->nascimento = $this->nascimento;
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

    public function render()
    {
        return view('livewire.institucional.cadastro.form-dados-pessoais');
    }
}
