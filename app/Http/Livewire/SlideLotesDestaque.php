<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Configuracao;
use App\Models\Reserva;
use App\Models\Lote;
use Jenssegers\Agent\Agent;

class SlideLotesDestaque extends Component
{

    public $configuracao;
    public $reserva_selecionada;
    public $mobile;

    public function mount($reserva = null){
        $this->configuracao = Configuracao::first();
        $this->reserva_selecionada = $reserva;
        $agent = new Agent;
        $this->mobile = $agent->isMobile();
    }

    public function render()
    {
        return view('livewire.slide-lotes-destaque');
    }
}
