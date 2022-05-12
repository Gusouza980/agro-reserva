<?php

namespace App\View\Components\Institucional;

use Illuminate\View\Component;
use App\Models\Lote;
use Jenssegers\Agent\Agent;

class SlideLotesVisitados extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $lotes;
    public $mobile;

    public function __construct()
    {
        //
        $this->lotes = Lote::where("ativo", true)->where("reservado", false)->whereHas("reserva", function ($q) {
            $q->where("reservas.ativo", true)->where("aberto", true)->where("encerrada", false);
        })->orderBy("visitas")->take(10)->get();
        $agent = new Agent;
        $this->mobile = $agent->isMobile();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.institucional.slide-lotes-visitados');
    }
}
