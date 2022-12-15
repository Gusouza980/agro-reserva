<?php

namespace App\View\Components\Marketplace\Vendedor;

use Illuminate\View\Component;
use App\Models\MarketplaceVendedor;
use App\Models\MarketplaceCategoria;
use Jenssegers\Agent\Agent;

class MenuLateral extends Component
{
    public $vendedor;
    public $categorias;
    public $subcategorias;
    public $exibicao;
    public $filtro;

    public $agent;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($vendedor, $exibicao = null, $filtro = null)
    {
        $this->vendedor = MarketplaceVendedor::with("produtos", "produtos.categoria", "produtos.categoria.categoria")->find($vendedor);
        $subcategorias = $this->vendedor->produtos->unique("marketplace_categoria_id")->pluck("marketplace_categoria_id");
        $this->categorias = MarketplaceCategoria::whereHas("subcategorias", function ($q) use ($subcategorias) {
            $q->whereIn("id", $subcategorias);
        })->get();
        $this->subcategorias = $subcategorias;
        $this->exibicao = $exibicao;
        $this->filtro = $filtro;
        $this->agent = new Agent;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.marketplace.vendedor.menu-lateral');
    }
}
