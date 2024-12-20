<?php

namespace App\Http\Livewire\Sistema\Lotes;

use App\Imports\LotesImport;
use Livewire\Component;
use App\Models\Reserva;
use App\Models\Lote;
use Livewire\WithFileUploads;
use App\Classes\Util;
use Illuminate\Support\Facades\Storage;
use App\Classes\ImageUpload;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Maatwebsite\Excel\Facades\Excel;

class Datatable extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $arquivos;
    public $fotos;
    public $reserva;
    public $lotes;
    public $planilha;
    public $toDelete;
    protected $listeners = ["atualizaValor", "atualizaDatatableLotes" => '$refresh', 'excluir', 'cancelar', 'removerTodasImagens', 'removerTodasLotes'];
    public function updatedArquivos($value, $key)
    {
        $lote = Lote::find($key);
        if ($this->arquivos[$key]) {
            if ($lote->preview) {
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
        $this->atualizaLotes();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Imagem atualizada com sucesso!']);
    }

    public function updatedPlanilha()
    {
        if ($this->planilha) {
            $caminho = $this->planilha->store(
                'tmp_planilha/',
                'local'
            );
        }

        Excel::import(new LotesImport($this->reserva['id'], $this->reserva['fazenda_id']), $caminho);

        Storage::delete($caminho);

        $lotes = Lote::where("reserva_id", $this->reserva['id'])->get();
        foreach ($lotes as $lote) {
            $lote->produto()->create([
                "nome" => $lote->nome,
                "preco" => ($lote->preco) ? $lote->preco : 0
            ]);
        }
        $this->planilha = null;
        $this->atualizaLotes();
        toastr()->success("Lotes importados com sucesso!");
    }

    public function updatedFotos()
    {
        $cont = 0;
        foreach ($this->lotes as $lote) {
            $lote = Lote::find($lote['id']);
            if ($lote->preview) {
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
        $this->atualizaLotes();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Imagens atualizadas com sucesso!']);
    }

    public function removerImagem($id)
    {
        $lote = Lote::find($id);
        Storage::delete($lote->preview);
        $lote->save();
        $this->atualizaLotes();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Imagens removida com sucesso!']);
    }

    public function atualizaValor(Lote $lote, $campo, $valor)
    {
        $lote->$campo = $valor;
        if ($campo == "preco") {
            if (!$lote->produto) {
                $lote->produto()->create([
                    "nome" => $lote->nome,
                    "preco" => ($lote->preco) ? $lote->preco : 0
                ]);
            }
            if (!empty($valor)) {
                $lote->produto->preco = $valor;
            } else {
                $lote->produto->preco = 0;
                $lote->preco = 0;
            }
            $lote->produto->save();
        }
        $lote->save();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Dado atualizado com sucesso!']);
    }
    public function solicitarExcluir(Lote $lote)
    {
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
    public function excluir()
    {
        $this->toDelete->delete();
        $this->atualizaLotes();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Lote removido com sucesso!']);
    }
    public function cancelar()
    {
        $this->toDelete = null;
    }
    public function confirmaRemoverTodasImagens()
    {
        $this->alert('warning', 'Tem certeza de que deseja remover todas as imagens ?', [
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Sim',
            'onConfirmed' => "removerTodasImagens",
            'showCancelButton' => true,
            'cancelButtonText' => 'Não',
            'onDismissed' => 'cancelar',
            'timer' => null,
        ]);
    }
    public function removerTodasImagens()
    {
        $lotes = Lote::where("reserva_id", $this->reserva['id'])->get();
        foreach ($lotes as $lote) {
            Storage::delete($lote->preview);
            $lote->preview = null;
            $lote->save();
        }
        $this->atualizaLotes();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Imagens removidas com sucesso!']);
    }
    public function confirmaRemoverTodosLotes()
    {
        $this->alert('warning', 'Tem certeza de que deseja remover todas os Lotes ?', [
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Sim',
            'onConfirmed' => "removerTodasLotes",
            'showCancelButton' => true,
            'cancelButtonText' => 'Não',
            'onDismissed' => 'cancelar',
            'timer' => null,
        ]);
    }
    public function removerTodasLotes()
    {
        $lotes = Lote::where("reserva_id", $this->reserva['id'])->delete();
        $this->atualizaLotes();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Lotes removidos com sucesso!']);
    }
    public function atualizaLotes()
    {
        $this->lotes = Lote::where("reserva_id", $this->reserva["id"])->get()->toArray();
    }
    public function mount(Reserva $reserva)
    {
        $this->reserva = $reserva->toArray();
        $this->atualizaLotes();
    }
    public function render()
    {
        return view('livewire.sistema.lotes.datatable');
    }
}
