<?php

namespace App\Http\Livewire\Institucional\CadastroNovo;

use Livewire\Component;
use Livewire\WithFileUploads;

class Pagina extends Component
{
    use WithFileUploads;
    public $form = [];
    public $comprovante_residencial;
    public $contrato_social;
    public $documento;
    public $ficha_sanitaria;
    public $matricula_imovel;

    public function mount(){
        $this->form['tipo_pessoa'] = 0;
    }
    public function render()
    {
        $json = file_get_contents("json/mascaras_telefone.json");
        $paises = json_decode($json);
        return view('livewire.institucional.cadastro-novo.pagina', ['paises' => $paises])->layout('layouts.login');
    }
}
