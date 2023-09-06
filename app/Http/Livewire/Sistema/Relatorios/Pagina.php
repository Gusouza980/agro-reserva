<?php

namespace App\Http\Livewire\Sistema\Relatorios;

use App\Models\Assessor;
use App\Models\Cliente;
use Livewire\Component;

class Pagina extends Component
{
    public $relatorios;

    public $arquivos_relatorios;
    public $relatorio_selecionado;

    public function mount(){
        $this->relatorios = [
            0 => "Relação de Assessores e Clientes"
        ];

        $this->arquivos_relatorios = [
            0 => 'sistema/relatorios/relacao-assessores-clientes'
        ];

        $this->relatorio_selecionado = 0;
    }

    public function getRelacaoAssessoresEClientes(){
        $dados = [];
        $clientes = Cliente::all();

        $dados["total_clientes_cadastro_completo"] = $clientes->where("finalizado", true)->count();

        $dados["total_clientes_cadastro_completo_e_aprovado"] = $clientes->where("finalizado", true)->where("aprovado", 1)->count();

        $dados["total_clientes_cadastro_completo_e_nao_analizado"] = $clientes->where("finalizado", true)->where("aprovado", 0)->count();

        $dados["total_clientes_cadastro_completo_e_reprovado"] = $clientes->where("finalizado", true)->where("aprovado", -1)->count();

        $dados["total_clientes_cadastro_incompleto_e_com_assessor"] = $clientes->where("finalizado", false)->where("assessor_id", "<>", NULL)->count();

        $dados["total_clientes_cadastro_incompleto_e_sem_assessor"] = $clientes->where("finalizado", false)->where("assessor_id", NULL)->count();

        $dados["total_clientes_cadastro_completo_e_com_assessor"] = $clientes->where("finalizado", true)->where("assessor_id", "<>", NULL)->count();

        $dados["total_clientes_cadastro_completo_e_sem_assessor"] = $clientes->where("finalizado", true)->where("assessor_id", NULL)->count();

        $assessores = Assessor::with("clientes")->get();

        $dados["cadastros_agrupados_por_assessor"] = [];

        foreach($assessores as $assessor){
            $dados["cadastros_agrupados_por_assessor"][$assessor->nome] = $assessor->clientes->count();
        }

        return $dados;
    }

    public function render()
    {
        return view('livewire.sistema.relatorios.pagina');
    }
}
