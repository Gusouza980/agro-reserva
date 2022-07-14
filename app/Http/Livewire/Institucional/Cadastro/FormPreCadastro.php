<?php

namespace App\Http\Livewire\Institucional\Cadastro;

use Livewire\Component;
use App\Models\Cliente;

class FormPreCadastro extends Component
{

    public $show = false;
    public $nome_dono;
    public $email;
    public $ddi = "+55";
    public $telefone;
    public $senha;
    public $confirmacao_senha;
    public $assinante_newsletter;
    public $termos_aceitos;
    public $erros;

    protected $listeners = ["showFormPreCadastro"];
    protected $rules = [
        "email" => "unique:clientes,email",
        "confirmacao_senha" => "same:senha",
    ];

    protected $messages = [
        "confirmacao_senha.same" => "Os campos de senha não coincidem."
    ];

    public function showFormPreCadastro(){
        $this->show = true;
    }

    public function mount($show){
        $this->show = $show;
    }

    public function salvar(){
        $this->validate();
        $this->show = false;
        $this->emit("showConfirmacaoPreCadastro");
    }

    public function render()
    {
        $json = file_get_contents("json/mascaras_telefone.json");
        $paises = json_decode($json);
        return view('livewire.institucional.cadastro.form-pre-cadastro', ['paises' => $paises]);
    }
}
