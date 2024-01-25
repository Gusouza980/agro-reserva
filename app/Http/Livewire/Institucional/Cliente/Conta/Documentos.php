<?php

namespace App\Http\Livewire\Institucional\Cliente\Conta;


use App\Models\ClienteDocumento;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Documentos extends Component
{
    use WithFileUploads;
    public $novo_comprovante_residencia;
    public $novo_contrato_social;
    public $novo_documento;
    public $novo_ficha_sanitaria;
    public $novo_matricula_imovel;

    public function updated($property){
        $anexo = new ClienteDocumento;
        $anexo->cliente_id = session()->get('cliente')['id'];
        switch($property){
            case('novo_comprovante_residencia'):
                $anexo->tipo = 0;
                $anexo->caminho = $this->novo_comprovante_residencia->store('uploads', 'local');
                break;
            case('novo_contrato_social'):
                $anexo->tipo = 1;
                $anexo->caminho = $this->novo_contrato_social->store('uploads', 'local');
                break;
            case('novo_documento'):
                $anexo->tipo = 2;
                $anexo->caminho = $this->novo_documento->store('uploads', 'local');
                break;
            case('novo_ficha_sanitaria'):
                $anexo->tipo = 3;
                $anexo->caminho = $this->novo_ficha_sanitaria->store('uploads', 'local');
                break;
            case('novo_matricula_imovel'):
                $anexo->tipo = 4;
                $anexo->caminho = $this->novo_matricula_imovel->store('uploads', 'local');
                break;
        }
        $anexo->save();
        $this->reset();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Documento salvo com sucesso!']);
    }

    public function deletar($id){
        $anexo = ClienteDocumento::find($id);
        Storage::delete($anexo->caminho);
        $anexo->delete();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Documento deletado com sucesso!']);
    }

    public function getDocumentosByTipo($tipo){
        return ClienteDocumento::where('cliente_id', session()->get('cliente')['id'])->where("tipo", $tipo)->get();
    }

    public function getDocumentoVariable($tipo){
        switch($tipo){
            case(0):
                return 'comprovante_residencia';
            case(1):
                return 'contrato_social';
            case(2):
                return 'documento';
            case(3):
                return 'ficha_sanitaria';
            case(4):
                return 'matricula_imovel';
        }
    }

    public function render()
    {
        return view('livewire.institucional.cliente.conta.documentos');
    }
}
