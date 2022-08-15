<?php

namespace App\Http\Livewire\Institucional\Lotes;

use Livewire\Component;
use App\Models\Lote;
use App\Models\Reserva;

class SecaoLotes extends Component
{

    public $fazenda;
    public $reserva;
    public $pesquisa_lote;
    public $filtro_disponibilidade = -1;
    public $filtro_raca = -1;
    public $filtro_sexo = -1;

    public $pagina_raca = false;

    public function mount($fazenda = null, $reserva = null, $pesquisa = null, $raca = null){
        $this->fazenda = $fazenda;
        $this->reserva = $reserva;
        $this->pesquisa_lote = $pesquisa;
        $this->filtro_raca = ($raca) ? $raca : -1;
        if($this->filtro_raca != -1){
            $this->pagina_raca = true;
        }
    }

    public function render()
    {
        if(!$this->fazenda && !$this->reserva){
            $reservas = Reserva::where("aberto", true)->where("encerrada", false)->get();
            $lotes = Lote::whereIn("reserva_id", $reservas->pluck("id"));
        }else{
            $lotes = Lote::where("reserva_id", $this->reserva->id)->where("reserva_id", $this->reserva->id)->where("ativo", true)->where("membro_pacote", false);
        }

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

        if($this->filtro_raca != -1){
            $lotes = $lotes->where("raca_id", $this->filtro_raca);
        }

        if($this->filtro_sexo != -1){
            $lotes = $lotes->where("sexo", $this->filtro_sexo);
        }

        $lotes = $lotes->orderByRaw("reservado ASC, numero ASC")->get();
        // $reservados = $this->reserva->lotes->where('ativo', true)->where('membro_pacote', false)->where("reservado", true);
        return view('livewire.institucional.lotes.secao-lotes', ['lotes' => $lotes]);
    }
}
