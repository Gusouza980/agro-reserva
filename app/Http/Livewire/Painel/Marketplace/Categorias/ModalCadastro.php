<?php

namespace App\Http\Livewire\Painel\Marketplace\Categorias;

use Livewire\Component;
use App\Models\MarketplaceCategoria;

class ModalCadastro extends Component
{
    protected $listeners = ["carregaModalCadastroMarketplaceCategorias", "carregaModalEdicaoMarketplaceCategorias", "resetaModalCadastroMarketplaceCategorias"];

    public $categoria;

    protected $rules = [
        "categoria.nome" => "",
        "categoria.subcategoria" => "",
        "categoria.marketplace_categoria_id" => "",
    ];

    public function carregaModalCadastroMarketplaceCategorias(){
        $this->categoria = new MarketplaceCategoria;
        $this->dispatchBrowserEvent("abreModalCadastroMarketplaceCategoria");
    }

    public function carregaModalEdicaoMarketplaceCategorias(MarketplaceCategoria $categoria){
        $this->categoria = $categoria;
        $this->dispatchBrowserEvent("abreModalCadastroMarketplaceCategoria");
    }

    public function salvar(){
        if($this->categoria->marketplace_categoria_id !== null){
            $this->categoria->subcategoria = true;
        }else{
            $this->categoria->subcategoria = false;
        }

        $this->categoria->save();
        $this->dispatchBrowserEvent("fechaModalCadastroMarketplaceCategoria");
        $this->emit("atualizaDatatableCategorias");
    }

    public function resetaModalCadastroMarketplaceCategorias(){
        $this->resetExcept();
    }

    public function render()
    {
        return view('livewire.painel.marketplace.categorias.modal-cadastro');
    }
}
