<?php

namespace App\Http\Livewire\Painel\Reservas;

use Livewire\Component;
use App\Models\Fazenda;
use App\Models\Reserva;
use Livewire\WithPagination;

class Datatable extends Component
{

    use WithPagination;

    public $fazenda;

    protected $listeners = ["atualizaValor", "atualizaDatatableReservas" => '$refresh'];
    protected $paginationTheme = 'bootstrap';

    public function mount($fazenda = null){
        if($fazenda){
            $this->fazenda = $fazenda;
        }else{
            $this->fazenda = null;
        }
    }

    public function atualizaValor(Reserva $reserva, $campo, $valor){
        $reserva->$campo = $valor;
        $reserva->save();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Dado atualizado com sucesso!']);
    }

    public function render()
    {
        if($this->fazenda){
            $reservas = $this->fazenda->reservas()->paginate(10);
        }else{
            $reservas = Reserva::orderBy("inicio", "DESC")->paginate(10);
        }
        return view('livewire.painel.reservas.datatable', ["reservas" => $reservas]);
    }
}
