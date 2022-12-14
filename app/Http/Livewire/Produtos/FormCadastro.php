<?php

namespace App\Http\Livewire\Produtos;

use App\Models\MarketplaceCategoria;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use App\Models\MarketplaceVendedor;
use App\Models\MarketplaceProduto;

class FormCadastro extends Component
{

    public $segmento;
    public $vendedor;
    public $produto;
    public $categorias;

    public function mount(MarketplaceVendedor $vendedor, MarketplaceProduto $produto = null){
        $this->vendedor = $vendedor;
        $this->produto = $produto;
        if($this->produto){
            $this->segmento = $this->produto->segmento;
        }
        $this->categorias = MarketplaceCategoria::where("subcategoria", 0)->orderBy("nome", "ASC")->get();
    }

    public function render()
    {
        return view('livewire.produtos.form-cadastro');
    }
}
