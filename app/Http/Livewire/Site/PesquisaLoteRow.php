<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;

class PesquisaLoteRow extends Component
{

    public $lote;

    public function mount($lote){
        $this->lote = $lote;
    }

    public function render()
    {
        return view('livewire.site.pesquisa-lote-row');
    }
}
