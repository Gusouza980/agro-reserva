<?php

namespace App\View\Components\Institucional;

use Illuminate\View\Component;
use Jenssegers\Agent\Agent;

class Destaques extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $banners;
    public $agent;

    public function __construct($banners)
    {
        //
        $this->banners = $banners;
        $this->agent = new Agent();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render()
    {
        return view('components.institucional.destaques');
    }
}
