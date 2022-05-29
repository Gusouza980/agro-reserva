<?php

namespace App\Http\Livewire\Institucional\Lotes;

use Livewire\Component;
use App\Models\Lote;

class SecaoLotes extends Component
{

    public $fazenda;
    public $reserva;
    public $pesquisa_lote;
    public $filtro_disponibilidade = -1;

    public function mount($fazenda, $reserva){
        $this->fazenda = $fazenda;
        $this->reserva = $reserva;
    }

    public function render()
    {
        $lotes = Lote::where("reserva_id", $this->reserva->id)->where("reserva_id", $this->reserva->id)->where("ativo", true)->where("membro_pacote", false);
        if($this->pesquisa_lote){
            $pesquisa_lote = $this->pesquisa_lote;
            $lotes = $lotes->where(function($query) use ($pesquisa_lote){
                $query->where("nome", "LIKE", "%" . $this->pesquisa_lote . "%")
                ->orWhere("registro", $this->pesquisa_lote)
                ->orWhere("numero", "=", $this->pesquisa_lote);
            });
        }

        if($this->filtro_disponibilidade != -1){
            $lotes = $lotes->where("reservado", $this->filtro_disponibilidade);
        }

        $lotes = $lotes->orderByRaw("reservado ASC, numero ASC")->get();
        // $reservados = $this->reserva->lotes->where('ativo', true)->where('membro_pacote', false)->where("reservado", true);
        return view('livewire.institucional.lotes.secao-lotes', ['lotes' => $lotes]);
    }
}
