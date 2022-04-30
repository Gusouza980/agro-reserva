<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Configuracao;
use App\Models\Reserva;
use App\Models\Lote;

class SlideLotesDestaque extends Component
{

    public $configuracao;
    public $reserva_selecionada;

    public function mount(Reserva $reserva = null){
        $this->configuracao = Configuracao::first();
        $this->reserva_selecionada = $reserva;
    }

    public function render()
    {
        return view('livewire.slide-lotes-destaque');
    }
}
