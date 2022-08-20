<?php

namespace App\Http\Livewire\Painel;

use Livewire\Component;

class PopupMensagem extends Component
{
 
    public $icone = 'sucesso';
    public $msg = '';

    protected $listeners = ["mostrarPopup"];

    public function mostrarPopup($icone, $msg){
        $this->icone = $icone;
        $this->msg = $msg;
        $this->dispatchBrowserEvent('abreModalPopupMensagem');
    }

    public function render()
    {
        return view('livewire.painel.popup-mensagem');
    }
}
