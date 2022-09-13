<?php

namespace App\View\Components\Botoes;

use Illuminate\View\Component;

class Voltar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $rota;

    public function __construct($rota)
    {
        $this->rota = $rota;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.botoes.voltar');
    }
}
