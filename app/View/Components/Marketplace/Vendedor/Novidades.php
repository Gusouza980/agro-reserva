<?php

namespace App\View\Components\Marketplace\Vendedor;

use Illuminate\View\Component;

class Novidades extends Component
{
    public $produtos;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($produtos)
    {
        $this->produtos = $produtos;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.marketplace.vendedor.novidades');
    }
}
