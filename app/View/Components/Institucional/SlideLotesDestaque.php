<?php

namespace App\View\Components\Institucional;

use Illuminate\View\Component;
use App\Models\Reserva;

class SlideLotesDestaque extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $reserva;

    public function __construct(Reserva $reserva)
    {
        //
        $this->reserva = $reserva;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.institucional.slide-lotes-destaque');
    }
}
