<?php

namespace App\View\Components\Marketplace;

use Illuminate\View\Component;

class CardProduto extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $produto;
    
    public function __construct($produto)
    {
        //
        $this->produto = $produto;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.marketplace.card-produto');
    }
}
