<?php

namespace App\Http\Livewire\Sistema\Senha;

use Livewire\Component;
use App\Models\Usuario;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class ModalAlterar extends Component
{
    public $senha;
    public $nova_senha;
    public $show = false;

    protected $listeners = ["carregaModalAlteraSenha"];

    protected function rules()
    {
        $rules = [
            "senha" => ["required", Password::min(6)->letters()->mixedCase()->numbers()],
            "nova_senha" => ["required", Password::min(6)->letters()->mixedCase()->numbers()]
        ];
        return $rules;
    }

    public function carregaModalAlteraSenha()
    {
        $this->reset();
        $this->show = true;
    }

    public function salvar()
    {
        $usuario = Usuario::find(session()->get("usuario"));
        if (Hash::check($this->senha, $usuario->senha)) {
            $usuario->senha = $this->nova_senha;
            $usuario->save();
            toastr()->success("Senha alterada com sucesso!");
            $this->reset();
        } else {
            session()->flash("erro", "A senha informada não corresponde com a senha atual.");
        }
    }
    public function render()
    {
        return view('livewire.sistema.senha.modal-alterar');
    }
}
