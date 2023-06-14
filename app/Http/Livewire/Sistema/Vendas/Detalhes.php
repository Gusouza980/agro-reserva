<?php

namespace App\Http\Livewire\Sistema\Vendas;

use Livewire\Component;
use App\Models\Venda;

class Detalhes extends Component
{
    public $venda;

    public function mount(Venda $venda){
        $this->venda = $venda;
    }
        
    public function render()
    {
        return view('livewire.sistema.vendas.detalhes');
    }
}
