<?php

namespace App\View\Components\Institucional;

use Illuminate\View\Component;

class Carrosel extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $banners;

    public function __construct($banners)
    {
        //
        $this->banners = $banners;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.institucional.carrosel');
    }
}
