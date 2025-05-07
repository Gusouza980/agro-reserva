<?php

namespace App\Http\Livewire\Sistema\Usuarios;

use Livewire\Component;
use App\Models\Usuario;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Classes\Util;
use Illuminate\Support\Facades\Storage;
use App\Classes\ImageUpload;

class Datatable extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $arquivos = [];

    public $quantidade_exibicao;

    protected $listeners = ["atualizaDatatableUsuarios" => '$refresh'];


    public function updatedArquivos($value, $key){
        $usuario = Usuario::find($key);
        if($this->arquivos[$key]){
            if($usuario->foto){
                Storage::delete($usuario->foto);
            }
            // CRIA UMA IMAGEM NO FORMATO DE AVATAR E SALVA NO CLIENTE
            $image = new ImageUpload($this->arquivos[$key]);
            $image->makeAvatar();
            $usuario->foto = $image->save("uploads");
            Util::limparLivewireTemp();
        }
        $usuario->save();
        $this->arquivos = [];
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Imagem atualizada com sucesso!']);
    }

    public function render()
    {
        $usuarios = Usuario::paginate($this->quantidade_exibicao);
        return view('livewire.sistema.usuarios.datatable', ["usuarios" => $usuarios]);
    }
}
