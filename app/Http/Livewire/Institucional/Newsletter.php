<?php

namespace App\Http\Livewire\Institucional;

use Livewire\Component;
use App\Models\Newsletter as News;

class Newsletter extends Component
{
    public $email;

    public function salvar(){
        if(!$this->email || empty($this->email)){
            $msg = "Você precisa informar um e-mail para ser cadastrado na nossa newsletter.";
            $this->emit("mostrarPopup", "erro", $msg);
            $this->resetExcept();
            return;
        }

        $newsletter = News::where("email", $this->email)->first();
        
        if($newsletter){
            $msg = "Você já está cadastrado na nossa newsletter ! Fica atento a sua caixa de e-mail que sempre te enviaremos todas as nossas novidades!";
            $this->emit("mostrarPopup", "erro", $msg);
            $this->resetExcept();
            return;
        }

        $newsletter = new News;
        $newsletter->email = $this->email;
        $newsletter->save();

        $msg = "Parabéns ! Você foi cadastrado na nossa newsletter e ficará por dentro de todas as novidades da Agroreserva.";
        $this->emit("mostrarPopup", "sucesso", $msg);
    }

    public function render()
    {
        return view('livewire.institucional.newsletter');
    }
}
