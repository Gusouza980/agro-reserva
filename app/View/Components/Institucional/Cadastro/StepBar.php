<?php

namespace App\View\Components\Institucional\Cadastro;

use Illuminate\View\Component;

class StepBar extends Component
{
    public $step;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($step)
    {
        //
        $this->step = $step;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.institucional.cadastro.step-bar');
    }
}
