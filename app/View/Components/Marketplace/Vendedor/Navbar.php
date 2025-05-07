<?php

namespace App\View\Components\Marketplace\Vendedor;

use Illuminate\View\Component;
use App\Models\MarketplaceVendedor;

class Navbar extends Component
{
    public $vendedor;
    public $exibicao;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($vendedor, $exibicao)
    {
        $this->vendedor = MarketplaceVendedor::find($vendedor);
        $this->exibicao = $exibicao;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.marketplace.vendedor.navbar');
    }
}
