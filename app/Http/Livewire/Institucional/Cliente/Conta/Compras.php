<?php

namespace App\Http\Livewire\Institucional\Cliente\Conta;


use App\Models\Venda;
use Livewire\Component;
use Livewire\WithPagination;

class Compras extends Component
{
    public function render()
    {
        $compras = Venda::where('cliente_id', session()->get('cliente')['id'])->orderBy("created_at", "DESC")->paginate(10);
        return view('livewire.institucional.cliente.conta.compras', ['compras' => $compras]);
    }
}
