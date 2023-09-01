<?php

namespace App\View\Components\Institucional\Lotes;

use Illuminate\View\Component;

class Card extends Component
{
    public $lote;
    public function __construct($lote)
    {
        $this->lote = $lote;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.institucional.lotes.card');
    }
}
