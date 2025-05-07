<?php

namespace App\Http\Livewire\Sistema\Usuarios;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\Usuario;
use Illuminate\Validation\Rules\Password;
use Illuminate\Database\Eloquent\Builder;

class ModalCadastro extends Component
{
    public $show = false;
    public $usuario;
    public $senha;
    public $op;

    protected $listeners = ["carregaModalCadastroUsuario", "carregaModalEdicaoUsuario"];

    protected function rules()
    {
        $rules = [
            "usuario.nome" => "max:60|required",
            "usuario.usuario" => "max:60|required",
            "usuario.email" => "max:60|required|email|unique:usuarios,email",
            "usuario.acesso" => "required",
            "senha" =>  ["required", Password::min(6)->letters()->mixedCase()->numbers()]
        ];

        if ($this->op == 'edicao') {
            $rules["usuario.email"] = $rules["usuario.email"] . "," . $this->usuario->id;
            // $rules["senha"] = [Password::min(6)->letters()->mixedCase()->numbers()];
            $rules["senha"] = [
                "nullable",
                Password::min(6)->letters()->mixedCase()->numbers()
            ];
        }

        return $rules;
    }

    public function updatedShow()
    {
        if ($this->show == false) {
            $this->resetExcept("profissionais");
        }
    }

    public function carregaModalEdicaoUsuario(Usuario $usuario)
    {
        $this->usuario = $usuario;
        $this->show = true;
        $this->op = "edicao";
    }

    public function carregaModalCadastroUsuario()
    {
        $this->usuario = new Usuario;
        $this->show = true;
        $this->op = "cadastro";
    }

    public function salvar()
    {
        $this->validate();
        if ($this->senha) {
            $this->usuario->senha = Hash::make($this->senha);
            $this->senha = null;
        }
        $this->usuario->save();
        $this->dispatchBrowserEvent('notificaToastr', ["tipo" => "success", "mensagem" => 'Dados atualizados com sucesso']);
        $this->show = false;
        $this->emit('atualizaDatatableUsuarios');
    }

    public function render()
    {
        return view('livewire.sistema.usuarios.modal-cadastro');
    }
}
