<?php

namespace App\Http\Livewire\Institucional\Cadastro;

use Livewire\Component;
use App\Models\Cliente;

class ListaEtapas extends Component
{

    public $show = false;

    protected $listeners = ["showListaEtapas"];

    public function showListaEtapas(){
        $this->show = true;
        $this->emit('$refresh');
    }

    public function mount($show){
        $this->show = $show;
    }

    public function render()
    {
        $cliente = null;
        if(session()->get("cliente")){
            $cliente = Cliente::find(session()->get("cliente")["id"]);
        }
        return view('livewire.institucional.cadastro.lista-etapas', ["cliente" => $cliente]);
    }
}
