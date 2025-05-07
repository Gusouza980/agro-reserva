<?php

namespace App\View\Components\Institucional;

use Illuminate\View\Component;
use App\Models\MarketplaceVendedor;

class LojasDestaque extends Component
{
    public $vendedores;

    public function __construct()
    {
        $this->vendedores = MarketplaceVendedor::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.institucional.lojas-destaque');
    }
}
