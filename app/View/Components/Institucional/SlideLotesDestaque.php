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
    public $reservas;
    public $lotes;

    public function __construct()
    {
        //
        $this->reservas = Reserva::where("aberto", true)->where("encerrada", false)->get();
        $this->lotes = $this->reservas->last()->lotes;
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
