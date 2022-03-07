<?php

namespace App\Http\Livewire\Produtos;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use App\Models\MarketplaceVendedor;
use App\Models\MarketplaceProduto;

class FormCadastro extends Component
{

    public $segmento;
    public $vendedor;
    public $produto;

    public function mount(MarketplaceVendedor $vendedor, MarketplaceProduto $produto = null){
        $this->vendedor = $vendedor;
        $this->produto = $produto;
        if($this->produto){
            $this->segmento = $this->produto->segmento;
        }
    }

    public function render()
    {
        return view('livewire.produtos.form-cadastro');
    }
}
