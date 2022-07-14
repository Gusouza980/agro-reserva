<?php

namespace App\Http\Livewire\Institucional\Cadastro;

use Livewire\Component;

class FormInformacoesComplementares extends Component
{
    public $show;

    protected $listeners = ["showFormInformacoesComplementares"];

    public function showFormInformacoesComplementares($categoria){
        $this->show = true;
    }

    public function mount($show){
        $this->show = $show;
    }

    public function render()
    {
        return view('livewire.institucional.cadastro.form-informacoes-complementares');
    }
}
