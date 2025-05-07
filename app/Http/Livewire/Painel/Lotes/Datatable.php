<?php

namespace App\Http\Livewire\Painel\Lotes;

use Livewire\Component;
use App\Models\Lote;
use App\Models\Reserva;
use Livewire\WithFileUploads;
use App\Classes\Util;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Datatable extends Component
{
    use WithFileUploads;

    public $reserva;
    public $arquivos = [];
    public $precos = [];
    
    protected $listeners = ["atualizaValor", "atualizaDatatableLotes" => '$refresh'];
    protected $paginationTheme = 'bootstrap';
    
    public function mount($reserva_id){
        $this->reserva = Reserva::with("lotes")->find($reserva_id);
    }

    public function updatedPrecos($value, $key){
        // dd($value);
    }

    public function updatedArquivos($value, $key){
        $lote = Lote::find($key);
        if($this->arquivos[$key]){
            Storage::delete($lote->preview);
            $lote->preview = $this->arquivos[$key]->store('imagens/fazendas/' . Str::slug($lote->fazenda->nome_fazenda) . "/lotes", 'local');
            Util::limparLivewireTemp();
        }
        $lote->save();
        $this->arquivos = [];
        $this->reserva->lotes->where("id", $lote->id)->first()->refresh();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Imagem atualizada com sucesso!']);
    }

    public function atualizaValor(Lote $lote, $campo, $valor){
        $lote->$campo = $valor;
        if($campo == "preco"){
            if(!$lote->produto){
                $lote->produto()->create([
                    "nome" => $lote->nome,
                    "preco" => ($lote->preco) ? $lote->preco : 0
                ]);
            }
            if(!empty($valor)){
                $lote->produto->preco = $valor;
            }else{
                $lote->produto->preco = 0;
                $lote->preco = 0;
            }
            $lote->produto->save();
        }
        $lote->save();
        $this->reserva->lotes->where("id", $lote->id)->first()->refresh();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Dado atualizado com sucesso!']);
    }
    
    public function render()
    {
        $lotes = $this->reserva->lotes;
        return view('livewire.painel.lotes.datatable', ['lotes' => $lotes]);
    }
}
