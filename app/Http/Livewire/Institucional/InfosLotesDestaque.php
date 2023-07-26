<?php

namespace App\Http\Livewire\Institucional;

use Livewire\Component;
use App\Models\Lote;
use Jenssegers\Agent\Agent;

class InfosLotesDestaque extends Component
{
    public $lotes;
    public $total;
    public $mobile;
    public function mount(){
        $this->lotes = Lote::with("fazenda:id,nome_fazenda")->with("raca:id,nome")->with("produto")->with("reserva:id,desconto,max_parcelas")->select("id", "reserva_id", "fazenda_id", "nome", "numero", "registro", "nascimento", "raca_id", "sexo", "video", "beta_caseina")->whereHas("reserva", function($q) {
            $q->where([["encerrada", false], ['aberto', true]]);
        })->where([["destaque", true], ['reservado', false]])->get()->toArray();
        $this->total = count($this->lotes);
        $agent = new Agent();
        $this->mobile = $agent->isMobile();
    }
    public function render()
    {
        return view('livewire.institucional.infos-lotes-destaque');
    }
}
