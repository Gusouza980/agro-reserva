<?php

namespace App\Http\Livewire\Sistema\Lotes;

use App\Models\Reserva;
use Livewire\Component;

class Importar extends Component
{
    public $show = false;
    public $reserva;

    protected $listeners = ["carregaModalImportarLotes"];
    public function carregaModalCadastroUsuario(){
        $this->show = true;
    }
    public function mount(Reserva $reserva){
        $this->reserva = $reserva;
    }
    public function render()
    {
        return view('livewire.sistema.lotes.importar');
    }
}
