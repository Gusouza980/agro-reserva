<?php

namespace App\Http\Livewire\Institucional\Cadastro;

use Livewire\Component;

class AvisoUltimaEtapa extends Component
{
    public $show;

    protected $listeners = ["showAvisoUltimaEtapa"];

    public function showAvisoUltimaEtapa(){
        $this->show = true;
    }

    public function mount($show){
        $this->show = $show;
    }

    public function avancar(){
        $this->show = false;
        $this->emit("showFormSelfie");
    }

    public function render()
    {
        return view('livewire.institucional.cadastro.aviso-ultima-etapa');
    }
}
