<?php

namespace App\Http\Livewire\Sistema\Guias;

use Livewire\Component;
use App\Models\Guia;

class Pagina extends Component
{
    public $setor = 0;
    protected $listeners = ['atualizaDatatableGuias' => '$refresh'];

    public function excluir($id)
    {
        $guia = Guia::find($id);
        $guia->delete();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Guia excluída com sucesso!']);
    }

    public function render()
    {
        $guias = Guia::where("setor", $this->setor)->get();
        return view('livewire.sistema.guias.pagina', ['guias' => $guias]);
    }
}
