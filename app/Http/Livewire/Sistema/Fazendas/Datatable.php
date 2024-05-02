<?php

namespace App\Http\Livewire\Sistema\Fazendas;

use App\Http\Controllers\FazendaController;
use App\Models\Fazenda;
use App\Models\Noticia;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Classes\ImageUpload;
use App\Classes\Util;
use Livewire\WithPagination;

class Datatable extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    use WithPagination;

    public $logos = [];

    protected $listeners = ['excluir', 'cancelar'];

    public function updatedLogos($value, $key){
        $fazenda = Fazenda::find($key);
        if($this->logos[$key]){
            if($fazenda->logo){
                Storage::delete($fazenda->logo);
            }
            // CRIA UMA IMAGEM NO FORMATO DE AVATAR E SALVA NO CLIENTE
            $image = new ImageUpload($this->logos[$key]);
            $image->makeLogoFazenda();
            $fazenda->logo = $image->save("uploads");
            Util::limparLivewireTemp();
        }
        $fazenda->save();
        $this->logos = [];
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Logo atualizada com sucesso!']);
    }

    public function solicitarExcluir(Fazenda $fazenda){
        $this->alert('warning', 'Tem certeza de que deseja excluir a fazenda <b>' . $fazenda->nome_fazenda . '</b> ?', [
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Sim',
            'onConfirmed' => "excluir",
            'showCancelButton' => true,
            'cancelButtonText' => 'Não',
            'timer' => null,
            'data' => [
                'id' => $fazenda->id,
            ]
        ]);
    }
    public function excluir($alert){
        $fazenda = Fazenda::with('reservas:id,fazenda_id', 'lotes:id,fazenda_id',)->find($alert['data']['id']);

        if($fazenda->reservas->count() > 0)
        {
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'error', 'mensagem' => 'Não é possível excluir a fazenda, pois existem reservas vinculadas a ela!']);
            return;
        }

        if($fazenda->lotes->count() > 0)
        {
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'error', 'mensagem' => 'Não é possível excluir a fazenda, pois existem lotes vinculadas a ela!']);
            return;
        }

        Storage::delete($fazenda->logo);
        Storage::delete($fazenda->  logo_evento);
        $fazenda->delete();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Fazenda removida com sucesso!']);
    }

    public function render()
    {
        $fazendas = Fazenda::with('reservas:id,fazenda_id', 'lotes:id,fazenda_id',)->orderBy('nome_fazenda', 'ASC')->paginate(30);
        return view('livewire.sistema.fazendas.datatable', compact('fazendas'));
    }
}
