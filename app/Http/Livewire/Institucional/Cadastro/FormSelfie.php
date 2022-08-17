<?php

namespace App\Http\Livewire\Institucional\Cadastro;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Classes\Util;
use App\Models\Cliente;

class FormSelfie extends Component
{

    use WithFileUploads;

    public $show;
    public $arquivo;
    public $mostra_preview = false;

    protected $listeners = ["showFormSelfie"];

    public function showFormSelfie(){
        $this->show = true;
    }

    public function mount($show){
        $this->show = $show;
    }

    public function updatedArquivo(){
        $this->mostra_preview = true;
    }

    public function salvar(){
        $validacao = $this->validate([
            'arquivo' => 'max:5000', // 10MB Max
        ]);

        $cliente = Cliente::find(session()->get("cliente")["id"]);
        if($this->arquivo){
            Storage::delete(str_replace(url("/"), "", $cliente->documento));
            $cliente->documento = $this->arquivo->store("site/clientes/", 'local');
            Util::limparLivewireTemp();
        }
        $cliente->finalizado = true;
        $cliente->save();
        session()->forget("cliente");
        session()->put(["cliente" => $cliente->toArray()]);

        $this->show = false;
        $this->emit("showConfirmacaoCadastroCompleto");
    }
    
    public function voltar(){
        $this->show = false;
        $this->emit("showListaEtapas");
    }

    public function render()
    {
        return view('livewire.institucional.cadastro.form-selfie');
    }
}
