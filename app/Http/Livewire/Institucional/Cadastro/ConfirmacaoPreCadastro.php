<?php

namespace App\Http\Livewire\Institucional\Cadastro;

use Livewire\Component;

class ConfirmacaoPreCadastro extends Component
{
    public $show;

    protected $listeners = ["showConfirmacaoPreCadastro"];

    public function showConfirmacaoPreCadastro(){
        $this->show = true;
    }

    public function mount($show){
        $this->show = $show;
    }

    public function avancar(){
        $this->show = false;
        $this->emit("showListaEtapas");
    }

    public function render()
    {
        return view('livewire.institucional.cadastro.confirmacao-pre-cadastro');
    }
}
