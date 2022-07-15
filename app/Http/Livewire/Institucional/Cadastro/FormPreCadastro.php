<?php

namespace App\Http\Livewire\Institucional\Cadastro;

use Livewire\Component;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;

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

    protected $listeners = ["showFormPreCadastro"];
    protected $rules = [
        "email" => "unique:clientes,email",
        "confirmacao_senha" => "same:senha",
    ];

    protected $messages = [
        "email.unique" => "Já existe um cadastro com o e-mail informado.",
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
        $cliente = new Cliente;
        $cliente->nome_dono = $this->nome_dono;
        $cliente->email = $this->email;
        $cliente->telefone = $this->telefone;
        $cliente->senha = Hash::make($this->senha);

        if($this->assinante_newsletter){
            $cliente->assinante_newsletter = true;
        }else{
            $cliente->assinante_newsletter = false;
        }

        $cliente->termos_aceitos = true;
        $cliente->finalizado = false;
        $cliente->etapa_cadastro = 2;
        $cliente->save();

        session()->put(["cliente" => $cliente->toArray()]);

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
