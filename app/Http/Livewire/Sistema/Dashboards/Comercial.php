<?php

namespace App\Http\Livewire\Sistema\Dashboards;

use Livewire\Component;
use App\Models\Assessor;
use App\Models\Usuario;
use App\Models\Visita;
use App\Models\Cliente;
use App\Models\InteresseLote;
use Livewire\WithPagination;

class Comercial extends Component
{
    use WithPagination;
    public $assessor;
    public $qtd = 15;
    public $menus = [
        0 => "Últimas Atividades dos Seus Clientes",
        1 => "Seus Últimos Clientes Cadastrados",
        2 => "Últimos Clientes Cadastrados sem Assessor",
        3 => "Declarações de Interesse dos seus Clientes",
        4 => "Declarações de Interesse dos Clientes sem Assessor",
        5 => "Clientes com Potencial Interesse",
    ];

    public $menu = 0;

    public function mount()
    {
        $usuario = Usuario::find(session()->get("admin"));
        $this->assessor = $usuario->assessor->toArray();
    }

    public function reclamarCliente(Cliente $cliente)
    {
        $cliente->assessor_id = $this->assessor["id"];
        $cliente->save();
        $this->emit('$refresh');
    }

    public function getAtividadeClientes()
    {
        $assessor = $this->assessor["id"];
        $visitas = Visita::whereHas("cliente", function ($cliente) use ($assessor) {
            $cliente->where("assessor_id", $assessor);
        })->with("cliente:id,nome_dono,cidade,estado,telefone,email")->with("lote:id,nome,fazenda_id,numero")->with("lote.fazenda:id,nome_fazenda")->orderBy("created_at", "DESC")->take($this->qtd)->get();
        return $visitas;
    }

    public function getUltimosClientesCadastrados()
    {
        $clientes = Cliente::where("assessor_id", $this->assessor['id'])->orderBy("created_at", "DESC")->take($this->qtd)->get()->toArray();
        return $clientes;
    }

    public function getUltimosClientesSemAssessor()
    {
        $clientes = Cliente::where("assessor_id", null)->orderBy("created_at", "DESC")->take($this->qtd)->get()->toArray();
        return $clientes;
    }

    public function getDeclaracaoInteresseClientes()
    {
        $interesses = InteresseLote::with("cliente:id,nome_dono,created_at")->with("lote:id,nome,numero,fazenda_id")->with("lote.fazenda:id,nome_fazenda")->whereIn("cliente_id", Cliente::where("assessor_id", $this->assessor['id'])->pluck("id"))->orderBy("created_at", "DESC")->take($this->qtd)->get()->toArray();
        return $interesses;
    }

    public function getDeclaracaoInteresseClientesSemAssessor()
    {
        $interesses = InteresseLote::with("cliente:id,nome_dono,telefone,aprovado,email,created_at")->with("lote:id,nome,numero,fazenda_id")->with("lote.fazenda:id,nome_fazenda")->orderBy("created_at", "DESC")->take($this->qtd)->get()->toArray();
        return $interesses;
    }

    public function render()
    {
        return view('livewire.sistema.dashboards.comercial');
    }
}
