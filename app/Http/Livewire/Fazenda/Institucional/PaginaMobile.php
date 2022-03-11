<?php

namespace App\Http\Livewire\Fazenda\Institucional;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class PaginaMobile extends Component
{

    public $fazenda;
    public $reserva;
    public $pagina;

    protected $listeners = ["trocarPagina"];

    public function mount($fazenda, $reserva){
        $this->fazenda = $fazenda;
        $this->reserva = $reserva;
        $this->pagina = 0;
        $this->avaliacao = 0;
        $this->dispatchBrowserEvent("mostraConteudo");
    }

    public function init(){
        $this->dispatchBrowserEvent("mostraConteudo");
    }

    public function trocarPagina($pagina){
        Log::info($pagina);
        $this->pagina = $pagina;
        $this->dispatchBrowserEvent("mostraConteudo");
    }

    public function render()
    {
        return view('livewire.fazenda.institucional.pagina-mobile');
    }
}
