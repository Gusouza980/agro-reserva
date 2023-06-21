<?php

namespace App\Http\Livewire\Sistema\Lotes;

use Livewire\Component;
use App\Models\Reserva;
use App\Models\Lote;
use Livewire\WithFileUploads;
use App\Classes\Util;
use Illuminate\Support\Facades\Storage;
use App\Classes\ImageUpload;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Datatable extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $arquivos;
    public $fotos;
    public $reserva;

    public $toDelete;
    protected $listeners = ["atualizaValor", "atualizaDatatableLotes" => '$refresh', 'excluir', 'cancelar'];
    public function updatedArquivos($value, $key){
        $lote = Lote::find($key);
        if($this->arquivos[$key]){
            if($lote->preview){
                Storage::delete($lote->preview);
            }
            // CRIA UMA IMAGEM NO FORMATO DE AVATAR E SALVA NO CLIENTE
            $image = new ImageUpload($this->arquivos[$key]);
            $image->makeLote();
            $lote->preview = $image->save("uploads");
            Util::limparLivewireTemp();
        }
        $lote->save();
        $this->arquivos = [];
        $this->reserva->refresh();
        $this->emit('$refresh');
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Imagem atualizada com sucesso!']);
    }
    public function updatedFotos(){
        $cont = 0;
        $lotes = $this->reserva->lotes;
        foreach($lotes as $lote){
            if($lote->preview){
                Storage::delete($lote->preview);
            }
            // CRIA UMA IMAGEM NO FORMATO DE AVATAR E SALVA NO CLIENTE
            $image = new ImageUpload($this->fotos[$cont]);
            $image->makeLote();
            $lote->preview = $image->save("uploads");
            $lote->save();
            $cont++;
        }
        Util::limparLivewireTemp();
        $this->fotos = null;
        $this->reserva->refresh();
        $this->emit('$refresh');
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Imagens atualizadas com sucesso!']);
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
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Dado atualizado com sucesso!']);
    }
    public function solicitarExcluir(Lote $lote){
        $this->toDelete = $lote;
        $this->alert('warning', 'Tem certeza de que deseja excluir o lote <b>' . $lote->nome . '</b> ?', [
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Sim',
            'onConfirmed' => "excluir",
            'showCancelButton' => true,
            'cancelButtonText' => 'Não',
            'onDismissed' => 'cancelar',
            'timer' => null,
        ]);
    }
    public function excluir(Lote $lote){
        $this->toDelete->delete();
        $this->reserva->refresh();
        $this->emit('$refresh');
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Lote removido com sucesso!']);
    }
    public function cancelar(){
        $this->toDelete = null;
    }
    public function mount(Reserva $reserva){
        $this->reserva = $reserva;
    }
    public function render()
    {
        $lotes = $this->reserva->lotes;
        return view('livewire.sistema.lotes.datatable', ['lotes' => $lotes]);
    }
}
