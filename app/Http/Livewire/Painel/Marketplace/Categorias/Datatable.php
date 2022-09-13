<?php

namespace App\Http\Livewire\Painel\Marketplace\Categorias;

use Livewire\Component;
use App\Models\MarketplaceCategoria;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ["atualizaDatatableCategorias" => '$refresh'];

    public function render()
    {
        $categorias = MarketplaceCategoria::paginate(20);
        return view('livewire.painel.marketplace.categorias.datatable', ["categorias" => $categorias]);
    }
}
