<?php

namespace App\Http\Livewire\Sistema\Usuarios;

use Livewire\Component;
use App\Models\Usuario;

class ModalExclusao extends Component
{
    public $show = false;

    public $usuario;

    protected $listeners = ["carregaModalExcluirUsuario"];
    
    public function carregaModalExcluirUsuario(Usuario $usuario){
        $this->usuario = $usuario;
        $this->show = true;
    }

    public function remover(){
        $this->usuario->delete();
        $this->reset();
        $this->emit('atualizaDatatableUsuarios');
    }
    public function render()
    {
        return view('livewire.sistema.usuarios.modal-exclusao');
    }
}
