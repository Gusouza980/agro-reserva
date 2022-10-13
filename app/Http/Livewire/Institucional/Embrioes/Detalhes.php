<?php

namespace App\Http\Livewire\Institucional\Embrioes;

use Livewire\Component;
use App\Models\Embriao;

class Detalhes extends Component
{

    public $embriao;

    public function mount(Embriao $embriao){
        $this->embriao = $embriao;
    }

    public function render()
    {
        return view('livewire.institucional.embrioes.detalhes');
    }
}
