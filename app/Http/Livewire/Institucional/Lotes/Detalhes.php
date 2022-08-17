<?php

namespace App\Http\Livewire\Institucional\Lotes;

use Livewire\Component;
use App\Models\Lote;

class Detalhes extends Component
{
    public $lote;

    public function mount(Lote $lote){
        $this->lote = $lote;
    }

    public function render()
    {
        return view('livewire.institucional.lotes.detalhes');
    }
}
