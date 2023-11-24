<?php

namespace App\Http\Livewire\Institucional\Cadastro;

use Livewire\Component;
use App\Models\Cliente;

class FormDadosPropriedade extends Component
{
    public $show;
    public $nome_fazenda;
    public $inscricao_produtor_rural;
    public $cep_propriedade;
    public $rua_propriedade;
    public $numero_propriedade;
    public $bairro_propriedade;
    public $cidade_propriedade;
    public $estado_propriedade;
    public $pais_propriedade;
    public $complemento_propriedade;

    protected $listeners = ["showFormDadosPropriedade"];

    public function showFormDadosPropriedade(){
        $this->show = true;
        $this->dispatchBrowserEvent("carregaMascaras");
    }

    public function mount($show){
        $this->show = $show;
    }

    public function salvar(){
        $cliente = Cliente::find(session()->get("cliente")["id"]);

        $cliente->nome_fazenda = $this->nome_fazenda;
        $cliente->inscricao_produtor_rural = $this->inscricao_produtor_rural;
        $cliente->cep_propriedade = $this->cep_propriedade;
        $cliente->rua_propriedade = $this->rua_propriedade;
        $cliente->numero_propriedade = $this->numero_propriedade;
        $cliente->bairro_propriedade = $this->bairro_propriedade;
        $cliente->cidade_propriedade = $this->cidade_propriedade;
        $cliente->estado_propriedade = $this->estado_propriedade;
        $cliente->pais_propriedade = $this->pais_propriedade;
        $cliente->complemento_propriedade = $this->complemento_propriedade;
        $cliente->etapa_cadastro = 4;

        $cliente->save();
        \DiscordAlert::to('cadastro')->message("O cliente " . $cliente->nome_dono . " (" . $cliente->email . ") completou a etapa de dados de propriedade.");

        session()->forget("cliente");
        session()->put(["cliente" => $cliente->toArray()]);

        $this->show = false;
        $this->emit("showListaEtapas");
    }

    public function voltar(){
        $this->show = false;
        $this->emit("showListaEtapas");
    }

    public function render()
    {
        return view('livewire.institucional.cadastro.form-dados-propriedade');
    }
}
