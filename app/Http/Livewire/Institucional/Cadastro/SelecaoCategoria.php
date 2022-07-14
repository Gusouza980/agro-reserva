<?php

namespace App\Http\Livewire\Institucional\Cadastro;

use Livewire\Component;

class SelecaoCategoria extends Component
{
    public $show;

    protected $listeners = ["showSelecaoCategoria"];

    public function showSelecaoCategoria(){
        $this->show = true;
    }

    public function mount($show){
        $this->show = $show;
    }

    public function render()
    {
        return view('livewire.institucional.cadastro.selecao-categoria');
    }
}
