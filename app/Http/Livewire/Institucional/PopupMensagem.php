<?php

namespace App\Http\Livewire\Institucional;

use Livewire\Component;

class PopupMensagem extends Component
{
    public $mostrarPopup = false;
    public $icone = 'sucesso';
    public $msg = 'aksldm aksldja ksldjalk sdjaslkdj alskdj a';

    protected $listeners = ["mostrarPopup"];

    public function mostrarPopup($icone, $msg){
        $this->icone = $icone;
        $this->msg = $msg;
        $this->mostrarPopup = true;
    }

    public function render()
    {
        return view('livewire.institucional.popup-mensagem');
    }
}
