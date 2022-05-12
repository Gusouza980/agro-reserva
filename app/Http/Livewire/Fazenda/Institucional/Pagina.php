<?php

namespace App\Http\Livewire\Fazenda\Institucional;

use Livewire\Component;

class Pagina extends Component
{

    public $fazenda;
    public $reserva;
    public $pagina;
    public $fazendas;

    public function mount($fazenda, $reserva, $fazendas = null){
        $this->fazenda = $fazenda;
        $this->reserva = $reserva;
        $this->pagina = 0;
        $this->fazendas = $fazendas;
    }

    public function trocarPagina($pagina){
        $this->pagina = $pagina;
    }

    public function render()
    {
        return view('livewire.fazenda.institucional.pagina');
    }
}
