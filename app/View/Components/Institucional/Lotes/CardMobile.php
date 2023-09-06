<?php

namespace App\View\Components\Institucional\Lotes;

use Illuminate\View\Component;

class CardMobile extends Component
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
        return view('components.institucional.lotes.card-mobile');
    }
}
