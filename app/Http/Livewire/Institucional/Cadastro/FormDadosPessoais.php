<?php

namespace App\Http\Livewire\Institucional\Cadastro;

use Livewire\Component;

class FormDadosPessoais extends Component
{
    public $show;
    public $categoria = 1;

    protected $listeners = ["showFormDadosPessoais"];

    public function showFormDadosPessoais($categoria){
        $this->categoria = $categoria;
        $this->show = true;
    }

    public function mount($show){
        $this->show = $show;
    }

    public function render()
    {
        return view('livewire.institucional.cadastro.form-dados-pessoais');
    }
}
