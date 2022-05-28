<?php

namespace App\Http\Livewire\Institucional\Lotes;

use Livewire\Component;

class SecaoLotes extends Component
{

    public $fazenda;
    public $reserva;

    public function mount($fazenda, $reserva){
        $this->fazenda = $fazenda;
        $this->reserva = $reserva;
    }

    public function render()
    {
        $lotes = $this->reserva->lotes->where('ativo', true)->where('membro_pacote', false);
        // $reservados = $this->reserva->lotes->where('ativo', true)->where('membro_pacote', false)->where("reservado", true);
        return view('livewire.institucional.lotes.secao-lotes', ['lotes' => $lotes]);
    }
}
