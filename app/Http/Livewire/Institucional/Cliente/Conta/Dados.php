<?php

namespace App\Http\Livewire\Institucional\Cliente\Conta;


use App\Models\Cliente;
use Livewire\Component;

class Dados extends Component
{
    public $cliente = [];

    public function mount(){
        $this->cliente = Cliente::find(session()->get('cliente')['id'])->toArray();
    }

    public function hasConjugue(){
        if($this->cliente['estado_civil'] == 3 || $this->cliente['estado_civil'] == 4){
            return true;
        }
        return false;
    }

    public function salvar(){
        Cliente::find(session()->get('cliente')['id'])->update($this->cliente);
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Dados salvos com sucesso!']);
    }

    public function render()
    {
        return view('livewire.institucional.cliente.conta.dados');
    }
}
