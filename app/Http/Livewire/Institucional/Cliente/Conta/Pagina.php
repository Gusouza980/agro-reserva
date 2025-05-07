<?php

namespace App\Http\Livewire\Institucional\Cliente\Conta;


use App\Models\Cliente;
use Livewire\Component;

class Pagina extends Component
{
    public $tab = 'dados';
    public $cliente;

    protected $queryString = [
        'tab' => ['except' => '']
    ];

    public function mount(){
        $this->cliente = Cliente::find(session()->get('cliente')['id']);
    }

    public function render()
    {
        return view('livewire.institucional.cliente.conta.pagina')->layout('layouts.institucional');
    }
}
