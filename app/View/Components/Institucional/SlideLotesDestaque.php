<?php

namespace App\View\Components\Institucional;

use Illuminate\View\Component;
use App\Models\Reserva;
use Illuminate\Support\Str;

class SlideLotesDestaque extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
     public $lotes;
     public $reserva;

    public function __construct($lotes, $reserva)
    {
        //
        $this->lotes = $lotes;
        $this->reserva = $reserva;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $identificador = Str::random(5);
        return view('components.institucional.slide-lotes-destaque', ["identificador" => $identificador]);
    }
}
