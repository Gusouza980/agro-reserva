<?php

namespace App\Http\Livewire\Sistema\Demandas;

use Livewire\Component;

class Pagina extends Component
{
    public $setor = 'comercial';

    public function updatedSetor(){
        $this->emit('atualizaSetor', $this->setor);
    }

    public function render()
    {
        return view('livewire.sistema.demandas.pagina');
    }
}
