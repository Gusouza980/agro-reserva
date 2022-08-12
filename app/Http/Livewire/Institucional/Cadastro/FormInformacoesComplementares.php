<?php

namespace App\Http\Livewire\Institucional\Cadastro;

use Livewire\Component;
use App\Models\Cliente;

class FormInformacoesComplementares extends Component
{
    public $show;

    public $referencia_bancaria_banco;
    public $referencia_bancaria_tel;
    public $referencia_bancaria_gerente;
    public $referencia_comercial1;
    public $referencia_comercial1_tel;
    public $referencia_comercial2;
    public $referencia_comercial2_tel;

    protected $listeners = ["showFormInformacoesComplementares"];

    public function showFormInformacoesComplementares(){
        $this->show = true;
        $this->dispatchBrowserEvent("carregaMascaras");
    }

    public function mount($show){
        $this->show = $show;
    }

    public function salvar(){
        $cliente = Cliente::find(session()->get("cliente")["id"]);

        $cliente->referencia_bancaria_banco = $this->referencia_bancaria_banco;
        $cliente->referencia_bancaria_tel = $this->referencia_bancaria_tel;
        $cliente->referencia_bancaria_gerente = $this->referencia_bancaria_gerente;
        $cliente->referencia_comercial1 = $this->referencia_comercial1;
        $cliente->referencia_comercial1_tel = $this->referencia_comercial1_tel;
        $cliente->referencia_comercial2 = $this->referencia_comercial2;
        $cliente->referencia_comercial2_tel = $this->referencia_comercial2_tel;
        $cliente->etapa_cadastro = 5;

        $cliente->save();
        
        session()->forget("cliente");
        session()->put(["cliente" => $cliente->toArray()]);

        $this->show = false;
        $this->emit("showAvisoUltimaEtapa");
    }

    public function voltar(){
        $this->show = false;
        $this->emit("showListaEtapas");
    }

    public function render()
    {
        return view('livewire.institucional.cadastro.form-informacoes-complementares');
    }
}
