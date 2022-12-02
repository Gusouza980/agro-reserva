<?php

namespace App\Http\Livewire\Institucional\Cadastro;

use Livewire\Component;
use App\Models\Cliente;

class Pagina extends Component
{

    public $showListaEtapas = true;
    public $showFormPreCadastro = false;
    public $showConfirmacaoPreCadastro = false;
    public $showSelecaoCategoria = false;
    public $showFormDadosPessoais = false;
    public $showTermosAgrisk = false;
    public $showFormDadosPropriedade = false;
    public $showFormInformacoesComplementares = false;
    public $showAvisoUltimaEtapa = false;
    public $showFormSelfie = false;
    public $showConfirmacaoCadastroCompleto = false;

    public function mount(){
        // $this->showListaEtapas = true;
    }

    public function render()
    {
        return view('livewire.institucional.cadastro.pagina');
    }
}
