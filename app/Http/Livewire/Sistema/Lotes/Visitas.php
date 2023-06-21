<?php

namespace App\Http\Livewire\Sistema\Lotes;

use Livewire\Component;
use App\Models\Lote;
use App\Models\Visita;

class Visitas extends Component
{
    public $show = false;
    public $lote;
    protected $listeners = ["carregaModalVisitas"];

    public function updatedShow(){
        if($this->show == false){
            $this->lote = null;
        }
    }

    public function carregaModalVisitas(Lote $lote){
        $this->lote = $lote;
        $this->show = true;
    }
    public function render()
    {
        $visitas = ($this->lote) ? Visita::with("cliente")->where("lote_id", $this->lote->id)->get() : null;
        return view('livewire.sistema.lotes.visitas', ['visitas' => $visitas]);
    }
}
