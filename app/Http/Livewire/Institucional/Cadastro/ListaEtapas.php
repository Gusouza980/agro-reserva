<?php

namespace App\Http\Livewire\Institucional\Cadastro;

use Livewire\Component;

class ListaEtapas extends Component
{

    public $show = false;

    public function mount($show){
        $this->show = $show;
    }

    public function render()
    {
        return view('livewire.institucional.cadastro.lista-etapas');
    }
}
