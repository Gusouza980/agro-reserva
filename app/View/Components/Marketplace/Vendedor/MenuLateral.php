<?php

namespace App\View\Components\Marketplace\Vendedor;

use Illuminate\View\Component;

class MenuLateral extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.marketplace.vendedor.menu-lateral');
    }
}
