<?php

namespace App\Http\Livewire\Fazenda\Institucional;

use Livewire\Component;

class Avaliacao extends Component
{

    public $avaliacao;
    public $fazenda;
    public $reserva;

    public function mount($fazenda, $reserva){
        $this->fazenda = $fazenda;
        $this->reserva = $reserva;
        $this->avaliacao = 0;
    }

    public function trocaAvaliacao($avaliacao){
        $this->avaliacao = $avaliacao;
    }

    public function render()
    {
        return view('livewire.fazenda.institucional.avaliacao');
    }
}
