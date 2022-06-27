<?php

namespace App\Http\Livewire\Institucional;

use Livewire\Component;
use App\Models\Carrinho;

class BarraLateralCarrinho extends Component
{
    public function render()
    {
        $carrinho = Carrinho::where("cliente_id", session()->get("cliente")["id"])->where("aberto", true)->first();
        return view('livewire.institucional.barra-lateral-carrinho', ["carrinho" => $carrinho]);
    }
}
