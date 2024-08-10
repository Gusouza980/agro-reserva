<?php

namespace App\Http\Livewire\Sistema\Reservas;

use Livewire\Component;
use App\Models\Reserva;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Classes\Util;
use Illuminate\Support\Facades\Storage;
use App\Classes\ImageUpload;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Datatable extends Component
{
    use WithPagination;
    use WithFileUploads;
    use LivewireAlert;

    public $arquivos;

    protected $listeners = ["atualizaValor", "atualizaDatatableReservas" => '$refresh', 'excluir'];

    public function updatedArquivos($value, $key)
    {
        $reserva = Reserva::find($key);
        if ($this->arquivos[$key]) {
            if ($reserva->imagem_card) {
                Storage::delete($reserva->imagem_card);
            }
            // CRIA UMA IMAGEM NO FORMATO DE AVATAR E SALVA NO CLIENTE
            $image = new ImageUpload($this->arquivos[$key]);
            $image->makeVitrineReserva();
            $reserva->imagem_card = $image->save("uploads");
            Util::limparLivewireTemp();
        }
        $reserva->save();
        $this->arquivos = [];
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Imagem atualizada com sucesso!']);
    }

    public function solicitarExcluir($id)
    {
        $this->alert('warning', 'Tem certeza de que deseja excluir essa reserva ??', [
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Sim',
            'onConfirmed' => "excluir",
            'showCancelButton' => true,
            'cancelButtonText' => 'Não',
            'timer' => null,
            'data' => [
                'id' => $id,
            ]
        ]);
    }

    public function excluir($data = null)
    {
        $reserva = Reserva::with('lotes')->find($data['data']['id']);
        if ($reserva->lotes->count() > 0) {
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'error', 'mensagem' => 'Não é possível excluir uma reserva que possui lotes!']);
            return;
        }
        if ($reserva->imagem_card) {
            Storage::delete($reserva->imagem_card);
        }
        if ($reserva->catalogo) {
            Storage::delete($reserva->catalogo);
        }
        $reserva->delete();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Reserva excluída com sucesso!']);
    }

    // public function excluir($id)
    // {
    //     $reserva = Reserva::with('lotes')->find($id);
    //     if ($reserva->lotes->count() > 0) {
    //         $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'error', 'mensagem' => 'Não é possível excluir uma reserva que possui lotes!']);
    //         return;
    //     }
    //     if ($reserva->imagem_card) {
    //         Storage::delete($reserva->imagem_card);
    //     }
    //     if ($reserva->catalogo) {
    //         Storage::delete($reserva->catalogo);
    //     }
    //     $reserva->delete();
    //     $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Reserva excluída com sucesso!']);
    // }

    public function atualizaValor(Reserva $reserva, $campo, $valor)
    {
        $reserva->$campo = $valor;
        $reserva->save();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Dado atualizado com sucesso!']);
    }

    public function render()
    {
        $reservas = Reserva::with("fazenda")->orderBy("inicio", "DESC")->paginate(10);
        return view('livewire.sistema.reservas.datatable', ['reservas' => $reservas]);
    }
}
