<?php

namespace App\Http\Livewire\Sistema\Clientes;

use Livewire\Component;
use App\Models\Cliente;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;
    public $filtro;
    public $quantidade_exibicao;

    public function mount(){
        $this->quantidade_exibicao = 50;
    }
    public function render()
    {
        $filtro = $this->filtro;
        $clientes = Cliente::when((isset($filtro["texto"]) && $filtro["texto"]), function($q) use($filtro){
            $q->where("nome_dono", "LIKE", "%" . $filtro['texto'] . "%")
                ->orWhere("email", "LIKE", "%" . $filtro['texto'] . "%")
                ->orWhere("cpf", "LIKE", "%" . $filtro['texto'] . "%")
                ->orWhere("id", "=", $filtro['texto']);
        })->orderBy("created_at", "DESC")->paginate($this->quantidade_exibicao);
        return view('livewire.sistema.clientes.datatable', ['clientes' => $clientes]);
    }
}
