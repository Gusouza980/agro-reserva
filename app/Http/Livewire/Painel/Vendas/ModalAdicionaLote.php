<?php

namespace App\Http\Livewire\Painel\Vendas;

use Livewire\Component;
use App\Models\Venda;
use App\Models\Lote;
use Livewire\WithPagination;

class ModalAdicionaLote extends Component
{
    use WithPagination;

    public $venda;
    public $filtro_lotes;

    protected $listeners = ["carregaModalAdicionaLote", "resetaModalAdicionaLote"];
    protected $paginationTheme = 'bootstrap';
    
    public function carregaModalAdicionaLote(){
        $this->venda->refresh();
        $this->dispatchBrowserEvent("abreModalAdicionaLote");
    }

    public function mount(Venda $venda){
        $this->venda = $venda;
    }

    public function resetaModalAdicionaLote(){
        $this->resetExcept("venda");
    }

    public function selecionarLote(Lote $lote){
        $this->emit("adicionaLoteVenda", $lote->id);
        $this->dispatchBrowserEvent("fechaModalAdicionaLote");
    }

    public function render()
    {   $lotes = Lote::where(null);
        if($this->filtro_lotes){
            $filtro = $this->filtro_lotes;
            $lotes = $lotes->where("nome", "LIKE", "%" . $this->filtro_lotes . "%")
                            ->orWhere("numero", $this->filtro_lotes)
                            ->orWhereHas("fazenda", function($q) use ($filtro){
                                $q->where("nome_fazenda", "LIKE", "%" . $filtro . "%");
                            });
        }
        $lotes = $lotes->whereNotIn("id", $this->venda->carrinho->produtos()->with("produtable")->get()->pluck("produtable")->flatten()->pluck("id"))->orderBy("id", "DESC")->paginate(10);
        return view('livewire.painel.vendas.modal-adiciona-lote', ["lotes" => $lotes]);
    }
}
