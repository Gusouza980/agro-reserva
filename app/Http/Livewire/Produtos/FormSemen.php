<?php

namespace App\Http\Livewire\Produtos;

use Livewire\Component;
use App\Models\MarketplaceProdutoSemen;

class FormSemen extends Component
{

    public $semen;

    public function mount(MarketplaceProdutoSemen $semen = null){
        $this->semen = $semen;
    }

    public function render()
    {
        return view('livewire.produtos.form-semen');
    }
}
