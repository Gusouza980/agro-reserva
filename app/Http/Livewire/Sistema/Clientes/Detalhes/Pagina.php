<?php

namespace App\Http\Livewire\Sistema\Clientes\Detalhes;

use App\Models\Assessor;
use App\Models\Cliente;
use App\Models\ClienteDocumento;
use App\Models\InteresseLote;
use App\Models\Visita;
use Livewire\Component;
use Livewire\WithPagination;

class Pagina extends Component
{
    use WithPagination;
    public $cliente;
    public $menu = 0;
    public $menus = [
        0 => "Informações Gerais",
        1 => "Informações de Propriedade",
        2 => "Informações Comerciais",
        3 => "Documentos",
        4 => "Referências",
        5 => "Visitas",
        6 => "Declarações de Interesse"
    ];
    public function getAssessoresProperty(){
        return Assessor::orderBy("nome", "ASC")->get();
    }

    public function getDocumentos($tipo){
        return ClienteDocumento::where("cliente_id", $this->cliente['id'])->where("tipo", $tipo)->get();
    }

    public function salvar_informacoes_gerais(){
        Cliente::find($this->cliente['id'])->update($this->cliente);
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Informações salvas com sucesso!']);
    }

    public function aprovar()
    {
        Cliente::find($this->cliente['id'])->update(["aprovado" => 1]);
        $this->cliente['aprovado'] = 1;
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Cliente aprovado com sucesso!']);
    }

    public function reprovar()
    {
        Cliente::find($this->cliente['id'])->update(["aprovado" => -1]);
        $this->cliente['aprovado'] = -1;
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Cliente reprovado com sucesso!']);
    }

    public function mount($cliente_id){
        $this->cliente = Cliente::with("documentos")->find($cliente_id)->toArray();
    }
    public function render()
    {
        $parametros = [];
        switch($this->menu){
            case(5):
                $parametros['visitas'] = Visita::with("lote:id,nome,fazenda_id,numero")->with("lote.fazenda:id,nome_fazenda")->where("cliente_id", $this->cliente['id'])->orderBy("created_at")->paginate(20);
                break;
            case(6):
                $parametros['interesses'] = InteresseLote::with("lote:id, nome, numero, fazenda_id")->with("lote.fazenda:id,nome_fazenda")->where("cliente_id", $this->cliente['id'])->orderBy("created_at", "DESC")->paginate(20);
                break;
        }
        return view('livewire.sistema.clientes.detalhes.pagina', $parametros);
    }
}
