<?php

namespace App\Http\Livewire\Painel\Lotes;

use Livewire\Component;
use App\Models\Lote;
use App\Models\Reserva;

class Datatable extends Component
{

    public $reserva;
    
    protected $listeners = ["atualizaValor", "atualizaDatatableLotes" => '$refresh'];
    protected $paginationTheme = 'bootstrap';
    
    public function mount(Reserva $reserva){
        $this->reserva = $reserva;
    }

    public function atualizaValor(Lote $lote, $campo, $valor){
        $lote->$campo = $valor;
        $lote->save();
        $this->reserva->refresh();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Dado atualizado com sucesso!']);
    }
    
    public function render()
    {
        $lotes = $this->reserva->lotes;
        return view('livewire.painel.lotes.datatable', ['lotes' => $lotes]);
    }
}
