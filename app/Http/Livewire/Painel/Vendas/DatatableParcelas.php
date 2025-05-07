<?php

namespace App\Http\Livewire\Painel\Vendas;

use Livewire\Component;
use App\Models\Venda;
use App\Models\VendaParcela;

class DatatableParcelas extends Component
{
    public $venda;

    protected $listeners = ["atualizaValorParcela", "atualizaDatatableParcelas"];

    public function mount(Venda $venda){
        $this->venda = $venda;
    }

    public function atualizaValorParcela(VendaParcela $parcela, $campo, $valor){
        $parcela->$campo = $valor;
        $parcela->save();
        $this->venda->refresh();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Dado atualizado com sucesso!']);
    }

    public function atualizaDatatableParcelas(){
        $this->venda->fresh();
        $this->emit('$refresh');
    }

    public function render()
    {
        $parcelas = $this->venda->getRelationValue("parcelas");
        $metade_parcelas = round($parcelas->count() / 2);
        return view('livewire.painel.vendas.datatable-parcelas', ["parcelas" => $parcelas, "metade_parcelas" => $metade_parcelas]);
    }
}
