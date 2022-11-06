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
    
    public function mount(Reserva $reserva){
        $this->reserva = $reserva;
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
        $this->reserva->refresh();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Imagem atualizada com sucesso!']);
    }

    public function atualizaValor(Lote $lote, $campo, $valor){
        $lote->$campo = $valor;
        if($campo == "preco" && !empty($valor)){
            $lote->produto->preco = $valor;
            $lote->produto->save();
        }
        $lote->save();
        $this->reserva->refresh();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Dado atualizado com sucesso!']);
    }
    
    public function render()
    {
        $lotes = $this->reserva->lotes;
        return view('livewire.painel.lotes.datatable', ['lotes' => $lotes]);
    }
}
