<?php

namespace App\Http\Livewire\Sistema\Demandas;

use Livewire\Component;
use App\Models\Demanda;

class Listagem extends Component
{
    public $setor = 0;

    public $exibir_arquivadas = false;

    protected $listeners = ['atualizaSetor', 'atualizaDatatableDemandas' => '$refresh'];

    public function atualizaSetor($setor){
        $this->setor = $setor;
    }
    public function getCorDemanda($demanda){
        if($demanda['entrega']){
            return 'bg-green-600';
        }elseif(date("Y-m-d", strtotime(" +5 Days")) >= date("Y-m-d", strtotime($demanda['previsao_entrega']))){
            return "bg-red-600";
        }elseif(date("Y-m-d", strtotime(" +15 Days")) >= date("Y-m-d", strtotime($demanda['previsao_entrega']))){
            return "bg-orange-600";
        }else{
            return "bg-gray-600";
        }
    }
    public function confirmarEntregaDemanda($id){
        $demanda = Demanda::find($id);
        $demanda->entrega = date("Y-m-d");
        $demanda->save();
        toastr()->success("Demanda entregue com sucesso!");
        $this->emit('$refresh');
    }
    public function excluirDemanda($id){
        $demanda = Demanda::find($id);
        $demanda->delete();
        $this->emit('$refresh');
    }
    public function arquivar($id){
        $demanda = Demanda::find($id);
        $demanda->arquivar = true;
        $demanda->save();
        toastr()->success("Demanda arquivada com sucesso!");
        $this->emit('$refresh');
    }
    public function mount($setor){
        $this->setor = $setor;
    }
    public function render()
    {
        $demandas = Demanda::where([["setor", $this->setor], ['arquivar', $this->exibir_arquivadas]])->orderBy("created_at", "DESC")->get()->toArray();
        return view('livewire.sistema.demandas.listagem', ['demandas' => $demandas]);
    }
}
