<?php

namespace App\Http\Livewire\Marketplace\Vendedor;

use Livewire\Component;
use App\Models\MarketplaceVendedor;
use App\Models\MarketplaceProduto;
use Livewire\WithPagination;
class Pagina extends Component
{
    use WithPagination;
    public $vendedor;
    public $exibicao = 'produtos';
    public $filtro_produtos = 'novidades';

    public function mount(MarketplaceVendedor $vendedor){
        $this->vendedor = $vendedor;
    }
    public function render()
    {
        $parametros = [];
        if($this->exibicao == 'produtos'){
            $produtos = MarketplaceProduto::where("marketplace_vendedor_id", $this->vendedor->id);
            if($this->filtro_produtos){
                switch($this->filtro_produtos){
                    case('novidades'):
                        $produtos = $produtos->orderBy("created_at", "DESC")->take(8);
                        break;
                    case('alta'):
                        $produtos = $produtos->orderBy("visualizacoes", "DESC")->take(8);
                        break;
                    case('todos'):
                        $produtos = $produtos->orderBy("nome", "ASC");
                        break;
                    default:
                        $produtos = $produtos->where("marketplace_categoria_id", $this->filtro_produtos);
                }
            }
            $parametros["produtos"] = $produtos;
        }
        return view('livewire.marketplace.vendedor.pagina', $parametros);
    }
}
