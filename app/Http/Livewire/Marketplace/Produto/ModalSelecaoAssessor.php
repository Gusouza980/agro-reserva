<?php

namespace App\Http\Livewire\Marketplace\Produto;

use Livewire\Component;
use App\Models\Assessor;
use App\Models\MarketplaceProduto;

class ModalSelecaoAssessor extends Component
{

    public $show = false;
    public $texto;
    public $assessores;

    protected $listeners = ["carregaModalSelecaoAsssessor"];

    public function carregaModalSelecaoAsssessor(MarketplaceProduto $produto){
        $this->show = true;
        $this->texto = "Estou interessado no produto " . $produto->nome . " do(a) " . $produto->vendedor->nome;
    }

    public function mount(){
        $this->assessores = Assessor::where("ativo", true)->where("marketplace", true)->orderBy("nome", "ASC")->get();
    }

    public function render()
    {
        return view('livewire.marketplace.produto.modal-selecao-assessor');
    }
}
