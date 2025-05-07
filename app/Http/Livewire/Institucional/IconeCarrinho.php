<?php

namespace App\Http\Livewire\Institucional;

use Livewire\Component;

class IconeCarrinho extends Component
{
    public $numProdutos = 0;

    public function render()
    {
        return view('livewire.institucional.icone-carrinho');
    }
}
