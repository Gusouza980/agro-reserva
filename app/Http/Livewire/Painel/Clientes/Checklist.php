<?php

namespace App\Http\Livewire\Painel\Clientes;

use Livewire\Component;
use App\Models\Cliente;

class Checklist extends Component
{
    public $cliente;

    protected $listeners = ["atualizaValor"];

    public function atualizaValor($campo, $valor){
        $this->cliente->$campo = $valor;
        $this->cliente->save();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Informação atualizada com sucesso!']);
    }

    public function mount(Cliente $cliente){
        $this->cliente = $cliente;
    }

    public function render()
    {
        return view('livewire.painel.clientes.checklist');
    }
}
