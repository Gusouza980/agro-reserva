<?php

namespace App\Http\Livewire\Sistema\Demandas;

use Livewire\Component;
use App\Models\Demanda;

class Listagem extends Component
{
    public $setor = 0;

    protected $listeners = ['atualizaSetor'];

    public function atualizaSetor($setor){
        $this->setor = $setor;
    }
    public function mount($setor){
        $this->setor = $setor;
    }
    public function render()
    {
        $demandas = Demanda::where("setor", $this->setor)->orderBy("created_at", "DESC")->get();
        return view('livewire.sistema.demandas.listagem', ['demandas' => $demandas]);
    }
}
