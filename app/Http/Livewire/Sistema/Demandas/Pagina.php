<?php

namespace App\Http\Livewire\Sistema\Demandas;

use Livewire\Component;
use App\Models\Demanda;

class Pagina extends Component
{
    public $setor;

    public function updatedSetor(){
        $this->emit('atualizaSetor', $this->setor);
    }

    public function mount(){
        $this->setor = 0;
    }

    public function render()
    {
        return view('livewire.sistema.demandas.pagina');
    }
}
