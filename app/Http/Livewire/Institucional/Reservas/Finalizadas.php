<?php

namespace App\Http\Livewire\Institucional\Reservas;

use Livewire\Component;
use App\Models\Reserva;

class Finalizadas extends Component
{
    public $filtro_fazenda;
    public $filtro_data;

    public function render()
    {
        $reservas = Reserva::where(null);
        if($this->filtro_fazenda){
            $filtro = $this->filtro_fazenda;
            $reservas = $reservas->whereHas("fazenda", function($q) use($filtro){
                $q->where("nome_fazenda", "LIKE", "%" . $filtro . "%");
            });
        }
        if($this->filtro_data){
            $reservas = $reservas->whereBetween("inicio", [date("Y-m-01", strtotime($this->filtro_data)), date("Y-m-t", strtotime($this->filtro_data))]);
        }
        $reservas = $reservas->where("encerrada", true)->get();
        return view('livewire.institucional.reservas.finalizadas', ['reservas' => $reservas]);
    }
}
