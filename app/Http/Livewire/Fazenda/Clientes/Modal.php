<?php

namespace App\Http\Livewire\Fazenda\Clientes;

use Livewire\Component;
use App\Models\Fazenda;
use App\Models\Cliente;

class Modal extends Component
{

    public $fazenda;
    public $pesquisa;
    public $resultado = null;
    public $cliente;

    protected $listeners = ["iniciaModal", "modalClientesRefresh" => '$refresh'];

    public function iniciaModal(Fazenda $fazenda){
        $this->fazenda = $fazenda;
        $this->resultado = Cliente::whereNotIn('id', $this->fazenda->usuarios->pluck("id"))->take(10)->get();
        $this->dispatchBrowserEvent("carregaModalClientes");
    }

    public function updatedPesquisa(){
        $this->resultado = Cliente::where("nome_dono", "LIKE", "%" . $this->pesquisa . "%")->whereNotIn('id', $this->fazenda->usuarios->pluck("id"))->take(10)->get();
    }

    public function addCliente(Cliente $cliente){
        $this->fazenda->usuarios()->attach($cliente);
        $this->fazenda = Fazenda::find($this->fazenda->id);
        if($this->pesquisa){
            $this->resultado = Cliente::where("nome_dono", "LIKE", "%" . $this->pesquisa . "%")->whereNotIn('id', $this->fazenda->usuarios->pluck("id"))->take(10)->get();
        }else{
            $this->resultado = Cliente::whereNotIn('id', $this->fazenda->usuarios->pluck("id"))->take(10)->get();
        }
        $this->emit("modalClientesRefresh");
    }

    public function removeCliente(Cliente $cliente){
        $this->fazenda->usuarios()->detach($cliente);
        $this->fazenda = Fazenda::find($this->fazenda->id);
        if($this->pesquisa){
            $this->resultado = Cliente::where("nome_dono", "LIKE", "%" . $this->pesquisa . "%")->whereNotIn('id', $this->fazenda->usuarios->pluck("id"))->take(10)->get();
        }else{
            $this->resultado = Cliente::whereNotIn('id', $this->fazenda->usuarios->pluck("id"))->take(10)->get();
        }
        $this->emit("modalClientesRefresh");
    }


    public function render()
    {
        return view('livewire.fazenda.clientes.modal');
    }
}
