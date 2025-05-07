<?php

namespace App\Http\Livewire\Institucional\Cadastro;

use Livewire\Component;

class ConfirmacaoCadastroCompleto extends Component
{
    public $show;

    protected $listeners = ["showConfirmacaoCadastroCompleto"];

    public function showConfirmacaoCadastroCompleto(){
        $this->show = true;
    }

    public function mount($show){
        $this->show = $show;
    }
    
    public function render()
    {
        return view('livewire.institucional.cadastro.confirmacao-cadastro-completo');
    }
}
