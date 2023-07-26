<?php

namespace App\View\Components\Institucional;

use Illuminate\View\Component;
use App\Models\Lote;

class InfosLotesDestaque extends Component
{
    public $lotes;
    public function __construct()
    {
        $this->lotes = Lote::whereHas("reserva", function($q) {
            $q->where([["encerrada", false], ['aberto', true]]);
        })->where([["destaque", true], ['reservado', false]])->get()->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.institucional.infos-lotes-destaque');
    }
}
