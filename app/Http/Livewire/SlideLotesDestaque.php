<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Configuracao;
use App\Models\Reserva;
use App\Models\Lote;

class SlideLotesDestaque extends Component
{

    public $lotes_destaque;

    public function mount(){
        $configuracao = Configuracao::first();
        $reservas = Reserva::where("ativo", true)->orderBy("inicio", "ASC")->get();
        $reserva_aberta = Reserva::where([["aberto", true], ['encerrada', false]])->first();
        if($configuracao->mostrar_lotes_destaque){
            if($configuracao->opcao_destaque == 0){
                $lotes = $reserva_aberta->lotes;
                $this->lotes_destaque = $lotes->where("reservado", false)->where('pre_reserva', false)->sortByDesc("visitas");
            }else{
                $this->lotes_destaque = Lote::whereHas("reserva", function($q){
                    $q->where("compra_disponivel", true)->orWhere([["aberto", true], ["encerrada", false]]);
                })->where([["reservado", false], ['pre_reserva', false]])->orderBy("visitas", "DESC")->take(15)->get();
            }
            $this->lotes_destaque = $this->lotes_destaque->shuffle();
        }else{
            $this->lotes_destaque = null;
        }
    }

    public function render()
    {
        return view('livewire.slide-lotes-destaque');
    }
}
