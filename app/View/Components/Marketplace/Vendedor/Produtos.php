<?php

namespace App\View\Components\Marketplace\Vendedor;

use Illuminate\View\Component;
use Jenssegers\Agent\Agent;

class Produtos extends Component
{
    public $produtos;
    public $agent;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($produtos)
    {
        $this->produtos = $produtos;
        $this->agent = new Agent();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.marketplace.vendedor.produtos');
    }
}
