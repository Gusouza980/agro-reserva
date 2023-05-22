<?php

namespace App\Http\Livewire\Sistema\Reservas;

use Livewire\Component;
use App\Models\Reserva;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;


    protected $listeners = ["atualizaValor", "atualizaDatatableReservas" => '$refresh'];

    public function atualizaValor(Reserva $reserva, $campo, $valor){
        $reserva->$campo = $valor;
        $reserva->save();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Dado atualizado com sucesso!']);
    }

    public function render()
    {
        $reservas = Reserva::orderBy("inicio", "DESC")->paginate(10);
        return view('livewire.sistema.reservas.datatable', ['reservas' => $reservas]);
    }
}
