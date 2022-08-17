<?php

namespace App\View\Components\Institucional;

use Illuminate\View\Component;

class SlideReservasAtivas extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $reservas;

    public function __construct($reservas)
    {
        $this->reservas = $reservas;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.institucional.slide-reservas-ativas');
    }
}
