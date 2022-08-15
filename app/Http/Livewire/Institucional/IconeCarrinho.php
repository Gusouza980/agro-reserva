<?php

namespace App\Http\Livewire\Institucional;

use Livewire\Component;

class IconeCarrinho extends Component
{
    public $numProdutos = 0;

    protected $listeners = ["atualizaNumeroProdutos", "atualizaIconeCarrinho" => '$refresh'];

    public function atualizaNumeroProdutos($numProdutos){
        $this->numProdutos = $numProdutos;
        $this->emit('$refresh');
    }

    public function render()
    {
        return view('livewire.institucional.icone-carrinho');
    }
}
