<?php

namespace App\Http\Livewire\Vendas\Lotes;

use Livewire\Component;
use App\Models\CarrinhoProduto;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    public $items_pagina = 20;
    public $filtro_cliente;
    public $filtro_lote;
    public $filtro_raca;
    public $filtros;

    protected $paginationTheme = 'bootstrap';

    public function setFiltros(){
        $this->filtros = [];
        if($this->filtro_cliente){
            $this->filtros["clientes"][] = ["clientes.nome_dono", "LIKE", "%". $this->filtro_cliente. "%"]; 
        }
        if($this->filtro_lote){
            $this->filtros["lotes"][] = ["lotes.nome", "LIKE", "%". $this->filtro_lote. "%"]; 
        }
        if($this->filtro_raca && $this->filtro_raca != -1){
            $this->filtros["lotes"][] = ["lotes.raca_id", "=" , $this->filtro_raca]; 
        }
    }

    public function limparFiltros(){
        $this->filtros = null;
        $this->filtro_cliente = null;
        $this->filtro_lote = null;
        $this->filtro_raca = null;
    }

    public function render()
    {
        $produtos = CarrinhoProduto::whereHas("carrinho", function($q){
            $q->where("carrinhos.aberto", false);
        });
        if($this->filtros){
            if(isset($this->filtros["clientes"])){
                $filtro_cliente = $this->filtros["clientes"];
                $produtos = $produtos->whereHas("carrinho", function($q) use ($filtro_cliente){
                    $q->whereHas("cliente", function($q) use ($filtro_cliente){
                        $q->where($filtro_cliente);
                    });
                });
                // $produtos = $produtos->whereHas("clientes", function($q) use ($filtro_cliente){
                //     $q->where($filtro_cliente);
                // });
            }
            if(isset($this->filtros["lotes"])){
                $filtro_lote = $this->filtros["lotes"];
                $produtos = $produtos->whereHas("lote", function($q) use ($filtro_lote){
                    $q->where($filtro_lote);
                });
            }
        }
        $produtos = $produtos->paginate($this->items_pagina);
        // dd($produtos);
        return view('livewire.vendas.lotes.datatable', ["produtos" => $produtos]);
    }
}
