<?php

namespace App\Http\Livewire\Lotes;

use Livewire\Component;

class Card extends Component
{
    public $fazenda;
    public $reserva;
    public $carregar = false;

    public function mount($fazenda, $reserva){
        $this->fazenda = $fazenda;
        $this->reserva = $reserva;
    }

    public function setCarregar(){
        $this->carregar = true;
    }

    public function render()
    {
        return view('livewire.lotes.card', ['lotes' => $this->carregar ? $this->reserva->lotes->where('ativo', true)->where('membro_pacote', false) : []]);
    }
}
