<?php

namespace App\Http\Livewire\Institucional\Cadastro;

use Livewire\Component;

class FormDadosPropriedade extends Component
{
    public $show;

    protected $listeners = ["showFormDadosPropriedade"];

    public function showFormDadosPropriedade($categoria){
        $this->show = true;
    }

    public function mount($show){
        $this->show = $show;
    }

    public function render()
    {
        return view('livewire.institucional.cadastro.form-dados-propriedade');
    }
}
