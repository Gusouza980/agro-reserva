<?php

namespace App\Http\Livewire\Sistema\Reservas;

use Livewire\Component;
use App\Models\Reserva;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Classes\Util;
use Illuminate\Support\Facades\Storage;
use App\Classes\ImageUpload;

class Datatable extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $arquivos;

    protected $listeners = ["atualizaValor", "atualizaDatatableReservas" => '$refresh'];

    public function updatedArquivos($value, $key){
        $reserva = Reserva::find($key);
        if($this->arquivos[$key]){
            if($reserva->imagem_card){
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

    public function atualizaValor(Reserva $reserva, $campo, $valor){
        $reserva->$campo = $valor;
        $reserva->save();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Dado atualizado com sucesso!']);
    }

    public function render()
    {
        $reservas = Reserva::orderBy("inicio", "DESC")->paginate(10);
        return view('livewire.sistema.reservas.datatable', ['reservas' => $reservas]);
    }
}
